<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Comparison;
// use Session;
// use Auth;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::middleware('api')->get('/user', function (Request $request) {
    return "sample";
});
Route::middleware('api')->post('/Compare', function (Request $request) {
    $username='';
    $rand=Str::random(10);
    if(Session::get('Username')==''){
        //set the session if the user is logged in
        if(Auth::user()==null){
            $username=$rand;
        }else{
            $username=Auth::user()->email;
        }
    }
    session(['Username'=>$username]);
    return Session::get('Username');
    //check if the user added the same product again
    $comp=Comparison::where([
        ['ProductSKU','=',$request->SKU],
        ['User','=',Session::get('Username')]
    ])->get()->first();
    if(is_null($comp)){
        $comparison=Comparison::create([
            'ProductSKU'=>$request->SKU,
            'User'=>$username
        ]);
    }else{
        return ['error'=>'dublicate entry'];
    }
    return $request->user();
});
Route::post('/ConfirmPayment',[
    'uses'=>'PaymentsController@store'
]);
Route::get('/rngL1uWwlBDtTrrOQf8uVqqjes17nEW',[
    'uses'=>'PaymentsController@getFileData'
]);
Route::get('/rngL1uWwlBDtTrrOQ',[
    'uses'=>'PaymentsController@getFile'
]);
Route::get('/CEtZx3vKDPyrMiK1etzR3RDUjyMiOvmkuD9uD/3hc9U9svsC',[
    'uses'=>'IndexController@loadVisitors'
]);
Route::get('/today/CEtZx3vKDPyrMiK1etzR3RDUjyMiOvmkuD9uD/3hc9U9svsC',[
    'uses'=>'IndexController@loadVisitors'
]);

Route::get('/CEtZx3vKDPyrMiK1etzR3RDUjyMiOvmkuD9uD',[
    'uses'=>'IndexController@loadUsers'
]);
Route::get('hBfEhicVBZ6OT900f93OxXZMcvJ51nYeqQ2RHIgK8Vl7qVg9XUu',[
    'uses'=>'IndexController@getOrders'
]);
Route::get('/iJxXMuVdqLeUV2fwXQ3t5wL/cyQacb56nNOs6',[
    'uses'=>'IndexController@getShops'
]);
Route::get('/qmNsBnNwBQvAEZxt3rkVfEUIuiZCFwC',[
    'uses'=>'IndexController@getPayments'
]);
