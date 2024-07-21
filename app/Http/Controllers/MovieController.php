<?php

namespace App\Http\Controllers;

use App\Models\Favorite;
use App\Models\RecentView;
use App\Models\admin\Genre;
use App\Models\admin\Movie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class MovieController extends Controller
{
    // direct movie list page
    public function list() {
        $movies =   Movie::select('movies.*','genres.name as genre_name')
                    ->leftJoin('genres','movies.genre_id','genres.id')
                    ->get();
        return view('admin.layouts.movie.list', compact('movies'));
    }

    // movie create page
    public function createPage() {
        $genres = Genre::all();

        // $movies =   Movie::select('movies.*','genres.name as genre_name')
        //             ->leftJoin('genres','movies.genre_id','genres.id')
        //             ->get();
        return view('admin.layouts.movie.create', compact('genres'));
    }

    // create movie
    public function create(Request $request) {
        // dd($request->all());
        $data = $this->requestMovieInfo($request);
        $this->createMovieValidationCheck($request);
        $movieImage = uniqid() . $request->file('movieImage')->getClientOriginalName();
        $trailer = uniqid() . $request->file('trailer')->getClientOriginalName();
        $data['image'] = $movieImage;
        $data['trailer'] = $trailer;
        $request->file('movieImage')->storeAs('public/images/movies',$movieImage);
        $request->file('trailer')->storeAs('public/trailer',$trailer);

        Movie::create($data);
        return redirect()->route('movie#list')->with(['createSuccess' => 'Successfully Created...']);
    }

    // movie detail page
    public function detail($id) {
        $data = Movie::where('id', $id)->first();
        // dd($data->genre_id);
        $genre = Genre::select('name')->where('id', $data->genre_id)->first();
        // dd($genre->name);
        $data['genre_id'] = $genre->name;

        // dd($data);
        return view('admin.layouts.movie.detail', compact('data'));
    }

    // direct edit page
    public function edit($id) {
        $movies = Movie::where('id', $id)->first();
        $genres = Genre::get();
        return view('admin.layouts.movie.edit', compact('movies', 'genres'));
    }

    // movie update
    public function update(Request $request) {
        $data = $this->requestMovieInfo($request);
        $this->createMovieValidationCheck($request);
        $data['id'] = $request->movieId;
        if($request->hasFile('movieImage')) {
            $oldImage = Movie::where('id', $request->movieId)->first();
            $oldImage = $oldImage->image;
            if($oldImage != null) {
                Storage::delete('public/images/movies/'. $oldImage);
            }

            $newImage = uniqid().$request->file('movieImage')->getClientOriginalName();
            $request->file('movieImage')->storeAs('public/images/movies', $newImage);
            $data['image'] = $newImage;
        }
        if($request->hasFile('trailer')) {
            $oldTrailer = Movie::where('id', $request->movieId)->first();
            $oldTrailer = $oldTrailer->trailer;
            if($oldTrailer != null) {
                Storage::delete('public/trailer/' . $oldTrailer);
            }

            $newTrailer = uniqid().$request->file('trailer')->getClientOriginalName();
            // dd($newTrailer);
            $request->file('trailer')->storeAs('public/trailer', $newTrailer);
            $data['trailer'] = $newTrailer;
        }
        // dd($data);
        Movie::where('id', $request->movieId)->update($data);
        return redirect()->route('movie#detail',$request->movieId)->with(['updateSuccess' => "Successfully updated..."]);
    }

    // delete movie
    public function delete($id) {
        Movie::where('id', $id)->delete();
        return redirect()->route('movie#list')->with(['deleteSuccess'=>'Successfully deleted...']);
    }

    // favorite
    public function favorite(Request $request, Movie $movie)
    {
        $user = Auth::user();
        if (!$user->favorites()->where('movie_id', $movie->id)->exists()) {
            $user->favorites()->attach($movie->id);
        }

        return response()->json(['status' => 'favorited']);
    }

    // unfavorite
    public function unfavorite(Request $request, Movie $movie)
    {
        $user = Auth::user();
        if ($user->favorites()->where('movie_id', $movie->id)->exists()) {
            $user->favorites()->detach($movie->id);
        }

        return response()->json(['status' => 'unfavorited']);
    }

    // favorite list page
    public function favorites()
    {
        $user = Auth::user();
        $movies = $user->favorites()->get();

        return view('user.layouts.favorites', compact('movies'));
    }

    // add favorite
    public function addFavorite(Request $request) {
        $data = [
            'movie_id' => $request->movieId,
            'user_id' => Auth::user()->id
        ];
        Favorite::create($data);

        return back();
    }

    // delete from favorite
    public function deleteFavorite(Request $request) {
        $movieId = $request->movieId;
        Favorite::where('user_id', Auth::user()->id)->where('movie_id', $movieId)->delete();

        return back();
    }

    // movie creation validation check
    private function createMovieValidationCheck($request) {
        Validator::make($request->all(),[
            'movieName' => 'required',
            'genreId' => 'required',
            'type' => 'required',
            'releasedYear' => 'required',
            'director' => 'required',
            'rating' => 'required',
            'movieUrl' => 'required',
            'description' => 'required',
            'movieImage' => 'mimes:png,jpg,jpeg,webp,svg|file',
            'trailer' => 'mimes:mp4,avi,wmv,mov,flv,mkv,webm'
        ])->validate();
    }

    // request movie data
    private function requestMovieInfo($request) {
        return [
            'name' => $request->movieName,
            'release_year' => $request->releasedYear,
            'genre_id' => $request->genreId,
            'director' => $request->director,
            'description' => $request->description,
            'type' => $request->type,
            'movie_url' => $request->movieUrl,
            'rating' => $request->rating
        ];
    }
}
