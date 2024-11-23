<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use App\Models\Transaction;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;
    public function generateRandomString($length = 10) {
        $characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString.= $characters[rand(0, strlen($characters) - 1)];
        }
        return $randomString;
        }

        public function createTransaction($schedule_id, $amount, $type) {
            $transaction = new Transaction();
            $transaction->schedule_id = $schedule_id;
            $transaction->amount = $amount;
            $transaction->transaction_id = $this->generateRandomString();
            $transaction->transaction_type = $type;
            $transaction->save();
            return $transaction;
        }

        public function createNotification($data)
        {
            $notification = new Notification();
            $notification->user_id = $data['user_id'] ?? null;  
            $notification->branch_id = $data['branch_id'] ?? null;
            $notification->title = $data['title'];
            $notification->message = $data['message'];
            $notification->role = $data['role'] ?? null; 
            $notification->is_read = false;
            $notification->save();
        }
        
}
