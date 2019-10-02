<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class SchemesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('schemes')->insert(
            [
                [
                    'name' => 'Monthly',
                    'created_at' => Carbon::now()
                ],
                [
                    'name' => 'Trimestre',
                    'created_at' => Carbon::now()
                ],
                [
                    'name' => 'Semestre',
                    'created_at' => Carbon::now()
                ],
                [
                    'name' => 'Yearly',
                    'created_at' => Carbon::now()
                ]
            ]
        );
    }
}
