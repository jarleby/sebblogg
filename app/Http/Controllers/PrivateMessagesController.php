<?php

namespace App\Http\Controllers;

use App\Notifications\PrivateMessageReceived;
use App\User;
use Illuminate\Http\Request;
use App\PrivateMessage;

class PrivateMessagesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $messages = PrivateMessage::where('sender_id', auth()->id())->orWhere('receiver_id', auth()->id())->latest()->get();

        return view('messages.show', compact('messages'));
    }

    public function create(User $user)
    {
        $messages = PrivateMessage::where('sender_id', auth()->id())->where('receiver_id', $user->id)
            ->orWhere('sender_id', $user->id)->where('receiver_id', auth()->id())->get();

        return view('messages.create', [
            'user' => $user,
            'messages' => $messages
        ]);
    }

    public function store(Request $request)
    {
        if (request('receiver_id') == auth()->id()) {
            return back()->withErrors('You can\'t send messages to yourself');
        }
        $validated = $request->validate([
            'message' => ['required', 'min: 3'],
            'receiver_id' => 'required'
        ]);
        $validated['sender_id'] = auth()->id();

        PrivateMessage::create($validated);

        $user = User::where('id', request('receiver_id'))->firstOrFail();
        $validated['sender'] = auth()->user()->username;
        $user->notify(new PrivateMessageReceived($validated));

        return back();
    }
}
