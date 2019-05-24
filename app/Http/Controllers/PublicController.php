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
        $homes = Home::all();
        return view('index')->with('homes', $homes);
    }
}
