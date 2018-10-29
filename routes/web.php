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

Route::get('/', 'HomeController@getIndex')->name('indexDash');




//Authencation
Route::get('admin/login','Company\AuthController@getLogin')->name('login');
Route::post('admin/login','Company\AuthController@postLogin');
Route::get('admin/register','Company\AuthController@getRegister')->name('register');
Route::post('admin/register','Company\AuthController@postRegister');

Route::get('admin/dashboard','HomeController@getIndex');
Route::get('admin/logout','HomeController@getLogout')->name('logout');

Route::get('tour/list', 'TourController@getTour')->name('listTour');
Route::get('/tour/create', 'TourController@getCreateTour')->name('createTour');
Route::get('tour/details/{id}', 'TourController@tourDetails')->name('tourDetails');
Route::post('/tour/create', 'TourController@postCreateTour');
Route::post('/tour/create/uploadImg', 'TourController@postImage');
Route::get('/tour/delete/{id}', 'TourController@deleteTour')->name('deletetour');

Route::get('tour/details/schedule/{schedule_id}/changestaff/{staff_id}', 'TourController@addStaffSchedule');
