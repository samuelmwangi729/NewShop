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
Route::get('/5lTHV/ziaKnDgzsnEjjjqZyU23wfKt6',[
    'uses'=>'IndexController@getProducts'
]);
Route::get('/24Rm6ZKNFPWXHOcQmZk1xfms55/cuxtp6',[
    'uses'=>'IndexController@getunProcessed'
]);
Route::get('/24Rm6ZmZk1xfms55/cuxtp6',[
    'uses'=>'IndexController@getProcessed'
]);
Route::get('/P3EGEKNwW4eKtjI8qu3kZTS7bxGw1fPTVl0UUZsTuOb5hZJ9K',[
    'uses'=>'IndexController@ApprovedShops'
]);
Route::get('/BLeFMbKEt78gebi4M5/w0o5WRQNefIo3YAu',[
    'uses'=>'IndexController@getBrands'
]);
Route::get('/BLeFMbKEt78gebi4M5',[
    'uses'=>'IndexController@getCategory'
]);
Route::get('/KdIvQYfBNvQX1XHoRewkpSaSIp37H9Jv1eGe05QNoEXRscaZ',[
    'uses'=>'IndexController@getLocations'
]);
Route::get('/XmWMzKV9QuOUJwqrJ5Rw4IUFnSK/SvS',[
    'uses'=>'IndexController@PickUp'
]);
Route::get('/eN449WDp0vzRD3u1/BHd19wiTcp8/OC',[
    'uses'=>'IndexController@getCollections'
]);
Route::get('/CEtZx3vKDPyrMiK1etzR3RDUjyMiOvmkuD9uD/3hc9U9s',[
    'uses'=>'IndexController@fetchVisitors'
]);
Route::get('/9Xz3DukEWEbaexOe8tg0XqP8p7vAHoH1xArqget1TOfS',[
    'uses'=>'IndexController@fetchReturningVisitors'
]);
