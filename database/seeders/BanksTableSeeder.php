<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BanksTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('banks')->insert([
            [
                'bank_name' => 'Example Bank 1',
                'account_holdername' => 'John Doe',
                'account_number' => '123456789',
                'image' => 'bank1.png',
                'created_at' => now(),
                'updated_at' => now(),
                'deleted_at' => null,
            ]
        ]);
    }
}
