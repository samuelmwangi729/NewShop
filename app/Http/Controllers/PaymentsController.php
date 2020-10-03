<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
use Str;
use Storage;
use App\{CartsController,Cart,Product,Pickup,PaymentRequests,MpesaTransactions,Order,Cancelled};
use Session;
class PaymentsController extends Controller
{
    public $BusinessCode='174379';
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        return Auth::user();
    }
    public function PayWithMpesa($number)
    {
        $cartTotal=$this->getCartTotal();
        // return Session::get('Username');
        $user=Auth::user();
        $town=$user->Town;
        // return $town;
        $shipping=PickUp::where('TownId','=',$town)->get()->first();
        // return $shipping->Shipping;
        $totalAmount=$cartTotal+$shipping->Shipping;
        // $number=$number;
        $first_character=substr($number,0,1);
        //if the first character is sero, replace it with 254
        if($first_character=='0'){
            $paymentNumber='254'.substr($number,1);
        }
        if($first_character=='+'){
            $paymentNumber=substr($number,1);
        }
        if($first_character !='0' && $first_character !='+'){
            //else the number is Okay, ie starts with 254
            $paymentNumber=$number;
        }
        //the stkpush code
        // return $totalAmount
        $mpesa= new \Safaricom\Mpesa\Mpesa();
        $token=$mpesa::generateSandBoxToken();
        $BusinessShortCode=174379;
        $LipaNaMpesaPasskey='bfb279f9aa9bdbcf158e97dd71a467cd2e0c893059b10f78e6b72ada1ed2c919';
        $TransactionType='CustomerPayBillOnline';
        $Amount=$totalAmount;
        // $Amount=1;
        //phone number and partyA are the same
         $PartyA=$paymentNumber;
        $PartyB=$this->BusinessCode;
        $PhoneNumber=$paymentNumber;
        $CallBackURL='https://xpresskenya.tk/api/ConfirmPayment';
        $AccountReference=$paymentNumber;
        $TransactionDesc='Being Payment for Comodity Ordered';
        $Remark='Being Payment for Order Id  Comodity Ordered';
       $stkpush= $mpesa->STKPushSimulation($BusinessShortCode, $LipaNaMpesaPasskey, $TransactionType, $Amount, $PartyA, $PartyB, $PhoneNumber, $CallBackURL, $AccountReference, $TransactionDesc, $Remark);
       $data=json_decode($stkpush,true);
       PaymentRequests::create([
        'MerchantRequestID'=>$data['MerchantRequestID'],
        'CheckoutRequestID'=>$data['CheckoutRequestID'],
        'ResponseCode'=>$data['ResponseCode'],
        'ResponseDescription'=>$data['ResponseDescription'],
        'CustomerMessage'=>$data['CustomerMessage'],
        'user'=>Session::get('Username'),
        'Phone'=>$paymentNumber,
       ]);
       session(['PhoneNumber'=>$paymentNumber]);
        return $data['CustomerMessage'];
    }
    protected function getCartTotal(){
        $username=Session::get('Username');
        $products=[];
        $cart=Cart::where([
            ['User','=',$username],
            ['Status','=','0']
        ])->get();
        for($i=0;$i<count($cart);$i++){
            //get the product and add it to an array
            $product=Product::where('SKU','=',$cart[$i]->ProductSKU)->get();
            array_push($products,$product);
        }
        $sum=0;
        for($i=0;$i<count($products);$i++){
            $sum=$products[$i][0]->FinalPrice+$sum;
        }
        return $sum;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $mpesa= new \Safaricom\Mpesa\Mpesa();
        $callbackData=$mpesa->getDataFromCallback();
        //this goes to the main posting of the data
        $data=json_decode($callbackData);
        Storage::put('final.txt',$callbackData);
        //save the mpesa log
        Storage::append('Mpesa.log',$callbackData);
        $mpesa->finishTransaction();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        echo($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    protected function getFileData(){
        $OrderId= Str::random(10);
        session(['OrderNumber'=>$OrderId]);
        $file=Storage::get('final.txt');
        $data=json_decode($file,true);
        // return $data['Body']['stkCallback']['MerchantRequestID'];
        if($data['Body']['stkCallback']['ResultCode'] !=0){
            //you should go back with the error message
            //save the cancelled request into the database
            Cancelled::create([
                'TransactionType'=>'Mpesa',
                'OrderId'=>$OrderId,
                'MechantId'=>$data['Body']['stkCallback']['MerchantRequestID'],
                'CheckOutRequestId'=>$data['Body']['stkCallback']['CheckoutRequestID'],
                'MSISDN'=>Session::get('PhoneNumber'),
                'FirstName'=>Auth::user()->First_Name,
                'Email'=>Auth::user()->email,
                'LastName'=>Auth::user()->Last_Name,
            ]);
            $data=['status'=>'error','message'=>'Payment for the Order #'.Session::get('OrderNumber').' Cancelled By the User'];
            return $data;
        }
        // return $request->all();

        // return Auth::user()->Last_Name;
    //    return $data['Body']['stkCallback']['CallbackMetadata']['Item'][0]['Value'];
        $Amount=$data['Body']['stkCallback']['CallbackMetadata']['Item'][0]['Value'];
        $MpesaReceiptNumber=$data['Body']['stkCallback']['CallbackMetadata']['Item'][1]['Value'];
        $TransactionDate=$data['Body']['stkCallback']['CallbackMetadata']['Item'][3]['Value'];
        $Balance=$data['Body']['stkCallback']['CallbackMetadata']['Item'][2]['Value'] ?? 'null';
        $PhoneNumber=$data['Body']['stkCallback']['CallbackMetadata']['Item'][4]['Value'];
        $ResultCode=$data['Body']['stkCallback']['ResultCode'];
        $checkout_id=$data['Body']['stkCallback']['CheckoutRequestID'];
        $mechant_id=$data['Body']['stkCallback']['MerchantRequestID'];
        $Status='';
        if($ResultCode==0){
           $Status='Success';
        }else{
           $Status='Error';
        }
        MpesaTransactions::create([
            'TransactionType' => 'Mpesa',
            'TransID' =>$MpesaReceiptNumber,
            'TransTime' => $TransactionDate,
            'TransAmount' => $Amount,
            'BusinessShortCode' =>$this->BusinessCode,
            //payment request code
            'CheckOutId' => $checkout_id,
            'BillRefNumber' => Session::get('OrderNumber'),
            'InvoiceNumber' =>'XP-'.Session::get('OrderNumber'),
            'OrgAccountBalance' => $Balance,
            'MechantId' => $mechant_id,
            'MSISDN' => $PhoneNumber,
            'FirstName' =>Auth::user()->First_Name,
            'Email' =>Auth::user()->email,
            'LastName' =>Auth::user()->Last_Name,
            'Status'=>$Status
           ]);
           //set the session number for order completion
           session(['Number'=>$PhoneNumber]);
        //    return Session::get('Number');
           $data=['status'=>'success','message'=>'Payment Received for the Order #'.Session::get('OrderNumber')];
           return $data;
    }
    protected function getFile(){
        return Auth::user();
    }
    public function getCreditCard(Request $request){
        $cardNumber=$request->card-$request->key;
        $cvv=$request->cvv-$request->key;
        $exp=$request->exp;
        $data=explode("-",$exp);
        // return $data[1];
        $expiry=$data[1].$data[0];
        $transId=Str::random(15);
        // return $transId;
        //post the data to pesa swap
        $url = 'https://devpesaswap.azurewebsites.net/api/regular/card-payment';
        $curl=curl_init();
        curl_setopt($curl, CURLOPT_URL, $url); curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));

        $curl_post_data = array(
        'consumer_key' =>'MfxFmjr3Xq',
        'api_key' =>'ui4ZBl4ratvsNPmGvBwqyptlI',
        'currency' =>'KES',
        'amount' => '900',
        'expiry_date' =>$expiry,
        'card_security_code' =>$cvv,
        'credit_card_number' =>$request->card,
        'customer_external_id' =>'L0gu92uEKFbkzWsr4O6YWst8R',
        'transaction_external_id' =>'paymentfororder',
        'environment' =>'TEST');

        $data_string = json_encode($curl_post_data);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $data_string);
        $curl_response = curl_exec($curl);
        $response = json_decode($curl_response,true);
        return $response;
    }
}
