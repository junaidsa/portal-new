<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
            $permissions = [
                ['user_id' => 1, 'module' => 'view_teacher', 'can_access' => true],
                ['user_id' => 1, 'module' => 'view_teacher_info', 'can_access' => true],
                ['user_id' => 1, 'module' => 'delete_teacher', 'can_access' => true],
                ['user_id' => 1, 'module' => 'edit_teacher', 'can_access' => true],
                ['user_id' => 1, 'module' => 'view_reports', 'can_access' => true],
                ['user_id' => 1, 'module' => 'view_student', 'can_access' => true],
                ['user_id' => 1, 'module' => 'delete_student', 'can_access' => true],
                ['user_id' => 1, 'module' => 'edit_student', 'can_access' => true],
                ['user_id' => 1, 'module' => 'view_staff', 'can_access' => true],
                ['user_id' => 1, 'module' => 'edit_staff', 'can_access' => true],
                ['user_id' => 1, 'module' => 'delete_staff', 'can_access' => true],
                ['user_id' => 1, 'module' => 'view_chat', 'can_access' => true],
                ['user_id' => 1, 'module' => 'view_confirm_order', 'can_access' => true],
                ['user_id' => 1, 'module' => 'view_order', 'can_access' => true],
                ['user_id' => 1, 'module' => 'view_product', 'can_access' => true],
                ['user_id' => 1, 'module' => 'view_category', 'can_access' => true],
                ['user_id' => 1, 'module' => 'view_library', 'can_access' => true],
                ['user_id' => 1, 'module' => 'view_schedule', 'can_access' => true],
                ['user_id' => 1, 'module' => 'view_setting', 'can_access' => true],
            ];
    
            foreach ($permissions as &$permission) {
                $permission['created_at'] = Carbon::now();
                $permission['updated_at'] = Carbon::now();
            }
    
            DB::table('permissions')->insert($permissions);
        }
}
