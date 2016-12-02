<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Admin',
            'email' => 'info@trailanalytics.com',
            'password' => bcrypt('admin'),
            'role' =>'admin',
        ]);
    }
}
