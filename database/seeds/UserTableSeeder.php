<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Toti Cuervo',
            'email' => 'cuervor14@gmail.com',
            'password' => Hash::make('password'),
            'api_token' => 'a4tngEzDfgQbSTTpeVXGrXEZwHWQZ6bwNrpXElhzy6ynKsLD1biI4oFg8mbH'
        ]);
    }

}
