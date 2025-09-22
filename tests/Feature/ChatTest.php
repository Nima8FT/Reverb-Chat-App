<?php

namespace Tests\Feature;

use App\Models\ChatMessage;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ChatTest extends TestCase
{
    use RefreshDatabase;

    public function test_get_list_of_chats()
    {
        $user = User::factory()->create();
        $friend = User::factory()->create();

        ChatMessage::create([
            'sender_id' => $friend->id,
            'receiver_id' => $user->id,
            'message' => 'Hello from friend',
        ]);

        $this->actingAs($user);

        $response = $this->get(route('show.message', [$friend->id]));

        $response->assertStatus(200);
        $response->assertSee('Hello from friend');

        $this->assertDatabaseHas('chat_messages', [
            'sender_id' => $friend->id,
            'receiver_id' => $user->id,
            'message' => 'Hello from friend',
        ]);
    }

    public function test_get_not_list_of_chats()
    {
        $response = $this->get(route('show.message', ['fake-id']));
        $response->assertRedirect(route('login'));
    }

    public function test_user_can_send_a_message(): void
    {
        $user = User::factory()->create();
        $friend = User::factory()->create();
        $this->actingAs($user);

        $response = $this->post(route('send.message', ['friend' => $friend->id]), [
            'message' => 'Hello from friend',
        ]);

        $response->assertStatus(302);

        $this->assertDatabaseHas('chat_messages', [
            'sender_id' => $user->id,
            'receiver_id' => $friend->id,
            'message' => 'Hello from friend',
        ]);
    }

    public function test_user_cannot_send_a_message(): void
    {
        $response = $this->get(route('show.message', 'fake-id'));
        $response->assertRedirect(route('login'));
    }
}
