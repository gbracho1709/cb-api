<?php

use Illuminate\Database\Seeder;

class FormsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('forms')->insert(
            [
                [
                    'name' => 'MT-170',
                    'created_at' => Carbon::now(),
                ],
                [
                    'name' => 'ST-100',
                    'created_at' => Carbon::now(),
                ],
                [
                    'name' => 'ST-101',
                    'created_at' => Carbon::now(),
                ],
                [
                    'name' => 'ST-330',
                    'created_at' => Carbon::now(),
                ],
                [
                    'name' => 'WCS-2-PRE',
                    'created_at' => Carbon::now(),
                ]
            ]
        );
    }
}
