<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
Route::get('/adminlogin', 'MainController@login');
//Route::get('/', 'App\Http\Controllers\MainController@login');
Route::get('/', 'MainController@login');
//Route::get('/adminlogin', 'MainController@login')->name('auth.adminlogin');
Route::post('/checklogin', 'MainController@checklogin');
Route::get('/logout', 'MainController@logout');


//Route::get('forget-password', [ForgotPasswordController::class, 'showForgetPasswordForm'])->name('forget.password.get');
Route::get('forget-password', 'Auth\ForgotPasswordController@submitForgetPasswordForm'); 
Route::get('reset-password/{token}', 'Auth\ForgotPasswordController@showResetPasswordForm');
Route::post('reset-password', 'Auth\ForgotPasswordController@submitResetPasswordForm');



Auth::routes();

Route::middleware(['auth'])->group(function() {
Route::get('/dashboard/{id}', 'MainController@dashboard');
Route::get('/regusers/{id}/{type?}', 'MainController@regusers');
Route::get('/edituser/{id}', 'MainController@edituser');
Route::post('/updateuser', 'MainController@updateuserdata');
Route::get('/createevent', 'EventController@createevent');
Route::get('/updateevent/{id}', 'EventController@updateevent');
Route::get('/deleteevent/{id}', 'EventController@deleteevent');
Route::post('/UpdateEvent', 'EventController@SaveEvent');
Route::post('/AddEvent', 'EventController@AddEvent');
Route::get('/running/{id}', 'EventController@running');
Route::get('/updategamestatus/{id}', 'EventController@updategamestatus');
Route::get('/ViewEvents/{skip}/{limit}', 'EventController@ViewEvents');
Route::get('/leaderboard', 'EventController@leaderboard');
Route::get('/leaderboard/{id}', 'EventController@leaderboardById');
Route::get('/analytics', 'MainController@analytics');
Route::get('/ajaxsubmitend/{id}', 'EventController@ajaxsubmitend');
Route::get('/ajaxsubmitstart/{id}', 'EventController@ajaxsubmitstart');
Route::get('/ajaxsubmitcomplete/{id}', 'EventController@ajaxsubmitcomplete');

Route::get('/changestatus/{id}/{status}/{event?}', 'UsersController@changeStatus');
Route::get('/profile', 'UsersController@profile');
Route::post('/createuser', 'UsersController@createuser');
Route::get('/resetpassword/{id}', 'UsersController@resetpassword');
Route::get('/deleteuser/{id}', 'UsersController@deleteuser');
Route::get('/updatepassword', 'UsersController@updatepassword');
Route::get('/report', 'MainController@report');
Route::get('/nationality', 'MainController@nationality');
Route::get('/age', 'MainController@age');
Route::get('/agegroup', 'MainController@agegroup');
Route::get('/top3', 'MainController@top3');
/*Route::get('/dashboard', function () {
    return view('dashboard');
});*/
//job categories


});