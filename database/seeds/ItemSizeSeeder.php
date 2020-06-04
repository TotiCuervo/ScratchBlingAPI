<?php

use Illuminate\Database\Seeder;

class ItemSizeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('item_sizes')->insert([
            'size' => 'SM',
        ]);

        DB::table('item_sizes')->insert([
            'size' => 'MD',
        ]);

        DB::table('item_sizes')->insert([
            'size' => 'LG',
        ]);

        DB::table('item_sizes')->insert([
            'size' => 'XL',
        ]);
    }
}
