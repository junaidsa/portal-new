<?php

namespace App\Http\Controllers;

use App\Mail\ClassReminderMail;
use App\Models\Notification;
use App\Models\ScheduleTiming;
use App\Models\Shortcuts;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class Utilitycontroller extends Controller
{
    public function dashoard()
    {
        $user = Auth::user();
        $shortcut = Shortcuts::where('user_id', Auth::id())->orderBy('id', 'desc')->get();
        $scheduleTimings = [];
$scheduleTimings = ScheduleTiming::with([
    'schedule.student',  // Ensure student relationship is loaded
    'schedule.level',
    'schedule.level.subject',
    'teacher',
    'classType'
])
->whereDate('schedule_date', Carbon::today());

// Add role-based conditions
if ($user->role == 'student') {
    $scheduleTimings->where('student_id', $user->id);
} elseif (in_array($user->role, ['admin', 'staff'])) {
    $branchId = $user->branch_id;
    $scheduleTimings->whereHas('schedule.student', function ($query) use ($branchId) {
        $query->where('branch_id', $branchId);
    });
} elseif (in_array($user->role, ['teacher'])) {
    $scheduleTimings->where('teacher_id', $user->id);
}

$scheduleTimings = $scheduleTimings->get();
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
    //     public function fetchNotifications()
    // {
    //     $user = Auth::user();
    //     $notifications = Notification::orderBy('created_at', 'desc')
    //         ->take(10)
    //         ->get();
    //     return response()->json($notifications);
    // }
    public function fetchNotifications()
    {
        $user = Auth::user();
        if ($user->role === 'super') {
            $notifications = Notification::orderBy('created_at', 'desc')->get();
        } elseif ($user->role === 'admin' || $user->role === 'staff') {
            $notifications = Notification::where('branch_id', $user->branch_id)
                ->orWhereNull('branch_id')
                ->orderBy('created_at', 'desc')
                ->get();
        } else {
            $notifications = collect();
        }

        return response()->json($notifications);
    }

    public function markAsRead(Request $request)
    {
        $notificationId = $request->input('id');
        $notification = Notification::find($notificationId);
        $notification->update(['is_read' => true]);

        return response()->json(['success' => true]);
    }

    public function notificationList()
    {
        $user = Auth::user();
        if ($user->role === 'super') {
            $notifications = Notification::orderBy('created_at', 'desc')->get();
        } elseif ($user->role === 'admin' || $user->role === 'staff') {
            $notifications = Notification::where('branch_id', $user->branch_id)
                ->orWhereNull('branch_id')
                ->orderBy('created_at', 'desc')
                ->get();
        } else {
            $notifications = collect();
        }
        return view('notify', compact('notifications'));
    }

    public function sendReminder($id)
    {
        $scheduleTiming = ScheduleTiming::findOrFail($id);

        if ($scheduleTiming->status == 0) {
            Mail::to($scheduleTiming->student->email)
                ->send(new ClassReminderMail($scheduleTiming, 'student'));
            Mail::to($scheduleTiming->teacher->email)
                ->send(new ClassReminderMail($scheduleTiming, 'teacher'));
            $scheduleTiming->reminder_sent_at = now();
            $scheduleTiming->save();

            return response()->json(['success' => 'Reminder sent successfully.']);
        }

        return response()->json(['error' => 'Reminder already sent or class is not pending.'], 400);
    }
}
