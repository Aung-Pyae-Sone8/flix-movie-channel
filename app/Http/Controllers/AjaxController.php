<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AjaxController extends Controller
{
    // add favourate
    public function addFavourate(Request $request) {
        logger($request->all());
    }
}
