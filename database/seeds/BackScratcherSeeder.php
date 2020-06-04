<?php

use Illuminate\Database\Seeder;

class BackScratcherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('back_scratchers')->insert([
            'item_name' => 'Thunderbolt VII',
            'item_description' => 'The Thunderbolt VII is produced in Manchester, England, as a competitor to the Firebolt Supreme. Many experts feel that the Thunderbolt VII has sacrificed safety for speed.',
            'item_size' => 'LG',
            'item_cost' => '150'
        ]);

        DB::table('back_scratchers')->insert([
            'item_name' => 'Shooting Star',
            'item_description' => 'Much like a shooting star, this back scratcher starts off powerful but after much use will fizzle out.',
            'item_size' => 'SM',
            'item_cost' => '50'
        ]);

        DB::table('back_scratchers')->insert([
            'item_name' => 'Nimbus 2001',
            'item_description' => 'The top of the Scratch Bling range. Capable of previously unseen speed and control. A world-class back scratcher.',
            'item_size' => 'MD',
            'item_cost' => '120'
        ]);

        DB::table('back_scratchers')->insert([
            'item_name' => 'Cleansweep Eleven',
            'item_description' => 'One of the first of its kind. Very reliable and easy to maintain.',
            'item_size' => 'MD',
            'item_cost' => '75'
        ]);


        DB::table('back_scratchers')->insert([
            'item_name' => 'Firebolt',
            'item_description' => 'This state-of-the-art back scratcher sports a streamlined superfine handle of ash, treated with a diamond-hard polish and hand-numbered with its own registration number.',
            'item_size' => 'XL',
            'item_cost' => '200'
        ]);
    }
}
