<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use RealRashid\SweetAlert\Facades\Alert;

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

Route::get('/', function () {
    return view('welcome');
    Alert::success("hello","ttt");
});

//Route::get('/',"ProductController@index")->name('product.index');
Auth::routes([
    'verify'=>true
]);

Route::get('/main', function () {
    return view('main');
    Alert::success("hello","ttt");
 });

 


// Route::get('/demo', function () {
//     return view('demo');
// });

Route::group(['middleware' => "auth"],function(){
      Route::get('products',"ProductController@index")->name('product.index');
//   Route::get('products',"ProductController@demo")->name('product.demo');

 Route::get('create',"ProductController@create")->name('create.product');

Route::post('store',"ProductController@Store")->name('product.store');


Route::get('edit/product/{id}',"ProductController@Edit")->name('product/.edit');


Route::post('update',"ProductController@Update")->name('product.update'); 

Route::get('delete/product/{id}',"ProductController@Delete");

Route::get('export',"ProductController@export")->name('export');

Route::get('import',"ProductController@import")->name('import');




Route::get('demo',"ProductController@demo")->name('demo');
 Route::get('view',"ProductController@view")->name('view');
 Route::get('test',"ProductController@test")->name('test');

 Route::get('onethrough',"ProductController@onethrough")->name('onethrough');
 Route::get('manytomany',"ProductController@manytomany")->name('manytomany');
 Route::get('hastomanyth',"ProductController@hastomanyth")->name('hastomanyth');

});

Auth::routes();  

Route::get('/home', 'HomeController@index')->name('home');

