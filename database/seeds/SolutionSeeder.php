<?php

use Illuminate\Database\Seeder;

class SolutionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //delete users table records
		DB::table('solutions')->delete();
		//insert some dummy records
		DB::table('solutions')->insert(array(
			array('id' => '1', 'solution' => 'Banyakin tidur jangan begadang', 'disease_id' => '1', 'status' => '1', 'created_at' => date('Y-m-d h:i:s', strtotime('now'))),
			array('id' => '2', 'solution' => 'Kurangin ngrokok', 'disease_id' => '2', 'status' => '1', 'created_at' => date('Y-m-d h:i:s', strtotime('now'))),
			array('id' => '3', 'solution' => 'Hindari air yang jatuh dari awan', 'disease_id' => '3', 'status' => '1', 'created_at' => date('Y-m-d h:i:s', strtotime('now'))),
			array('id' => '4', 'solution' => 'Kurangin yang enak enak', 'disease_id' => '4', 'status' => '1', 'created_at' => date('Y-m-d h:i:s', strtotime('now'))),
		));
    }
}
