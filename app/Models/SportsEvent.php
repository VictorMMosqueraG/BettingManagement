<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SportsEvent extends Model{
    use HasFactory;

    protected $fillable = [
        'name',
        'event_date',
        'sport_type'
    ];

    public function bets(){
        return $this->hasMany(Bet::class);
    }
}
