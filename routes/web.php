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
    return view('welcome');
});
Route::group(['middleware' => 'vistors'], function(){
  Route::get('/register', 'RegistrationController@register');
  Route::post('/register', 'RegistrationController@postRegister');
  Route::get('/login', 'LoginController@login');
  Route::post('/login', 'LoginController@postlogin');
  Route::get('/forgot-password', 'forgotPasswordController@forgotPassword');
  Route::post('/forgot-password', 'forgotPasswordController@postForgotPassword');
  Route::get('/reset/{email}/{resetCode}', 'forgotPasswordController@resetPassword');
  Route::post('/reset/{email}/{resetCode}', 'forgotPasswordController@postResetPassword');
});

Route::post('/logout', 'LoginController@logout');
Route::get('/ernings', 'AdminController@ernings')->middleware('admin');
Route::get('/tasks', 'ManagerController@tasks')->middleware('manager');
Route::get('/activate/{email}/{activationCode}', 'ActivationController@activate');
