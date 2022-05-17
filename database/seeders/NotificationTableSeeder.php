<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class NotificationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create() ;

        for ($i = 1 ; $i <= 5; $i++):
            DB::table("notifications")->insert([
                "fk_user" => $i,
                "fk_notifier" => 1,
                "fk_post" => $i,
                "fk_typeNot" => $faker->numberBetween(1, 3),
                "created_at" => $faker->date()
            ]);
        endfor;
    }
}
