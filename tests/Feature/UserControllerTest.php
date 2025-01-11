<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UserControllerTest extends TestCase{
    use RefreshDatabase;

    /** @test */
    public function it_creates_a_user(){

        //MockData
        $data = [
            'name' => 'John Doe',
            'email' => 'johndoe@example.com',
            'balance' => 100.50
        ];

        //Send a POST request to the API
        $response = $this->postJson('/api/users', $data);

        //verify that the response has a 201 status code
        $response->assertStatus(201)
            ->assertJson([
                'name' => 'John Doe',
                'email' => 'johndoe@example.com',
                'balance' => 100.50
            ]);

        //verify that the user was created in the database
        $this->assertDatabaseHas('users', $data);
    }

    /** @test */
    public function it_updates_a_user(){

        // Create a user
        $user = User::factory()->create();

        // MockData for update
        $data = [
            'name' => 'Jane Doe',
            'email' => 'janedoe@example.com',
            'balance' => 200.75
        ];

        // Send a PUT request to the API
        $response = $this->putJson('/api/users/' . $user->id, $data);

        // Verify that the response has a 200 status code
        $response->assertStatus(200)
            ->assertJson([
                'id' => $user->id,
                'name' => 'Jane Doe',
                'email' => 'janedoe@example.com',
                'balance' => 200.75
            ]);

        // Verify that the user was updated in the database
        $this->assertDatabaseHas('users', $data);
    }
}
