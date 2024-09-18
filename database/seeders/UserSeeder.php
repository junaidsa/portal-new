<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Create a super admin user
        $user = [
            'id' => 1,
            'name' => 'JD',
            'email' => 'admin@gmail.com',
            'role' => 'super_admin',
            'email_verified_at' => null,
            'password' => '$2y$10$P2ORRTg0sAXlN5HBEvUfKuCB1Ehw7MV4T7.D.VWsSc5lZEiHYsV0q',
            'remember_token' => null,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];

        // Insert the user into the database
        \App\Models\User::create($user);
    }
}
