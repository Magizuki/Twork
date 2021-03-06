<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

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
    return view('intro');
})->name('root');

Route::get('/register','AuthController@showRegister')->name('register');
Route::post('/doRegister','AuthController@doRegister');

Route::get('/login','AuthController@showLogin')->name('login');
Route::post('/doLogin','AuthController@doLogin');

Route::get('/logout', 'AuthController@doLogout');

Route::get('/home/{UserId}','HomeController@GetAllProjectByUserId')->name('home')->middleware('memberchecking');

Route::get('/creategroup','GroupController@GetGroupFeature')->middleware('memberchecking');

Route::post('/submitgroup','GroupController@SubmitGroup')->middleware('memberchecking');

Route::get('/listgroup','GroupController@ListGroup')->middleware('memberchecking');

Route::get('/viewgroup/{groupId}','GroupController@ViewGroup')->middleware('memberchecking');

Route::post('/sendchat/{groupId}','GroupController@SendChat');

Route::post('/addmember/{groupId}','GroupController@AddMember');

Route::get('/myprofile/{UserId}', 'UserController@showMyProfile')->middleware('memberchecking');

Route::get('/changepassword/{UserId}', 'UserController@showChangePassword')->middleware('memberchecking');
Route::post('/dochangepassword', 'UserController@doChangePassword')->middleware('memberchecking');

Route::get('/upgrade', 'UserController@showUpgrade')->middleware('memberchecking');


