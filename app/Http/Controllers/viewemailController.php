<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\viewemail;
class viewemailController extends Controller
{
    function show(){
        $data=viewemail::all();
      return  view('viewEmail',['viewemail'=>$data]);
    }

}
