<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public $movies;
    
    public function index() 
    {
        $movies = $this->movies;

        return view('movies.index', compact('movies'))->with([
            'title' => 'List of Movies'
        ]);
    }
}
