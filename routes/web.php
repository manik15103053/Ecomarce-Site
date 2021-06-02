<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\DistrictController;
use App\Http\Controllers\DivisionController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use PHPUnit\TextUI\XmlConfiguration\Group;

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

///Frontend Route////

Route::get('/',[ProductController::class,'home'])->name('home');
Route::get('/product',[ProductController::class,'index'])->name('product.index');
Route::get('/show/{slug}',[ProductController::class,'showProduct'])->name('product.show');
Route::get('/search/product',[PageController::class,'search'])->name('product.search');
///Catagory Route
Route::get('/category/show/{id}',[PageController::class,'categoryshow'])->name('category.show');
///Route User Registration///
///

Route::get('/user/registration',[RegistrationController::class,'registrationCreate'])->name('registration.create');
Route::post('/user/store',[RegistrationController::class,'registrationStore'])->name('registration.store');
Route::get('/token/{token}',[NotificationController::class,'notify'])->name('user.verification');
//User Profiles///
Route::get('/user/dashboard',[UserController::class,'userDashboard'])->name('user.dashboard');
Route::get('/user/profile',[UserController::class,'userProfile'])->name('user.profile');
Route::post('/user/update/profile',[UserController::class,'userUpdate'])->name('user.update');


///Route for Cart
Route::get('/cart',[CartController::class,'cartIndex'])->name('cart');
Route::post('/cart/store',[CartController::class,'cartStore'])->name('cart.store');
Route::post('//cart/update/{id}',[CartController::class,'cartUpdate'])->name('cart.update');
Route::post('//cart/delete/{id}',[CartController::class,'cartDelete'])->name('cart.delete');

///Checkouts Routes
Route::get('/checkout',[CheckoutController::class,'checkoutIndex'])->name('checkout');
Route::post('/checkout/store',[CheckoutController::class,'checkoutStore'])->name('checkout.store');



///Login Route////
Route::get('/login/process',[RegistrationController::class,'loginCreate'])->name('user.login');
Route::post('/login',[RegistrationController::class,'login'])->name('login');
Route::get('/logout',[RegistrationController::class,'logout'])->name('logout');





Route::group(['prefix' => 'admin'],function(){
///product Route/////////
Route::get('/',[AdminController::class,'index'])->name('admin.index');
Route::get('/create/product',[AdminController::class,'create'])->name('admin.create.product');
Route::post('/product/store',[AdminController::class,'store'])->name('product.store');
Route::get('/product/edit/{id}',[AdminController::class,'edit'])->name('admin.product.edit');
Route::post('/product/update/{id}',[AdminController::class,'update'])->name('admin.product.update');
Route::get('/product/delete/{id}',[AdminController::class,'delete'])->name('admin.product.delete');

///Category Route////
Route::get('/category/create',[CategoryController::class,'categoryCreate'])->name('admin.category.create');
Route::post('/category/store',[CategoryController::class,'categoryStore'])->name('admin.category.store');
Route::get('/category/edit/{id}',[CategoryController::class,'categoryEdit'])->name('admin.category.edit');
Route::post('/category/update/{id}',[CategoryController::class,'categoryUpdate'])->name('admin.category.update');
Route::get('/category/delete/{id}',[CategoryController::class,'categoryDelete'])->name('admin.category.delete');

///BrandRoute////
Route::get('/brands/create',[BrandController::class,'brandCreate'])->name('brand.create');
Route::post('/brand/store',[BrandController::class,'brandStore'])->name('brand.store');
Route::get('/brand/edit/{id}',[BrandController::class,'brnadEdit'])->name('brand.edit');
Route::post('/brand/update/{id}',[BrandController::class,'brandUpdate'])->name('brand.update');
Route::get('/brands/delete/{id}',[BrandController::class,'BrandDelete'])->name('brand.delete');

///Route Division///

Route::get('/division/create',[DivisionController::class,'divisionCreate'])->name('division.create');
Route::post('/division/store',[DivisionController::class,'divisionStore'])->name('division.store');
Route::get('/division/edit/{id}',[DivisionController::class,'divisionEdit'])->name('division.edit');
Route::post('/division/update/{id}',[DivisionController::class,'divisionUpdate'])->name('division.update');
Route::get('/division/delete/{id}',[DivisionController::class,'divisionDelete'])->name('division.delete');

///Route for District///

Route::get('/district/create',[DistrictController::class,'districtCreate'])->name('district.create');
Route::post('/district/store',[DistrictController::class,'districtStore'])->name('district.store');
Route::get('/district/edit/{id}',[DistrictController::class,'districtEdit'])->name('district.edit');
Route::post('/district/update/{id}',[DistrictController::class,'districtUpdate'])->name('district.update');
Route::get('/district/delete/{id}',[DistrictController::class,'districtDelete'])->name('district.delete');
});