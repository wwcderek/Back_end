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
    const CREATOR = 'creator';
    const PARTICIPANT = 'participant';

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
        $userEvent->role = static::CREATOR;
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
            ->select('events.event_id', 'events.title AS eventTitle', 'events.description','events.quota', 'events.event_start_date', 'events.created_at', 'films.path', 'films.title AS filmTitle', 'films.running_time')
            ->join('films', 'films.film_id', '=' ,'events.film_id')
            ->orderBy('event_start_date', 'desc')
            ->get();
        if (count($record) > 0)
            return json_encode($record);
        return json_encode(false);
    }

    /**
     * @param Request $request
     * @return string
     */
    public function joinEvent(Request $request)
    {
        $result = Event::where('event_id', '=', $request->event_id)->first();
        if($result->quota<=0)
            return json_encode(false);
        Event::where('event_id', '=', $request->event_id)->decrement('quota',1);
        $userEvent = new UserEvent();
        $userEvent->user_id = $request->user_id;
        $userEvent->event_id = $request->event_id;
        $userEvent->role = static::PARTICIPANT;
        $userEvent->save();
        return json_encode(true);
    }

    /**
     * @param Request $request
     * @return string
     */
    public function leaveEvent(Request $request)
    {
        $result = UserEvent::where([
            ['user_id','=', $request->user_id],
            ['event_id','=', $request->event_id]
        ])->delete();
     return json_encode($result);
    }

    /**
     * @param Request $request
     * @return string
     */
   public function getStatus(Request $request) {
        $result = UserEvent::where([
            ['user_id','=', $request->user_id],
            ['event_id','=', $request->event_id]
        ])->first();

       if ($result !== null) {
           if($result->role==static::CREATOR) {
               return json_encode(0);
           } elseif($result->role==static::PARTICIPANT) {
               return json_encode(1)    ;
           }
       }
       return json_encode(2);
   }

    /**
     * @param Request $request
     * @return string
     */
    public function getDetail(Request $request)
    {
        $result = DB::table('user_has_event')
            ->select('users.displayname', 'users.icon_path')
            ->join('users', 'user_has_event.user_id', '=' ,'users.user_id')
            ->where([
                ['user_has_event.event_id', '=', $request->event_id],
                ['user_has_event.role', '=', 'creator']
            ])
            ->first();

        //Time processing
        $event = Event::where('event_id', '=', $request->event_id)->first();
        $date = strtotime($event->event_start_date);
        $time = date('H:i A', $date);
        $eventDate = date('j F', $date);
        $weekDay = date('l', $date);

        $data = [
            'time' => $time,
            'eventDate' => $eventDate,
            'weekDay' => $weekDay,
            'creator' => $result->displayname,
            'icon_path' => $result->icon_path
        ];

        return json_encode($data);
    }

    public function test()
    {
        $event = Event::where('event_id', '=', 6)->first();
        $date = strtotime($event->event_start_date);
        $time = date('H:i A', $date);
        $eventDate = date('j F', $date);
        $weekDay = date('l', $date);
        $data = [
          'time' => $time,
          'date' => $eventDate,
            'weekDay' => $weekDay
        ];
        return $data;
    }


}
