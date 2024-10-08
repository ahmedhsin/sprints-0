<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DeleteController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LogoutController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\ProductControllerResource;
Route::get('/', function () {
    $user = auth()->user()?->toArray();
    return view('welcome', compact('user'));
    //return view('welcome');
});

// Route::get('/about', function () {
//     return view('about');
// });

Route::get('/about',[AboutController::class,'index']);

Route::get('/user',[UsersController::class,'index']);

Route::get('/profile/{id}',[UsersController::class,'profile']);

Route::get('/users', [UsersController::class, 'all_users']);

///////////////////////////////////////////////////////////////////////////////////
//Route::get('/home',function (){
//    return view('welcome');
//});

//Route::match(['get','post'],'/home',function (){
//    return view('welcome');
//});

//Route::any('/home',function (){
//    return view('welcome');
//});

//Route::view('/home','welcome');



Route::prefix('/dashboard')->group(function(){
    Route::get('/',function (){
        echo 'dashboard home';
    });
    Route::get('/orders',function (){
        echo 'dashboard orders';
    });
});

//Route::middleware(['checkuser'])->group(function(){
//    Route::prefix('/profile')->group(function(){
//        Route::get('/',function (){
//            echo 'profile';
//        });
//        Route::get('/settings',function (){
//            echo 'settings';
//        });
//    });
//});
/*
Route::group(['middleware' => ['checkuser'], 'prefix' => 'dashboard'], function () {
    Route::get('/',function (){
        echo 'profile';
    });
    Route::get('/settings',function (){
        echo 'settings';
    });
});
*/
Route::get('/layout',[HomeController::class,'index']);


Route::prefix('/contact')->group(function(){
    Route::get('/',[ContactController::class,'index']);
    Route::get('/data',[ContactController::class,'get_data']);
    Route::post('/submit',[ContactController::class,'submit']) -> name('contact.submit');
});

Route::group(['prefix'=>'/auth'],function () {

    Route::get('/register',[RegisterController::class,'index']);
    Route::post('/register-post',[RegisterController::class,'save'])->name('auth.register');

    Route::get('/login',[LoginController::class,'index'])->name('login');
    Route::post('/login-post',[LoginController::class,'save'])->name('auth.login');

});
Route::get('/logout',[LogoutController::class,'logout_system'])->middleware('auth');

Route::group(['prefix'=>'/dashboard'],function () {
    Route::get('/',[DashboardController::class,'coordinator']);
    Route::get('/update',[DashboardController::class,'update']);
    Route::post('/update-item',[DashboardController::class,'update_item'])->name('update_item');
});
Route::get('/delete', [DeleteController::class, 'delete'])->name('delete');









Route::resources([
    'products' => ProductControllerResource::class,
]);
