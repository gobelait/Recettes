<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
  function index() {
      return view('contact');
  }
    // Create Contact Form
    public function create() {
        return view('contact');
    }


    public function store(Request $request) {
    // Form validation
      $request->validate( [
          'name' => 'required',
          'email' => 'required|email',
          'message' => 'required'
      ]);

      //  Store data in database
//      Contact::create($request->all());

        $contact = new Contact($request->all());
        $contact->save();

      //
      return back()->with('success', 'Contact correctement enregistrer !');
  }
}
