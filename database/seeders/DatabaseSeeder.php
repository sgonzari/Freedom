<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            RolTableSeeder::class,
            UserTableSeeder::class,
            PostTableSeeder::class,
            LikeTableSeeder::class,
            RepostTableSeeder::class,
            BookmarkTableSeeder::class,
            TypesNotificationTableSeeder::class,
            NotificationTableSeeder::class,
            FollowTableSeeder::class
        ]);
    }
}
