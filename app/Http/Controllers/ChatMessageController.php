<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreChatMessageRequest;
use App\Http\Requests\UpdateChatMessageRequest;
use App\Models\ChatMessage;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChatMessageController extends Controller
{
    public function sendMessage(Request $request, User $friend)
    {
        $user = Auth::user();
        $data = [
            'sender_id' => $user->id,
            'receiver_id' => $friend->id,
            'message' => $request->input('message'),
        ];
        $chatMessage = ChatMessage::create($data);
        return redirect()->route('show.message', [$friend]);
    }

    public function showMessage(User $friend)
    {
        $user = Auth::user();
        $messages = ChatMessage::query()
            ->where(function ($query) use ($friend, $user) {
                $query->where('sender_id', $user->id)
                    ->where('receiver_id', $friend->id);
            })
            ->orWhere(function ($query) use ($friend, $user) {
                $query->where('sender_id', $friend->id)
                    ->where('receiver_id', $user->id);
            })
            ->with(['sender', 'receiver'])
            ->orderBy('id', 'asc')
            ->get();

        return view('chat', compact(['friend','messages','user']));
    }
}
