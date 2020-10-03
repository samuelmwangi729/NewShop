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
