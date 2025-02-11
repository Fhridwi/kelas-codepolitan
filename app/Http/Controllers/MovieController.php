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
        $movies = $this->movies;

        return view('movies.index', compact('movies'))->with([
            'title' => 'List of Movies'
        ]);

    //    return view('movies.index', ['movies' => $movies]);
    //    return view('movies.index', compact('movies'));
    //    return view('movies.index')->with([
        //     'movies' => $movies,
        //     'title' => 'List of Movies'
        //
    //    ]);
    }

    public function show($id)
    {
        $movies = $this->movies[$id];

        return view('movies.show', ['movies' => $movies]);
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
