<?php

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

use App\BillingCycle;

Route::get('/', function () {
    return view('\vendor\adminlte\login');
});

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::get('/billingCycles','BillingCycleController@index');
Route::get('/billingCycles/remove/{id}','BillingCycleController@remove');
Route::get('/billingCycles/update/{id}','BillingCycleController@update');
Route::post('/billingCycles/store','BillingCycleController@store');

Route::post('/billingCycles/addCreditRow','BillingCycleController@addCreditRow');
Route::post('/billingCycles/cloneCredit/{index}','BillingCycleController@cloneCredit');
Route::post('/billingCycles/remCreditRow/{index}','BillingCycleController@remCreditRow');

Route::post('/billingCycles/addDebitRow','BillingCycleController@addDebitRow');
Route::post('/billingCycles/cloneDebit/{index}','BillingCycleController@cloneDebit');
Route::post('/billingCycles/remDebitRow/{index}','BillingCycleController@remDebitRow');
