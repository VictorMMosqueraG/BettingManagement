<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bet extends Model{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'event_id',
        'amount',
        'odds',
        'status'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function sportsEvent(){
        return $this->belongsTo(SportsEvent::class, 'event_id');
    }
}
