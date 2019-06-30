<?php

use Illuminate\Database\Seeder;
use App\Models\Company;
use \Illuminate\Support\Facades\DB;

class CompaniesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Company::insert([
            [
                'id' => 1,
                'cnpj' => '0000000000',
                'state_registration' => '00000000',
                'social_name' => 'Certex',
                'fantasy_name' => 'Certex',
                'state' => 'Rio Grande do Sul',
                'city' => 'Lajeado',
                'cep'  => 95950186
            ]
        ]);

        DB::statement("ALTER SEQUENCE companies_id_seq RESTART WITH 2");
    }
}
