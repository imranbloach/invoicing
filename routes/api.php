<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InvoiceController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
//     return $request->user();
// });
Route::post("/invoices/mark-as-paid/{id}", [InvoiceController::class, "markAsPaid"]);
Route::post("/invoices/assign-invoice/{id}", [InvoiceController::class, "assignInvoice"]);
Route::resource('/invoices', InvoiceController::class);
