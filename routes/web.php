<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\FamilyTreeController;
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

Route::get('/admin/register', [RegisterController::class, 'showRegistrationForm'])->name('admin.register');
Route::post('/admin/register', [RegisterController::class, 'register']);

Route::get('/family-tree', [FamilyTreeController::class, 'index'])->name('family-tree.index');
Route::get('/family-tree/show', [FamilyTreeController::class, 'showFamilyTree'])->name('family-tree.show');


Route::get('/', function () {
    return view('welcome');
});
