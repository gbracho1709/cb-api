<?php

use Illuminate\Database\Seeder;

class TypeCredentialsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('type_credentials')->insert(
            [
                [
                    'name' => 'Saving',
                    'created_at' => Carbon::now()
                ],
                [
                    'name' => 'Cheking',
                    'created_at' => Carbon::now()
                ]
            ]
        );
    }
}
