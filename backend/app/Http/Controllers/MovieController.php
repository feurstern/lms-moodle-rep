<?php

namespace App\Http\Controllers;

use App\Http\Middleware\CheckRoleMiddleware;
use App\Http\Requests\StoreMovieRequest;
use App\Http\Requests\UpdateMovieRequest;
use App\Models\Director;
use App\Models\Genre;
use App\Models\Movie;
use Illuminate\Auth\Events\Failed;
use Illuminate\Http\Client\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;

class MovieController extends Controller implements HasMiddleware
{

    public static function  middleware()
    {
        return [new Middleware(CheckRoleMiddleware::class, except:["index"])];
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $movie = Movie::whereNull('deleted_at')->get();
        // $data = Movie::with("directors")->get();
        return view("movies.index", ["data" => $movie]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $genres = Genre::whereNull("deleted_at")->get();
        // dd($genres);
        $director = Director::whereNull("deleted_at")->get();

        return view('movies.create', [
            "genres" => $genres,
            "directors" => $director
        ]);
    }


    function handleRequest(Request $request){
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreMovieRequest $request)
    {

        $data = $request->all();
        // image path > is the request body that I passed to the backend
        $file = $request->file("image_path")->store("/", "public");

        $movie = new Movie();
        $movie->title = $data['title'];
        $movie->image_path = $data['image_path'];
        $movie->ratings = $data['ratings'];
        $movie->genre_id = $data['genre_id'];
        $movie->director_id = $data['director_id'];
        $movie->release_year = $data['release_year'];
        $movie->movie_length = $data['duration'];
        $movie->description = $data['description'];
        $save = $movie->save();

        return $save ? redirect(route("movie.index")) : response()->json(["messsage" => "failed to insert the dataa"]);
    }


    /**
     * Display the specified resource.
     */
    public function show(Movie $movie)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Movie $movie)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMovieRequest $request, Movie $movie)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Movie $movie)
    {
        //
    }
}
