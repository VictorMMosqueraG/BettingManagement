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

        return response()->json($event, 201);
    }


    //NOTE: Get all events with bets
    public function index(){
        $events = SportsEvent::withCount('bets')->get();
        return response()->json($events);
    }

}
