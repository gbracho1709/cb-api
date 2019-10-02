<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class BanksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('banks')->insert(
            [
                [
                    'name' => 'Chase',
                    'created_at' => Carbon::now()
                ],
                [
                    'name' => 'Bank of America',
                    'created_at' => Carbon::now()
                ],
                [
                    'name' => 'Citibank',
                    'created_at' => Carbon::now()
                ],
                [
                    'name' => 'Capital One',
                    'created_at' => Carbon::now()
                ]
            ]
        );
    }
}
