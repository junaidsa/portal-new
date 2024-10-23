<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Chat;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ChatController extends Controller
{

    public function index() {}
    public function chat()
    {
        $chat = Chat::where('sender_id', Auth::id())->orderBy('id', 'Asc')->get();
        return view("chat.index", compact('chat'));
    }
    public function contactList() {}
    public function getContacts()
{
    $user = Auth::user();
    $role = $user->role;
    $branchId = $user->branch_id;
    $contacts = User::query();

    switch ($role) {
        case 'super':
            $contacts->whereIn('role', ['teacher', 'admin', 'staff']);
            break;

        case 'teacher':
        case 'admin':
        case 'staff':
            $contacts->whereIn('role', ['admin', 'staff', 'teacher', 'super'])
                     ->where('branch_id', $branchId);
            break;

        case 'student':
            $contacts->whereIn('role', ['admin', 'staff'])
                     ->where('branch_id', $branchId);
            break;

        default:
            return response()->json([]);
    }
        $contacts->where('users.id', '!=', $user->id);

    $lastMessageSubquery = DB::table('chats as last_message')
        ->select('message', 'created_at', 'sender_id', 'receiver_id', 'is_read')
        ->where(function ($query) use ($user) {
            $query->where('sender_id', '=', $user->id)
                  ->orWhere('receiver_id', '=', $user->id);
        })
        ->orderBy('created_at', 'desc')
        ->limit(1);
    $contacts->leftJoinSub($lastMessageSubquery, 'last_message', function ($join) {
        $join->on('users.id', '=', 'last_message.sender_id')
             ->orOn('users.id', '=', 'last_message.receiver_id');
    });
    $contacts->leftJoin('branches', 'users.branch_id', '=', 'branches.id')
        ->select(
            'users.*',
            'branches.branch as branch_name',
            'last_message.message as last_message',
            'last_message.created_at as last_message_time',
            DB::raw('SUM(CASE WHEN last_message.is_read = 0 AND last_message.receiver_id = ' . $user->id . ' THEN 1 ELSE 0 END) as unread_count')
        )
        ->groupBy('users.id', 'branches.branch', 'last_message.message', 'last_message.created_at')
        ->orderByDesc('last_message_time');

    $contacts = $contacts->get();

    return response()->json($contacts);
}
    
    public function store(Request $request)
    {
        $request->validate([
            'chat_message' => 'required|string|max:255',
            'receiver_id' => 'required',
        ]);
        $chat = Chat::create([
            'message' => $request->chat_message,
            'receiver_id' => $request->receiver_id,
            'sender_id' => Auth::id(),

        ]);
        return response()->json([
            'status' => true,
            'message' => $chat,
        ]);
    }

    public function getMessages($id)
    {
        $messages = Chat::where(function ($query) use ($id) {
            $query->where('sender_id', auth()->id())
                ->where('receiver_id', $id);
        })->orWhere(function ($query) use ($id) {
            $query->where('sender_id', $id)
                ->where('receiver_id', auth()->id());
        })->get();
    return view('chat.messages', compact('messages'))->render();
    }
    public function markAsRead(Request $request)
{
    $receiverId = $request->input('receiver_id');
    $userId = Auth::id();
    
  $update = Chat::where('receiver_id', $userId)
    ->where('sender_id', $receiverId)
    ->update(['is_read' => 1]);
    return response()->json(['status' => 'success']);
}
}
