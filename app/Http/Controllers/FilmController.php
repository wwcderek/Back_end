<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Film;
use Illuminate\Support\Facades\App;
use Symfony\Component\HttpFoundation\File\UploadedFile;


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
            $fileName = date('Y-m-d H-i-s');
            $fileSize = filesize($request->file);
            $extension = $request->file->getClientOriginalExtension();
            $path = 'storage/upload/'.$fileName.'.'.$extension;
            if($extension!=='png'&&$extension!=='jpeg')
                return "Only accept png/jpeg";
            $request->file->storeAs('public/upload', $fileName.'.'.$extension);
            $film = new Film();
            $film->file_name = $fileName;
            $film->path = $path;
            $film->save();
            return 'Success';
        }
        return  $request->all();
    }
}
