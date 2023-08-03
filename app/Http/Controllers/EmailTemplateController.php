<?php

namespace App\Http\Controllers;
use App\Models\EmailTemplate;
use Illuminate\Http\Request;

class EmailTemplateController extends Controller
{
    public function create()
    {
        return view('template');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'templatename' => 'required|string|max:255',
            'email_template' => 'required|string',
        ]);

        EmailTemplate::create([
            'name' => $validatedData['templatename'],
            'content' => $validatedData['email_template'],
        ]);

        return view('template')->with('success', 'Template saved successfully.');
    }

}
