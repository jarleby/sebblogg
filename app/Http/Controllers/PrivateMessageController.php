<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PrivateMessage;

class PrivateMessageController extends Controller
{
    public function create()
    {
        return view('messages.create');
    }
}
