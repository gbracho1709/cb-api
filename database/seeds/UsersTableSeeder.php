<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert(
            [
                'name' => 'Donovan',
                'phone' => 125468879,
                'email' => 'davila@appostools.com',
                'isActive' => true,
                'invitation' => false,
                'discriminator' => 'administrator',
                'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', //secret                
                'created_at' => Carbon::now()
            ]
        );
    }
}
