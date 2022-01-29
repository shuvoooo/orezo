<?php

namespace App\Http\Controllers;

use App\Models\ContactRequest;
use App\Models\User;
use App\Notifications\GeneralNotification;
use App\Rules\Recaptcha;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Notification;

class ContactRequestController extends Controller
{
    public function store(Request $request)

    {

        $request->validate([
            'g-recaptcha-response' => ['required', new Recaptcha],
        ]);

        try {
            ContactRequest::create([
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'subject' => $request->subject,
                'message' => $request->message,
            ]);

            $admins = User::where('role', 'admin')->orWhere('role', 'staff')->get();



            Notification::send($admins, new GeneralNotification('Contact Request', 'New contact request has been received.'));


            if (filter_var($request->email, FILTER_VALIDATE_EMAIL)) {
                Mail::raw('Thank you for contacting us. We have received your email and we will get back to you soon.

Thanks ' . env('APP_NAME'), function ($message) use ($request) {
                    $message->to($request->email);
                    $message->subject('Thank you for contacting us');
                });
            }


            return "Thank You! Your message has been sent.";
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
}
