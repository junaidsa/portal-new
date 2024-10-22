<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\ContactApi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ApiController extends Controller
{
    //
    public function storeContact(Request $request){
        // store data to database
        try{
            $validator = Validator::make($request->all(),[
                'email' => 'required|email',
                'title' => 'required',
                'description' => 'required|string'
            ]);
            if($validator->fails()){
                return response()->json(['errors' => $validator->errors()], 422);
            }
            $data = [
                'author' => $request->email,
                'title' => $request->title,
              'description' => $request->description,
            ];
           $contactapi = ContactApi::create($data);
        } catch (\Exception $e) {
            return response()->json(['error' =>  $e->getMessage(),'line'=> $e->getLine(),'File'=> $e->getFile()], 500);
        }

        // return response
        return response()->json(['message' => 'Contact form submitted successfully.'], 200);
    }
}
