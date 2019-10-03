<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call('CountriesTableSeeder');
        $this->call('StatesTableSeeder');
        $this->call('CitiesTableSeeder');
        $this->call('OfficesTableSeeder');
        $this->call('UsersTableSeeder');
        $this->call('LicenseTypesTableSeeder');
        $this->call('BanksTableSeeder');
        $this->call('CredentialInputsTableSeeder');
        $this->call('BankAccountsTableSeeder');
        $this->call('PlansTableSeeder');
        $this->call('SchemesTableSeeder');
        $this->call('ClasificationsTableSeeder');
    }
}
