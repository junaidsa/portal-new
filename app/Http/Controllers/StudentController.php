<?php

namespace App\Http\Controllers;

use App\Models\not;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    // public function create()
    public function create(){
        return view('student.create');
    }
    public function store(Request $request)
    {
        //
    }
}
