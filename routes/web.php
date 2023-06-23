<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\LineBotController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\ToolController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserToolsController;
use Illuminate\Support\Facades\Route;

// frontend
Route::get('/test-line', [PagesController::class, 'testLine'])->name('pages.line');
Route::post('/webhook', [LineBotController::class, 'handleWebhook']);


Route::get('/email', [PagesController::class, 'email'])->name('pages.email');
Route::get('/', [PagesController::class, 'index'])->name('pages.index');
Route::get('cart', [CartController::class, 'index'])->name('cart.index');
Route::get('add-to-cart/{id}', [CartController::class, 'addToCart'])->name('add.to.cart');
Route::post('update-cart', [CartController::class, 'update'])->name('update.cart');
Route::delete('remove-from-cart', [CartController::class, 'remove'])->name('remove.from.cart');

// auth  
Route::group(['namespace' => 'App\Http\Controllers'], function () {
    Route::get('/login', 'AuthController@index')->name('login');

    Route::post('/login', 'AuthController@login')->name('auth.login');

    Route::post('third-party-login', 'AuthController@thirdPartyLogin');
});


// check middleware  auth
Route::group(['middleware' => 'auth'], function () {
    // user
    Route::get('history', [PagesController::class, 'history'])->name('pages.history');
    Route::post('return-tool/{order}', [CartController::class, 'returnTool'])->name('cart.return.tool');
    Route::post('return-all', [CartController::class, 'returnToolAll'])->name('cart.return.all');
    Route::post('save-cart', [CartController::class, 'save'])->name('save.cart');

    Route::get('/logout', [AuthController::class, 'logout'])->name('auth.logout');

    // admin
    Route::group(['middleware' => ['admin']], function () {
        Route::group(['prefix' => 'admin'], function () {

            // users
            Route::get('/users', [UserController::class, 'index'])->name('users.index');
            Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
            Route::post('/users/store', [UserController::class, 'store'])->name('users.store');
            Route::get('/users/{user}', [UserController::class, 'show'])->name('users.show');
            Route::get('/users/{user}/edit', [UserController::class, 'edit'])->name('users.edit');
            Route::put('/users/{user}', [UserController::class, 'update'])->name('users.update');
            Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('users.destroy');

            // tools
            Route::get('/tools', [ToolController::class, 'index'])->name('tools.index');
            Route::get('/tools/create', [ToolController::class, 'create'])->name('tools.create');
            Route::post('/tools/store', [ToolController::class, 'store'])->name('tools.store');
            Route::get('/tools/{tools}', [ToolController::class, 'show'])->name('tools.show');
            Route::get('/tools/{tools}/edit', [ToolController::class, 'edit'])->name('tools.edit');
            Route::put('/tools/{tools}', [ToolController::class, 'update'])->name('tools.update');
            Route::delete('/tools/{tools}', [ToolController::class, 'destroy'])->name('tools.destroy');

            // orders
            Route::delete('/orders/{order}', [OrderController::class, 'destroy'])->name('orders.destroy');

            // user tools
            Route::get('/user-tools', [UserToolsController::class, 'index'])->name('user-tools.index');
            Route::get('/user-tools/create',  [UserToolsController::class, 'create'])->name('user-tools.create');
            Route::post('/user-tools/store',  [UserToolsController::class, 'store'])->name('user-tools.store');
            Route::get('/user-tools/{userTool}',  [UserToolsController::class, 'show'])->name('user-tools.show');
            Route::get('/user-tools/{userTool}/edit',  [UserToolsController::class, 'edit'])->name('user-tools.edit');
            Route::put('/user-tools/{userTool}',  [UserToolsController::class, 'update'])->name('user-tools.update');
            Route::delete('/user-tools/{userTool}',  [UserToolsController::class, 'destroy'])->name('user-tools.destroy');
            Route::post('/tools-status', [UserToolsController::class, 'updateStatus'])->name('tools.update.status');

            // dashboard
            Route::get('/dashboard', [PagesController::class, 'dashboard'])->name('pages.dashboard');
            Route::get('/', [PagesController::class, 'dashboard'])->name('pages.dashboard');
            Route::get('/tables', [PagesController::class, 'tables'])->name('pages.tables');
            Route::get('/forms', [PagesController::class, 'forms'])->name('pages.forms');
            Route::get('/tabs', [PagesController::class, 'tabs'])->name('pages.tabs');
            Route::get('/calendar', [PagesController::class, 'calendar'])->name('pages.calendar');
        });
    });
});
