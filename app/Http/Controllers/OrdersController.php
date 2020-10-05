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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // return Session::get('Number');
        $number=Session::get('Number');
        //then confirm receipt of Payment
        // $payment=MpesaTransactions::where('MSISDN','=',$number)->get()->first();
        $payment=MpesaTransactions::where('MSISDN','=','254713529784')->get()->last();
        // return $payment;
        if(is_null($payment)){
            //then no payment as been received
            $data=['status'=>'error','message'=>'No payment received, Kindly Contact Us if any query'];
            return $data;
        }else{
            //payment received and we continue to place the order
            if($payment->Status=='Success'){
                //update the payment status to used=1;
                //first confirm if the amount paid is enough
                $toBePaid=new PaymentsController();
                $toBePaidAmount=$toBePaid->getTotalAmount($request);
                if($toBePaidAmount<$payment->TransAmount){
                    $deviation=$toBePaidAmount-$payment->TransAmount;
                    $data=['Status'=>'error','message'=>'Amount Paid Is Not Enough!','Action'=>'Kindly Pay Extra Ksh '.$deviation.' And then Contact Us'];
                    return $data;
                }
                $orderNumber='#'.Session::get('OrderNumber');
                $client=Auth::user()->email;
                $DatePlaced=date('Y-m-d');
                Order::create([
                    'OrderNumber'=>$orderNumber,
                    'Client'=>$client,
                    'DatePlaced'=>$DatePlaced,
                ]);
                //make the order
                //update the cart now
              $cart=Cart::where([
                  ['User','=',Auth::user()->email],
                  ['Status','=','0']
              ])->get();
              for ($i=0; $i < count($cart); $i++) {
                  //5, the order has been placed
                  //6, the order has been dispatched
                  //7, order received
                  $cart[$i]->OrderNumber='#'.Session::get('OrderNumber');
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
