<?php

namespace App\Http\Controllers;

use App\Models\admin\Genre;
use Illuminate\Http\Request;

class GenreController extends Controller
{
    // direct category list page
    public function list() {
        $data = Genre::all();
        return view('admin.layouts.genre.list',compact('data'));
    }

    // create genre
    public function create(Request $request) {
        $data = [
            'name' => $request->genreName
        ];
        Genre::create($data);
        return redirect()->route('genre#list')->with(['createSuccess'=>'Successfully created...']);
    }

    // delete genre
    public function delete($id) {
        Genre::where('id', $id)->delete();
        return redirect()->route('genre#list')->with(['deleteSuccess'=>'Successfully deleted...']);
    }

    // edit genre page
    public function edit($id){
        $items = Genre::where('id', $id)->first();
        return view('admin.layouts.genre.edit', compact('items'));
    }

    // update genre
    public function update(Request $request) {
        // dd($request->all());
        $data = $this->requestGenreData($request);
        Genre::where('id', $request->genreId)->update($data);
        return redirect()->route('genre#list')->with(['updateSuccess'=>'Successfully updated...']);
    }

    // request genre data
    private function requestGenreData($request) {
        return [
            'name' => $request->genreName
        ];
    }
}
