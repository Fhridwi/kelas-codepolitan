<?php

use App\Http\Controllers\MovieController;
use Illuminate\Support\Facades\Route;

// Menampilkan semua data film
Route::get('/', [MovieController::class, 'index']);

Route::get('/movie/{id}', [MovieController::class, 'show'])
    ->middleware(['isAuth', 'isMember']);

Route::post('/movie', [MovieController::class, 'store']);

Route::put('/movie/{id}', [MovieController::class, 'update']);

Route::patch('/movie/{id}', [MovieController::class, 'update']);

Route::delete('/movie/{id}', [MovieController::class, 'destroy']);

Route::get('/pricing', function() {
    return 'Untuk menikmati akses movie tak terhingga, mohon untuk menjadi member kami terlebih dahulu';
});

Route::get('/login', function() {
    return 'Halaman Login';
})->name('login');
