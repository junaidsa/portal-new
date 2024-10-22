<?php 

namespace App\Http\Services;

use Illuminate\Support\Facades\DB;

class ModuleService
{
    public static function can_access_module($module)
    {
        try {
            return DB::table('permissions')
                ->where('module', $module)        // Check the module name
                ->where('can_access', 1)          // Ensure the user can access it
                ->where('user_id', auth()->id())   // Use the authenticated user's ID
                ->exists();                        // Check if a matching record exists
        } catch (\Exception $e) {
            return false;
        }
    }
}
?>