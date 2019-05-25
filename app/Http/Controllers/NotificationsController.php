<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NotificationsController extends Controller
{
    public function update()
    {
        auth()->user()->notifications->markAsRead();

        return back();
    }
}
