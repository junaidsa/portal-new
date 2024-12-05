<?php

namespace App\Http\Services;

use Illuminate\Support\Facades\DB;

class PermissionService
{
    protected $rolePermissions = [
        'student' => [
            ['module' => 'view_library', 'can_access' => true],
            ['module' => 'view_chat', 'can_access' => true],
            ['module' => 'view_order', 'can_access' => true],
            ['module' => 'view_report', 'can_access' => true],
            ['module' => 'view_schedule_classes', 'can_access' => true],
        ],
        'teacher' => [
            ['module' => 'view_library', 'can_access' => true],
            ['module' => 'view_chat', 'can_access' => true],
            ['module' => 'view_order', 'can_access' => true],
            ['module' => 'view_report', 'can_access' => true],
            ['module' => 'view_classes', 'can_access' => true],
            ['module' => 'view_info', 'can_access' => true],

        ],
        'admin' => [
            ['module' => 'view_teacher', 'can_access' => true],
            ['module' => 'view_teacher_info', 'can_access' => true],
            ['module' => 'delete_teacher', 'can_access' => true],
            ['module' => 'edit_teacher', 'can_access' => true],
            ['module' => 'view_reports', 'can_access' => true],
            ['module' => 'view_student', 'can_access' => true],
            ['module' => 'delete_student', 'can_access' => true],
            ['module' => 'edit_student', 'can_access' => true],
            ['module' => 'view_staff', 'can_access' => true],
            ['module' => 'edit_staff', 'can_access' => true],
            ['module' => 'delete_staff', 'can_access' => true],
            ['module' => 'view_chat', 'can_access' => true],
            ['module' => 'view_info', 'can_access' => true],
            ['module' => 'view_schedule', 'can_access' => true],
        ],
        'staff' => [
            ['module' => 'view_chat', 'can_access' => true],
            ['module' => 'view_schedule', 'can_access' => true],
            ['module' => 'view_teacher', 'can_access' => true],
            ['module' => 'view_reports', 'can_access' => true],
            ['module' => 'view_student', 'can_access' => true],
            ['module' => 'view_info', 'can_access' => true],
                ],
        'super' => [
            ['module' => 'view_teacher', 'can_access' => true],
            ['module' => 'view_teacher_info', 'can_access' => true],
            ['module' => 'delete_teacher', 'can_access' => true],
            ['module' => 'edit_teacher', 'can_access' => true],
            ['module' => 'view_reports', 'can_access' => true],
            ['module' => 'view_student', 'can_access' => true],
            ['module' => 'delete_student', 'can_access' => true],
            ['module' => 'edit_student', 'can_access' => true],
            ['module' => 'view_staff', 'can_access' => true],
            ['module' => 'edit_staff', 'can_access' => true],
            ['module' => 'delete_staff', 'can_access' => true],
            ['module' => 'view_chat', 'can_access' => true],
            ['module' => 'view_confirm_order', 'can_access' => true],
            ['module' => 'view_order', 'can_access' => true],
            ['module' => 'view_product', 'can_access' => true],
            ['module' => 'view_category', 'can_access' => true],
            ['module' => 'view_library', 'can_access' => true],
            ['module' => 'view_schedule', 'can_access' => true],
            ['module' => 'view_setting', 'can_access' => true],
            ['module' => 'view_admin', 'can_access' => true],
            ['module' => 'view_info', 'can_access' => true],
        ],
    ];
    public function assignPermissions(int $userId, string $role)
    {
        $permissions = $this->rolePermissions[$role] ?? [];
        foreach ($permissions as $permission) {
            DB::table('permissions')->insert([
                'user_id' => $userId,
                'module' => $permission['module'],
                'can_access' => $permission['can_access'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
