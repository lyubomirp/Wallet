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

/**
 * All other routes (split if necessary)
 *
 * uses the basic Controller
 */

Route::get('/', 'Controller@index')->name('index');
Route::get('/change_currency', 'Controller@change_currency')->name('change_currency');
//Route::get('/transactions', 'Controller@transactions')->name('transactions');

/**
 * All routes related to deposits
 *
 * uses DepositController
 */

Route::get('/deposit', 'DepositController@deposit')->name('deposit');
Route::post('/deposit/submit', 'DepositController@post_deposit')->name('submit_deposit');

/**
 * All routes related to withdraws
 *
 * uses WithdrawController
 */

Route::get('/withdraw', 'WithdrawController@withdraw')->name('withdraw');
Route::post('/withdraw/submit', 'WithdrawController@post_withdraw')->name('submit_withdraw');
