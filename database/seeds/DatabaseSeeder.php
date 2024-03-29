<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(StatesTableSeeder::class);
        $this->call(CitiesTableSeeder::class);
        $this->call(CompaniesTableSeeder::class);
        $this->call(AccessLevelsTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(ExtinguishersTypesTableSeeder::class);
        $this->call(QuestionsTableSeeder::class);
        $this->call(AlternativesTableSeeder::class);
        $this->call(QuestionsAlternativesTableSeeder::class);
        $this->call(ManufacturersTableSeeder::class);
        $this->call(ExtinguishersTableSeeder::class);
        $this->call(CertificationsTableSeeder::class);
        $this->call(AnswersTableSeeder::class);
    }
}
