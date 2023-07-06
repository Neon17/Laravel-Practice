<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $contacts = new Contact;
        $contacts = $contacts->paginate(2);
        return view('contacts.index', compact('contacts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('contacts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'name'=>'required',
            'email'=>'required|email',
            'message'=>'required',
            'subject'=>'required',
        ]);
        $contact = new Contact;
        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->message = $request->message;
        $contact->subject = $request->subject;
        $contact->save();
        return redirect()->route('contacts.index');
    }

    /**
     * Display the specified resource.
     */
    public function show( $id)
    {
        //
        $contacts = new contact;
        $contacts = $contacts->get();
        $contacts = $contacts->where('id',$id)->first();
        return view('contacts.show',compact('contacts'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
        $contacts = new contact;
        $contacts = $contacts->get();
        $contacts = $contacts->where('id',$id)->first();
        //where id = id, first is as fetch_assoc()

        return view('contacts.edit',compact('contacts'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
        $contacts = new Contact;
        $contacts = $contacts->where('id',$id)->first();
        $contacts->name = $request->name;
        $contacts->email = $request->email;
        $contacts->subject = $request->subject;
        $contacts->message = $request->message;
        $contacts->update();
        return redirect()->route('contacts.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $contacts = new Contact;
        $contacts = $contacts->where('id',$id)->first();
        $contacts->delete();
        return redirect('contacts');
    }
}
