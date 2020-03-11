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

Route::get('/', function () {
    return redirect('home');
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::resource('purpose','PurposeController');

Route::resource('investor','InvestorController');
Route::resource('audit','AuditController');
Route::resource('employee','EmployeeController');
Route::resource('user','UserController');
Route::resource('parent_question','ParentQuestionController');
Route::resource('question','QuestionController');
Route::resource('process','ProcessController');
Route::resource('category','CategoryController');

