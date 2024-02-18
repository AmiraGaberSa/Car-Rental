<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use App\Mail\ContactMail;
use Illuminate\Support\Facades\Mail;


class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $contacts = Contact::get();
        $unreadMessages = Contact::where('read_at', 0)->get();
        return view('admin.messages',compact('contacts','unreadMessages'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $messages = $this->messages();
        $data = $request->validate([
            'firstName'=>'required|string|max:50',
            'lastName'=>'required|string|max:50',
            'email'=>'required|email',           
            'message' => 'required|string',      
            ], $messages);  //send messages array with data array
            
           Contact::create($data);
           Mail::to('amira@example.com')->send(new ContactMail($data)); //to class ContactMail
           return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $contact = Contact::findOrFail($id);
        $contact->update(['read_at' => 1]);
        return view('admin.showMessage', compact('contact'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Contact::where('id', $id)->delete();
        return redirect()->back();
    }

    public function messages(){
        return [
            'firstName.required' => 'The first name field is required.',
            'firstName.string' => 'The first name should be a string.',
            'firstName.max' => 'The first name may not be greater than 50 characters.',
            'lastName.required' => 'The last name field is required.',
            'lastName.string' => 'The last name should be a string.',
            'lastName.max' => 'The last name may not be greater than 50 characters.',
            'email.required' => 'The email field is required.',
            'email.email' => 'Please enter a valid email address.',
            'message.required' => 'The message field is required.',
            'message.string' => 'The message should be a string.'
        ];
    }

    
}
