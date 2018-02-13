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

Route::get('/', 'PagesController@home');
Route::get('/locale', 'PagesController@locale');
Route::get('/messages/{message}', 'MessagesController@show');
// antes de llegar al controlador va a existir middleware de filtro y va a asegurarse de que este autenticado
// Route::post('/messages/create', 'MessagesController@create')->middleware('auth');

Auth::routes();
Route::get('/auth/facebook', 'SocialAuthController@facebook');
Route::get('/auth/facebook/callback', 'SocialAuthController@callback');
Route::post('/auth/facebook/register', 'SocialAuthController@register');
Route::get('/messages', 'MessagesController@search');

Route::group(['middleware' => 'auth'], function(){
  Route::post('/{username}/dms', 'UsersController@sendPrivateMessage');
  Route::get('/conversations/{conversation}', 'UsersController@showConversation');
  Route::post('/{username}/follow', 'UsersController@follow');
  Route::post('/{username}/unfollow', 'UsersController@unfollow');
  Route::post('/messages/create', 'MessagesController@create');

  Route::get('/api/notifications', 'UsersController@notifications');
  Route::get('/api/notifications/read', 'UsersController@notificationsRead');
  Route::get('/api/changestate/{username}', 'UsersController@changestate');
  Route::get('/api/state/{username}', 'UsersController@stateprivate');
});

Route::get('/{username}/follows', 'UsersController@follows');
Route::get('/{username}/followed', 'UsersController@followers');
Route::get('/{username}', 'UsersController@show');

Route::get('/api/messages/{message}/responses', 'MessagesController@responses');