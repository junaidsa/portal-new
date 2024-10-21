<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Chat;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChatController extends Controller
{

    public function index(){

    }
    public function chat(){
        $chat = Chat::where('sender_id',Auth::id())->orderBy('id', 'Asc')->get();
            return view("chat.index",compact('chat'));
    }
    public function contactList(){

    }
    public function getContacts()
    {
        $user = Auth::user(); 
        $role = $user->role;
        $branchId = $user->branch_id;
        $contacts = User::query();

        // Role-based contact list logic
        switch ($role) {
            case 'super':
                $contacts->whereIn('role', ['teacher', 'admin', 'staff']);
                break;

            case 'teacher':
                $contacts->whereIn('role', ['admin', 'staff'])->where('branch_id', $branchId);
                break;

            case 'admin':
            case 'staff':
                // Admin and Staff see each other and teachers from their branch
                $contacts->whereIn('role', ['admin', 'staff', 'teacher'])->where('branch_id', $branchId);
                break;

            case 'student':
                // Student sees only admin and staff from their branch
                $contacts->whereIn('role', ['admin', 'staff'])->where('branch_id', $branchId);
                break;

            default:
                // If role is not defined or doesn't match, return empty
                $contacts = collect();
                break;
        }

        // Fetch the contacts
        $contacts = $contacts->get();

        // Return contacts as a response (JSON for example)
        return response()->json($contacts);
    }

    public function store(Request $request) {
        $request->validate([
            'chat_message' => 'required|string|max:255',
            'receiver_id' => 'required',
        ]);

        // Store the message in the database
        Chat::create([
            'message' => $request->chat_message,
            'receiver_id' => $request->receiver_id,
            'sender_id' => Auth::id(),

        ]);

        return response()->json(['status' => true]);
    }


}

