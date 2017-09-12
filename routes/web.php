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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index');
Route::get('/newhome', 'HomeController@make_home');
//Banner
Route::get('/home/upload_banner', 'ImagesController@bannerView');
Route::post('/home/upload/banner', 'ImagesController@bannerUpload');
//Cases
Route::get('/home/cases', 'CasesController@casesView');
Route::post('/home/cases/upload', 'CasesController@casesUpload');
//Portfolios
Route::get('/home/portfolios', 'PortfoliosController@portfoliosView');
Route::post('/home/portfolios/upload', 'PortfoliosController@portfoliosUpload');
//Testimonials
Route::get('/home/testimonials', 'TestimonialsController@testimonialView');
Route::post('/home/testimonials/upload', 'TestimonialsController@testimonialUpload');
//About
Route::get('/home/team_image', 'ImagesController@teamView');
Route::post('/home/upload/team_image', 'ImagesController@teamUpload');
Route::get('/home/clients_image', 'ImagesController@clientView');
Route::post('/home/upload/clients_image', 'ImagesController@clientUpload');