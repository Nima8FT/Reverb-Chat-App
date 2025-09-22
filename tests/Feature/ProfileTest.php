<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ProfileTest extends TestCase
{
    use RefreshDatabase;

    public function test_user_can_view_profile(): void
    {
        $user = User::factory()->create();
        $this->actingAs($user);
        $response = $this->get(route('profile'));
        $response->assertStatus(200);
    }

    public function test_user_cannot_view_profile(): void
    {
        $response = $this->get(route('profile'));
        $response->assertRedirect(route('login'));
    }

    public function test_user_can_view_list_of_users(): void {
        $user = User::factory()->create();
        $otherUsers = User::factory(3)->create();
        $this->actingAs($user);
        $response = $this->get(route('profile'));
        $response->assertStatus(200);

        foreach ($otherUsers as $otherUser) {
            $response->assertSeeText($otherUser->name);
            $response->assertSeeText($otherUser->email);
        }
    }

    public function test_user_cannot_view_list_of_users(): void {
        $response = $this->get(route('profile'));
        $response->assertRedirect(route('login'));
    }
}
