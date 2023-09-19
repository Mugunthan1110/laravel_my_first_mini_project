<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\Contact;

class ContactController extends Controller
{
    public function index(){
        return view('contact');
    }

    public function store(Request $request){
       $data = $request->validate([
            'name'=>'required',
            'email'=>'required | email',
            'subject'=>'required',
            'message'=>'required'

        ]);
        Mail::to('jaffnamugunthan@gmail.com')->send(new Contact($data));

        return ridirect(route('contact.index'))->with('status', "Thankyou we'll be in touch with you soon");
    }
}
