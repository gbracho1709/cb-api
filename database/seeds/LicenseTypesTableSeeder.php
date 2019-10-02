<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class LicenseTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('license_types')->insert(
            [
                [
                    'name' => 'NYS Cigarette',
                    'created_at' => Carbon::now(),
                ],
                [
                    'name' => 'NYS Beer License',
                    'created_at' => Carbon::now(),
                ],
                [
                    'name' => 'CA Electronics Store License',
                    'created_at' => Carbon::now(),
                ],
                [
                    'name' => 'CA Secondhand Dealer - General',
                    'created_at' => Carbon::now(),
                ],
                [
                    'name' => 'CA Electronic and Home Appliance Service License',
                    'created_at' => Carbon::now(),
                ]
            ]
        );
    }
}
