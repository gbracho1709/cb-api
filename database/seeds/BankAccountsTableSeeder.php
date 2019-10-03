<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class BankAccountsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('bank_accounts')->insert(
            [
                [
                    'name' => 'Saving',
                    'created_at' => Carbon::now()
                ],
                [
                    'name' => 'Cheking',
                    'created_at' => Carbon::now()
                ]
            ]
        );
    }
}
