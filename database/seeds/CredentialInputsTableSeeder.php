<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class CredentialInputsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('credential_inputs')->insert(
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
