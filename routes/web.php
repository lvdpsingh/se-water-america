<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ServiceController;
use Illuminate\Support\Facades\Route;
use App\Models\wa_bill;

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
    return view('welcome');
});

//Route::get('/dashboard', function () {
//    $service_requests = wa_bill::all();
//    return view('dashboard', compact('service_requests'));
//})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/newservice',[ServiceController::class,'viewServiceRequest'])->name('newservice.all');
    Route::get('/newservice/success',[ServiceController::class,'viewServiceSubmitted'])->name('newservice.success');
    Route::post('/newservice/create',[ServiceController::class, 'newServiceRequest'])->name('newservice.create');
});

Route::prefix('admin')->middleware(['auth','admin'])->group(function (){
    Route::get('dashboard-admin','App\Http\Controllers\Admin\DashboardController@index')->name('dashboard-admin');
});

Route::prefix('customer')->middleware(['auth','customer'])->group(function (){
    Route::get('dashboard-customer','App\Http\Controllers\Customer\DashboardController@index')->name('dashboard-customer');
});

require __DIR__.'/auth.php';
