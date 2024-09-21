<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Branches;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    //
    public function register(){
        $branch = Branches::where('status',1)->get();
        return view('admin.register',compact('branch'));


    }
    public function index(){
              return view('admin.index');
    }
}
