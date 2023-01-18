<?php

namespace App\Http\Controllers;

use App\Mail\movieNotificationMail;
use App\Models\Movie;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class MovieController extends Controller
{

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

    public function indexAdmin(Request $req)
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

        return view('admin.view', $data);
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

    public function adminMovieDetail($movie_id) {
        $movie = Movie::findOrFail($movie_id);
        $curr_user = auth()->user()->id;

        $data = [
            'movie' => $movie,
            'currUser' => $curr_user
        ];

        return view('admin.movie-detail', $data);
    }
    
    public function addMovie(Request $request)
    {

        $request->validate([
            'movieName' => 'required',
            'movieDuration' => 'required|numeric|min:20',
            'movieImage' => 'required',
            'movieImage.*' => 'file|mimes:jpg,png,jpeg',
            'movieBanner' => 'required',
            'movieViews' => 'required|numeric|min:1',
            'movieRating' => 'required|numeric|min:1|max:10',
            'movieSynopsis' => 'required|min:20|max:1000'
        ]);

        $file = $request->file('movieImage');
        $name = $file->getClientOriginalName();
        $filename = now()->timestamp.'_'.$name;

        $imageUrl = Storage::disk('public')->putFileAs('ListImage', $file, $filename);

        $movie = Movie::create([
            'title' => $request->movieName,
            'duration' => $request->movieDuration,
            'poster_url'=> $imageUrl,
            'banner_url' => $request->movieBanner,
            'viewCount' => $request->movieViews,
            'rating' => $request->movieRating,
            'synopsis' => $request->movieSynopsis
        ]);

        $user = User::where('role', 'user')->where('isBanned', '0')->get();
        foreach ($user as $u) {
            $to_email = $u->email;
            $data = array('name'=>$u->name, "movie" => $movie);
            Mail::send('mail', $data, function($message) use ($to_email) {
                $message->to($to_email)
                ->subject('Cinemov Newest Movie Has Arrived');
                $message->from(env('MAIL_FROM_ADDRESS'),env('MAIL_FROM_NAME'));
        });
        }
        return redirect()->route('admin.home');
    }


    public function updateMovieForm($id)
    {
        $movie = Movie::findorFail($id);
        return view('admin.update', compact('movie'));
    }

    public function updateMovieLogic(Request $request, $id)
    {

        $request->validate([
            'movieName' => 'required',
            'movieDuration' => 'required|numeric|min:20',
            'movieImage' => 'required',
            'movieImage.*' => 'file|mimes:jpg,png,jpeg',
            'movieBanner' => 'required',
            'movieViews' => 'required|numeric|min:1',
            'movieRating' => 'required|numeric|min:1|max:10',
            'movieSynopsis' => 'required|min:20|max:1000'
        ]);

        $file = $request->file('movieImage');
        $name = $file->getClientOriginalName();
        $filename = now()->timestamp.'_'.$name;

        $imageUrl = Storage::disk('public')->putFileAs('ListImage', $file, $filename);

        Movie::findOrFail($id)->update([
            'title' => $request->movieName,
            'duration' => $request->movieDuration,
            'poster_url'=> $imageUrl,
            'banner_url' => $request->movieBanner,
            'viewCount' => $request->movieViews,
            'rating' => $request->movieRating,
            'synopsis' => $request->movieSynopsis
        ]);

        return redirect()->route('admin.view');
    }

    public function deleteMovie($id)
    {
        // Movie::destroy($id);
        $movies = Movie::findOrFail($id);
        $movies->delete();

        return redirect()->route('admin.view');
        
    }
}
