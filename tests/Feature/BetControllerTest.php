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
    public function it_creates_a_bet(){
        $user = User::factory()->create(['balance' => 100.00]);

        $event = SportsEvent::factory()->create();

        // Mock data for bet creation
        $data = [
            'user_id' => $user->id,
            'event_id' => $event->id,
            'amount' => 50.00,
            'odds' => 2.00
        ];

        $response = $this->post('/api/bets', $data);

        // Verify redirection to the 'welcome' route
        $response->assertStatus(302)
                 ->assertRedirect(route('welcome'));

        $response->assertSessionHas('success', 'Usuario creado correctamente.');

        $this->assertDatabaseHas('bets', [
            'user_id' => $user->id,
            'event_id' => $event->id,
            'amount' => 50.00,
            'odds' => 2.00,
            'status' => 'pending',
        ]);

        // Verify that the user's balance was decreased by the bet amount
        $user->refresh();
        $this->assertEquals(50.00, $user->balance);
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
