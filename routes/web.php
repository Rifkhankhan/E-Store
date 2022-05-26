<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StoreController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\EmployeeDetailsController;
use App\Http\Controllers\BlogController;

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
Route::get('/home',[StoreController::class,'index'])->name('home');
Route::get('/registration',[StoreController::class,'registration'])->name('registration');

//admin
Route::get('/admin-dashboard',[StoreController::class,'admin_dashboard'])->name('admin_dashboard');
Route::get('/admin_products',[StoreController::class,'admin_products'])->name('admin_products');
Route::get('/admin_employees',[StoreController::class,'admin_employees'])->name('admin_employees');
Route::get('/employees_create',[StoreController::class,'employees_create'])->name('employees_create');
Route::get('/show_product/{id}',[StoreController::class,'show_product'])->name('show_product');
Route::get('/edit_product/{id}',[StoreController::class,'edit_product'])->name('edit_product');
Route::get('/delete_product/{id}',[StoreController::class,'delete_product'])->name('delete_product');

//customer
Route::get('/customer_dashboard/{id}',[StoreController::class,'customer_dashboard'])->name('customer_dashboard');
Route::get('/customers_orders/{id}',[StoreController::class,'customers_orders'])->name('customers_orders');
Route::get('/place_order/{product}/{customer}',[StoreController::class,'place_order'])->name('place_order');
Route::get('/store_customer',[StoreController::class,'store_customer'])->name('store_customer');
Route::get('/confirm_order/{product}/{customer}',[StoreController::class,'confirm_order'])->name('confirm_order');
Route::get('/customers_myorders/{id}',[StoreController::class,'customers_myorders'])->name('customers_myorders');
Route::get('/cancelorder/{id}',[StoreController::class,'cancelorder'])->name('cancelorder');

//products

Route::get('/product_create',[StoreController::class,'product_create'])->name('product_create');
Route::get('/product_store',[StoreController::class,'product_store'])->name('product_store');
Route::get('/product_update/{id}',[StoreController::class,'product_update'])->name('product_update');



//Auth

Route::get('/login', [StoreController::class, 'checklogin'])->name('login'); 
Route::get('/logout',[StoreController::class,'logout'])->name('logout');
//employee

Route::resource('employees',EmployeeController::class);


//employee

Route::get('/employee_dashboard/{id}',[StoreController::class,'employee_dashboard'])->name('employee_dashboard');
Route::get('/employee_orders/{id}',[StoreController::class,'employee_orders'])->name('employee_orders');
Route::get('/deliveredorder/{id}',[StoreController::class,'deliveredorder'])->name('deliveredorder');

//Reset Password
Route::get('/reset_password/{id}',[EmployeeController::class,'reset_password'])->name('reset_password');
Route::get('/updatepassword/{id}',[EmployeeController::class,'updatepassword'])->name('updatepassword');

