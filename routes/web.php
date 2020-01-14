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


Route::get('/addEmployee', function () {
    return view('addEmployee');
}); 

Route::get('/employees','EmployeesController@index');

Route::post('/addEmployee','EmployeesController@insert');

Route::post('/editEmployee','EmployeesController@update');

Route::post('/delEmployee','EmployeesController@delete');
