<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Enquiry;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EnquiryController extends Controller
{
    public function index() {
       $enquiry = Enquiry::orderBy('id', 'Desc')->get();
        return view('super_admin.enquiry.index',compact('enquiry'));
    }

    public function create() {
        return  view('super_admin.enquiry.create');
    }

    public function enquiryEdit($id) {
        $enquiry = Enquiry::find($id);
        return view('super_admin.enquiry.edit',compact('enquiry'));
    }

    public function enquiryStore(Request $request){
        $validated = $request->validate([
            'name' => 'required',
            'status' => 'required',
            'remarks' => 'required'
        ]);
        if ($validated) {
           $enquiry = new Enquiry();
           $enquiry->name = $request->input('name');
           $enquiry->status = $request->input('status');
           $enquiry->remarks = $request->input('remarks');
           $enquiry->save();
           return redirect('enquiry')->with('success', 'Enquiry Created Successfully.');
        }else{
            return redirect()->back()->withErrors($validated)->withInput();
        }
    }

    public function enquiryUpdate(Request $request) {
        $validated = $request->validate([
            'name' => 'required',
            'status' => 'required',
            'remarks' => 'required',
            'id' => 'required|exists:enquiries,id', // Validate that 'id' exists
        ]);

        // Retrieve the enquiry by ID
        $enquiry = Enquiry::find($request->input('id'));

        // Check if the enquiry exists
        if (!$enquiry) {
            return redirect()->back()->with('error', 'Enquiry Not Found!');
        }

        // Update only the relevant fields
        $enquiry->name = $request->input('name');
        $enquiry->status = $request->input('status');
        $enquiry->remarks = $request->input('remarks');

        // Save the changes
        $enquiry->save();

        return redirect('enquiry')->with('success', 'Enquiry updated successfully.');
    }


    public function enquiryDelete($id){
        $enquiry = Enquiry::find($id);
        if (@$enquiry) {
            $enquiry->delete();
            return redirect()->back()->with('success', 'Enquiry status deleted');
        }
    }
}
