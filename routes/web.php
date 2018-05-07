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

    if($default = config('lastbio.default')) {
        $user = \App\Models\User::find($default);

        return redirect()->route('user', $user);
    }
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/@{user}', 'UserController@show')->name('user');
Route::get('/l/{link}', 'LinkController@show')->name('link');