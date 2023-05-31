<?php

namespace App\Models;
use Illuminate\Http\Request;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class addemail extends Model
{
    protected $table="viewemail";
    protected $guarded = [];

    use HasFactory;
}
