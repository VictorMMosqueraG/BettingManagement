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

        return response()->json($bet, 201);
    }

}
