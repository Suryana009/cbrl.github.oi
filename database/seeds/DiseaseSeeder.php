<?php

use Illuminate\Database\Seeder;

class DiseaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		//delete users table records
		DB::table('diseases')->delete();
		//insert some dummy records
		DB::table('diseases')->insert(array(
			array('id' => '1', 'disease' => 'Anemia', 'status' => '1', 'created_at' => date('Y-m-d h:i:s', strtotime('now'))),
			array('id' => '2', 'disease' => 'Bronkhitis', 'status' => '1', 'created_at' => date('Y-m-d h:i:s', strtotime('now'))),
			array('id' => '3', 'disease' => 'Flu', 'status' => '1', 'created_at' => date('Y-m-d h:i:s', strtotime('now'))),
			array('id' => '4', 'disease' => 'Demam', 'status' => '1', 'created_at' => date('Y-m-d h:i:s', strtotime('now'))),
		));
    }
}
