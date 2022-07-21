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
use Illuminate\Support\Facades\Route;

// Landing page
Route::get('/', function () {
    return view('welcome');
});

//Home page
Route::get('/home','LoginController@home');

// registration routing
Route::get('/register', function () {
    return view('register');
});
Route::post('/doRegister', 'UserController@saveUser');

// login routing
Route::get('/login', function () {
    return view('login');
})->name('login');
Route::post('/dologin', 'LoginController@index');
Route::get('/logout', 'LoginController@logout');
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

// Groups Routing
Route::get('/userGroups', 'GroupController@displayGroupsPage')->name('displayGroupsPage');
Route::get('/createGroup', 'GroupController@displayCreateGroupPage');
Route::post('/doCreateGroup', 'GroupController@doCreateGroup');
Route::get('/updateGroup/{id}', 'GroupController@updateGroupForm');
Route::post('/updateGroup/doUpdateGroup', 'Groupcontroller@doUpdateGroup');
Route::get('/deleteGroup/{id}', 'GroupController@deleteGroup');
Route::get('/findGroup', 'GroupController@displayFindGroupPage');
Route::get('/joinGroup/{id}', 'GroupController@joinGroup');
Route::get('/leaveGroup/{id}', 'GroupController@leaveGroup');
Route::get('/displayGroupPage/{id}', 'GroupController@displayGroupPage')->name('displayGroupPage');

// Comments Routing
Route::post('/submitComment', 'CommentsController@submitComment');
    
//admin routing
Route::get('/admin', 'AdminController@index');
Route::delete('/admin/deleteUser/{id}', 'AdminController@delete');
Route::get('/admin/editUser/{id}', 'AdminController@edit');
Route::put('/admin/doUserUpdate/{id}', 'AdminController@doUserUpdate');