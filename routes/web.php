<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontendDonationsController;
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

Route::get('/', 'FrontendController@index')->name('frontend.index');
Route::get('/who-did-we-feed-today', 'FrontendController@whoDidWeFeedToday')->name('frontend.whoDidWeFeedToday');
Route::get('/about', 'FrontendController@about')->name('frontend.about');
Route::get('/how-does-it-work', 'FrontendController@howDoesItWork')->name('frontend.howDoesItWork');
Route::get('/volunteers', 'FrontendController@volunteers')->name('frontend.volunteers');
Route::get('/partners', 'FrontendController@partners')->name('frontend.partners');
Route::get('/testimonials', 'FrontendController@testimonials')->name('frontend.testimonials');
Route::get('/gallery', 'FrontendController@gallery')->name('frontend.gallery');
Route::get('/contact', 'FrontendController@contact')->name('frontend.contact');
Route::get('/contact', 'ContactController@index')->name('contact');
Route::put('/contact', 'ContactController@register')->name('contact.register');
Route::get('/error', 'FrontendController@error')->name('frontend.error');
Route::get('/contributors', 'FrontendController@contributors')->name('frontend.contributors');

Route::get('/donate', [FrontendDonationsController::class, 'index'])->name('frontend.donate.index');
Route::get('/donate/{howmuch?}', [FrontendDonationsController::class, 'process'])->name('frontend.donate.process');


Route::prefix('/dashboard')->group(function () {
    Auth::routes();

    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/error', 'HomeController@error')->name('error');

    Route::get('/testimonial', 'TestimonialController@index')->name('testimonial');
    Route::get('/testimonial/create', 'TestimonialController@create')->name('testimonials.create');
    Route::POST('/testimonial/store', 'TestimonialController@store')->name('testimonials.store');

    Route::get('/testimonial/{testimonial}/edit', 'TestimonialController@edit')->name('testimonials.edit');

    Route::post('/testimonial/update', 'TestimonialController@update')->name('testimonials.update');


    Route::delete('/testimonial/{testimonial}', 'TestimonialController@destroy')->name('testimonials.destroy');

    Route::get('/contacts', 'ContactadminController@index')->name('contactadmin');
    Route::get('/contacts', 'ContactadminController@fetch')->name('contactadmin.fetch');
    Route::get('/edit/{id}', 'ContactadminController@index1')->name('contactadmin');
    Route::put('/contacts', 'ContactAdminController@update')->name('contactadmin.update');

    Route::get('/profile', 'ProfileController@index')->name('profile');
    Route::put('/profile', 'ProfileController@update')->name('profile.update');

    Route::prefix('/admin')->group(function () {
        Route::get('/testimonial', 'TestimonialController@adminIndex')->name('testimonials.admin.index');
        Route::post('/testimonial/changeStatus', 'TestimonialController@status')->name('testimonials.admin.status');
    });
    Route::get('/gallery', 'GalleryController@index')->name('gallery');
    Route::put('/gallery', 'GalleryController@register')->name('gallery.register');


});



