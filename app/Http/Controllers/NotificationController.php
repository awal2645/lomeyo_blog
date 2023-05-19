<?php

namespace App\Http\Controllers;

use App\Mail\NewsletterEmail;
use Illuminate\Http\Request;

use Mail;

class NotificationController extends Controller
{
    public function example1(Request $request)
    {
        $validatedData = $request->validate([
           
            'email' => 'required|'
        ]);
        $email = $request->email;
        $article = [
            'title' => 'Lomeyo News Letter ',
            'description' => 'Innovative solutions for
              simpler and more efficient life',
        ];
        Mail::to($email)->send(new NewsletterEmail($article));
        return redirect()->route('home.index');
    }

    // public function example2()
    // {
    //     $email = 'akashmjp@gmail.com';
    //     $article = [
    //         'title' => 'Lorem Ipsum',
    //         'description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.'
    //     ];
    //     Mail::send('emails.newsletter', ['article' => $article], function ($message) use ($email) {
    //         $message->to($email)->subject('Weekly Newsletter');
    //     });
    //     die('Email Sent. - Example2');
    // }

    // public function example3()
    // {
    //     $email = 'akashmjp@gmail.com';
    //     $text = 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.';
    //     Mail::raw($text, function ($message) use ($email) {
    //         $message->to($email)->subject('Weekly Newsletter');
    //     });
    //     die('Email Sent. - Example3');
    // }
}