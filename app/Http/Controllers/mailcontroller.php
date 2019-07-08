<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\SendMail;
use Mail;


class mailcontroller extends Controller
{
    public function sendmail(Request $request){
        $request->validate([
            'person_name' => 'required',
            'email' => 'required',
            'phonenumber' => 'required',
            'msg' => 'required'
        ]);

        $data = array(
            'person_name' => $request->person_name,
            'person_email' => $request->email,
            'mesg' => $request->msg
        );

        Mail::to('tonykivai@gmail.com')->send(new Sendmail($data));

        return back()->with('msg','Thanks for contacting us');
    }
}
