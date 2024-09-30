<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClassTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('class_types')->insert([
            [
                'id' => '1',
                'name' => '1-1 Online Tuition',
                'status' => '1',
            ],
            [
                'id' => '2',
                'name' => '1-1 Home Tuition',
                'status' => '1',
            ],
            [
                'id' => '3',
                'name' => 'Online Group Tuition',
                'status' => '1',
            ],
            [
                'id' => '4',
                'name' => 'Physical Tuition',
                'status' => '1',
            ]
        ]);
    }
}
