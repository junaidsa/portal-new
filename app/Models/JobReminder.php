<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobReminder extends Model
{
    use HasFactory;

    // Specify the table if it's different from the default plural form of the model name
    // protected $table = 'your_table_name'; 

    // Define which attributes are mass assignable
    protected $fillable = ['message', 'status'];

    // Optionally, you can define any relationships, timestamps, or custom methods here
}
