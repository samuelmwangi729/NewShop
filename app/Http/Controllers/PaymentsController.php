<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
use Str;
use Storage;
use App\Http\Controllers\OrdersController;
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
        $totalAmount=$this->getTotalAmount();
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
        session(['PhoneNumber'=>$paymentNumber]);
        //the stkpush code
    //     // return $totalAmount
        $mpesa= new \Safaricom\Mpesa\Mpesa();
        $token=$mpesa::generateSandBoxToken();
        $BusinessShortCode=174379;
        $LipaNaMpesaPasskey='bfb279f9aa9bdbcf158e97dd71a467cd2e0c893059b10f78e6b72ada1ed2c919';
        $TransactionType='CustomerPayBillOnline';
        $Amount=$totalAmount;
        // return $Amount;
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
        $data=['status'=>'success','message'=>'Transaction Successfully Initiated'];
        return $data;
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
    public function QueryTransaction(Request $request,$Transaction){
        $OrderId=Str::upper( Str::random(15));
        //if the user is logged in, change the username
        if(Auth::check()){
            $request->session()->forget('Username');
            //then set the new username
            session(['Username'=>Auth::user()->email]);
        }
        session(['OrderNumber'=>$OrderId]);
        // return '#'.Session::get('OrderNumber');
        // $mpesa = new \Safaricom\Mpesa\Mpesa();
        // $timestamp='20'.date(    "ymdhis");
        // $password=base64_encode('174379'.'bfb279f9aa9bdbcf158e97dd71a467cd2e0c893059b10f78e6b72ada1ed2c919'.$timestamp);
        // // $status=$mpesa::STKPushQuery();//i will check the status of the stk push simulation//then check if the amount paid is enough//then confirm the order
        // $STKPushRequestStatus=$mpesa->STKPushQuery('ws_CO_061020200048066978','174379',$password,$timestamp);
        // return $STKPushRequestStatus;
       $Transaction= MpesaTransactions::where([
        ['Email','=',Auth::user()->email],
        ['TransactionType','=','Mpesa'],
        ['TransID','=',$Transaction],
    ])->get()->last();
    // return $Transaction;
    if(is_null($Transaction)){
        //then the transaction is Not Found
        //if its not found locally, then we will have to query online to check the status
        //check mpesa stk queryMpesa
        //if still null,search mpesa transaction query with my LNM business number,
        //if still null, the amount is not  paid
        $data=['Status'=>'error','message'=>'No Such  Transaction Available!','Action'=>'Contact Us For Help'];
        return $data;
    }
    $toBePaid=$this->getTotalAmount();
    $orderNumber='#'.Session::get('OrderNumber');
    // return $this->getTotalAmount();
    if($toBePaid<=$Transaction->TransAmount){
        //amount paid is Okay
        $number=Session::get('Number');
        //then confirm receipt of Payment

        if(is_null($Transaction)){
            //then no payment as been received
            $data=['status'=>'error','message'=>'No payment received, Kindly Contact Us if any query'];
            return $data;
        }else{
            //payment received and we continue to place the order
            // return $Transaction;
            if($Transaction->Status=='Success'){
                //update the payment status to used=1;
                //first confirm if the amount paid is enough
                $toBePaid=new PaymentsController();
                $toBePaidAmount=$toBePaid->getTotalAmount($request);
                // return $toBePaidAmount;
                if($Transaction->TransAmount<$toBePaidAmount){
                    $deviation=$toBePaidAmount-$payment->TransAmount;
                    $data=['Status'=>'error','message'=>'Amount Paid Is Not Enough!','Action'=>'Kindly Pay Extra Ksh '.$deviation.' And then Contact Us'];
                    return $data;
                }
                $client=Auth::user()->email;
                $DatePlaced=date('Y-m-d');
                $order=Order::create([
                    'OrderNumber'=>'#'.Session::get('OrderNumber'),
                    'Client'=>$client,
                    'DatePlaced'=>$DatePlaced,
                ]);
                // return $order;
                //make the order
                //update the cart now
              $cart=Cart::where([
                  ['User','=',Session::get('Username')],
                  ['Status','=','0']
              ])->get();
              //call the index function to make sure it interchanges the username when the user is logge in
            //   return Session::get('Username');
            // return $cart;
              for ($i=0; $i < count($cart); $i++) {
                  //5, the order has been placed
                  //6, the order has been dispatched
                  //7, order received
                  $cart[$i]->OrderNumber='#'.Session::get('OrderNumber');
                  $cart[$i]->Status=5;
                  $cart[$i]->save();
              }
              $data=['status'=>'success','message'=>'order successfully placed'];
              $Transaction->Used=1;
              $Transaction->save();
                return $data;
            }
        }
    }else{
        //the amount paid is less
        $deviation=$toBePaid-$Transaction->TransAmount;
        $data=['Status'=>'error','message'=>'Amount Paid Is Not Enough!','Action'=>'Kindly Pay Extra Ksh '.$deviation.' And then Contact Us'];
        return $data;
    }
        return $Transaction->TransAmount;
    }
    public function getTotalAmount(){
        $cartTotal=$this->getCartTotal();
        // return Session::get('Username');
        $user=Auth::user();
        $town=$user->Town;
        // return $town;
        $shipping=PickUp::where('TownId','=',$town)->get()->first();
        // return $shipping->Shipping;
        $totalAmount=$cartTotal+$shipping->Shipping;
        return $totalAmount;
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
        $OrderId='#'.Str::upper(Str::random(15));
        session(['OrderNumber'=>$OrderId]);
        try {
            $file=Storage::get('final.txt');
        } catch (\Throwable $th) {
            //throw $th;
            $data=['status'=>'error','message'=>'Unknown Error Occurred'];
            return $data;
        }
        $data=json_decode($file,true);
        // return $data;
        // return json_encode($file)['Body'];
        if($data['Body']['stkCallback']['ResultCode']=='1031' || $data['Body']['stkCallback']['ResultCode']=='1032' ){
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
            $data=['status'=>'error','message'=>'Payment for the Order '.Session::get('OrderNumber').' Cancelled By the User,Please try again'];
            Storage::append('final.txt','');
            //make sure that the file is empty
            return $data;
        }
        if($data['Body']['stkCallback']['ResultCode']=='1'){
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
                'Status'=>'Insufficient Balance'
            ]);
            $data=['status'=>'less','message'=>'Payment for the Order '.Session::get('OrderNumber').' Could not be completed. Insufficient Balance'];
            Storage::append('final.txt','');
            //make surethat the file is empty
            return $data;
        }
        // return $request->all();

        // return Auth::user()->Last_Name;
    //    return $data['Body'];
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
            'BillRefNumber' =>Str::upper( Session::get('OrderNumber')),
            'InvoiceNumber' =>'XP-'.Session::get('OrderNumber'),
            'OrgAccountBalance' => $Balance,
            'MechantId' => $mechant_id,
            'MSISDN' => $PhoneNumber,
            'FirstName' =>Auth::user()->First_Name,
            'Email' =>Auth::user()->email,
            'LastName' =>Auth::user()->Last_Name,
            'Status'=>$Status
           ]);
           //this is the phone number in the transaction
           //set the session number for order completion
           session(['Number'=>$PhoneNumber]);
           //then we get the phone number that has initiated payment
           $payingNumber=Session::get('PhoneNumber');
           $transactionNumber= Session::get('Number');
           //if the 2 numbers are not the same, then kill the transaction
           if($payingNumber !=$transactionNumber){
               //return error and kill the process
               $data=['status'=>'error','message'=>'Unknown Error Occurred. Order '.Session::get('OrderNumber').' Not Placed'];
               Storage::delete('final.txt');
               return $data;
           }else{
            Storage::put('final.txt','');
            $data=['status'=>'success','message'=>'Payment Received for the Order '.Session::get('OrderNumber')];
            Storage::put('final.txt','');
            return $data;
           }
        //    return;

    }
    protected function getBilling(){
        $Transaction=MpesaTransactions::where([
            ['Email','=',Auth::user()->email]
        ])->get()->last();
        return $Transaction;
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
        'amount' => '590',
        'expiry_date' =>$expiry,
        'card_security_code' =>$cvv,
        'credit_card_number' =>$request->card,
        'customer_external_id' =>'L0gu92uEKFbkzWsr4O6YWst8R',
        'transaction_external_id' =>'#'.Str::random(10),
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
