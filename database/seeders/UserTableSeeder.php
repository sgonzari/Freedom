<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("users")->insert([
            "fk_rol" => 3,
            "name" => "sebas",
            "username" => "srcbas",
            "email" => "sebastiangr456@gmail.com",
            "password" => Hash::make("usuario"),
            "birthday" => date('Y-m-d H:i:s', strtotime("03 December 2001")),
            "description" => "Only SrCbas.",
            "created_at" => date('Y-m-d H:i:s', strtotime("today"))
        ]);

        \App\Models\User::factory(4)->create() ;
    }
}
