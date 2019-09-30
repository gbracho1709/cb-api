<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class CountriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('countries')->insert(
            [                
                'shortName' => 'US',
                'name' => 'United States',
                'phoneCode' => 1,
                'created_at' => Carbon::now(),
            ]
        );
    }
}
