<?php

namespace App\Http\Controllers;

use App\Models\admin\Movie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{

    //welcome page
    public function welcome(){
        $movies = Movie::where('type', 'movie')->orderBy('created_at','desc')->take(8)->get();
        $series = Movie::where('type', 'series')->orderBy('created_at','desc')->take(8)->get();
        $cartoons = Movie::where('type', 'cartoon')->orderBy('created_at','desc')->take(8)->get();
        return view('welcome', compact('movies', 'series', 'cartoons'));
    }

    // login page
    public function loginPage() {
        return view('login');
    }

    // register page
    public function registerPage() {
        return view('register');
    }

    // direct dashboard
    public function dashboard(){

        if(empty(Auth::user())) {
            return redirect()->route('welcome');
        }
        if(Auth::user()->role == 'admin') {
            return redirect()->route('admin#dashboard');
        }
        return redirect()->route('user#home');
    }
}
