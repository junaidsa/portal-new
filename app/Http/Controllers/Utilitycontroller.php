<?php

namespace App\Http\Controllers;

use App\Mail\ClassReminderMail;
use App\Models\Levels;
use App\Models\Notification;
use App\Models\ScheduleTiming;
use App\Models\Shortcuts;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Monolog\Level;

class Utilitycontroller extends Controller
{
    public function dashoard(Request $request)
    {
        $user = Auth::user();
        $shortcut = Shortcuts::where('user_id', Auth::id())->orderBy('id', 'desc')->get();
        $date = $request->get('date', Carbon::today()->toDateString());

    $scheduleTimings = ScheduleTiming::with([
        'schedule.student',
        'schedule.level',
        'schedule.level.subject',
        'teacher',
        'classType',
    ])
    ->whereDate('schedule_date', $date);

    // Apply role-based filtering
    if ($user->role == 'student') {
        $scheduleTimings->where('student_id', $user->id);
    } elseif (in_array($user->role, ['admin', 'staff'])) {
        $scheduleTimings->whereHas('schedule.student', function ($query) use ($user) {
            $query->where('branch_id', $user->branch_id);
        });
    } elseif ($user->role == 'teacher') {
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
    public function fetchNotifications()
    {
        $user = Auth::user();
        
        if ($user->role === 'super') {
            // Super can see all notifications
            $notifications = Notification::orderBy('created_at', 'desc')->get();
        } elseif ($user->role === 'admin' || $user->role === 'staff') {
            // Admin and staff see notifications for their branch and class_type_id == 4 or null
            $notifications = Notification::where('branch_id', $user->branch_id)
                ->where(function ($query) {
                    $query->where('class_type_id', 4)
                          ->orWhereNull('class_type_id');
                })
                ->orderBy('created_at', 'desc')
                ->get();
        } else {
            // Other roles see no notifications
            $notifications = collect();
        }
        
        return response()->json($notifications);
    }
    public function notificationList()
    {
        $user = Auth::user();
        
        if ($user->role === 'super') {
            // Super can see all notifications
            $notifications = Notification::orderBy('created_at', 'desc')->get();
        } elseif ($user->role === 'admin' || $user->role === 'staff') {
            // Admin and staff see notifications for their branch and class_type_id == 4 or null
            $notifications = Notification::where('branch_id', $user->branch_id)
                ->where(function ($query) {
                    $query->where('class_type_id', 4)
                          ->orWhereNull('class_type_id');
                })
                ->orderBy('created_at', 'desc')
                ->get();
        } else {
            // Other roles see no notifications
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
    public function markAllNotificationsAsRead(Request $request)
    {
        $user = Auth::user();

        if ($user) {
            if ($user->role === 'super') {
                Notification::query()->update(['is_read' => now()]);
            } elseif ($user->role === 'admin' || $user->role === 'staff') {
                Notification::where('branch_id', $user->branch_id)
                    ->orWhereNull('branch_id')
                    ->update(['is_read' => now()]);
            }

            return response()->json(['message' => 'All notifications marked as read.']);
        }

        return response()->json(['message' => 'Unauthorized'], 403);
    }

    public function getLevelsByBranch(Request $request)
{
    $levels = Levels::where('branch_id', $request->branch_id)->get();
    return response()->json($levels);
}
}
