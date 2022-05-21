<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class TypesNotificationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("types-notifications")->insert([
            "name" => "mention"
        ]);
        DB::table("types-notifications")->insert([
            "name" => "comment"
        ]);
        DB::table("types-notifications")->insert([
            "name" => "repost"
        ]);
        DB::table("types-notifications")->insert([
            "name" => "like"
        ]);
        DB::table("types-notifications")->insert([
            "name" => "follow"
        ]);
    }
}
