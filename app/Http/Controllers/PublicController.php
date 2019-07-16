<?php

namespace App\Http\Controllers;

use App\Home;

class PublicController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $homes = Home::with('images')->get();
        return view('index')->with('homes', $homes);
    }

    public function show($title)
    {
        $home = Home::where('title', $title)->first();
        return view('show')->with('home', $home);
    }
}
