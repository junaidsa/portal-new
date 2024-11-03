<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Stripe\Stripe;
use App\Http\Controllers\Controller;
use App\Http\Services\PermissionService;
use App\Mail\StudentCreatedMail;
use App\Models\Branches;
use App\Models\Subjects;
use App\Models\Tuitions;
use App\Models\User;
use Illuminate\Http\Request;
use App\Mail\StudnetCreatedMail;
use App\Models\PaymentIntent;
use App\Models\Schedule;
use App\Models\Schedules;
use App\Models\ScheduleTiming;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $branch = Branches::where('id', Auth::user()->branch_id)->first();
        if ($branch) {
            $students = User::with('branch')->where('role', 'student')->get();
            $uuid = $branch->uuid;
            return view('student.index', compact('students', 'uuid'));
        }
    }
    public function create($id = null)
    {
        if ($id) {
            $branch = Branches::where('uuid', $id)->first();
            return view('student.create', compact('branch'));
        }
        $tuitions = Tuitions::all();
        return view('student.create');
    }
    function getSubject(Request $request)
    {
        $tuitionId = $request->input('tuition_id');
        $subjects = Subjects::where('tuition_id', $tuitionId)->get();
        return response()->json($subjects);
    }
    public function postStep1(Request $request, PermissionService $permissionService)
    {
        $validator = Validator::make($request->all(), [
            'branch_id' => 'required',
            'name' => 'required',
            'parent_name' => 'required',
            'email' => 'required|email|unique:users,email',
            'phone_number' => 'required',
            'date_of_birth' => 'required',
            'address' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $data = $request->only('branch_id', 'name', 'email', 'parent_name', 'date_of_birth', 'phone_number', 'address');
        $request->session()->put('form_data.step1', $data);

        $student = new User();
        $student->fill($data);
        $student->password = Hash::make('student123');
        $student->role = 'student';
        $student->save();
        $permissionService->assignPermissions($student->id, $student->role);

        Mail::to($student->email)->send(new StudentCreatedMail($student, 'student123', Branches::find($student->branch_id)->branch));
        return redirect()->route('form.step2', ['student_id' => $student->id]);
    }
    public function step2(Request $request)
    {
        $branchid =  $request->branch_id ?? 1;
        $student_id = $request->query('student_id');
        $tuitionId =  $request->selectedOption;
        $view = view('student.step2', compact('tuitionId', 'student_id', 'branchid'))->render();
        return response()->json(['html' => $view]);
    }
    public function levelBase(Request $request)
    {
        $levelId =  $request->levelid;
        $class_type =  $request->class_type;
        $view = view('student.level_base', compact('levelId', 'class_type'))->render();
        return response()->json(['html' => $view]);
    }
    public function storeSchedule(Request $request)
    {
        $request->validate([
            'student_id' => 'required',
            'subject_id' => 'required',
            'total_feee' => 'required',
        ]);
        $schedule = Schedule::create([
            'user_id' => Auth::id(),
            'branch_id' => $request->branch_id,
            'subject_id' => $request->subject_id,
            'student_id' => $request->student_id,
            'level_id' => $request->level_id,
            'time_type' => $request->timeType,
            'qty' => $request->qty,
            'minute' => $request->minute,
            'total_amount' => $request->total_feee,
        ]);
        $schedule_id = $schedule->id;
        foreach ($request->scheduleDates as $index => $date) {
            ScheduleTiming::create([
                'schedule_id' => $schedule_id,
                'schedule_date' => $date,
                'schedule_time' => $request->scheduleTimes[$index],
            ]);
        }
        $paymentIntent = PaymentIntent::create([
            'amount' => $request->total_feee*100, // Convert to cents for Stripe
            'currency' => 'usd',
            'metadata' => [
                'student_id' => $request->student_id,
                'subject_id' => $request->subject_id,
                'level_id' => $request->level_id,
            ],
        ]);
        return response()->json([
            'status' => true,
            'message' => 'Schedule created successfully',
            'clientSecret' => $paymentIntent->client_secret, // Pass this for frontend confirmation
        ]);

        return response()->json(['status' => true, 'message' => 'Schedule created successfully']);
    }

    
}
