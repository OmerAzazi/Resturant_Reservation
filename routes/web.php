<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\AdminController;




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

// Route::get('/', function () {
//     return view('Home.Home');
// });

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::get('/',[HomeController::class, 'Index']);
Route::get('Redirect',[HomeController::class, 'Redirect']);//->middleware('auth','verified'); //this one to make sure that the email is verfired 
Route::get('Menu',[MenuController::class, 'Menu']);
Route::get('BookPage',[BookController::class, 'BookPage']);
Route::post('/book', [BookController::class, 'store'])->name('book');
Route::get('Food',[AdminController::class, 'Food']);
Route::get('AddFood',[AdminController::class, 'AddFood']);
Route::post('/Add',[AdminController::class, 'Add'])->name('Add');
Route::Delete('/foodDelete/{id}',[AdminController::class, 'foodDelete'])->name('foodDelete');
Route::get('editFood/{id}',[AdminController::class, 'editFood']);
Route::post('/Edit/{id}',[AdminController::class, 'Edit'])->name('Edit');
Route::get('Reservation',[AdminController::class, 'Reservation']);
Route::post('/Cancel',[AdminController::class,'Cancel'])->name('Cancel');
route::get('/Search',[AdminController::class,'Search']);
