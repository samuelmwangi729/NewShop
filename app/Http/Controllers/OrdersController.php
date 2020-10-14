<?php

namespace App\Http\Controllers;
use Session;
use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\PaymentsController;
use App\{MpesaTransactions,Order,Cart};
class OrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Orders.Index');
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
    protected function getOrderNumber(){
        return Session::get('OrderNumber');
    }
    protected function getSingle(){
        // return Session::get('OrderNumer');
        $order=Order::where([
            ['Client','=',Auth::user()->email],
            ['Status','=','0']
        ])->get()->last();
        // return $order;
        if(is_null($order)){
            die();
        }
        $carts=Cart::where([
            ['User','=',Auth::user()->email],
            ['OrderNumber','=',$order->OrderNumber],
            ['Status','=','5']
        ])->get();
        $data=['order'=>$order,'items'=>$carts];
        return $data;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return "sam";
        $number=Session::get('Number');
        //then confirm receipt of Payment
        $payment=MpesaTransactions::where('MSISDN','=',$number)->get()->first();
        // $payment=MpesaTransactions::where('MSISDN','=','254713529784')->get()->last();
        // return $payment->Status;
        if(is_null($payment)){
            //then no payment as been received
            $data=['status'=>'error','message'=>'No payment received, Kindly Contact Us if any query'];
            return $data;
        }else{
            //payment received and we continue to place the order
            // return $payment->Status;
            if($payment->Status=='Success'){
                //update the payment status to used=1;
                //first confirm if the amount paid is enough
                $toBePaid=new PaymentsController();
                $toBePaidAmount=$toBePaid->getTotalAmount($request);
                // return $toBePaidAmount;
                if($payment->TransAmount<$toBePaidAmount){
                    $deviation=$toBePaidAmount-$payment->TransAmount;
                    $data=['Status'=>'error','message'=>'Amount Paid Is Not Enough!','Action'=>'Kindly Pay Extra Ksh '.$deviation.' And then Contact Us'];
                    return $data;
                }
                $orderNumber='#'.Session::get('OrderNumber');
                $client=Auth::user()->email;
                $DatePlaced=date('Y-m-d');
                $order=Order::create([
                    'OrderNumber'=>$orderNumber,
                    'Client'=>$client,
                    'DatePlaced'=>$DatePlaced,
                ]);
                // return $order;
                //make the order
                //update the cart now
              $cart=Cart::where([
                  ['User','=',Auth::user()->email],
                  ['Status','=','0']
              ])->get();
              //call the index function to make sure it interchanges the username when the user is logge in
            //   return Session::get('Username');
              for ($i=0; $i < count($cart); $i++) {
                  //5, the order has been placed
                  //6, the order has been dispatched
                  //7, order received
                  $cart[$i]->OrderNumber=$orderNumber;
                  $cart[$i]->Status=5;
                  $cart[$i]->save();
              }
              $data=['status'=>'success','message'=>'order successfully placed'];
              $payment->Used=1;
              $payment->save();
                return $data;
            }
        }
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
}
