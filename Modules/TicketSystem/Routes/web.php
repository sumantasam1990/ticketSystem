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

use Illuminate\Support\Facades\Route;

Route::prefix('ticketsystem')->middleware('auth')->group(function() {
    Route::get('/', 'TicketSystemController@index');
    Route::get('search', [\Modules\TicketSystem\Http\Controllers\TicketSystemController::class, 'search']);
});
