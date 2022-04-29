<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\indexcontroller;
use App\Http\Controllers\salescontroller;
use App\Http\Controllers\reportscontroller;
use App\Http\Controllers\purchasecontroller;
use App\Http\Controllers\passwordcontroller;

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

Route::get('/', function () {
    return view('auth.login');
});

Route::middleware(['auth:sanctum',config('jetstream.auth_session'),'verified'
       ])->group(function () {
    

        Route::get('/dashboard', [indexcontroller::class,'index']);
        Route::get('/Purchase/delete/{id}',[purchasecontroller::class,'deletePurchase']);
        
        //purchase table open
        Route::get('/Purchase/purchase',[purchasecontroller::class,'purchase']);
        
        //add new purchage form open and store
        Route::get('/Purchase/addpurchase',[purchasecontroller::class,'addpurchase']);
        Route::post('/Purchase/storepurchase',[purchasecontroller::class,'storepurchase']);
        
        //single Purchase data edit and update in Purchase table
        Route::get('/Purchase/editPurchase/{id}' ,[purchasecontroller::class,'editPurchase']);
        Route::post('/Purchase/purchasedatastore',[purchasecontroller::class,'purchasedatastore']);
        
        
        //edit and update Purchase data which is store in sales table and update sale_action status in purchase table
        Route::get('/Purchase/editSale/{id}' ,[purchasecontroller::class,'editSale']);
        Route::post('/Purchase/storesales',[purchasecontroller::class,'storesales']);
        
        
        //checkbox bulk data edit and update
        Route::post('/Purchase/getBulkPurchaseData' ,[purchasecontroller::class,'getBulkPurchaseData']);
        Route::post('/Purchase/storeBulkPurchaseData', [purchasecontroller::class, 'store']);
        
        //open forsales Page table
        Route::get('/Sales/forsales',[salescontroller::class,'forsales']);
        
        //edit and update single sale page
        Route::get('/Sales/editSales/{id}' ,[salescontroller::class,'editSales']);
        Route::post('/Sales/storesalessingle',[salescontroller::class,'storesalessingle']);
        
        //edit and update single soldout 
        Route::get('/Sales/editSold/{id}' ,[salescontroller::class,'editSold']);
        Route::post('/Sales/storesoldout',[salescontroller::class,'storesoldout']);
        
        //open soldout Page table
        Route::get('/Sales/soldout',[salescontroller::class,'soldout']);  
       
       
        Route::get('/ChangePassword/changepassword',[passwordcontroller::class,'changepassword']);
        Route::post('/ChangePassword/updatepassword',[passwordcontroller::class,'updatepassword']);
        
        
       
       
        Route::get('/purchasesearch',[reportscontroller::class,'purchasesearch']);
        Route::get('/salessearch',[reportscontroller::class,'salessearch']);
       
});

Route::get('logout',  [indexcontroller::class,'logout']);