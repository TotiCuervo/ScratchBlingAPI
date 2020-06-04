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

        DB::table('users')->insert([
            'name' => 'Cooper Luetje',
            'email' => 'cooper@bytelion.com',
            'password' => Hash::make('password'),
            'api_token' => 'oB2csMEweMqICeDd8M6ZYFVK28ezMIOLK1NGkR9MWNyuZpjh898ILeO4wuL4'
        ]);

        DB::table('users')->insert([
            'name' => 'Jake Margolis',
            'email' => 'jake.margolis@bytelion.com',
            'password' => Hash::make('password'),
            'api_token' => 'oc0sorM6HSm7qc3ERX7ZxL2qcm7KsHWJGausHjBXMyEIINdCB76RfamZjPvL'
        ]);
    }

}
