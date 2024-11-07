<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Stripe\Stripe;
use App\Http\Controllers\Controller;
use App\Http\Services\PermissionService;
use App\Mail\StudentCreatedMail;
use App\Models\AssignClass;
use App\Models\Branches;
use App\Models\Levels;
use App\Models\Subjects;
use App\Models\Tuitions;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\PaymentIntent;
use App\Models\Schedule;
use App\Models\Schedules;
use App\Models\ScheduleTiming;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class StudentController extends Controller
{
    public function index()
    {
        $students = User::with('branch')
            ->where('role', 'student')
            ->when(Auth::user()->role !== 'super', function ($query) {
                $query->where('branch_id', Auth::user()->branch_id);
            })->get();
        return view('student.index', compact('students'));
    }
    public function schedule()
    {
        $students = ScheduleTiming::with('branch')
            ->where('role', 'student')
            ->when(Auth::user()->role !== 'super', function ($query) {
                $query->where('branch_id', Auth::user()->branch_id);
            })->get();
        return view('student.schedule', compact('students'));
    }
    public function loginWithToken(Request $request, $user)
    {
        $student = User::findOrFail($user);
        Auth::login($student);
        $redirectUrl = $request->query('redirect', route('dashboard'));

        return redirect($redirectUrl);
    }
    public function create($id = null)
    {
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

        Mail::to($student->email)->send(new StudentCreatedMail($student, 'student123'));
        if (Auth::check()) {
            return redirect()->route('form.step2', ['student_id' => $student->id]);
        }
        return redirect()->route('form.verify', ['student_id' => $student->id]);
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
            'class_type' => 'required',
        ]);
        $level = Levels::find($request->level_id);
        $pricePerHour = $level ? $level->price : 0;
        $pricePerMinute = $pricePerHour / 60;
        $schedule = Schedule::create([
            'user_id' => Auth::id(),
            'branch_id' => $request->branch_id,
            'subject_id' => $request->subject_id,
            'student_id' => $request->student_id,
            'level_id' => $request->level_id,
            'time_type' => $request->timeType,
            'class_type_id' => $request->class_type,
            'qty' => $request->qty,
            'minute' => $request->minute,
            'total_amount' => $request->total_feee,
        ]);
        $user = User::find($schedule->user_id);
        if ($user) {
            $user->update(['branch_id' => $schedule->branch_id]);
        }
        $schedule_id = $schedule->id;
        $stud_id = $schedule->student_id;

        foreach ($request->scheduleDates as $index => $date) {
            $perClassAmount = $pricePerMinute * $request->minute;
            ScheduleTiming::create([
                'schedule_id' => $schedule_id,
                'student_id' =>  $stud_id,
                'minute' =>  $request->minute,
                'schedule_date' => $date,
                'schedule_time' => $request->scheduleTimes[$index],
                'class_type_id' => $request->class_type,
                'price_per_minute' => $pricePerMinute,
                'per_class_amount' => $perClassAmount,
            ]);
        }
        $step3_url = route('form.step3') . '?schedule_id=' . $schedule_id;
        return response()->json([
            'status' => true,
            'message' => 'Schedule created successfully',
            'step3_url' => $step3_url,
        ]);
    }

    public function createPaymentIntent(Request $request)
    {
        \Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

        $schedule_id = $request->input('schedule_id');
        $schedule = Schedule::find($schedule_id);

        try {
            $paymentIntent = \Stripe\PaymentIntent::create([
                'amount' => $schedule->total_amount * 100,
                'currency' => 'mvr',
                'metadata' => [
                    'student_id' => $schedule->student_id,
                    'schedule_id' => $schedule->id
                ]
            ]);
            $metadataJson = json_encode([
                'student_id' => $schedule->student_id,
                'schedule_id' => $schedule->id
            ]);
            DB::table('payment_intents')->insert([
                'amount' => $schedule->total_amount * 100,
                'student_id' => $schedule->student_id,
                'schedule_id' => $schedule->id,
                'currency' => 'mvr',
                'metadata' => $metadataJson,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);

            return response()->json(['clientSecret' => $paymentIntent->client_secret]);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
    public function confirmPayment(Request $request)
    {
        $schedule_id = $request->input('schedule_id');
        $payment_type = $request->input('payment_type');
        $schedule = Schedule::find($schedule_id);
        if ($schedule) {

            $schedule->payment_status = 1;
            $schedule->payment_type = $payment_type;
            $schedule->save();

            return response()->json(['message' => 'Payment status updated successfully.']);
        }

        return response()->json(['error' => 'Schedule not found.'], 404);
    }
    public function bankBase(Request $request)
    {
        $schedule_id =  $request->schedule_id;
        $bank_type =  $request->selectedBank;
        $view = view('student.bank', compact('bank_type', 'schedule_id'))->render();
        return response()->json(['html' => $view]);
    }



    public function updatePayment(Request $request)
    {
        $schedule_id =  $request->schedule_id;
        $schedule = Schedule::find($schedule_id);

        if ($schedule) {
            $file = null;
            if ($request->hasFile('prove')) {
                $document = $request->file('prove');
                $name = now()->format('Y-m-d_H-i-s') . '-prove';
                $file = $name . '.' . $document->getClientOriginalExtension();
                $targetDir = public_path('prove');
                $document->move($targetDir, $file);
                $schedule->payment_prove = $file;
            }
            $schedule->payment_type = 'Banks';
            $schedule->save();
            return redirect('students/step-4')->with('success', 'Payment updated successfully.');
        }
        return redirect()->back()->with('error', 'Schedule not found.');
    }

    public function search(Request $request)

    {

        $user = Auth::user();
        $query = User::where('role', 'student');
        if (in_array($user->role, ['admin', 'staff'])) {
            $query->where('branch_id', $user->branch_id);
        }
        if ($user->role !== 'super' && $request->filled('branch_id')) {
            $query->where('branch_id', $request->branch_id);
        }
        if ($request->has('search')) {
            $searchTerm = $request->input('search');
            $query->where(function ($q) use ($searchTerm) {
                $q->where('name', 'like', "%{$searchTerm}%")
                    ->orWhere('parent_name', 'like', "%{$searchTerm}%")
                    ->orWhere('email', 'like', "%{$searchTerm}%");
            });
        }
        $students = $query->select('id', 'name', 'parent_name','email')->get();
        return response()->json($students->map(function ($student) {
            return [
                'id' => $student->id,
                'name' => $student->name,
                'parent_name' => $student->parent_name,
                'email' => $student->email
            ];
        }));
    }

    public function studentBase(Request $request)
    {
        $student_id = $request->student_id;
        $subject_id = $request->subject_id;
        $sheduletimings = ScheduleTiming::with('schedule.level', 'schedule.level.subject', 'teacher', 'classType')
            ->where('student_id', $student_id)
            ->where('status', 0);
        if (!empty($subject_id)) {
            $sheduletimings->whereHas('schedule.level.subject', function($query) use ($subject_id) {
                $query->where('id', $subject_id);
            });
        }
        if (Auth::check() && (Auth::user()->role == 'admin' || Auth::user()->role == 'staff')) {
            $branch_id = Auth::user()->branch_id;
            $sheduletimings->whereHas('schedule', function($query) use ($branch_id) {
                $query->where('branch_id', $branch_id);
            });
        }
        $sheduletimings = $sheduletimings->get();
        $view = view('student.scheduleList', compact('student_id', 'sheduletimings'))->render();    
        return response()->json(['html' => $view]);
    }



    public function assignClasses(Request $request)
    {
        $request->validate([
            'teacher' => 'required|exists:users,id',
            'classes' => 'required',
        ]);
    
        $teacherId = $request->input('teacher');
        $classIds = explode(',', $request->input('classes'));
        foreach ($classIds as $classId) {
            AssignClass::create([
                'teacher_id' => $teacherId,
                'schedule_timing_id' => $classId,
            ]);
        }
    
        return response()->json(['success' => 'Classes assigned successfully']);
    }
}
