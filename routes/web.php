<?php

use Illuminate\Support\Facades\Route;

// Controllers
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HotelsController;
use App\Http\Controllers\ReportsController;

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

    Route::get('hotels/{hotel}/activities', [HotelsController::class, 'activities'])->name('hotels.activities');
    Route::post('hotels/{hotel}/activities/pdf', [HotelsController::class, 'activities_pdf'])->name('hotels.activities.pdf');
    Route::get('hotels/{hotel}/documents', [HotelsController::class, 'documents'])->name('hotels.documents');
    Route::post('hotels/{hotel}/documents/store', [HotelsController::class, 'documents_store'])->name('hotels.documents.store');
    Route::post('hotels/{hotel}/documents/delete', [HotelsController::class, 'documents_delete'])->name('hotels.documents.delete');

    Route::resource('hoteles', HotelsController::class);
    Route::post('hoteles/store/register', [HotelsController::class, 'store_register'])->name('hotels.store.register');
    Route::get('hoteles/{hotel}/registers', [HotelsController::class, 'register_detail'])->name('hotels.register.datail');
    Route::get('hoteles/register/detail/list/{id}', [HotelsController::class, 'register_detail_list']);
    Route::post('hoteles/{hotel}/registers/empty/store', [HotelsController::class, 'register_detail_empty_store'])->name('hotels.register.detail.empty.store');
    Route::post('hoteles/{hotel}/registers/store', [HotelsController::class, 'register_detail_store'])->name('hotels.register.detail.store');
    Route::post('hoteles/{hotel}/registers/update', [HotelsController::class, 'register_detail_update'])->name('hotels.register.detail.update');
    Route::post('hoteles/registers/delete/{id}', [HotelsController::class, 'register_detail_delete']);
    Route::delete('hotels/{id}', [HotelsController::class, 'destroy'])->name('voyager.hotels.destroy');

    Route::get('reportes/register_activities', [ReportsController::class, 'register_activities'])->name('reports.register_activities');
    Route::post('reportes/register_activities', [ReportsController::class, 'register_activities_list'])->name('reports.register_activities.list');
    Route::get('reportes/national_activities', [ReportsController::class, 'national_activities'])->name('reports.national_activities');
    Route::post('reportes/national_activities', [ReportsController::class, 'national_activities_list'])->name('reports.national_activities.list');
    Route::get('reportes/international_activities', [ReportsController::class, 'international_activities'])->name('reports.international_activities');
    Route::post('reportes/international_activities', [ReportsController::class, 'international_activities_list'])->name('reports.international_activities.list');

    // Exportar a excel
    Route::get('export/hotels', [ReportsController::class, 'export_hotels'])->name('export.hotels');
    Route::get('export/hotels/details', [ReportsController::class, 'export_hotels_details'])->name('export.hotels.details');

});

// Clear cache
Route::get('/admin/clear-cache', function() {
    Artisan::call('optimize:clear');
    return redirect('/admin/profile')->with(['message' => 'Cache eliminada.', 'alert-type' => 'success']);
})->name('clear.cache');
