<?php

use Illuminate\Http\Request;

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

Route::get('/Users/{id}','UtenteController@show')->name('profile');
Route::get('/Users','UtenteController@index')->name('users');
Route::patch('/Users/{id}','UtenteController@update')->name('user.update');
Route::delete('/Users/{id}','UtenteController@destroy')->name('user.delete');

Route::get('/Groups/{id}/gruppi','GruppoController@usergroups')->name('user.groups');
Route::get('/Group/{codU}/user/{id}','GruppoController@show')->name('group');
Route::post('/Groups','GruppoController@store')->name('create.group');
Route::patch('/Groups/{id}','GruppoController@update')->name('group.update');
Route::delete('/Groups/{id}','GruppoController@destroy')->name('group.delete');

Route::get('/Individual_chats/{id}','IndividualChatController@show')->name('chat');
Route::get('/IChatMessage/{id}','IndividualChatController@messaggichat');
Route::delete('/IChatMessage/{id}/message/{idM}','IndividualChatController@deleteM');
Route::post('/IChatMessage/{id}','IndividualChatController@sendM');

Route::resource('/Group_chats','GroupChatController');
Route::get('/GChatMessage/{id}','GroupChatController@messaggichat');
Route::delete('/GChatMessage/{id}/message/{idM}','GroupChatController@deleteM');
Route::post('/GChatMessage/{id}','GroupChatController@sendM');


Route::get('/Posts','PostController@show')->name('group.posts');
Route::post('/Posts/group/{codU}/user/{id}','PostController@store')->name('create.post');


