<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class BookmarkTableSeeder extends Seeder
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
            DB::table("bookmarks")->insert([
                "fk_user" => 1,
                "fk_post" => $i,
                "created_at" => $faker->date(),
            ]);
        endfor;
    }
}
