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

      /** @test */
    public function test_it_updates_bet_status(){
        $user = User::factory()->create(['balance' => 0]);
        $sportsEvent = SportsEvent::factory()->create();
        $bet = Bet::factory()->create([
            'user_id' => $user->id,
            'event_id' => $sportsEvent->id,
            'amount' => 100,
            'odds' => 2.5,
            'status' => 'pending',
        ]);

        $updatedStatusData = [
            'status' => 'won',
        ];

        $response = $this->putJson('/api/bets/' . $bet->id . '/status', $updatedStatusData);

        $response->assertStatus(200);
        $this->assertDatabaseHas('bets', array_merge(['id' => $bet->id], $updatedStatusData));

        // Verify that the user's balance has been updated
        $user->refresh();
        $this->assertEquals($user->balance, 100 * 2.5);
    }

    public function test_it_lists_bets(){
        $user = User::factory()->create();
        $sportsEvent = SportsEvent::factory()->create();
        $bets = Bet::factory()->count(3)->create([
            'user_id' => $user->id,
            'event_id' => $sportsEvent->id,
        ]);

        $response = $this->getJson('/api/bets/user/' . $user->id);

        $response->assertStatus(200)
                 ->assertJsonCount(3)
                 ->assertJsonFragment(['user_id' => $user->id]);
    }
}
