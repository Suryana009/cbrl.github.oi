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
        $this->call(UserSeeder::class);
        $this->call(DiseaseSeeder::class);
        $this->call(SolutionSeeder::class);
        $this->call(SymptomSeeder::class);
        $this->call(CaseSeeder::class);
    }
}
