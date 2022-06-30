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
//home page
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
        return view('welcome');
    });
    
    
    //registration routing
    Route::get('/register', function() {
        return view('register');
    });
    Route::post('/doRegister','UserController@saveUser');
    
    //login routing
    Route::get('/login', function() {
        return view('login');
    });
    Route::post('/dologin','LoginController@index');

    // Profile routing
    Route::post('/doCreateProfile', 'ProfileController@saveProfile');