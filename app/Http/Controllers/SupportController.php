<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Support;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SupportController extends Controller
{

    public function index()
    {
        $supports = Support::where('user_id', Auth::id())->orderBy('id', 'desc')->get();

        // Loop through each support item to calculate days and hours since `created_at`
        foreach ($supports as $support) {
            $created_at = Carbon::parse($support->created_at);
            $support->days_elapsed = $created_at->diffInDays(Carbon::now());
            $support->hours_elapsed = $created_at->copy()->addDays($support->days_elapsed)->diffInHours(Carbon::now());
        }
        return view('support.index',compact('supports'));
    }
    public function create()
    {
        return view('support.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|min:5',
            'remarks' => 'required|string',
        ]);
        if($validated) {

            $user = new Support();
            $user->title = $request->title;
            $user->remarks = $request->remarks;
            $user->branch_id = Auth::user()->branch_id;
            $user->user_id  = Auth::id();
            if ($request->has('parent_id')) {
                $user->parent_id = $request->parent_id;
            }
            $user->save();
            return redirect('supports')->with('success', 'Ticket created successfully.');
        }
    }

    public function supportDelete($id)
    {
        $support = Support::find($id);
        if (@$support) {
            $support->delete();
            return redirect()->back()->with('success', 'Ticket Deleted');
        }
    }
    public function details($id){
        $support = Support::find($id);
        if (@$support) {
            return view('support.details',compact('support'));
        } else {
            abort('404');
        }
        // return view('support.details',compact('support'));

    }
}
