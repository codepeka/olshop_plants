<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\ProductCrud;
use App\Http\Controllers\plants;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [plants::class, 'index']);
Route::get('/plants', [plants::class, 'index']);

Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::get('products', ProductCrud::class)->name('products');
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
}); 
