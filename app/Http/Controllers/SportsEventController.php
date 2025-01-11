<?php

namespace App\Http\Controllers;

use App\Models\SportsEvent;
use Illuminate\Http\Request;

class SportsEventController extends Controller{

    //NOTE: Create new event
    public function store(Request $request){
        $request->validate([
            'name' => 'required|string|max:255',
            'event_date' => 'required|date',
            'sport_type' => 'required|string|max:100',
        ]);

        $event = SportsEvent::create([
            'name' => $request->name,
            'event_date' => $request->event_date,
            'sport_type' => $request->sport_type,
        ]);

        session()->flash('success', 'Evento creado correctamente.');

        sleep(2);//Simulate a delay

        return redirect()->route('welcome');
    }


    //NOTE: Get all events with bets
    public function index(){
        $events = SportsEvent::withCount('bets')->get();
        return response()->json($events);
    }


    //NOTE: method by view
    public function create(){
        return view('sportsevents.create'); //view show form to create new event
    }


    public function indexView(){
        //get all events with bets
        $events = SportsEvent::withCount('bets')->get();

        //show view with events
        return view('sportsevents.index', compact('events'));
    }

}
