<?php


namespace App\Http\Controllers;

use App\Models\Bet;
use App\Models\User;
use App\Models\SportsEvent;
use Illuminate\Http\Request;

class BetController extends Controller{

    //Create Bet
    public function store(Request $request){

        $request->validate([
            'user_id' => 'required|exists:users,id',
            'event_id' => 'required|exists:sports_events,id',
            'amount' => 'required|numeric|min:1',
            'odds' => 'required|numeric|min:1',
        ]);

        $user = User::findOrFail($request->user_id);

        if ($user->balance < $request->amount) {
            return response()->json(['error' => 'Saldo insuficiente'], 400);
        }

        $bet = Bet::create([
            'user_id' => $request->user_id,
            'event_id' => $request->event_id,
            'amount' => $request->amount,
            'odds' => $request->odds,
            'status' => 'pending',
        ]);

        $user->balance -= $request->amount;
        $user->save();

        session()->flash('success', 'Usuario creado correctamente.');

        sleep(2);//Simulate a delay

        return redirect()->route('welcome');
    }

    //List Bets
    public function index($user_id, Request $request){
        $query = Bet::where('user_id', $user_id);

        if ($request->has('status')) {
            $query->where('status', $request->status);
        }

        return response()->json($query->get());
    }

    //Update Bet Status
    public function updateStatus(Request $request, $id){
        $request->validate([
            'status' => 'required|in:won,lost',
        ]);

        $bet = Bet::findOrFail($id);
        $bet->status = $request->status;

        if ($request->status === 'won') {
            $user = User::findOrFail($bet->user_id);
            $winAmount = $bet->amount * $bet->odds;
            $user->balance += $winAmount;
            $user->save();
        }

        $bet->save();
        return response()->json($bet);
    }

    //NOTE: Methods by views
    public function create(){
        $users = User::all();

        $events = SportsEvent::all();

        return view('bets.create', compact('users', 'events'));//Load the view
    }

    public function indexShow($user_id){
        //get the user
        $user = User::findOrFail($user_id);

        $bets = Bet::join('sports_events', 'bets.event_id', '=', 'sports_events.id')
        ->where('bets.user_id', $user->id)
        ->select('bets.*', 'sports_events.name as event_name')
        ->get();

        //show the answers
        return view('bets.index', compact('user', 'bets'));
    }

    public function selectUser(){  //get all users to show in the select
        $users = User::all();

        return view('selectUser', compact('users'));
    }


}
