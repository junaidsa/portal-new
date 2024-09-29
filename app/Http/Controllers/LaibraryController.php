<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LaibraryController extends Controller
{
    public function laibrary(){
        return view('laibrary.index');
    }
}
