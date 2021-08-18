<?php

use Illuminate\Support\Facades\Route;

// Controllers
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HotelsController;

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

Route::get('login', function () {
    return redirect('admin/login');
})->name('login');

Route::get('admin/register', function () {
    return view('vendor/voyager/register');
})->name('register');
Route::post('admin/register/store', [AuthController::class, 'register_store'])->name('register.store');

Route::get('/', function () {
    return redirect('admin');
});


Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();

    Route::resource('hotels', HotelsController::class);
    Route::post('hotels/store/register', [HotelsController::class, 'store_register'])->name('hotels.store.register');
    Route::get('hotels/{name}/registers', [HotelsController::class, 'register_detail'])->name('hotels.register.datail');
    Route::get('hotels/register/detail/list/{id}', [HotelsController::class, 'register_detail_list']);
    Route::post('hotels/{name}/registers/store', [HotelsController::class, 'register_detail_store'])->name('hotels.register.datail.store');
});

// Clear cache
Route::get('/admin/clear-cache', function() {
    Artisan::call('optimize:clear');
    return redirect('/admin/profile')->with(['message' => 'Cache eliminada.', 'alert-type' => 'success']);
})->name('clear.cache');
