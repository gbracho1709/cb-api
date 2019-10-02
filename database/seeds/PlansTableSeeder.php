<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class PlansTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('plans')->insert(
            [
                [
                    'name' => 'C-Corporation',
                    'created_at' => Carbon::now()
                ],
                [
                    'name' => 'S-Corporation',
                    'created_at' => Carbon::now()
                ],
                [
                    'name' => 'LLC',
                    'created_at' => Carbon::now()
                ],
                [
                    'name' => 'Sole propietorships',
                    'created_at' => Carbon::now()
                ]
            ]
        );
    }
}
