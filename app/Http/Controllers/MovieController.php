<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $req)
    {
        if($req->q == null){
            $movie = Movie::paginate(8);
            $showBanner = true;
        } else{
            $movie = Movie::where('title', 'like', '%'.$req->q.'%')->paginate(8);
            $showBanner = false;
        }
        $banner = Movie::latest()->take(3)->get();

        $data = [
            'movie' => $movie,
            'banner' => $banner,
            'showBanner' => $showBanner
        ];

        return view('user.home', $data);
    }

    public function movieDetail($movie_id) {
        $movie = Movie::findOrFail($movie_id);
        $curr_user = auth()->user()->id;

        $data = [
            'movie' => $movie,
            'currUser' => $curr_user
        ];

        return view('user.movie-detail', $data);
    }

    // public function search(Request $req)
    // {
    //     $movie = Movie::where('title', 'like', '%'.$req->q.'%')->paginate(8);

    //     $data = [
    //         'movie' => $movie,
    //         'showBanner' => false
    //     ];

    //     return view('user.home', $data);
    // }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }
}
