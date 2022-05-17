<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class FollowTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create() ;

        for ($i = 2 ; $i <= 5; $i++):
            DB::table("follows")->insert([
                "fk_user" => 1,
                "fk_follow" => $i,
                "created_at" => $faker->date()
            ]);
            DB::table("follows")->insert([
                "fk_user" => $i,
                "fk_follow" => 1,
                "created_at" => $faker->date()
            ]);
        endfor;
    }
}
