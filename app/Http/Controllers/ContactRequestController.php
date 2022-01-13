<?php

namespace App\Http\Controllers;

use App\Models\ContactRequest;
use App\Models\User;
use App\Notifications\GeneralNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;

class ContactRequestController extends Controller
{
    public function store(Request $request)
    {
        try {
            ContactRequest::create([
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'subject' => $request->subject,
                'message' => $request->message,
            ]);

            $admins = User::where('role', 'admin')->where('role', 'staff')->get();

            Notification::send($admins, new GeneralNotification('Contact Request', 'New contact request has been received.'));

            return "Thank You! Your message has been sent.";
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
}
