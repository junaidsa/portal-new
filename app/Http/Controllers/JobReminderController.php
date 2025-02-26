<?php

namespace App\Http\Controllers;

use App\Models\JobReminder;
use Illuminate\Http\Request;

class JobReminderController extends Controller
{
    public function index()
    {
        $jobReminders =  JobReminder::orderBy('id', 'DESC')->get();
        return view('jobreminder.index', compact('jobReminders'));
    }
    
    public function create()
    {
        return view('jobreminder.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'message' => 'required|string|max:1900',
        ]);
        if ($validated) {
            $jobreminder = new JobReminder();
            $jobreminder->message = $request->input('message');
            $jobreminder->status = $request->input('status');
            $jobreminder->save();
            return redirect()->route('jobreminder.index')->with('success', 'Job Reminder created successfully!');
        } else {
            return redirect()->back()->withErrors($validated)->withInput();
        }
    }

    public function edit($id)
    {
        $jobReminder = JobReminder::findOrFail($id);
        return view('jobreminder.edit', compact('jobReminder'));
    }

    public function update(Request $request, $id)
    {

        $jobreminder = JobReminder::findOrFail($id);

        $validated = $request->validate([
            'message' => 'required|string|max:1900',
        ]);

        if ($validated) {
            $jobreminder->message = $request->input('message');
            $jobreminder->status = $request->input('status');
            $jobreminder->save();

            return redirect()->route('jobreminder.index')->with('success', 'Job Reminder updated successfully!');
        } else {
            return redirect()->back()->withErrors($validated)->withInput();
        }
    }

    // Remove the specified job reminder from the database
    public function destroy($id)
    {
        // Find the job reminder by ID and delete it
        $jobReminder = JobReminder::findOrFail($id);
        $jobReminder->delete();

        // Redirect back with a success message
        return redirect()->route('jobreminder.index')->with('success', 'Job Reminder deleted successfully!');
    }
}
