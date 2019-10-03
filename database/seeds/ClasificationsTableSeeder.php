<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class ClasificationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('clasifications')->insert(
            [
                [
                    'code' => 233100,
                    'name' => 'Printing ^RElated Support Activities',
                    'created_at' => Carbon::now()
                ],
                [
                    'code' => 236110,
                    'name' => 'Residential Building Constructions',
                    'created_at' => Carbon::now()
                ],
                [
                    'code' => 238220,
                    'name' => 'Plumbing. Heating ^Air/Conditioning Contractors',
                    'created_at' => Carbon::now()
                ],
                [
                    'code' => 334310,
                    'name' => 'Audio ^Video Equipment Mfg',
                    'created_at' => Carbon::now()
                ]
            ]
        );
    }
}
