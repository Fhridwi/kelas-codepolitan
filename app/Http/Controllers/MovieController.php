<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MovieController extends Controller
{
    public $movies;

    public function __construct() 
    {
        for ($i = 0; $i < 10; $i++) {
            $this->movies[] = [  
                'title' => 'Movie' . $i,
                'year'  => '2025',
                'genre' => 'action'
            ];
        }
    }

    // public static function middleware() 
    // {
    //     return [
    //         
    //     ];
    // }

    public function index()
    {
        return response()->json([
            'movies' => $this->movies,
            'message'=> 'list of movies',
        ], 200);
    }

    public function show($id)
    {
        return $this->movies[$id];
    }

    public function store() 
    {
        $this->movies[] = [
            'title'    => request('title'),
            'year'     => request('year'),
            'genre'    => request('genre')
        ];

        return $this->movies;
    }

    public function update(Request $request, $id) 
    {
        // $this->movies[$id]['title'] = request('title');
        // $this->movies[$id]['year'] = request('year');
        // $this->movies[$id]['genre'] = request('title');

        // return $this->movies[$id];

        return $request->all();
    }

    public function destroy($id) 
    {
        unset($this->movies[$id]);
        return $this->movies;
    }
}
