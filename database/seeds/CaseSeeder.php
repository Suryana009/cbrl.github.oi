<?php

use Illuminate\Database\Seeder;

class CaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		//delete users table records
		DB::table('cases')->delete();
		//insert some dummy records
		DB::table('cases')->insert(array(
			array('id' => '1', 'cases_no' => '1', 'disease_id' => '1', 'symptom_id' => '2', 'status' => '1', 'created_at' => date('Y-m-d h:i:s', strtotime('now'))),
			array('id' => '2', 'cases_no' => '1', 'disease_id' => '1', 'symptom_id' => '6', 'status' => '1', 'created_at' => date('Y-m-d h:i:s', strtotime('now'))),
			array('id' => '3', 'cases_no' => '2', 'disease_id' => '1', 'symptom_id' => '2', 'status' => '1', 'created_at' => date('Y-m-d h:i:s', strtotime('now'))),
			array('id' => '4', 'cases_no' => '2', 'disease_id' => '1', 'symptom_id' => '6', 'status' => '1', 'created_at' => date('Y-m-d h:i:s', strtotime('now'))),
			array('id' => '5', 'cases_no' => '2', 'disease_id' => '1', 'symptom_id' => '7', 'status' => '1', 'created_at' => date('Y-m-d h:i:s', strtotime('now'))),
			array('id' => '6', 'cases_no' => '3', 'disease_id' => '2', 'symptom_id' => '1', 'status' => '1', 'created_at' => date('Y-m-d h:i:s', strtotime('now'))),
			array('id' => '7', 'cases_no' => '3', 'disease_id' => '2', 'symptom_id' => '3', 'status' => '1', 'created_at' => date('Y-m-d h:i:s', strtotime('now'))),
			array('id' => '8', 'cases_no' => '3', 'disease_id' => '2', 'symptom_id' => '3', 'status' => '1', 'created_at' => date('Y-m-d h:i:s', strtotime('now'))),
			array('id' => '9', 'cases_no' => '3', 'disease_id' => '2', 'symptom_id' => '8', 'status' => '1', 'created_at' => date('Y-m-d h:i:s', strtotime('now'))),
			array('id' => '10', 'cases_no' => '4', 'disease_id' => '2', 'symptom_id' => '3', 'status' => '1', 'created_at' => date('Y-m-d h:i:s', strtotime('now'))),
			array('id' => '11', 'cases_no' => '4', 'disease_id' => '2', 'symptom_id' => '4', 'status' => '1', 'created_at' => date('Y-m-d h:i:s', strtotime('now'))),
			array('id' => '12', 'cases_no' => '4', 'disease_id' => '2', 'symptom_id' => '8', 'status' => '1', 'created_at' => date('Y-m-d h:i:s', strtotime('now'))),
			array('id' => '13', 'cases_no' => '5', 'disease_id' => '3', 'symptom_id' => '1', 'status' => '1', 'created_at' => date('Y-m-d h:i:s', strtotime('now'))),
			array('id' => '14', 'cases_no' => '5', 'disease_id' => '3', 'symptom_id' => '6', 'status' => '1', 'created_at' => date('Y-m-d h:i:s', strtotime('now'))),
			array('id' => '15', 'cases_no' => '5', 'disease_id' => '3', 'symptom_id' => '7', 'status' => '1', 'created_at' => date('Y-m-d h:i:s', strtotime('now'))),
			array('id' => '16', 'cases_no' => '6', 'disease_id' => '3', 'symptom_id' => '1', 'status' => '1', 'created_at' => date('Y-m-d h:i:s', strtotime('now'))),
			array('id' => '17', 'cases_no' => '6', 'disease_id' => '3', 'symptom_id' => '2', 'status' => '1', 'created_at' => date('Y-m-d h:i:s', strtotime('now'))),
			array('id' => '18', 'cases_no' => '6', 'disease_id' => '3', 'symptom_id' => '6', 'status' => '1', 'created_at' => date('Y-m-d h:i:s', strtotime('now'))),
			array('id' => '19', 'cases_no' => '6', 'disease_id' => '3', 'symptom_id' => '7', 'status' => '1', 'created_at' => date('Y-m-d h:i:s', strtotime('now'))),
			array('id' => '20', 'cases_no' => '7', 'disease_id' => '4', 'symptom_id' => '1', 'status' => '1', 'created_at' => date('Y-m-d h:i:s', strtotime('now'))),
			array('id' => '21', 'cases_no' => '7', 'disease_id' => '4', 'symptom_id' => '2', 'status' => '1', 'created_at' => date('Y-m-d h:i:s', strtotime('now'))),
			array('id' => '22', 'cases_no' => '7', 'disease_id' => '4', 'symptom_id' => '3', 'status' => '1', 'created_at' => date('Y-m-d h:i:s', strtotime('now'))),
			array('id' => '23', 'cases_no' => '7', 'disease_id' => '4', 'symptom_id' => '4', 'status' => '1', 'created_at' => date('Y-m-d h:i:s', strtotime('now'))),
			array('id' => '24', 'cases_no' => '7', 'disease_id' => '4', 'symptom_id' => '5', 'status' => '1', 'created_at' => date('Y-m-d h:i:s', strtotime('now'))),
			array('id' => '25', 'cases_no' => '7', 'disease_id' => '4', 'symptom_id' => '6', 'status' => '1', 'created_at' => date('Y-m-d h:i:s', strtotime('now'))),
			array('id' => '26', 'cases_no' => '7', 'disease_id' => '4', 'symptom_id' => '7', 'status' => '1', 'created_at' => date('Y-m-d h:i:s', strtotime('now'))),
			array('id' => '27', 'cases_no' => '8', 'disease_id' => '4', 'symptom_id' => '1', 'status' => '1', 'created_at' => date('Y-m-d h:i:s', strtotime('now'))),
			array('id' => '28', 'cases_no' => '8', 'disease_id' => '4', 'symptom_id' => '2', 'status' => '1', 'created_at' => date('Y-m-d h:i:s', strtotime('now'))),
			array('id' => '29', 'cases_no' => '8', 'disease_id' => '4', 'symptom_id' => '3', 'status' => '1', 'created_at' => date('Y-m-d h:i:s', strtotime('now'))),
			array('id' => '30', 'cases_no' => '8', 'disease_id' => '4', 'symptom_id' => '5', 'status' => '1', 'created_at' => date('Y-m-d h:i:s', strtotime('now'))),
			array('id' => '31', 'cases_no' => '8', 'disease_id' => '4', 'symptom_id' => '6', 'status' => '1', 'created_at' => date('Y-m-d h:i:s', strtotime('now'))),
			array('id' => '32', 'cases_no' => '8', 'disease_id' => '4', 'symptom_id' => '7', 'status' => '1', 'created_at' => date('Y-m-d h:i:s', strtotime('now'))),
			array('id' => '33', 'cases_no' => '8', 'disease_id' => '4', 'symptom_id' => '8', 'status' => '1', 'created_at' => date('Y-m-d h:i:s', strtotime('now'))),
			array('id' => '34', 'cases_no' => '9', 'disease_id' => '4', 'symptom_id' => '1', 'status' => '1', 'created_at' => date('Y-m-d h:i:s', strtotime('now'))),
			array('id' => '35', 'cases_no' => '9', 'disease_id' => '4', 'symptom_id' => '3', 'status' => '1', 'created_at' => date('Y-m-d h:i:s', strtotime('now'))),
			array('id' => '36', 'cases_no' => '9', 'disease_id' => '4', 'symptom_id' => '4', 'status' => '1', 'created_at' => date('Y-m-d h:i:s', strtotime('now'))),
			array('id' => '37', 'cases_no' => '9', 'disease_id' => '4', 'symptom_id' => '5', 'status' => '1', 'created_at' => date('Y-m-d h:i:s', strtotime('now'))),
			array('id' => '38', 'cases_no' => '9', 'disease_id' => '4', 'symptom_id' => '6', 'status' => '1', 'created_at' => date('Y-m-d h:i:s', strtotime('now'))),
			array('id' => '39', 'cases_no' => '9', 'disease_id' => '4', 'symptom_id' => '7', 'status' => '1', 'created_at' => date('Y-m-d h:i:s', strtotime('now'))),
			array('id' => '40', 'cases_no' => '9', 'disease_id' => '4', 'symptom_id' => '8', 'status' => '1', 'created_at' => date('Y-m-d h:i:s', strtotime('now'))),
		));
    }
}
