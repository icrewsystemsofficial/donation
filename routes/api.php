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

Route::get('convert/{base}/{end}/{amount}', 'PaymentsController@convert');
Route::post('verify', 'HomeController@testimonialVerify');
Route::post('admin/testimonials/status','AdminController@testimonialstatus');
Route::post('admin/testimonials/approve','AdminController@approvetestimonials');
Route::post('admin/testimonials/delete','AdminController@deletetestimonial');
Route::post('admin/testimonials/restore','AdminController@restoretestimonial');
