<?php

use Illuminate\Database\Seeder;

class SymptomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		//delete users table records
		DB::table('symptoms')->delete();
		//insert some dummy records
		DB::table('symptoms')->insert(array(
			array('id' => '1', 'symptom' => 'Badan Panas', 'status' => '1', 'created_at' => date('Y-m-d h:i:s', strtotime('now'))),
			array('id' => '2', 'symptom' => 'Sakit Kepala', 'status' => '1', 'created_at' => date('Y-m-d h:i:s', strtotime('now'))),
			array('id' => '3', 'symptom' => 'Bersin-Bersin', 'status' => '1', 'created_at' => date('Y-m-d h:i:s', strtotime('now'))),
			array('id' => '4', 'symptom' => 'Batuk', 'status' => '1', 'created_at' => date('Y-m-d h:i:s', strtotime('now'))),
			array('id' => '5', 'symptom' => 'Pilek, Hidung Buntu', 'status' => '1', 'created_at' => date('Y-m-d h:i:s', strtotime('now'))),
			array('id' => '6', 'symptom' => 'Badan Lemas', 'status' => '1', 'created_at' => date('Y-m-d h:i:s', strtotime('now'))),
			array('id' => '7', 'symptom' => 'Kedinginan', 'status' => '1', 'created_at' => date('Y-m-d h:i:s', strtotime('now'))),
			array('id' => '8', 'symptom' => 'Tenggorokan Sakit', 'status' => '1', 'created_at' => date('Y-m-d h:i:s', strtotime('now'))),
		));
    }
}
