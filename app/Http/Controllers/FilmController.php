<?php

namespace App\Http\Controllers;

use App\Models\Role;
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
       //$film = Film::where('rating','>=',8)->get();
        $record = DB::table('films')
            ->select('films.title', 'films.description', 'films.language', 'films.rating', 'films.running_time', 'films.publish_time', 'films.path', 'genres.name as type'
                ,DB::raw("(group_concat(roles.name SEPARATOR ', ')) as 'role_name'"))
            ->groupBy('films.title', 'films.description', 'films.language', 'films.rating', 'films.running_time', 'films.publish_time', 'films.path', 'genres.name')
            ->join('film_genre', 'film_genre.film_id', '=', 'films.film_id')
            ->join('role_has_film', 'role_has_film.film_id', '=', 'films.film_id')
            ->join('roles', 'role_has_film.role_id', '=', 'roles.role_id')
            ->join('genres', 'genres.genre_id', '=', 'film_genre.genre_id')
            ->where('films.rating', '>=', 8)
            ->get();
       return json_encode($record);
    }

    public function showFilm(Request $request)
    {
        $film = Film::all();
        return json_encode($film);
    }


    public function specificFilms(Request $request)
    {
        //$record = DB::table('film_genre')->join('films', 'film_genre.film_id', '=', 'films.film_id')->where('genre_id', '=', $request->category)->get();
        $record = DB::table('films')
            ->select('films.title', 'films.description', 'films.language', 'films.rating', 'films.running_time', 'films.publish_time', 'films.path', 'genres.name as type'
                ,DB::raw("(group_concat(roles.name SEPARATOR ', ')) as 'role_name'"))
            ->groupBy('films.title', 'films.description', 'films.language', 'films.rating', 'films.running_time', 'films.publish_time', 'films.path', 'genres.name')
            ->join('film_genre', 'film_genre.film_id', '=', 'films.film_id')
            ->join('role_has_film', 'role_has_film.film_id', '=', 'films.film_id')
            ->join('roles', 'role_has_film.role_id', '=', 'roles.role_id')
            ->join('genres', 'genres.genre_id', '=', 'film_genre.genre_id')
            ->where('film_genre.genre_id', '=', $request->category)
            ->get();
        return json_encode($record);
    }

    public function search(Request $request)
    {
        $filmName = $request->keyword;
        $condition = ['films.title'=> $filmName];
        $record = DB::table('films')
            ->select('films.title', 'films.description', 'films.language', 'films.rating', 'films.running_time', 'films.publish_time', 'films.path', 'genres.name as type'
                ,DB::raw("(group_concat(roles.name SEPARATOR ', ')) as 'role_name'"))
            ->groupBy('films.title', 'films.description', 'films.language', 'films.rating', 'films.running_time', 'films.publish_time', 'films.path', 'genres.name')
            ->join('film_genre', 'film_genre.film_id', '=', 'films.film_id')
            ->join('role_has_film', 'role_has_film.film_id', '=', 'films.film_id')
            ->join('roles', 'role_has_film.role_id', '=', 'roles.role_id')
            ->join('genres', 'genres.genre_id', '=', 'film_genre.genre_id')
            ->where($condition)
            ->get();
        if(count($record)>0)
            return json_encode($record);
        return json_encode(false);
    }


    public function show()
    {
//        $record = DB::table('films')
//            ->select('films.title', 'films.description', 'films.language', 'films.rating', 'films.running_time', 'films.publish_time', 'films.path', 'genres.name as type'
//                ,DB::raw("(group_concat(roles.name SEPARATOR ', ')) as 'role_name'"))
//            ->groupBy('films.title', 'films.description', 'films.language', 'films.rating', 'films.running_time', 'films.publish_time', 'films.path', 'genres.name')
//            ->join('film_genre', 'film_genre.film_id', '=', 'films.film_id')
//            ->join('role_has_film', 'role_has_film.film_id', '=', 'films.film_id')
//            ->join('roles', 'role_has_film.role_id', '=', 'roles.role_id')
//            ->join('genres', 'genres.genre_id', '=', 'film_genre.genre_id')
//            ->where('film_genre.genre_id', '=', 1)
//            ->get();
        //return json_encode($record);
        $film = Film::where('title', '=','Testing2')->roles;
        return json_encode($film);

//        foreach ($film->roles() as $fi)
//            echo $fi->name . ' ' . $fi->type;



    }
}
