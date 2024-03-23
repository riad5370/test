<?php

namespace App\Http\Controllers;

use App\Mail\CustomerMail;
use App\Models\Widget;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class CustomerMailController extends Controller
{
    
    public function mailSent(Request $request){
        $data = [
            'name' => 'required',
            'email' => 'required|email',
            'country' => 'required',
            'message' => 'required',
        ];
        $validatedData = $request->validate($data);

        $widget = Widget::first();
        $email = $widget->email;


        // Send email using Laravel Mail
        Mail::to($email)->send(new CustomerMail($validatedData));
        return back()->with('message', 'Message sent successfully!');
    }
}
