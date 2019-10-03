<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class CredentialDescriptionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('credential_descriptions')->insert(
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
