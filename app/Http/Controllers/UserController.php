<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Comment;
use App\Models\Payment;
use App\Models\admin\Genre;
use App\Models\admin\Movie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    //user home page
    public function userHome() {
        $movies = Movie::where('type', 'movie')->orderBy('created_at','desc')->take(8)->get();
        $series = Movie::where('type', 'series')->orderBy('created_at','desc')->take(8)->get();
        $cartoons = Movie::where('type', 'cartoon')->orderBy('created_at','desc')->take(8)->get();
        // dd($movies);
        return view('user.layouts.home',compact('movies','series','cartoons'));
    }

    // admin dashboard
    public function adminHome() {
        $users = User::all();
        $premiumUsers = User::where('type', 'premium')->get();
        $movies = Movie::all();
        // dd($users->count());
        return view('admin.layouts.home', compact('users','premiumUsers','movies'));
    }

    // direct user list page
    public function list() {
        $users = User::all();
        return view('admin.layouts.user.list', compact('users'));
    }

    // direct all movies page
    public function all() {
        $movies = Movie::select('movies.*', 'genres.name as genre_name')
                    ->when(request('key'), function($query){
                        $query->orWhere('movies.name','like','%'.request('key').'%')
                            ->orWhere('movies.director','like','%' . request('key') . '%')
                            ->orWhere('genres.name','like','%' . request('key') . '%')
                            ->orWhere('movies.release_year','like','%'.request('key').'%');
                    })
                    ->leftJoin('genres', 'movies.genre_id', 'genres.id')
                    ->orderBy('movies.created_at', 'desc')
                    ->get();
        if($movies == null){
            $null = true;
        }else{
            $null = false;
        }

        return view('user.layouts.all', compact('movies', 'null'));
    }

    // direct cartoon page
    public function cartoon() {
        $movies = Movie::select('movies.*', 'genres.name as genre_name')
                    ->where('type','cartoon')
                    ->leftJoin('genres', 'movies.genre_id', 'genres.id')
                    ->orderBy('movies.created_at', 'desc')
                    ->get();
        return view('user.layouts.cartoon', compact('movies'));
    }

    // direct movie page
    public function movie() {
        $movies = Movie::select('movies.*', 'genres.name as genre_name')
                    ->where('type','movie')
                    ->leftJoin('genres', 'movies.genre_id', 'genres.id')
                    ->orderBy('movies.created_at', 'desc')
                    ->get();
        return view('user.layouts.movie', compact('movies'));
    }

    // direct series page
    public function series() {
        $movies = Movie::select('movies.*', 'genres.name as genre_name')
                    ->where('type','series')
                    ->leftJoin('genres', 'movies.genre_id', 'genres.id')
                    ->orderBy('movies.created_at', 'desc')
                    ->get();
        return view('user.layouts.series', compact('movies'));
    }

    // direct movie detail page
    public function movieDetail($id) {
        $movie = Movie::where('id', $id)->first();
        $genre = Genre::where('id', $movie->genre_id)->first();
        $genreName = $genre->name;
        // dd($movie);
        $comments = Comment::select('comments.*', 'users.name as user_name', 'users.image as user_image')
                        ->where('movie_id', $id)
                        ->leftJoin('users', 'comments.user_id', 'users.id')
                        ->orderBy('comments.created_at', 'desc')
                        ->get();
        // dd($comments);
        return view('user.layouts.movieDetail', compact('movie','genreName', 'comments'))->with(['otherCss'=>'for other']);
    }

    // direct user profile page
    public function profile() {
        $user = Auth::user();
        // dd($user->name);
        return view('user.layouts.profile', compact('user'));
    }

    // direct payment page
    public function paymentPage() {
        return view('user.layouts.payment');
    }

    // update user profile
    public function updateProfile(Request $request) {
        // dd($request->all());
        $data = $this->getUserData($request);
        $this->updateProfileValidationCheck($request);
        // dd($data);
        if($request->hasFile('image')) {
            // old image name
            $oldImage = User::where('id', $request->id)->first();
            $oldImage = $oldImage->image;

            if($oldImage != null) {
                Storage::delete('public/images/user/' . $oldImage);
            }

            $newImage = uniqid() . $request->file('image')->getClientOriginalName();
            // dd($newImage);
            $request->file('image')->storeAs('public/images/user',$newImage);
            $data['image'] = $newImage;
        }

        User::where('id', $request->id)->update($data);
        return redirect()->route('user#profile')->with(['updateSuccess' => 'Successfully updataed...']);
    }

    // change password
    public function changePassword(Request $request) {
        $this->passwordValidationCheck($request);
        $userId = Auth::user()->id;
        $user = User::select('password')->where('id', $userId)->first();
        $dbHashValue = $user->password;
        // dd($dbHashValue);
        // dd(Hash::check($request->oldPassword, $dbHashValue));
        if(Hash::check($request->oldPassword, $dbHashValue)){
            User::where('id', $userId)->update([
                'password' => Hash::make($request->newPassword)
            ]);

            return back()->with(['changeSuccess' => 'Password Change Success...']);
        }
        return back()->with(['notMatch' => 'The old password does not match. Try again!']);
    }

    // user payment
    public function payment(Request $request) {
        $data = $this->getPyamentData($request);
        $data['user_id'] = Auth::user()->id;
        if($request->hasFile('ss')){
            $image = uniqid() . $request->file('ss')->getClientOriginalName();
            $request->file('ss')->storeAs('public/images/payment',$image);
            $data['screen_shot'] = $image;
        }
        // dd($data);
        Payment::create($data);
        $user['type'] = 'pending';
        User::where('id', Auth::user()->id)->update($user);
        return redirect()->route('user#profile')->with(['pending'=>'You are in the pending stage.']);
    }

    // promote user to admin
    public function promote(Request $request) {
        $role['role'] = 'admin';
        User::where('id', $request->id)->update($role);
        return back()->with(['userRoleChangeSuccess' => 'Role Changed...']);
    }

    // demote admin to user
    public function demote(Request $request) {
        $role['role'] = 'user';
        User::where('id', $request->id)->update($role);
        return back()->with(['userRoleChangeSuccess' => 'Role Changed...']);
    }

    // check payment page
    public function checkPayment($id){
        $data = Payment::where('user_id', $id)->first();
        // dd($data);
        return view('admin.layouts.user.checkPayment',compact('data'));
    }

    // accept payment
    public function accept(Request $request) {
        $role['type'] = 'premium';
        User::where('id', $request->userId)->update($role);
        return redirect()->route('user#list');
    }

    // reject payment
    public function reject(Request $request) {
        $role['type'] = 'free';
        User::where('id', $request->userId)->update($role);
        return redirect()->route('user#list');
    }

    // post comment
    public function postComment(Request $request) {
        $data = $this->getComment($request);
        $data['user_id'] = Auth::user()->id;
        Comment::create($data);
        return back()->with(['postComment' => 'Posted ...']);
    }

    // get comments
    private function getComment($request) {
        return [
            'comment' => $request->comment,
            'movie_id' => $request
        ];
    }

    // update profile validation check
    private function updateProfileValidationCheck($request) {
        Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required',
            'address' => 'required',
            'phone' => 'required',
            'gender' => 'required',
            'image' => 'mimes:png,jpg,webp,jpeg,svg|file'
        ])->validate();
    }

    // get payment data
    private function getPyamentData($request) {
        return [
            'user_name' => $request->name,
            'transaction_id' => $request->transId
        ];
    }

    // request user data
    private function getUserData($request) {
        return [
            'name' => $request->name ,
            'email' => $request->email,
            'address' => $request->address,
            'phone' => $request->phone,
            'gender' => $request->gender
        ];
    }

    // password validation check
    private function passwordValidationCheck($request) {
        Validator::make($request->all(), [
            'oldPassword' => 'required|min:6|max:18',
            'newPassword' => 'required|min:8|max:18',
            'confirmPassword' => 'required|min:8|max:18'
        ])->validate();
    }
}
