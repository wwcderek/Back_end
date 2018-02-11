<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Film;
use App\Models\UserEvent;
use Illuminate\Http\Request;

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
        $event = new Event();
        $event->title = $request->title;
        $event->description = $request->description;
        $event->film_id = $request->filmId;
        $event->event_start_date = date($request->startDate.' '.'00:00:00');
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
            ->select('events.title', 'events.description','events.quota', 'events.event_start_date', 'films.path', 'films.title')
            ->join('films', 'films.film_id', '=' ,'events.film_id')
            ->orderBy('event_start_date', 'desc')
            ->where([
                ['films.film_id', '=', 'events.film_id'],
            ])
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


    public function test()
    {
        $event = Event::find(1)->film;
        return $event;
//        $date2 = date('Y-m-d H:i:s');
//        $date = date( '2018-01-01'.' '.'00:00:00');
//        $date3 = date('2018-01-01'.' '.'00:00:00');
//        return $date3;
    }


}
