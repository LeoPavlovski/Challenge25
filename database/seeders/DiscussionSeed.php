<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DiscussionSeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('discusions')->insert([
            "title"=>"Tenis Finals",
            "text"=>"This is some text about tenis",
            "image"=>"Image1.jpeg",
            "is_approved"=>true,
            'user_id'=>1,
            'category_id'=>2
        ]);
    }
}
