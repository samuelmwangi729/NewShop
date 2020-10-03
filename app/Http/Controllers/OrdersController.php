<?php

namespace App\Http\Controllers;
use Session;
use Auth;
use Illuminate\Http\Request;
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
        // return Session::get('Number');
        $number=Session::get('Number');
        //then confirm receipt of Payment
        $payment=MpesaTransactions::where('MSISDN','=',$number)->get()->first();
        if($payment->Status=='Success'){
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
              $cart[$i]->Status=5;
              $cart[$i]->save();
          }
            return $cart;
        }

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
        //
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
