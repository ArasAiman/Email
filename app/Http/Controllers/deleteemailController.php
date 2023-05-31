<?php

namespace App\Http\Controllers;

use App\Models\viewEmail;
use Illuminate\Http\Request;

class deleteemailController extends Controller
{
    public function destroy($id)
    {
        // Find the email record by ID
        $email = viewEmail::findOrFail($id);

        // Delete the email record
        $email->delete();

        // Redirect back to the view email page
        return redirect('viewEmail')->with('success', 'Email deleted successfully');
    }
}
