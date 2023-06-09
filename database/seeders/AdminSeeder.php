<?php

namespace Database\Seeders;

use App\Models\ROLES;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'name'=>'Nikola',
                "email"=>'nikola@gmail.com',
                "password"=>Hash::make('12345678'),
                'role_id'=>ROLES::ADMIN->value,
            ]
        ]);
    }
}
