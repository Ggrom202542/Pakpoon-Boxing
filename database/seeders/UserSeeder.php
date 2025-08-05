<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('users')->insert(
            [
                'name' => 'นายประพฤทธ์ วาหะรักษ์',
                'phone' => '0935962430',
                'email' => 'prapreut.1803@gmail.com',
                'department' => 'สำนักปลัด',
                'is_admin' => '1',
                'password' => bcrypt('20112542'),
                'status' => 'พร้อมใช้งาน',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        );
    }
}
