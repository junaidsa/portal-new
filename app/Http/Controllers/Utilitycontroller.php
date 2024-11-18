<?php

namespace App\Http\Controllers;

use App\Models\ScheduleTiming;
use App\Models\Shortcuts;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Utilitycontroller extends Controller
{
    public function dashoard()
    {
        $user = Auth::user();
        $shortcut = Shortcuts::where('user_id', Auth::id())->orderBy('id', 'desc')->get();
        $scheduleTimings = [];

        if ($user->role == 'student') {
            $scheduleTimings = ScheduleTiming::with('schedule.level', 'schedule.level.subject', 'teacher', 'classType')
                ->where('student_id', $user->id)
                ->whereDate('schedule_date', Carbon::today())
                ->get();
        } elseif (in_array($user->role, ['admin', 'staff'])) {
            $branchId = $user->branch_id;
            $scheduleTimings = ScheduleTiming::with('schedule.level', 'schedule.level.subject', 'teacher', 'classType')
                ->whereHas('schedule.student', function ($query) use ($branchId) {
                    $query->where('branch_id', $branchId);
                })
                ->whereDate('schedule_date', Carbon::today())
                ->get();
        } elseif (in_array($user->role, ['super'])) {
            $scheduleTimings = ScheduleTiming::with('schedule.level', 'schedule.level.subject', 'teacher', 'classType')
                ->whereDate('schedule_date', Carbon::today())
                ->get();
        }

        return view('dashboad', compact('shortcut', 'user', 'scheduleTimings'));
    }
    public function shortcutStore(Request  $request)
    {
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
            return redirect()->back()->with('success', 'Link created successfully.');
        } else {
            return redirect()->back()->withErrors($validated)->withInput();
        }
    }

    public function shortcutDelete($id)
    {
        $shortcut = Shortcuts::find($id);
        if ($shortcut) {
            $shortcut->delete();
            return redirect()->back()->with('success', 'Link status deleted');
        } else {
            abort('404');
        }
    }
    public function report()
    {
        $schedule = ScheduleTiming::all();
        return view('reports.report', compact('schedule'));
    }
}
