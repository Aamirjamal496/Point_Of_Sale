<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\SuppliersController;
use App\Http\Middleware\AuthAdmin;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
// Auth Routes:
Route::get('/login', [AuthController::class, 'index'])->name("Login");
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout']);

Route::middleware(['AuthAdmin'])->group(function () {

    // Dashboard Routes:
    Route::get('/dashboard', [AuthController::class, 'dashboard'])->name('Panel');

    // Products Routes:
    Route::get('/products', [ProductsController::class, 'index']);
    // ->middleware(AuthAdmin::class);
    Route::get('/products/add', [ProductsController::class, 'add_Form']);
    Route::get('/products/edit', [ProductsController::class, 'edit_Form']);

    // Categories Route:
    Route::get('/categories', [CategoriesController::class, 'index']);
    Route::post('/categories/add-category', [CategoriesController::class, 'add_Category']);

    // Inventory Routes
    Route::get('/inventory', function () {
        return view('Inventory.index');
    });

    // Suppliers Routes:
    Route::get('/suppliers', [SuppliersController::class, 'index']);
    Route::get('/suppliers/add', [SuppliersController::class, 'add_Form']);

    // Purchaes Routes
    Route::prefix('/purchases')->group(function () {

        Route::get('/', function () {
            return view('Purchases.index');
        });
        Route::get('/add', function () {
            return view('Purchases.add');
        });
        Route::get('/show', function () {
            return view('Purchases.show');
        });
    });

    // Customers Routes:
    Route::get('/customers', function () {
        return view('Customers.index');
    });
    Route::get('/customer/details', function () {
        return view('Customers.show');
    });

    // POS sales Routes:
    Route::get('/sales', function () {
        return view('POS_Sales.index');
    });

    // Invoices Routes:
    Route::get('/invoices', function () {
        return view('Invoices.index');
    });
    Route::get('/invoices/show', function () {
        return view('Invoices.show');
    });

    // Reports Routes:
    Route::get('/reports', function () {
        return view('Reports.index');
    });
    Route::get('/reports/sales', function () {
        return view('Reports.sales');
    });
});
