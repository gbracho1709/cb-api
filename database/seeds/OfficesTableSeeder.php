<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class OfficesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('offices')->insert(
            [
                'name' => 'Appostools',
                'dba' => 6548,
                'phone' => '(253) 656-8688',
                'fax' => '+17854589248',
                'ein' => 979876,
                'address' => 'appostools.com',
                'cityId' => 9,
                'zip' => 94546,
                'created_at' => Carbon::now()
            ]
        );

        factory('App\Office', 3)->create();
    }
}
