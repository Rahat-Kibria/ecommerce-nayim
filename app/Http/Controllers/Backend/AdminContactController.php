<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Frontend\Contact;

class AdminContactController extends Controller
{
    public function AdminMessage()
    {
        $contact = Contact::all();
        return view('admin.contact.all_message', compact('contact'));
    }
}
