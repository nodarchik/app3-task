<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;

class ListingController extends Controller
{
    // Show Listings
    public function listings(){
        return view('listings',[
           'listings'=>Listing::all()
        ]);
    }
    // Show Create Form
    public function create() {
        return view('create');
    }
    // Validate data
    public function store(Request $request){
        $formFields = $request->validate([
            'name'=>'required|min:5',
            'country'=>'required',
            'date'=>'required|date|date_format:Y-m-d|after:start_at|before:-18 years'
        ]);
        Listing::create($formFields);
        return redirect('/');
    }
}