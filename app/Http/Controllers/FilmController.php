<?php

namespace App\Http\Controllers;

use App\Models\Dislike;
use App\Models\Favorite;
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
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use SimpleSoftwareIO\QrCode\BaconQrCodeGenerator;
use Exception;


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
            ->select('films.film_id','films.title', 'films.description', 'films.language', 'films.rating', 'films.running_time', 'films.publish_time', 'films.path', 'genres.name as type'
                ,DB::raw("(group_concat(roles.name SEPARATOR ', ')) as 'role_name'"))
            ->groupBy('films.film_id','films.title', 'films.description', 'films.language', 'films.rating', 'films.running_time', 'films.publish_time', 'films.path', 'genres.name')
            ->join('film_genre', 'film_genre.film_id', '=', 'films.film_id')
            ->join('role_has_film', 'role_has_film.film_id', '=', 'films.film_id')
            ->join('roles', 'role_has_film.role_id', '=', 'roles.role_id')
            ->join('genres', 'genres.genre_id', '=', 'film_genre.genre_id')
            ->where('films.rating', '>=', 4)
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
            ->select('films.film_id', 'films.title', 'films.description', 'films.language', 'films.rating', 'films.running_time', 'films.publish_time', 'films.path', 'genres.name as type'
                ,DB::raw("(group_concat(roles.name SEPARATOR ', ')) as 'role_name'"))
            ->groupBy('films.film_id', 'films.title', 'films.description', 'films.language', 'films.rating', 'films.running_time', 'films.publish_time', 'films.path', 'genres.name')
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
            ->select('films.film_id', 'films.title', 'films.description', 'films.language', 'films.rating', 'films.running_time', 'films.publish_time', 'films.path', 'genres.name as type'
                ,DB::raw("(group_concat(roles.name SEPARATOR ', ')) as 'role_name'"))
            ->groupBy('films.film_id', 'films.title', 'films.description', 'films.language', 'films.rating', 'films.running_time', 'films.publish_time', 'films.path', 'genres.name')
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



    public function review(Request $request){
        $user_id = $request->user_id;
        $film_id = $request->film_id;
        $title = $request->title;
        $film_review = $request->review;
        $rating = $request->rating;
        $review = new Review();
        $review->title = $title;
        $review->description = $film_review;
        $review->rating = $rating;
        $review->favorite = 0;
        $review->dislike = 0;
        $review->film_id = $film_id;
        $review->user_id = $user_id;
        $review->save();
        return json_encode(true);
    }


    public function popularReview(Request $request) {
        $film_id = $request->film_id;
        $record = DB::table('users')
            ->select('users.user_id', 'users.displayname', 'users.icon_path', 'reviews.review_id','reviews.title', 'reviews.description', 'reviews.rating', 'reviews.favorite', 'reviews.dislike', 'reviews.created_at', 'films.film_id')
            ->join('reviews', 'users.user_id', '=', 'reviews.user_id')
            ->join('films', 'films.film_id', '=' ,'reviews.film_id')
            ->where([
                ['reviews.favorite', '>=', 2],
                ['films.film_id', '=', $film_id],
                ])
            ->get();
        return json_encode($record);
    }

    public function latestReview(Request $request) {
        $film_id = $request->film_id;
        $record = DB::table('users')
            ->select('users.user_id', 'users.displayname', 'users.icon_path', 'reviews.review_id','reviews.title', 'reviews.description', 'reviews.rating', 'reviews.favorite', 'reviews.dislike', 'reviews.created_at', 'films.film_id')
            ->join('reviews', 'users.user_id', '=', 'reviews.user_id')
            ->join('films', 'films.film_id', '=' ,'reviews.film_id')
            ->orderBy('created_at', 'desc')
            ->where([
                ['films.film_id', '=', $film_id],
            ])
            ->get();
        return json_encode($record);
    }

    public function like(Request $request) {
        $record = Favorite::where([
            ['user_id', '=', $request->user_id],
            ['review_id', '=', $request->review_id]
        ])->first();
        $record2 = Dislike::where([
            ['user_id', '=', $request->user_id],
            ['review_id', '=', $request->review_id]
        ])->first();
        if ($record == null && $record2 == null) {
            $favorite = new Favorite();
            $favorite->user_id = $request->user_id;
            $favorite->review_id = $request->review_id;
            $favorite->save();
            Review::where('review_id', $request->review_id)
                ->increment('favorite');
            return json_encode(true);
        } elseif($record !== null && $record2 == null) {
            Favorite::where([
                ['user_id', '=', $request->user_id],
                ['review_id', '=', $request->review_id]
            ])->delete();
            Review::where('review_id', $request->review_id)
                ->decrement('favorite');
            return json_encode(false);
        }
    }

    public function dislike(Request $request) {
        $record = Dislike::where([
            ['user_id', '=', $request->user_id],
            ['review_id', '=', $request->review_id]
        ])->first();
        $record2 = Favorite::where([
            ['user_id', '=', $request->user_id],
            ['review_id', '=', $request->review_id]
        ])->first();
        if($record == null && $record2 == null) {
            $dislike = new Dislike();
            $dislike->review_id = $request->review_id;
            $dislike->user_id = $request->user_id;
            $dislike->save();
            Review::where('review_id', $request->review_id)
                ->increment('dislike');
            return json_encode(true);
        } elseif ($record !== null && $record2 == null) {
            Dislike::where([
                ['user_id', '=', $request->user_id],
                ['review_id', '=', $request->review_id]
            ])->delete();
            Review::where('review_id', $request->review_id)
                ->decrement('dislike');
            return json_encode(false);
        }
    }

    public function show(Request $request)
    {
        $film_id = $request->film_id;
        $record = DB::table('users')
            ->select('users.user_id', 'users.displayname', 'users.icon_path', 'reviews.review_id','reviews.title', 'reviews.description', 'reviews.rating', 'reviews.favorite', 'reviews.dislike', 'reviews.created_at', 'films.film_id')
            ->join('reviews', 'users.user_id', '=', 'reviews.user_id')
            ->join('films', 'films.film_id', '=' ,'reviews.film_id')
            ->orderBy('created_at', 'desc')
            ->where([
                ['films.film_id', '=', $film_id],
            ])
            ->get();
        return json_encode($record);
    }

    public function latestFilm()
    {
        $films = DB::table('films')
            ->orderBy('created_at', 'desc')
            ->take(6)
            ->get();
        return $films;
    }

    public function filmList($category = 1, $name = null)
    {
        if($name==null) {
            $record = DB::table('films')
                ->select('films.film_id', 'films.title', 'films.description', 'films.language', 'films.rating', 'films.running_time', 'films.publish_time', 'films.path', 'genres.name as type'
                    , DB::raw("(group_concat(roles.name SEPARATOR ', ')) as 'role_name'"))
                ->groupBy('films.film_id', 'films.title', 'films.description', 'films.language', 'films.rating', 'films.running_time', 'films.publish_time', 'films.path', 'genres.name')
                ->join('film_genre', 'film_genre.film_id', '=', 'films.film_id')
                ->join('role_has_film', 'role_has_film.film_id', '=', 'films.film_id')
                ->join('roles', 'role_has_film.role_id', '=', 'roles.role_id')
                ->join('genres', 'genres.genre_id', '=', 'film_genre.genre_id')
                ->where('film_genre.genre_id', '=', $category)
                ->get();
            return view('list')->with(['films' => $record]);
        }
        $record = DB::table('films')
            ->select('films.film_id', 'films.title', 'films.description', 'films.language', 'films.rating', 'films.running_time', 'films.publish_time', 'films.path', 'genres.name as type'
                , DB::raw("(group_concat(roles.name SEPARATOR ', ')) as 'role_name'"))
            ->groupBy('films.film_id', 'films.title', 'films.description', 'films.language', 'films.rating', 'films.running_time', 'films.publish_time', 'films.path', 'genres.name')
            ->join('film_genre', 'film_genre.film_id', '=', 'films.film_id')
            ->join('role_has_film', 'role_has_film.film_id', '=', 'films.film_id')
            ->join('roles', 'role_has_film.role_id', '=', 'roles.role_id')
            ->join('genres', 'genres.genre_id', '=', 'film_genre.genre_id')
            ->where([
                ['films.title', '=', $name],
                ['film_genre.genre_id', '=', $category]
            ])
            ->get();
        return view('list')->with(['films' => $record]);
    }

    public function updateFilm()
    {
        Film::where('title', request('title'))
            ->update([
                'title' => request('title'),
                'language' => request('language'),
                'rating' => intval(request('rating')),
                'running' => intval(request('running')),
                'description' => request('description')
            ]);
        return redirect()->route('list');
    }
}
