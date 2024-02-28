<?php

use App\Http\Controllers\ShowController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('shows', [ShowController::class, 'index'])
    ->name('shows');

Route::get('shows/{show}', [ShowController::class, 'view']);


Route::get('latest', [ShowController::class, 'latest'])
    ->name('latest');

Route::get('/', function () {
    return inertia('welcome');
});
