<?php
namespace App\Helpers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ActivityLogger
{
    public static function log($action, $model, $modelId, $changes = null)
    {
        DB::table('activity_logs')->insert([
            'user_id' => Auth::check() ? Auth::id() : null,  // Current user or null if guest
            'action' => $action,
            'model' => $model,
            'model_id' => $modelId,
            'changes' => $changes ? json_encode($changes) : null,
            'ip_address' => request()->ip(),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}

?>
