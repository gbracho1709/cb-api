<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

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
