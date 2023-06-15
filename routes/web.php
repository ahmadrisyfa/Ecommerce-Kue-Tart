<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardAdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\NameWebsiteController;
use App\Http\Controllers\ContactWebsiteController;
use App\Http\Controllers\WebsiteController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\registerController;
use App\Http\Controllers\TanyaJawabController;
use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\SizeController;




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


Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/register', [registerController::class, 'index'])->middleware('guest');
Route::post('/register', [registerController::class, 'store']);


Route::get('/',[WebsiteController::class,'index']);
Route::get('/category/{id}/detail',[WebsiteController::class,'CategoryDetail']);
Route::get('/product/{id}/detail',[WebsiteController::class,'ProductDetail']);

Route::get('/produk', [WebsiteController::class, 'size']);
Route::get('/get-harga/{id}', [WebsiteController::class, 'getHarga']);
// Route::get('/', function () {
//     return view('welcome');
// });
Route::group(['middleware' => ['auth']], function () {
    Route::post('/product/cart',[WebsiteController::class,'addtocart']);
    Route::get('/cart',[WebsiteController::class,'cart']);
    Route::get('/cart/{cart}/hapus', [WebsiteController::class, 'cartDestroy']);
    
    Route::get('/checkout',[WebsiteController::class,'checkout']);
    Route::post('/checkout-data',[WebsiteController::class,'CheckoutData']);
    
    Route::get('/terimakasih',[WebsiteController::class,'terimakasih']);

    Route::get('/riwayat-transaksi',[WebsiteController::class,'RiwayatTransaksi']);
    Route::get('/riwayat-transaksi/{created_at}',[WebsiteController::class,'RiwayatTransaksiDetail']);

    
});


Route::group(['middleware' => ['auth', 'admin']], function () {

Route::get('/admin/dashboard',[DashboardAdminController::class,'index']);

Route::get('/admin/transaksi',[DashboardAdminController::class,'transaksi']);
Route::get('/admin/detail/{created_at}/transaksi',[DashboardAdminController::class,'transaksidetail']);
Route::put('/admin/konfirmasi-proses/{created_at}/transaksi',[DashboardAdminController::class,'Prosestransaksidetail']);


Route::get('/admin/konfirmasi-proses/{created_at}/transaksi',[DashboardAdminController::class,'KonfirmasiTransaksi']);


Route::get('/admin/cetak/transaksi',[DashboardAdminController::class,'Formtransaksidetailcetak']);
Route::get('/admin/transaksi/cetak-semua-data',[DashboardAdminController::class,'TransaksiCetakSemuaData']);


Route::post('admin/transaksi/cetak-data-pertanggal',[DashboardAdminController::class,'TransaksiCetakaDataPerTanggal']);

Route::post('admin/transaksi/search',[DashboardAdminController::class,'transaksiSearch']);

Route::get('/admin/admin-user',[AdminUserController::class,'index']);
Route::get('/admin/admin-user/{id}/edit',[AdminUserController::class,'edit']);
Route::put('/admin/admin-user/{id}/edit',[AdminUserController::class,'update']);

Route::get('/admin/category',[CategoryController::class,'index']);
Route::get('/admin/category/create',[CategoryController::class,'create']);
Route::post('/admin/category/create',[CategoryController::class,'store']);
Route::get('/admin/category/{id}/edit',[CategoryController::class,'edit']);
Route::put('/admin/category/{id}/edit',[CategoryController::class,'update']);
Route::get('/admin/category/{category}/hapus', [CategoryController::class, 'destroy']);


Route::get('/admin/product',[ProductController::class,'index']);
Route::get('/admin/product/create',[ProductController::class,'create']);
Route::post('/admin/product/create',[ProductController::class,'store']);
Route::get('/admin/product/{id}/detail',[ProductController::class,'show']);
Route::get('/admin/product/{id}/edit',[ProductController::class,'edit']);
Route::put('/admin/product/{id}/edit',[ProductController::class,'update']);
Route::get('/admin/product/{product}/hapus', [ProductController::class, 'destroy']);


Route::get('/admin/slider',[SliderController::class,'index']);
Route::get('/admin/slider/create',[SliderController::class,'create']);
Route::post('/admin/slider/create',[SliderController::class,'store']);
Route::get('/admin/slider/{id}/edit',[SliderController::class,'edit']);
Route::put('/admin/slider/{id}/edit',[SliderController::class,'update']);
Route::get('/admin/slider/{slider}/hapus', [SliderController::class, 'destroy']);

Route::get('/admin/name-website',[NameWebsiteController::class,'index']);
Route::get('/admin/name-website/create',[NameWebsiteController::class,'create']);
Route::post('/admin/name-website/create',[NameWebsiteController::class,'store']);
Route::get('/admin/name-website/{id}/edit',[NameWebsiteController::class,'edit']);
Route::put('/admin/name-website/{id}/edit',[NameWebsiteController::class,'update']);
Route::get('/admin/name-website/{namewebsite}/hapus', [NameWebsiteController::class, 'destroy']);


Route::get('/admin/contact-website',[ContactWebsiteController::class,'index']);
Route::get('/admin/contact-website/create',[ContactWebsiteController::class,'create']);
Route::post('/admin/contact-website/create',[ContactWebsiteController::class,'store']);
Route::get('/admin/contact-website/{id}/detail',[ContactWebsiteController::class,'show']);
Route::get('/admin/contact-website/{id}/edit',[ContactWebsiteController::class,'edit']);
Route::put('/admin/contact-website/{id}/edit',[ContactWebsiteController::class,'update']);
Route::get('/admin/contact-website/{contactwebsite}/hapus', [ContactWebsiteController::class, 'destroy']);


Route::get('/admin/tanya-jawab',[TanyaJawabController::class,'index']);
Route::get('/admin/tanya-jawab/create',[TanyaJawabController::class,'create']);
Route::post('/admin/tanya-jawab/create',[TanyaJawabController::class,'store']);
Route::get('/admin/tanya-jawab/{id}/edit',[TanyaJawabController::class,'edit']);
Route::put('/admin/tanya-jawab/{id}/edit',[TanyaJawabController::class,'update']);
Route::get('/admin/tanya-jawab/{TanyaJawab}/hapus', [TanyaJawabController::class, 'destroy']);

Route::get('/admin/size',[SizeController::class,'index']);
Route::get('/admin/size/create',[SizeController::class,'create']);
Route::post('/admin/size/create',[SizeController::class,'store']);
Route::get('/admin/size/{id}/edit',[SizeController::class,'edit']);
Route::put('/admin/size/{id}/edit',[SizeController::class,'update']);
Route::get('/admin/size/{size}/hapus', [SizeController::class, 'destroy']);


});
