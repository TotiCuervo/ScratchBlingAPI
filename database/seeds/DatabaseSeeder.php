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
        $this->call(ItemSizeSeeder::class);
        $this->call(BackScratcherSeeder::class);
        $this->call(UserTableSeeder::class);
    }
}
