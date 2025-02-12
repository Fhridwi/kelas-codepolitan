<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MovieController extends Controller
{
    private $movies = [ ];

    public function __construct() 
    {
        $this->movies = [
            [
                'title' => 'The Dark Knight',
                'description' => 'Batman faces the Joker, a criminal mastermind who wants to plunge Gotham into anarchy.',
                'release_year' => '2008',
                'actors' => ['Christian Bale', 'Heath Ledger', 'Aaron Eckhart'],
                'category' => 'Action, Crime, Drama',
                'image' => 'https://upload.wikimedia.org/wikipedia/en/a/a7/Dark_Knight.jpg'
            ],
            [
                'title' => 'Inception',
                'description' => 'A thief who steals corporate secrets through the use of dream-sharing technology is given the chance to have his criminal record erased.',
                'release_year' => '2010',
                'actors' => ['Leonardo DiCaprio', 'Joseph Gordon-Levitt', 'Ellen Page'],
                'category' => 'Action, Adventure, Sci-Fi',
                'image' => 'https://upload.wikimedia.org/wikipedia/en/7/7f/Inception_ver3.jpg'
            ],
            [
                'title' => 'Avengers: Endgame',
                'description' => 'The Avengers assemble once more to undo the damage caused by Thanos in the previous film.',
                'release_year' => '2019',
                'actors' => ['Robert Downey Jr.', 'Chris Evans', 'Mark Ruffalo'],
                'category' => 'Action, Adventure, Drama',
                'image' => 'https://upload.wikimedia.org/wikipedia/en/0/0d/Avengers_Endgame_poster.jpg'
            ],
            [
                'title' => 'Parasite',
                'description' => 'A poor family schemes to become employed by a wealthy family, leading to unexpected consequences.',
                'release_year' => '2019',
                'actors' => ['Song Kang-ho', 'Lee Sun-kyun', 'Cho Yeo-jeong'],
                'category' => 'Comedy, Drama, Thriller',
                'image' => 'https://upload.wikimedia.org/wikipedia/en/5/53/Parasite_poster.jpg'
            ],
            [
                'title' => 'The Matrix',
                'description' => 'A computer hacker learns from mysterious rebels about the true nature of his reality and his role in the war against its controllers.',
                'release_year' => '1999',
                'actors' => ['Keanu Reeves', 'Laurence Fishburne', 'Carrie-Anne Moss'],
                'category' => 'Action, Sci-Fi',
                'image' => 'https://upload.wikimedia.org/wikipedia/en/c/c1/The_Matrix_Poster.jpg'
            ],
            [
                'title' => 'Gladiator',
                'description' => 'A betrayed Roman general seeks revenge against the corrupt emperor who murdered his family and sent him into slavery.',
                'release_year' => '2000',
                'actors' => ['Russell Crowe', 'Joaquin Phoenix', 'Connie Nielsen'],
                'category' => 'Action, Drama, Adventure',
                'image' => 'https://upload.wikimedia.org/wikipedia/en/8/8d/Gladiator_ver1.jpg'
            ],
            [
                'title' => 'Shrek',
                'description' => 'An ogre sets out to rescue a princess, with a donkey as his companion, to reclaim his swamp from the lord who banished him.',
                'release_year' => '2001',
                'actors' => ['Mike Myers', 'Eddie Murphy', 'Cameron Diaz'],
                'category' => 'Animation, Adventure, Comedy',
                'image' => 'https://upload.wikimedia.org/wikipedia/en/d/d6/Shrek_poster.jpg'
            ],
            [
                'title' => 'The Lion King',
                'description' => 'Lion prince Simba and his father are targeted by his bitter uncle, who wants to ascend the throne himself.',
                'release_year' => '1994',
                'actors' => ['Matthew Broderick', 'James Earl Jones', 'Jeremy Irons'],
                'category' => 'Animation, Adventure, Drama',
                'image' => 'https://upload.wikimedia.org/wikipedia/en/a/a7/The_Lion_King_1994_film_poster.jpg'
            ],
            [
                'title' => 'Forrest Gump',
                'description' => 'The presidencies of Kennedy and Johnson, the Vietnam War, the Watergate scandal, and other historical events unfold from the perspective of an Alabama man with an extraordinary life.',
                'release_year' => '1994',
                'actors' => ['Tom Hanks', 'Robin Wright', 'Gary Sinise'],
                'category' => 'Drama, Romance',
                'image' => 'https://upload.wikimedia.org/wikipedia/en/6/67/Forrest_Gump_poster.jpg'
            ],
            [
                'title' => 'The Shawshank Redemption',
                'description' => 'Two imprisoned men bond over a number of years, finding solace and eventual redemption through acts of common decency.',
                'release_year' => '1994',
                'actors' => ['Tim Robbins', 'Morgan Freeman', 'Bob Gunton'],
                'category' => 'Drama',
                'image' => 'https://upload.wikimedia.org/wikipedia/en/8/81/ShawshankRedemptionMoviePoster.jpg'
            ]
        ];
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
