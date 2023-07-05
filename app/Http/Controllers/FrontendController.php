<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function about() {
        return view('about');
    }
    public function create() {
        return view('create');
    }
}
