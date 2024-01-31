<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Mail\ContactMail;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function index()
    {
        return view('Frontend.contact-us');
    }

    public function sendEmail(Request $request)
    {

        $name = $request->name;
        $email = $request->email;
        $telephone = $request->telephone;
        $message = $request->message;

        $result = Mail::to($request->email)->send((new ContactMail($name, $email, $telephone, $message))->from('heshikaushalya@gmail.com', 'Classic World'));

        if($result)
        {
            return 1;
        }
        else
        {
            return 0;
        }
    }
}
