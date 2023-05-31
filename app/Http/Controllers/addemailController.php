<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\addemail;

class addemailController extends Controller
{
    public function store(Request $request)
{
    // Validate the input data
    $validatedData = $request->validate([
        'email' => 'required',
    ]);

    // Create a new instance of the model and fill it with the input data
    $newData = new addemail();
    $newData->fill($validatedData);

    // Save the new data to the database
    $newData->save();

    // Optionally, you can return a response or redirect the user
    return redirect('/viewEmail')->with('success', 'Data added successfully!');
}



}
