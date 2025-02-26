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
        $supports = Support::query()
            ->where(function ($query) {
                $user = Auth::user();
                // Only SuperAdmin can see all tickets
                if ($user->role === 'super') {
                    $query->whereNull('parent_id');
                } 
                // All other users (Admin, Staff, Teachers, Students) can only see their own tickets
                else {
                    $query->whereNull('parent_id')
                          ->where('user_id', $user->id); 
                }
            })
            ->orderBy('id', 'desc')
            ->get();

        foreach ($supports as $support) {
            $created_at = Carbon::parse($support->created_at);
            $support->days_elapsed = $created_at->diffInDays(Carbon::now());
            $support->hours_elapsed = $created_at->copy()->addDays($support->days_elapsed)->diffInHours(Carbon::now());
        }

        return view('support.index', compact('supports'));
    }

    public function create($id = NULL)
    {
        return view('support.create', compact('id'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'nullable|required_if:parent_id,NULL|min:5',
            'remarks' => 'required|string',
            'parent_id' => 'nullable|exists:supports,id',
        ]);

        if ($validated) {
            $support = new Support();
            if ($request->has('parent_id')) {
                $support->parent_id = $request->parent_id; // Set parent_id only if provided
            }
            $support->title = $request->title;
            $support->remarks = $request->remarks;
            $support->branch_id = Auth::user()->branch_id;
            $support->user_id  = Auth::id();
            $support->save();
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

    public function details($id)
    {
        $support = Support::with('user', 'parent')->find($id);
        if (@$support) {
            return view('support.details', compact('support'));
        } else {
            abort('404');
        }
    }
}