<?php

namespace Republicas\Http\Controllers;

use Illuminate\Http\Request;
use Republicas\Models\Notification;
use Republicas\Models\Republic;
use Republicas\Models\User;

use Republicas\Http\Requests;
use Republicas\Http\Controllers\Controller;

class NotificationController extends Controller
{
    public function accept($notificationId)
    {
        $notification = Notification::findOrFail($notificationId);
        $republic = Republic::findOrFail($notification->republic_id);

        $user = User::findOrFail($notification->user_id);

        $republic->users()->attach($notification->user_id);
        $republic->save();

        $user->attachRole(3);
        $notification->delete();

        return redirect()->route('home');
    }

    public function deny($notificationId)
    {
        $notification = Notification::findOrFail(notificationId);
        $notification->delete();

        return redirect()->route('home');
    }
}
