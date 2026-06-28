<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\PurchaseController;
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
    Route::get('/products', [ProductsController::class, 'index'])->name('Products');
    // ->middleware(AuthAdmin::class);
    Route::get('/products/add', [ProductsController::class, 'add_Form']);
    Route::post('/products/add', [ProductsController::class, 'store']);
    Route::get('/products/edit', [ProductsController::class, 'edit_Form']);
    Route::delete('/products/delete/{id}', [ProductsController::class, 'destroy']);

    // Categories Route:
    Route::get('/categories', [CategoriesController::class, 'index']);
    Route::post('/categories/add-category', [CategoriesController::class, 'add_Category']);
    Route::delete('/categories/delete-category/{id}', [CategoriesController::class, 'destroy']);

    // Inventory Routes
    Route::get('/inventory', [InventoryController::class, 'index']);
    Route::get('/inventory/history', [InventoryController::class, 'historyPage']);
    Route::get('/inventory/adjust', [InventoryController::class, 'add']);
    Route::post('/inventory/adjust', [InventoryController::class, 'storeAdjustment']);

    // Suppliers Routes:
    Route::get('/suppliers', [SuppliersController::class, 'index'])->name('Suppliers');
    Route::get('/suppliers/add', [SuppliersController::class, 'add_Form']);
    Route::post('/suppliers/add', [SuppliersController::class, 'store']);
    Route::delete('/suppliers/delete/{id}', [SuppliersController::class, 'destroy']);

    // Purchaes Routes
    Route::prefix('/purchases')->group(function () {
        Route::get('/', [PurchaseController::class, "index"]);
        Route::get('/add', [PurchaseController::class, "PurchaseForm"]);
        Route::post('/create', [PurchaseController::class, 'CreatePurchase']);
        Route::get('/show', [PurchaseController::class, "editPurchase"]);
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
