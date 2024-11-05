<?php
namespace App\Services;

use App\Models\ActivityLog;

class ActivityLogger
{
    public static function log($action, $changes = null, $userId = null, $branch_id, $model, $model_id)
    {
        ActivityLog::create([
            'action' => $action,
            'changes' => $changes,
            'user_id' => $userId,
            'branch_id' => $branch_id,
            'model' => $model,
            'model_id' => $model_id,
        ]);
    }
}

?>
