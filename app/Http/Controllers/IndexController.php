<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactFormRequest;
use App\Mail\ContactForm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class IndexController extends Controller
{
    public function showContactForm() {
        return view('contact.index');
    }

    public function contactFormProcess(ContactFormRequest $request) {
        Mail::to("")->send(new ContactForm($request->validated()));
        return redirect(route('contact'));
    }
}
