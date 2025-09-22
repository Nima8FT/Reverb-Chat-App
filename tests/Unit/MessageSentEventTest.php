<?php

namespace Tests\Unit;

use App\Events\MessageSent;
use App\Models\ChatMessage;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Event;
use Tests\TestCase;

class MessageSentEventTest extends TestCase
{
    use RefreshDatabase;

    public function test_message_sent_event_is_dispatched()
    {
        Event::fake();

        $sender = User::factory()->create();
        $receiver = User::factory()->create();

        $message = ChatMessage::create([
            'sender_id' => $sender->id,
            'receiver_id' => $receiver->id,
            'message' => 'Hello World!',
        ]);

        broadcast(new MessageSent($message));

        Event::assertDispatched(MessageSent::class, function ($event) use ($message) {
            return $event->message->id === $message->id &&
                $event->message->message === 'Hello World!';
        });
    }
}
