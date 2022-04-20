<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class RolTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("rols")->insert([
            "name" => "user"
        ]);
        DB::table("rols")->insert([
            "name" => "administrator"
        ]);
        DB::table("rols")->insert([
            "name" => "god"
        ]);
    }
}
