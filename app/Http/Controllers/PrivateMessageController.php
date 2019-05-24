<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\PrivateMessage;

class PrivateMessageController extends Controller
{
    public function create(User $user)
    {
        $messages = PrivateMessage::where('sender_id', auth()->id())->where('receiver_id', $user->id)->orWhere('sender_id', $user->id)->where('receiver_id', auth()->id())->get();
        return view('messages.create', [
            'user' => $user,
            'messages' => $messages
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'message' => ['required', 'min: 3'],
            'receiver_id' => 'required'
        ]);
        $validated['sender_id'] = auth()->id();

        PrivateMessage::create($validated);

        return back();
    }
}
