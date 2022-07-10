<?php

/*
 * |--------------------------------------------------------------------------
 * | Web Routes
 * |--------------------------------------------------------------------------
 * |
 * | Here is where you can register web routes for your application. These
 * | routes are loaded by the RouteServiceProvider within a group which
 * | contains the "web" middleware group. Now create something great!
 * |
 */
// home page
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// registration routing
Route::get('/register', function () {
    return view('register');
});
Route::post('/doRegister', 'UserController@saveUser');

// login routing
Route::get('/login', function () {
    return view('login');
});
Route::post('/dologin', 'LoginController@index');

// Profile routing
Route::get('/createProfile', function () {
    return view('createProfile')->with('id', session('userid'));
})->name('createProfile');
Route::post('/doCreateProfile', 'ProfileController@saveProfile')->name('saveProfile');

// Portfolio Routing
Route::get('/createPortfolio', 'PortfolioController@displayPortfolioPage')->name('displayPortfolioPage');
Route::get('/addEducationForm', function () {
    return view('addEducationForm');
});
Route::post('/doCreateEducation', 'PortfolioController@saveEducation');
Route::get('/updateEducation/{id}', 'PortfolioController@updateEducationForm');
Route::post('/updateEducation/doUpdateEducation', 'PortfolioController@doUpdateEducation');
Route::get('/deleteEducation/{id}', 'PortfolioController@deleteEducation');
Route::get('/addEmploymentForm', function () {
    return view('/addEmploymentForm');
});
Route::post('/doCreateEmployment', 'PortfolioController@saveEmployment');
Route::get('/updateEmployment/{id}', 'PortfolioController@updateEmploymentForm');
Route::post('/updateEmployment/doUpdateEmployment', 'PortfolioController@doUpdateEmployment');
Route::get('/deleteEmployment/{id}', 'PortfolioController@deleteEmployment');
    
//admin routing
Route::get('/admin', 'AdminController@index');
Route::delete('/admin/deleteUser/{id}', 'AdminController@delete');
Route::get('/admin/editUser/{id}', 'AdminController@edit');
Route::put('/admin/doUserUpdate/{id}', 'AdminController@doUserUpdate');