<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Notifications\DatabaseNotification;
use Illuminate\Support\Facades\Auth;

class NotificationController extends Controller
{
    public function index()
    {
        $unreadNotifications = Auth::user()->unreadNotifications;
        $readNotifications = Auth::user()->readNotifications;

        return view('notifications.index', compact('unreadNotifications', 'readNotifications'));
    }

    public function read(DatabaseNotification $notification)
    {
        $notification->markAsRead();
        return redirect()->back();
    }
}

