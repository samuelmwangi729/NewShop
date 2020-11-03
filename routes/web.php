<?php

use Illuminate\Support\Facades\Route;
use App\Events\Test;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/test',[
    'uses'=>'PaymentsController@test',
]);
Route::get('/event',function(){
    event(new Test('payment received'));
});
Route::get('/listen',function(){
    return view('listen');
});
Route::get('/',['uses'=>'IndexController@Welcome']);
Route::get('/fThtjpKy1XPtGuWbqwuOY9Rc5CQHle/{id}',[
  'uses'=>'SubCategoriesController@findSingle'
]);
Route::get('/Promotion',[
    'uses'=>'IndexController@promotion'
]);
Route::get('/crcO1bX8i5GjqPWsr5vlN2w8WIgrg12',[
    'uses'=>'BlogsController@index'
]);
Route::get('/5228JaeyweZCBBZPb2VcdgCZAMGpgqEFZIPKKFd',[
    'uses'=>'LocationsController@Index'
]);
Route::get('/5228JaeyweZCBBZPb2VcdgCZAMGp/{county}',[
    'uses'=>'LocationsController@getTown'
]);
Route::get('/48j4lEBGhrZML2Yiovwz2/{name}',[
    'uses'=>'ProductsController@SingleCategory'
]);
Route::get('/terms-and-conditions',[
    'uses'=>'IndexController@Terms'
]);
Route::get('/privacy-and-policy',[
    'uses'=>'IndexController@Privacy'
]);
Route::post('/5228JaeyweZCBBZREG',[
    'uses'=>'IndexController@createUser'
]);
Route::get('/k6BL331sXw4S00cN4BaX8D',[
    'uses'=>'IndexController@getTemp'
]);
Route::get('/pay/rngL1uWwlBDtTrrOQf8uVqqjes17nEW',[
    'uses'=>'PaymentsController@getFileData'
]);
Route::get('/getShippingCost/{station}',[
    'uses'=>'PickupsController@getCost'
]);
Route::get('/ClywjTdDiB7G3yYmszGO',[
  'uses'=>'CategoriesController@index'
]);
Route::get('/u3frZeJzrMEe2g42KvAdv2gbUbRjwr49fbk6Zll1Dz',[
    'uses'=>'BrandsController@index'
]);
Route::get('/qTuXJFkoN7GP.xDIrM5nyTBVu6wfycHR/bT7kMhTBB3K',[
    'uses'=>'CategoriesController@index'
]);
Route::get('/DL891URi4QURM0MaYoa',[
    'uses'=>'ShopController@index'
]);
Route::get('/hlrsWE9ZeCr6g5iG3peOvIE3oFjP/{id}',[
    'uses'=>'SubCategoriesController@GetCat'
]);
Route::get('/MRSgEfE0PzAMlI2y4CmXbUYYoSYyrL',[
    'uses'=>'LabelsController@index'
]);
Route::get('/MRSgEfE0PzAMlI2SYyrL/{id}/{type}',[
    'uses'=>'LabelsController@edit'
]);
Route::get('/S5SnACVegWU6XnYaKa3J',[
'uses'=>'CategoriesController@getTop'
]);
Auth::routes();
Route::get('/S5SnACVegWU6XnYaKa3JV6R/{id}',[
    'uses'=>'ProductsController@getSpecific'
]);
Route::get('/gLTEUwX8wzIf9B9u5ngUZBTmVh0R4D0bxn3NUmg5F717Xq6',[
    'uses'=>'ProductsController@LoadAll'
]);
Route::get('/8fublrIcMmGPlQ7n8z1u/k6BL331sXw4S00cN4BaX8DfuvQsh8K/{id}',[
    'uses'=>'ShopController@show'
]);
Route::get('/Q8ZWsf74d/A2rno6EFpxeZZ0k7MuwWItodfoq8IIe',[
    'uses'=>'ProductsController@loadSingle'
]);

