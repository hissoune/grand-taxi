<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RateController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\dasboardController;
use App\Http\Controllers\horairesController;
use App\Http\Controllers\DriverTaxiController;
use App\Http\Controllers\ReservationnController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard',[dasboardController::class,'index'] )->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth', 'role:Chaufeur'])->group(function () {
Route::resource('/Chaufeur',DriverTaxiController::class);
Route::resource('/Horaire',horairesController::class);
Route::resource('/Reservation',ReservationnController::class);
Route::resource('/rate',RateController::class);
});
// Route::get('/Chaufeur', function () {
//     return view('Chaufeur.index');
// })->middleware(['auth', 'role:Chaufeur'])->name('Chaufeur.index'); 

Route::middleware(['auth', 'role:passager'])->group(function () {
    Route::resource('/passager',horairesController::class);
    Route::resource('/Reservation',ReservationnController::class);
    //  Route::get('/rate',[RateController::class ,'index']);

    Route::get('/rate/{rate}',[RateController::class,'addRate'])->name('rate.addRate');
    Route::post('/rate',[RateController::class,'createRate'])->name('createRate');
    Route::get('/searsh',[dasboardController::class,'search'] )->name('search');
    Route::get('/filter',[dasboardController::class,'filter'] )->name('filter.price');
    // Route::get('/filter',[dasboardController::class,'filter'] )->name('filter.rate');



    // Route::resource('/Horaire',horairesController::class);
    });

    Route::middleware(['auth', 'role:Admin'])->group(function () {
        // Route::resource('/passager',horairesController::class);
        // Route::resource('/Reservation',ReservationnController::class);
        //  Route::get('/rate',[RateController::class ,'index']);
    
        // Route::get('/rate/{rate}',[RateController::class,'addRate'])->name('rate.addRate');
        // Route::get('/searsh',[dasboardController::class,'search'] )->name('search');
        // Route::get('/filter',[dasboardController::class,'filter'] )->name('filter.price');
        // Route::get('/filter',[dasboardController::class,'filter'] )->name('filter.rate');
    
         
        Route::resource('/admin',AdminController::class);

        
        
     
        // Route::resource('/Horaire',horairesController::class);
        });


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
