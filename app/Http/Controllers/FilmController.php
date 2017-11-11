<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Film;
use App\Models\Account;
use App\Models\Review;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\File\UploadedFile;


class FilmController extends Controller
{
    //
    public function route()
    {
//        $review = new Review();
//        $review->title = 'Iron';
//        $review->description = 'SO good';
//        $review->rating = 10;
//        $review->save();
//        return "success";
        return view('upload');
    }


    public function store(Request $request)
    {

        if($request->hasFile('file')) {
            $fileName = date('Y-m-d-H-i-s');
            $fileSize = filesize($request->file);
            $extension = $request->file->getClientOriginalExtension();
            $path = 'storage/upload/'.$fileName.'.'.$extension;
            if($extension!=='png'&&$extension!=='jpeg')
                return "Only accept png/jpeg";
            $request->file->storeAs('public/', $fileName.'.'.$extension);
//            $film = new Film();
//            $film->title = $request->title;
//            $film->description = $request->description;
//            $film->language = $request->language;
//            $film->running_time = intval($request->run);
//            $date = $request->publish;
//            $timestamp = date('Y-m-d H:i:s',strtotime($date));
//            $film->publish_time = $timestamp;
//            $film->file_name = $fileName;
//            $film->path = $path;
//            $film->save();
            return 'Success';
        }
        return  $request->all();
    }


    public function show()
    {
        $url = Storage::url('2017-11-12-01-34-22.png');
       //$url =  Storage::disk('local')->url('2017-11-12-01-34-22.png');
        return "<img src='".$url."'/>";

    }
}
