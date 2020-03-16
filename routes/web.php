<?php
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

Route::get("/", "HomeController@index")->name("home");
Route::get("/about", "HomeController@about")->name("about");
Route::get("/driver", "HomeController@driver")->name("driver");
Route::get("/register-driver", "HomeController@registerDriver")->name("driver.register");
Route::post("/register-driver", "HomeController@registerDriverSubmit")->name("driver.register.submit");
Route::get("/contact", "HomeController@contact")->name("contact");
Route::post("/contact", "HomeController@sendFeedback")->name("contact.submit");
Route::get("dep",function(){
    Artisan::call("storage:link");
});
