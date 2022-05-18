<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Storage::makeDirectory('users') ;
        Storage::makeDirectory('posts') ;

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