Route::get('/Product/{slug}',[
    'uses'=>'ProductsController@getOne'
]);
Route::get('/grnQOcLDrT6b387qeR0hz79K',[
    'uses'=>'ProductsController@getSessions'
]);
Route::get('/S5SnACVegWU6XnYaKa3JV6R5yI9SVWB',[
    'uses'=>'CollectionsController@index'
]);
Route::get('/S5SnACVegWU6XnYlJI',[
    'uses'=>'CollectionsController@getFeatured'
]);
Route::get('Sk9zv/4LZ/A8zKt70Js0mRzqA',[
    'uses'=>'ProductsController@getHot'
]);
Route::resource('cart', 'CartsController');
Route::post('/WGAeCy70FdeZr5Huu4ASweIgs4jnfBxAsh8oGUbnKu',[
    'uses'=>'CartsController@AddWishlist'
]);
Route::get('/mHCAGNXtutk/S2wTcoUWu8cP',[
    'uses'=>'CartsController@setUsername'
]);
Route::get('Sk9zv/4LZ/A8zKt7zqA',[
    'uses'=>'ProductsController@getTop'
]);
Route::get('/Sk9zv/4LZ/k1HT1eDwpUe5LG95e',[
    'uses'=>'ProductsController@gettBest'
]);
Route::get('/k1HT1eDwpUe5LG95e',[
    'uses'=>'CartsController@getCart'
]);
Route::get('/k1HT1eDwpU',[
    'uses'=>'CartsController@getCartOrder'
]);
Route::delete('/delWishlist/{sku}',[
    'uses'=>'WishlistController@destroy'
]);
Route::post('/CreditCard',[
    'uses'=>'PaymentsController@getCreditCard'
]);
Route::get('/Contact',[
    'uses'=>'IndexController@Contact'
]);
Route::get('/k1HT1eDwpUe5LG95',[
    'uses'=>'CartsController@getWishlist'
]);
Route::get('/k1HT1eDwp9',[
    'uses'=>'CartsController@getWish'
]);
Route::get('Wishlist',[
    'uses'=>'WishlistController@index'
]);
Route::get('/k1HT1eDwpUe5LG95ey7',[
    'uses'=>'CartsController@getCartTotal'
]);
Route::get('/k1HT1eDwpUe5LG95ey71',[
    'uses'=>'CartsController@getCartTotal1'
]);
Route::get('/k1HT1eDwpUe5LG9',[
    'uses'=>'CartsController@countCart'
]);
Route::get('/k1HT1eDwpUe5LG91',[
    'uses'=>'CartsController@countCart1'
]);
Route::get('/nhepSC0ODs/{id}',[
    'uses'=>'CartsController@getUserCount'
]);
Route::get('/5228JaeyweZCBBZPb2Vc/{id}',[
    'uses'=>'PickupsController@show'
]);
Route::get('/Returns-Policy',[
    'uses'=>'IndexController@RPolicy'
]);
Route::get('/hC9z5aOk5JH6Vt2UOloy1lTnJ3kdKO1iImzNcq/{number}',[
    'uses'=>'PaymentsController@PayWithMpesa'
]);
Route::resource('/payment','PaymentsController');
Route::get('/home', 'HomeController@index')->name('home');
Route::group(['middleware' => ['auth']], function () {
    Route::get('EfGTGYkBDAqW/lbpg/ajYPPyb2',[
        'uses'=>'IndexController@GenRand'
    ]);
    Route::get('/Orders',[
        'uses'=>'OrdersController@getMyOrders'
    ]);
    Route::get('/JvNDv6EMuWNrd0BioK4alYet1V4qD',[
        'uses'=>'OrdersController@PersonalOrders'
    ]);
    Route::resource('visitors','VisitorsController');
    Route::resource('terms','TermsController');
    Route::resource('privacy','PrivacyController');
    Route::get('/PDEKhgO2JDUrL8Zd23OOPKEvmyQCl2m',[
        'uses'=>'OrdersController@getOrderNumber'
    ]);

    Route::get('ws5xKxFILK7JiA4JlgenYZ6/dRqvsdymJLsAnNm16jS4gz5iIm',[
        'uses'=>'PaymentsController@getBilling'
    ]);
    Route::get('/ws5xKxFILK7JiA4JlgenYZ6',[
        'uses'=>'IndexController@getUser'
    ]);
    Route::get('/6juQg3f1Jltvp7pMz/aCoJVagCy',[
        'uses'=>'OrdersController@getSingle'
    ]);
    Route::get('/productname/{sku}',[
        'uses'=>'ProductsController@getName'
    ]);
    Route::resource('returns','ReturnsController');
    Route::resource('HTVW00xzDT5AAAW','OrdersController');
    Route::get('/checkout',[
        'uses'=>'CartsController@CheckOut'
    ]);
    Route::get('/4m6TspRgOZ39fdERTge3Nyv6apuoCcdITCDBnoaK/{Transaction}',[
        'uses'=>'PaymentsController@QueryTransaction'
    ]);
    Route::get('/bVcR9UWw2xfTOhIGbKZbqlZ8CnTfXGViJ9rD8AxP6wOS',[
        'uses'=>'PickupsController@getAll'
    ]);
    Route::resource('pickup', 'PickupsController');
    Route::get('/EfGTGYkBDAqW/lb',[
        'uses'=>'IndexController@getErrors'
    ]);
    Route::resource('categories', 'CategoriesController');
    Route::get('/nmIu53sj4GR8C4ugs4akbJhIj5C8c56rngD/{id}',[
        'uses'=>'CategoriesController@getPCat'
    ]);
    Route::resource('subcategories', 'SubCategoriesController');
    Route::get('/nmIu53sj4GR8C4ugs4akbJhIj5C8cngD/{id}',[
        'uses'=>'CategoriesController@getPCat'
    ]);
    Route::resource('brand', 'BrandsController');

    Route::resource('labels', 'LabelsController');
    Route::resource('collection', 'CollectionsController');
    Route::resource('product', 'ProductsController');
    Route::get('/joRmnz918OuV/uJgiDGMJLjENaaSthKat5OaDaXFW',[
        'uses'=>'ProductsController@getAll'
    ]);
    Route::get('collections/{id}/{type}', 'CollectionsController@edit');
    Route::get('/bxn/VoLkOGYUjbGeiCyfSsBmghDBl',[
        'uses'=>'ProductsController@PEdit'
    ]);
    Route::get('/uJgiDGMJLjENaaSthKat5OaDaXFW/{id}/{type}',[
        'uses'=>'ProductsController@Act'
    ]);
    Route::resource('shop', 'ShopsController');
    Route::get('/joRmnz918OuV/uJgiDGMJLjEN',[
        'uses'=>'ShopsController@AllShops'
    ]);
    Route::get('uJgiDGMJLjENaaSt/{id}/{type}',[
        'uses'=>'ShopsController@Action'
    ]);
    Route::get('5228JaeyPKKFL0pIKd',[
        'uses'=>'ShopsController@getSpp'
    ]);
    Route::resource('locations', 'LocationsController');
    Route::get('towns',[
        'uses'=>'LocationsController@Towns',
        'as'=>'towns'
    ]);
    Route::post('/addtowns',[
        'uses'=>'LocationsController@AddTowm'
    ]);
    Route::get('/5228JaeyweZCBBZPb2VcdgCZA',[
        'uses'=>'LocationsController@getTowns'
    ]);
    Route::delete('5228JaeyweZCBBZPb/{id}',[
        'uses'=>'LocationsController@delete'
    ]);
    Route::get('/Pb2VcdgCZAMGpo9qEFZIPKKF/{county}',[
        'uses'=>'LocationsController@getCountyTown'
    ]);
    Route::get('5228JaeyweZCB0POh/{id}/{type}',[
        'uses'=>'LocationsController@Action'
    ]);

});

Route::group(['prefix' => 'api'], function() {
    //
    Route::get('/JIoIB58KFb8E682uZRiTdgRgufiJ',[
        'uses'=>'IndexController@isLoggedIn'
    ]);
});
