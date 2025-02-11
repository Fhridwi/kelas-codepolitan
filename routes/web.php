<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\MovieController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

// Menampilkan semua data film
Route::get('/', [MovieController::class, 'index']);

// Route khusus movie dengan middleware
// Route::middleware(['isAuth', 'isMember'])->group(function () {
    Route::get('/movie/{id}', [MovieController::class, 'show']);
// });

// CRUD Movie
Route::post('/movie', [MovieController::class, 'store']);
Route::match(['put', 'patch'], '/movie/{id}', [MovieController::class, 'update']);
Route::delete('/movie/{id}', [MovieController::class, 'destroy']);

// Halaman Pricing
Route::get('/pricing', function () {
    return 'Untuk menikmati akses movie tak terhingga, mohon untuk menjadi member kami terlebih dahulu';
});

Route::get('/login', function () {
    return 'Halaman Login';
})->name('login');


Route::post('/request', function(request $request){

    if($request->hasAny('name', 'pass')) {
       return "Login Berhasil";
    }

    return "GAGAL";

});

Route::get('/response', function(){
    return response('ok')->header('Content-Type', 'text/plain');
});

Route::get('/cache-control', function() {
    return Response::make('Page allow to cache', 200)
    ->header('Cache-control', 'public, max-age-86400');
});

Route::middleware('cache.headers:public;max_age=2628000')->group(function()
{

    Route::get('/home', [HomeController::class, 'index'])->name('home');

    Route::get('/dashboard', function() {
        $user = 'admin';

        return response('login succesfuly', 200)->cookie('user', $user);
    });

    Route::get('/logout', function() {
        return redirect()->action([HomeController::class, 'index'], ['authencated' => false]);
    });

    Route::get('/privacy', function(){
        return 'Privacy page';
    });


    Route::get('/terms', function() {
        return 'Terms page';
    });
});

Route::get('/external', function() {
    return redirect()->away('https://instagram.com/f4ry_06');
});


// View

