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
