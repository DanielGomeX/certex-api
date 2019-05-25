<?php

use Illuminate\Database\Seeder;
use App\Models\User;
use \Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $password = bcrypt('123456');

        User::insert([
            [
                'id' => 1,
                'name' => 'Vítor Soares Vian',
                'email' => 'vitor@certex.com',
                'password' => $password,
                'companies_id' => 1,
                'access_levels_id' => 1
            ],
            [
                'id' => 2,
                'name' => 'Jackson Wilbuch',
                'email' => 'jackson@certex.com',
                'password' => $password,
                'companies_id' => 1,
                'access_levels_id' => 1
            ],
            [
                'id' => 3,
                'name' => 'Anderson Caye',
                'email' => 'anderson@certex.com',
                'password' => $password,
                'companies_id' => 1,
                'access_levels_id' => 1
            ],
        ]);

        DB::statement("ALTER SEQUENCE users_id_seq RESTART WITH 4");
    }
}
