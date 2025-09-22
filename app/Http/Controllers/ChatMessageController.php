<?php

namespace App\Http\Controllers;

use App\Models\ChatMessage;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChatMessageController extends Controller
{
    public $user;

    public function __construct() {
        $this->user = Auth::user();
    }
    public function sendMessage(Request $request, User $friend)
    {
        $data = [
            'sender_id' => $this->user->id,
            'receiver_id' => $friend->id,
            'message' => $request->input('message'),
        ];
        $chatMessage = ChatMessage::create($data);

        return redirect()->route('show.message', [$friend]);
    }

    public function showMessage(User $friend)
    {
        $user = $this->user;
        $messages = ChatMessage::query()
            ->where(function ($query) use ($friend, $user) {
                $query->where('sender_id', $user->id)
                    ->where('receiver_id', $friend->id);
            })
            ->orWhere(function ($query) use ($friend, $user) {
                $query->where('sender_id', $friend->id)
                    ->where('receiver_id', $user->id);
            })
            ->orderBy('id', 'asc')
            ->get();

        return view('chat', compact(['friend', 'messages', 'user']));
    }
}
