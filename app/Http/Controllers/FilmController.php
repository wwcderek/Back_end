<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Film;
use App\Models\Account;
use App\Models\Review;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Storage;
use PhpParser\Node\Scalar\String_;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Illuminate\Support\Facades\DB;

class FilmController extends Controller
{
    //
    public function route()
    {
        return view('upload');
    }


    public function store(Request $request)
    {

        if($request->hasFile('file')) {
            $fileName = date('Y-m-d-H-i-s');
            $fileSize = filesize($request->file);
            $extension = $request->file->getClientOriginalExtension();
            $path = 'http://101.78.175.101:6780/storage/'.$fileName.'.'.$extension;
            if($extension!=='png'&&$extension!=='jpeg'&&$extension!=='jpg')
                return "Only accept png/jpeg/jpg";
            $request->file->storeAs('public/', $fileName.'.'.$extension);
            $film = new Film();
            $film->title = $request->title;
            $film->description = $request->description;
            $film->language = $request->language;
            $film->rating = 0;
            $film->running_time = intval($request->run);
            $date = $request->publish;
            $timestamp = date('Y-m-d',strtotime($date));
            $film->publish_time = $timestamp;
            $film->file_name = $fileName;
            $film->path = $path;
            $film->save();
            return 'Success';
        }
        return  $request->all();
    }


    public function mostPopular()
    {
       $film = Film::where('rating','>=',8)->get();
       return json_encode($film);
    }

    public function showFilm(Request $request)
    {
        $film = Film::all();
        return json_encode($film);
    }


    public function specificFilms(Request $request)
    {
        $record = DB::table('film_genre')->join('films', 'film_genre.film_id', '=', 'films.film_id')->where('genre_id', '=', $request->category)->get();
        return json_encode($record);
    }

    public function search(Request $request)
    {
        $filmName = $request->keyword;
        $record = Film::where('title', '=', $filmName)->get();
            return json_encode($record);
        return json_encode("false");
    }


    public function show()
    {
        $url =  Storage::url('2017-11-12-14-47-21.png');
        return "<img src='".$url."'/>";
    }
}
