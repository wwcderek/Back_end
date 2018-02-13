<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Film;
use App\Models\UserEvent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

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
        $time = strtotime(date($request->time));
        $event = new Event();
        $event->title = $request->title;
        $event->description = $request->description;
        $event->film_id = $request->filmId;
        $event->event_start_date = date($request->startDate.' '.$request->time);
        $event->save();
        $userEvent = new UserEvent();
        $userEvent->user_id = $request->user_id;
        $userEvent->event_id = $event->id;
        $userEvent->role = $request->role;
        $userEvent->save();
        return json_encode(true);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        //
        $record = DB::table('events')
            ->select('events.event_id', 'events.title AS eventTitle', 'events.description','events.quota', 'events.event_start_date', 'events.created_at', 'films.path', 'films.title AS filmTitle')
            ->join('films', 'films.film_id', '=' ,'events.film_id')
            ->orderBy('event_start_date', 'desc')
            ->get();
        if (count($record) > 0)
            return json_encode($record);
        return json_encode(false);
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

    public function getCreator(Request $request)
    {
        $record = DB::table('user_has_event')
            ->select('users.displayname', 'users.icon_path')
            ->join('users', 'user_has_event.user_id', '=' ,'users.user_id')
            ->where([
                ['user_has_event.event_id', '=', $request->event_id],
                ['user_has_event.role', '=', 'creator']
            ])
            ->first();
            return json_encode($record);
    }


    public function test()
    {
        $event = Event::where('event_id', '=', 6)->first();
        $time = strtotime($event->event_start_date);
        $date = array("time" => date('i:s', $time));
        $data = [
          'time' => $date,
          'date' => $event->event_start_date
        ];
        return $data;

//        return $event;
//        $date2 = date('Y-m-d H:i:s');
//        $date = date( '00:05:30');
//        $time = strtotime($date);
//        $date2 = date('i:s', $time);
//        return $date2;
//        $date3 = date('2018-01-01'.' '.'00:00:00');
//        return $date3;
    }


}
