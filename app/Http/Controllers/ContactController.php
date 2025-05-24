<?php

namespace App\Http\Controllers;

use App\Mail\ContactMail;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function submit(Request $request)
    {
        $token = $request->input('recaptcha_token');

        $request->validate([
            'name' => 'required|min:4',
            'subject_mail' => 'required|min:4',
            'email' => 'required|email',
            'content' => 'required|min:4',
        ]);

        // Verify reCAPTCHA
        $response = Http::asForm()->post('https://www.google.com/recaptcha/api/siteverify', [
            'secret' => env('RECAPTCHA_SECRET_KEY'),
            'response' => $token,
            'remoteip' => $request->ip(),
        ]);

        $body = $response->json();

        if (!$body['success'] || $body['score'] < 0.5) {
            return back()->withErrors(['recaptcha' => 'reCAPTCHA verification failed.']);
        }

        // Send email
        Mail::to("contact@stacey-monet.co.uk")->send(new ContactMail(
            $request->name,
            $request->email,
            $request->subject_mail,
            $request->content
        ));

        return to_route('home')->with('message', 'Message sent successfully!');
    }
}