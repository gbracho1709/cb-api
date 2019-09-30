<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class CitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cities')->insert(
            [
                [
                    'name' => 'Abbeville',
                    'stateId' => 1,
                    'created_at' => Carbon::now()
                ],
                [
                    'name' => 'Bay Minette',
                    'stateId' => 1,
                    'created_at' => Carbon::now()
                ],
                [
                    'name' => 'Hoover',
                    'stateId' => 1,
                    'created_at' => Carbon::now()
                ],
                [
                    'name' => 'Ouzinkie',
                    'stateId' => 2,
                    'created_at' => Carbon::now()
                ],
                [
                    'name' => 'Platinum',
                    'stateId' => 2,
                    'created_at' => Carbon::now()
                ],
                [
                    'name' => 'Cave Creek',
                    'stateId' => 3,
                    'created_at' => Carbon::now()
                ],
                [
                    'name' => 'Chandler',
                    'stateId' => 3,
                    'created_at' => Carbon::now()
                ],
                [
                    'name' => 'Fredonia',
                    'stateId' => 3,
                    'created_at' => Carbon::now()
                ],
                [
                    'name' => 'Oro Valley',
                    'stateId' => 3,
                    'created_at' => Carbon::now()
                ],
                [
                    'name' => 'North Little Rock',
                    'stateId' => 4,
                    'created_at' => Carbon::now()
                ],
                [
                    'name' => 'Rogers',
                    'stateId' => 4,
                    'created_at' => Carbon::now()
                ]
            ]
        );
    }
}
