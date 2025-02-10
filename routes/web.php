<?php

use App\Http\Controllers\MovieController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

// Menampilkan semua data film
Route::get('/', [MovieController::class, 'index']);

// Route khusus movie dengan middleware
Route::middleware(['isAuth', 'isMember'])->group(function () {
    Route::get('/movie/{id}', [MovieController::class, 'show']);
});

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
