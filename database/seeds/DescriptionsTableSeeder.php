<?php

use Illuminate\Database\Seeder;

class DescriptionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('descriptions')->insert(
            [
                [
                    'name' => 'Breadcrumb',
                    'created_at' => Carbon::now()
                ],
                [
                    'name' => 'Domain',
                    'created_at' => Carbon::now()
                ],
                [
                    'name' => 'NYC',
                    'created_at' => Carbon::now()
                ]
            ]
        );
    }
}
