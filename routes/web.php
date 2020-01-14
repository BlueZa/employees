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

Route::get('/','EmployeesController@index');

Route::post('/insert','EmployeesController@insert');

Route::get('/edit/{id}','EmployeesController@edit');

Route::put('/update/{id}','EmployeesController@updateData');

Route::get('/delete/{id}','EmployeesController@delete');
