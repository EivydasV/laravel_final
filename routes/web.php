<?php

use App\Http\Controllers\EventUsers;
use App\Http\Controllers\Event;
use Illuminate\Support\Facades\Route;

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
    return view('main');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/add/event', [Event::class, 'showAddEvents']);
Route::post('/add/event', [Event::class, 'addEvent']);
Route::post('/delete/event/{id}', [Event::class, 'deleteEvent']);
Route::post('/update/event/{id}', [Event::class, 'updateEvent']);

Route::get('/events', [Event::class, 'showEvents']);
Route::get('/events/users', [Event::class, 'showUsersEvents']);
Route::get('/event/{id}', [Event::class, 'showEvent']);

Route::post('/register/event', [EventUsers::class, 'registerEvent']);
Route::get('/accept/event/{id}/{condition}', [EventUsers::class, 'accept']);
