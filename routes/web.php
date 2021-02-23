<?php
use Illuminate\Support\Facades\Date;
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

Route::get('/home','HomeController@index' )->name('home');

//save_user-------------------------------------------------------------------------------
Route::get('/register','HomeController@register' )->name('register');
Route::get('/contact','HomeController@contact' )->name('contact');

Route::post('/save_user','HomeController@save_user' )->name('save_user');


//save_login----logout-------------------------------------------------------------------------------------
Route::get('/login','HomeController@login' )->name('login');
Route::get('/logout','HomeController@logout' )->name('logout');
Route::post('/save_login','HomeController@save_login' )->name('save_login');

//////////take_vote/--------------------------------------------------------------------
Route::get('/vote/{id}','HomeController@vote' )->name('vote');
Route::get('/take_vote/{id}','HomeController@take_vote' )->name('take_vote');



Route::get('/result','HomeController@result' )->name('result');
//get_nominate save_nomination candidate_details---unactive_candidate----active_candidate---------------------------------------------
Route::get('/get_nominate','HomeController@get_nominate' )->name('get_nominate');
Route::post('/save_nomination','HomeController@save_nomination' )->name('save_nomination');
Route::get('/candidate_details/{id}','HomeController@candidate_details' )->name('candidate_details');



///////////////admin/////////////////////////////////////////////////
Route::get('/back_home','AdminController@back_home' )->name('back_home');
Route::get('/back_login','AdminController@back_login' )->name('back_login');
//login_admin
Route::post('/login_admin','AdminController@login_admin' )->name('login_admin');





//candidate-------delete_candidate----------------------------------------------------------------=-=-=-===---=-=-=-
Route::get('/back_view_candidate/{id}','AdminController@back_view_candidate' )->name('back_view_candidate');
Route::get('/back_add_candidate','AdminController@back_add_candidate' )->name('back_add_candidate');
Route::get('/unactive_candidate/{id}','AdminController@unactive_candidate' )->name('unactive_candidate');
Route::get('/active_candidate/{id}','AdminController@active_candidate' )->name('active_candidate');
Route::get('/delete_candidate/{id}','AdminController@delete_candidate' )->name('delete_candidate');

//===============back_add_voters====================================================
Route::get('/back_view_voters/{id}','AdminController@back_view_voters' )->name('back_view_voters');
Route::get('/unactive_voters/{id}','AdminController@unactive_voters' )->name('unactive_voters');
Route::get('/active_voters/{id}','AdminController@active_voters' )->name('active_voters');
Route::get('/delete_voters/{id}','AdminController@delete_voters' )->name('delete_voters');


///vote_count--delete_vote-----------------------------------------------------------------------------------
Route::get('/vote_count/{id}','AdminController@vote_count' )->name('vote_count');
Route::get('/delete_vote/{id}','AdminController@delete_vote' )->name('delete_vote');


////back_result---------unpublication_candidate---publication_candidate----------------------------------------------------
Route::get('/back_result/{id}','AdminController@back_result' )->name('back_result');
Route::get('/champ_candidate/{id}','AdminController@champ_candidate' )->name('champ_candidate');
Route::get('/looser_candidate/{id}','AdminController@looser_candidate' )->name('looser_candidate');

Route::get('/unpublication_candidate/{id}','AdminController@unpublication_candidate' )->name('unpublication_candidate');
Route::get('/publication_candidate/{id}','AdminController@publication_candidate' )->name('publication_candidate');

//back_add_election
Route::get('/back_add_election','AdminController@back_add_election' )->name('back_add_election');
//save_electionFF
Route::post('/save_election','AdminController@save_election' )->name('save_election');
//back_view_election
Route::get('/back_view_election','AdminController@back_view_election' )->name('back_view_election');
//active_election
Route::get('/active_election/{id}','AdminController@active_election' )->name('active_election');
Route::get('/unactive_election/{id}','AdminController@unactive_election' )->name('unactive_election');
Route::get('/delete_election/{id}','AdminController@delete_election' )->name('delete_election');










