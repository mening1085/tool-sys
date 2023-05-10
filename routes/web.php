<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\PagesController;
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

// frontend
Route::get('/', 'App\Http\Controllers\PagesController@index')->name('pages.index');

Route::get('cart', [CartController::class, 'index'])->name('cart.index');
Route::get('add-to-cart/{id}', [CartController::class, 'addToCart'])->name('add.to.cart');
Route::post('update-cart', [CartController::class, 'update'])->name('update.cart');
Route::delete('remove-from-cart', [CartController::class, 'remove'])->name('remove.from.cart');


// check middleware  auth
Route::group(['middleware' => 'auth'], function () {
    Route::post('save-cart', [CartController::class, 'save'])->name('save.cart');
    Route::get('success', [PagesController::class, 'success'])->name('page.success');

    Route::group(['namespace' => 'App\Http\Controllers'], function () {
        Route::get('/logout', 'AuthController@logout')->name('auth.logout');

        // admin
        Route::group(['middleware' => ['admin']], function () {
            Route::group(['prefix' => 'admin'], function () {

                // users
                Route::get('/users', 'UserController@index')->name('users.index');
                Route::get('/users/create', 'UserController@create')->name('users.create');
                Route::post('/users/store', 'UserController@store')->name('users.store');
                Route::get('/users/{user}', 'UserController@show')->name('users.show');
                Route::get('/users/{user}/edit', 'UserController@edit')->name('users.edit');
                Route::put('/users/{user}', 'UserController@update')->name('users.update');
                Route::delete('/users/{user}', 'UserController@destroy')->name('users.destroy');

                // tools
                Route::get('/tools', 'ToolController@index')->name('tools.index');
                Route::get('/tools/create', 'ToolController@create')->name('tools.create');
                Route::post('/tools/store', 'ToolController@store')->name('tools.store');
                Route::get('/tools/{tools}', 'ToolController@show')->name('tools.show');
                Route::get('/tools/{tools}/edit', 'ToolController@edit')->name('tools.edit');
                Route::put('/tools/{tools}', 'ToolController@update')->name('tools.update');
                Route::delete('/tools/{tools}', 'ToolController@destroy')->name('tools.destroy');

                // user tools
                Route::get('/user-tools', 'UserToolsController@index')->name('user-tools.index');
                Route::get('/user-tools/create', 'UserToolsController@create')->name('user-tools.create');
                Route::post('/user-tools/store', 'UserToolsController@store')->name('user-tools.store');
                Route::get('/user-tools/{userTool}', 'UserToolsController@show')->name('user-tools.show');
                Route::get('/user-tools/{userTool}/edit', 'UserToolsController@edit')->name('user-tools.edit');
                Route::put('/user-tools/{userTool}', 'UserToolsController@update')->name('user-tools.update');
                Route::delete('/user-tools/{userTool}', 'UserToolsController@destroy')->name('user-tools.destroy');

                // dashboard
                Route::get('/dashboard', 'PagesController@dashboard')->name('pages.dashboard');
                Route::get('/', 'PagesController@dashboard')->name('pages.dashboard');
                Route::get('/tables', 'PagesController@tables')->name('pages.tables');
                Route::get('/forms', 'PagesController@forms')->name('pages.forms');
                Route::get('/tabs', 'PagesController@tabs')->name('pages.tabs');
                Route::get('/calendar', 'PagesController@calendar')->name('pages.calendar');
            });
        });
    });
});

// auth  
Route::group(['namespace' => 'App\Http\Controllers'], function () {
    Route::get('/login', 'AuthController@index')->name('login');

    Route::post('/login', 'AuthController@login')->name('auth.login');
});
