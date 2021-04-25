<?php

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
        $this->call(\Database\Seeders\FakeDataSeeder::class);
        $this->call(\Database\Seeders\CategorySeeder::class);
        $this->call(\Database\Seeders\JobSeeder::class);
        $this->call(\Database\Seeders\MeetingSeeder::class);
        $this->call(\Database\Seeders\UserAdminSeed::class);
        $this->call(\Database\Seeders\SubjectSeeder::class);

    }
}
