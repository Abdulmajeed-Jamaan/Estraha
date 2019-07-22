<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Home;
use Illuminate\Support\Facades\Auth;

class OwnerController extends Controller
{

    public function my_homes()
    {
        $homes = Home::where('user_id', Auth::user()->id)->get();
        return view('owner.myhomes')->with('homes', $homes);
    }
}