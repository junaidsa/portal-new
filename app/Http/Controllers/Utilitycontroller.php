<?php

namespace App\Http\Controllers;

use App\Helpers\ActivityLogger;
use App\Models\ScheduleTiming;
use App\Models\Shortcuts;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Utilitycontroller extends Controller
{
    public function dashoard(){
        $user = Auth::user();
        $shortcut =  Shortcuts::where('user_id',Auth::id())->orderBy('id', 'Desc')->get();
        return view('dashboad',compact('shortcut','user'));
    }
   public function shortcutStore(Request  $request) {
        $validated = $request->validate([
            'name' => 'required',
            'url' => 'required',
        ]);
        if ($validated) {
            $shortcut = new Shortcuts();
            $shortcut->name = $request->input('name');
            $shortcut->url = $request->input('url');
            $shortcut->user_id = Auth::id();
            $shortcut->branch_id = Auth::user()->branch_id;
            $shortcut->save();

            // ActivityLogger::log('Update Profile', 'User updated their profile', auth()->id());

            return redirect()->back()->with('success', 'Link created successfully.');
        } else {
            return redirect()->back()->withErrors($validated)->withInput();
        }
    }

    public function shortcutDelete($id){
        $shortcut = Shortcuts::find($id);
        if ($shortcut) {
            $shortcut->delete();
            return redirect()->back()->with('success', 'Link status deleted');
        }else {
            abort('404');
        }
    }
    public function report() {
        $schedule = ScheduleTiming::all();
        return view('reports.report',compact('schedule'));
    }
}
