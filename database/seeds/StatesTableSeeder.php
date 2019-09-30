<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class StatesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('states')->insert(
            [
                [
                    'name' => 'Alabama',
                    'countryId' => 1,
                    'created_at' => Carbon::now()
                ],
                [
                    'name' => 'Alaska',
                    'countryId' => 1,
                    'created_at' => Carbon::now()
                ],    
                [
                    'name' => 'Arizona',
                    'countryId' => 1,
                    'created_at' => Carbon::now()
                ],
                [
                    'name' => 'Arkansas',
                    'countryId' => 1,
                    'created_at' => Carbon::now()
                ]
            ]
        );
    }
}
