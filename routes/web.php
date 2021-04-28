<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AdminLoginController;

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



Auth::routes();
Route::get('/update_user','PagesController@updateUser');
Route::get('/search','PagesController@searchFilm');

Route::post('/update_password/{id}','PagesController@changePassword');
Route::post('/update_user/{id}','PagesController@updateAccount');
Route::get('/','PagesController@index');
Route::get('show/{id}','HomeController@show')->name('search');
Route::get('/success','HomeController@success');
Route::get('/fail','HomeController@fail');
Route::get('/reviews/{id}','PagesController@getReview');
Route::get('/transaction','PagesController@transactionHistory');
Route::get('/orders','PagesController@order');
Route::post('/create_review','PagesController@postReview');
Route::get('/home', 'HomeController@index')->name('home');
Route::prefix("/admin")->group(function(){
Route::get('/sign_in','AdminLoginController@showLoginForm')->name('admin.login');
Route::get('/sign_up','AdminLoginController@showSignup')->name('admin.register');
Route::post('register','AdminLoginController@signup')->name('admin.post');
Route::post('login','AdminLoginController@login')->name('admin');
Route::get('/', 'AdminHomeController@index')->name('admin.home');
Route::get('/pagination', 'AdminHomeController@data')->name('pagination');
Route::get('/paginate', 'AdminHomeController@data');

Route::delete('/film/{id}', 'AdminHomeController@delete');

Route::get('/create','FilmController@create');
Route::post('/create_dire','FilmController@storeDirector');
Route::post('/create_genre','FilmController@storeGenre');
Route::post('/create_film','FilmController@store')->name('admin.film');
Route::patch('/create_film/{id}','FilmController@update')->name('admin.film.update');
Route::get('/create/{id}','FilmController@edit');
Route::get('/get_genre','FilmController@getGenre');
Route::get('/get_director','FilmController@getDirector');

});
Route::get('/payment/callback', 'PaymentController@handleGatewayCallback');
Route::post('/pay', 'PaymentController@redirectToGateway')->name('pay');
Route::get('/payment','HomeController@paymentGateway');
