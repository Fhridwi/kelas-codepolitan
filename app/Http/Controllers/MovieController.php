<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMovieRequest;
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
                'image' => 'https://image.tmdb.org/t/p/w500/qJ2tW6WMUDux911r6m7haRef0WH.jpg'
            ],
            [
                'title' => 'Inception',
                'description' => 'A thief who steals corporate secrets through the use of dream-sharing technology is given the chance to have his criminal record erased.',
                'release_year' => '2010',
                'actors' => ['Leonardo DiCaprio', 'Joseph Gordon-Levitt', 'Ellen Page'],
                'category' => 'Action, Adventure, Sci-Fi',
                'image' => 'https://image.tmdb.org/t/p/w500/edv5CZvWj09upOsy2Y6IwDhK8bt.jpg'
            ],
            [
                'title' => 'Avengers: Endgame',
                'description' => 'The Avengers assemble once more to undo the damage caused by Thanos in the previous film.',
                'release_year' => '2019',
                'actors' => ['Robert Downey Jr.', 'Chris Evans', 'Mark Ruffalo'],
                'category' => 'Action, Adventure, Drama',
                'image' => 'https://image.tmdb.org/t/p/w500/or06FN3Dka5tukK1e9sl16pB3iy.jpg'
            ],
            [
                'title' => 'Parasite',
                'description' => 'A poor family schemes to become employed by a wealthy family, leading to unexpected consequences.',
                'release_year' => '2019',
                'actors' => ['Song Kang-ho', 'Lee Sun-kyun', 'Cho Yeo-jeong'],
                'category' => 'Comedy, Drama, Thriller',
                'image' => 'https://image.tmdb.org/t/p/w500/7IiTTgloJzvGI1TAYymCfbfl3vT.jpg'
            ],
            [
                'title' => 'The Matrix',
                'description' => 'A computer hacker learns from mysterious rebels about the true nature of his reality and his role in the war against its controllers.',
                'release_year' => '1999',
                'actors' => ['Keanu Reeves', 'Laurence Fishburne', 'Carrie-Anne Moss'],
                'category' => 'Action, Sci-Fi',
                'image' => 'https://image.tmdb.org/t/p/w500/f89U3ADr1oiB1s9GkdPOEpXUk5H.jpg'
            ],
            [
                'title' => 'Gladiator',
                'description' => 'A betrayed Roman general seeks revenge against the corrupt emperor who murdered his family and sent him into slavery.',
                'release_year' => '2000',
                'actors' => ['Russell Crowe', 'Joaquin Phoenix', 'Connie Nielsen'],
                'category' => 'Action, Drama, Adventure',
                'image' => 'https://image.tmdb.org/t/p/w500/ty8TGRuvJLPUmAR1H1nRIsgwvim.jpg'
            ],
            [
                'title' => 'Shrek',
                'description' => 'An ogre sets out to rescue a princess, with a donkey as his companion, to reclaim his swamp from the lord who banished him.',
                'release_year' => '2001',
                'actors' => ['Mike Myers', 'Eddie Murphy', 'Cameron Diaz'],
                'category' => 'Animation, Adventure, Comedy',
                'image' => 'https://image.tmdb.org/t/p/w500/iB64vpL3dIObOtMZgX3RqdVdQDc.jpg'
            ],
            [
                'title' => 'The Lion King',
                'description' => 'Lion prince Simba and his father are targeted by his bitter uncle, who wants to ascend the throne himself.',
                'release_year' => '1994',
                'actors' => ['Matthew Broderick', 'James Earl Jones', 'Jeremy Irons'],
                'category' => 'Animation, Adventure, Drama',
                'image' => 'https://image.tmdb.org/t/p/w500/sKCr78MXSLixwmZ8DyJLrpMsd15.jpg'
            ],
            [
                'title' => 'Forrest Gump',
                'description' => 'The presidencies of Kennedy and Johnson, the Vietnam War, the Watergate scandal, and other historical events unfold from the perspective of an Alabama man with an extraordinary life.',
                'release_year' => '1994',
                'actors' => ['Tom Hanks', 'Robin Wright', 'Gary Sinise'],
                'category' => 'Drama, Romance',
                'image' => 'https://image.tmdb.org/t/p/w500/h5J4W4veyxMXDMjeNxZI46TsHOb.jpg'
            ],
            [
                'title' => 'The Shawshank Redemption',
                'description' => 'Two imprisoned men bond over a number of years, finding solace and eventual redemption through acts of common decency.',
                'release_year' => '1994',
                'actors' => ['Tim Robbins', 'Morgan Freeman', 'Bob Gunton'],
                'category' => 'Drama',
                'image' => 'https://image.tmdb.org/t/p/w500/q6y0Go1tsGEsmtFryDOJo3dEmqu.jpg'
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

    public function create() {
        return view('movies.create');
    }

    public function show($id)
    {
        $movies = $this->movies[$id];

        return view('movies.show', ['movies' => $movies, 'movieId' => $id]);
    }

    public function store( StoreMovieRequest $request) 
    {

       

       $newMovie = [
            'title' => $request['title'],
            'description'   => $request['description'],
            'release_year'  => $request['release_year'],
            'actors' => explode(',', $request->actors),
            'category' => $request->category,
            'image'     => $request['image']
       ];   

       $this->movies[] = $newMovie;
        return $this->index();
    }

    public function edit($id) {
        $movie = $this->movies[$id];
        $movie['actors'] = implode(',', $movie['actors']);

        return view('movies.edit', ['movie' => $movie, 'movieId' => $id]);
    }

    public function update(Request $request, $id) 
    {
        $this->movies['id']['title'] = $request['title'];
        $this->movies['id']['description'] = $request['description'];
        $this->movies['id']['release_year'] = $request['release_year'];
        $this->movies['id']['actors'] = $request['actors'];
        $this->movies['id']['category'] = $request['category'];
        $this->movies['id']['image'] = $request['image'];

        return $this->show($id);
        
    }


    public function destroy($id) 
    {
        unset($this->movies[$id]);
        return $this->movies;
    }
}
