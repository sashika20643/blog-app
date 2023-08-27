<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;

class ContactController extends Controller
{
    public function contactstore(Request $request){
        $request->validate([
            'name' => 'required|',
            'content' => 'required|',
            'email' => 'required|',
            'subject' => 'required|'
        ]);

        Contact::create([
            'name' => $request->name,
            'content' => $request->content,
            'email' => $request->email,
            'subject' => $request->name,
        ]);

        return redirect()->back();

    }
}
