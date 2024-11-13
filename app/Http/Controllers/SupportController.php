<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SupportController extends Controller
{

    public function index()
    {
        return view('support.index');
    }
    public function create()
    {
        return view('support.create');
    }
}
