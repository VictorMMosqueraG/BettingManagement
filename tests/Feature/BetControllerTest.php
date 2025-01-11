<?php

namespace Tests\Feature;

use App\Models\Bet;
use App\Models\User;
use App\Models\SportsEvent;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class BetControllerTest extends TestCase{
    use RefreshDatabase;

    /** @test */

    public function test_it_creates_a_bet()
{
    $user = User::factory()->create();
    $sportsEvent = SportsEvent::factory()->create();


    $betData = [
        'user_id' => $user->id,
        'event_id' => $sportsEvent->id,
        'amount' => 100,
        'odds' => 2.5,
    ];


    $response = $this->postJson('/api/bets', $betData);

    $response->assertStatus(201);
    $this->assertDatabaseHas('bets', $betData);
}
}
