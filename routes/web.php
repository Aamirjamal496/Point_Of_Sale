<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\PurchaseController;
use App\Http\Controllers\salesController;
use App\Http\Controllers\SuppliersController;
use App\Http\Middleware\AuthAdmin;
use App\Http\Middleware\AuthUser;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
// Auth Routes:
Route::get('/login', [AuthController::class, 'index'])->name("Login");
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout']);

Route::middleware(['AuthUser'])->group(function () {

    // Dashboard Routes:
    Route::get('/dashboard', [AuthController::class, 'dashboard'])->name('Panel');

    // Products Routes:
    Route::get('/products', [ProductsController::class, 'index'])->name('Products'); // ->middleware(AuthAdmin::class);
    Route::get('/products/add', [ProductsController::class, 'add_Form']);
    Route::post('/products/add', [ProductsController::class, 'store']);
    // Route::get('/products/edit', [ProductsController::class, 'edit_Form']);
    Route::get('/products/edit/{id}', [ProductsController::class, 'edit_Form']);
    Route::get('/products/edit_values/{id}', [ProductsController::class, 'edit_Values']);
    Route::post('/products/update', [ProductsController::class, 'update']);
    Route::delete('/products/delete/{id}', [ProductsController::class, 'destroy']);

    // Categories Route:
    Route::get('/categories', [CategoriesController::class, 'index']);
    Route::post('/categories/add-category', [CategoriesController::class, 'add_Category']);
    Route::delete('/categories/delete-category/{id}', [CategoriesController::class, 'destroy']);
    Route::get('/categories/details/{id}', [CategoriesController::class, 'details']);

    // Inventory Routes
    Route::get('/inventory', [InventoryController::class, 'index']);
    Route::get('/inventory/history', [InventoryController::class, 'historyPage'])->middleware('AuthAdmin');
    Route::get('/inventory/history/search', [InventoryController::class, 'Search']);
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
        Route::get('/show/{id}', [PurchaseController::class, "viewPurchase"]);
    });

    // Customers Routes:
    Route::get('/customers', [CustomerController::class, 'index']);
    Route::get('/customer/details/{id}', [CustomerController::class, 'show']);
    Route::get('/customer/add', [CustomerController::class, 'addForm']);
    Route::post('/customer/add', [CustomerController::class, 'addCustomer']);

    // POS sales Routes:
    Route::get('/sales', [salesController::class, 'index']);
    Route::post('/sales/checkout', [salesController::class, 'checkout']);
    Route::get('/invoice/{InvoiceId}', [salesController::class, 'invoice']);

    // Invoices Routes:
    Route::get('/invoices', [InvoiceController::class, 'index']);
    Route::get('/invoices/show/{id}', [salesController::class, 'invoice']);

    // Reports Routes:
    // Route::get('/reports', function () {
    //     return view('Reports.index');
    // });
    Route::get('/reports',[salesController::class,'showreports']);
    // Route::get('/reports/sales',[salesController::class,'showreports']);
});
