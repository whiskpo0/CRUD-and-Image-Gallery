<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contact; 

class ContactController extends Controller
{
    public function create()
    {
        return view('contact.create'); 
    }

    public function store(Request $request)
    {
        Contact::create([
            'name' => $request->get('name'),
            'address' => $request->get('address'),
            'phone' => $request->get('phone')            
        ]); 

        return \redirect()->back(); 
    }
}
