<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Home;
use App\City;
use App\Place;
use App\Image;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $homes = Home::with('images')->get();
        return view('public.index')->with('homes', $homes);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cities = City::All();
        return view('home.create')->with(['cities' => $cities]);
    }

    public function get_places($city_id)
    {
        return Place::select('id', 'name', 'city_id')->where('city_id', $city_id)->get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        $request->validate([
            'title'         => 'required|min:5|max:50',
            'no_romes'      => 'required|numeric|min:1|max:20',
            'no_baths'      => 'required|numeric|min:1|max:20',
            'no_kitchen'    => 'required|numeric|min:1|max:5',
            'place_id'      => 'required|numeric|exists:places,id',
            'area_width'    => 'required|numeric|min:1',
            'area_height'   => 'required|numeric|min:1',
            'area'          => 'required',
            'extra_pool'    => 'numeric|exists:extras,id',
            'extra_tv'      => 'numeric|exists:extras,id',
            'extra_home'    => 'numeric|exists:extras,id',
            'image'         => 'required|array|min:3',
            'image.*'       => 'file|image',
            'default_price' => 'required|numeric|min:1',
            'ramadan_price' => 'required|numeric|min:1',
            'hajj_price'    => 'required|numeric|min:1',


        ]);


        DB::transaction(function () use ($request) {


            $home = new Home($request->all());
            $home->user_id = auth()->user()->id;
            $home->save();

            if ($request->extra_tv) {
                $home->extras()->attach($request->extra_tv);
            }

            if ($request->extra_pool) {
                $home->extras()->attach($request->extra_pool);
            }

            if ($request->extra_home) {
                $home->extras()->attach($request->extra_home);
            }

            $home->save();

            $images = $request->file('image');
            foreach ($images as $img) {
                $image_path = $img->store('public/img');

                $file_name = explode('/', $image_path)[2];

                $image = new Image();
                $image->file_name = $file_name;
                $image->home_id = $home->id;
                $image->save();
            }
        });
        $request->session()->flash('success-added', 'تم اضافة المسكن بنجاح');


        return 1;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $home = Home::where('id', $id)->with('images', 'extras')->first();
        return view('public.show')->with('home', $home);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('home\edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Home::find($id)->delete();
        Session::flash('success-removed', 'تم حذف المسكن بنجاح');

        return redirect(route('owner-myhomes'));
    }
}