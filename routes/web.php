<?php

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

// Initial routing direct to login page

Route::get('/', function () {
    return view('auth.login');
});

// Auth routes 
// username: shehryara17@gmail.com
// password: 00000000

Auth::routes();

// Home Route when authenticated user logins 

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


// Staff Management Route

Route::resource('staff', App\Http\Controllers\StaffController::class);

// Medicine Management Route

Route::resource('medicine', App\Http\Controllers\MedicineController::class);

// Expiry Date Management of Medicine Route

Route::resource('medicineExpiry', App\Http\Controllers\ExpiryController::class);
// Route::get('expiry/{$medicine}', [App\Http\Controllers\ExpiryController::class, 'update'])->name('expiry.update');

// Route name: medicineExpiry given because it has the medicine details with stock details

// Stock Management Route

Route::resource('medicineStock', App\Http\Controllers\StockController::class);

// Route name: medicineStock given because it has the medicine details with stock details

// Sale Invoice Route

Route::resource('saleInvoice', App\Http\Controllers\SaleInvoiceController::class);

// Sales Management Route

Route::resource('sale', App\Http\Controllers\SaleController::class);

// Prescription Management Route

Route::resource('prescription', App\Http\Controllers\PrescriptionsController::class);

// Stock Report Route

Route::get('/report/stock', [App\Http\Controllers\ReportController::class, 'stockIndex'])->name('ReportController.stockIndex');

Route::get('/report/stock/{medicine}', [App\Http\Controllers\ReportController::class, 'stockReport'])
->name('ReportController.stockReport');

// Sales Report Route

Route::get('/report/sales', [App\Http\Controllers\ReportController::class, 'salesIndex'])->name('ReportController.salesIndex');

Route::get('/report/sales/{medicine}', [App\Http\Controllers\ReportController::class, 'salesReport'])
->name('ReportController.salesReport');