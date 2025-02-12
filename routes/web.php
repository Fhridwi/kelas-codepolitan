<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\MovieController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

// Menampilkan semua data film
Route::get('/', [MovieController::class, 'index']);
Route::get('/movie', [MovieController::class, 'index']);



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

    Route::get('/home', function() {

        $dataMovies = [
            ['title' => 'PaddlePop', 'year' => '2002'],
            ['title' => 'Spider-Man', 'year' => '2002'],
            ['title' => 'The Dark Knight', 'year' => '2008'],
            ['title' => 'Inception', 'year' => '2010'],
            ['title' => 'Avengers: Endgame', 'year' => '2019'],
            ['title' => 'Interstellar', 'year' => '2014'],
            ['title' => 'Parasite', 'year' => '2019'],
            ['title' => 'The Matrix', 'year' => '1999'],
            ['title' => 'Gladiator', 'year' => '2000'],
            ['title' => 'X-Men', 'year' => '2000'],
            ['title' => 'Mission: Impossible 2', 'year' => '2000'],
            ['title' => 'Cast Away', 'year' => '2000'],
            ['title' => 'Crouching Tiger, Hidden Dragon', 'year' => '2000'],
            ['title' => 'The Patriot', 'year' => '2000'],
            ['title' => 'American Psycho', 'year' => '2000'],
            ['title' => 'Requiem for a Dream', 'year' => '2000'],
            ['title' => 'Almost Famous', 'year' => '2000'],
            ['title' => 'A Beautiful Mind', 'year' => '2001'],
            ['title' => 'Shrek', 'year' => '2001'],
            ['title' => 'Harry Potter and the Sorcerer\'s Stone', 'year' => '2001']
        ];
        
       

        return view('home')  ;
    });

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

