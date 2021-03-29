<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/register', 'UserController@register');
Route::post('/login', 'UserController@login');

Route::post('/admin-login', 'AdminAuthController@login');
Route::get('/admin-login' , 'AdminAuthController@login' );
Route::post('/admin-register', 'AdminAuthController@register');

Route::resource('/admin' , 'AdminController');

Route::group(['middleware' => ['jwt.verify']], function() {

    Route::resource('/update-password' , 'PassController');
    Route::post('/admin-logout', 'AdminAuthController@logout');
    Route::post('/logout', 'UserController@logout');
    Route::resource('/update-user' , 'UserUpdateInfo');
    Route::match(['post' , 'put'] , '/updatePassword/{id}' , 'AdminAuthController@updatePassword');
});
/** Support Group Start */
Route::resource('/support-session' , 'Support_Session_ssController');
Route::resource('/time_ss' , 'TimeSSController');
Route::resource('/user-supportGroup' , 'UserSupportSession');
Route::resource('/support-group' , 'SupportGroupController');    

/** Support Group End */


Route::resource('/testimonial', 'TestimonialController');
Route::resource('/webinar', 'WebinarController');
Route::resource('user-event', 'UserEventController');

Route::resource('/blogs', "BlogsController");
Route::resource('/subscribers',"SubcribersController");
Route::resource('/contact', "ContactsController");



Route::get('/user' , 'UserController@callbackUser');
Route::resource('home' , 'HomeController');
Route::resource('time' , 'TimeController');
Route::resource('usersession' , 'UserSessionController');
Route::resource('group-therapy' , 'GroupTherapyController');
Route::resource('psychologist' , 'PsychologistController');
Route::resource('user-therapy' , 'TherapyUserPsyController');



