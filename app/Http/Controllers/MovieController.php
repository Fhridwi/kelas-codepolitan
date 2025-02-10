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

    public function index()
    {
        return $this->movies;
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
            'genre'   => request('genre')
        ];

        return $this->movies;
    }

    // PUT DAN PATCH ATAU UPDATE DATA
}
