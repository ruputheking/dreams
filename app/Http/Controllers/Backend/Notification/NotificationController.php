<?php

namespace App\Http\Controllers\Backend\Notification;

use Auth;
use App\Models\Notification;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class NotificationController extends Controller
{
    public function index()
    {
        $notifications = Notification::where('user_id', Auth::user()->id)->orderBy('id', 'desc')->get();
        return view('backend.notifications.notification-list', compact('notifications'));
    }

    public function show($id)
    {
        $notification = Notification::find($id);
        $notification->status = 1;
        $notification->update();
        return view('backend.notifications.notification-show', compact('notification'));
    }
}
