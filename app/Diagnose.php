<?php

namespace App;

use DB;
use Illuminate\Database\Eloquent\Model;

class Diagnose extends Model
{
    public static function hitung_gejala_cocok($id, $symptom)
	{
		$data = DB::table('cases')
					->where('cases_no', $id)
					->whereIn('symptom_id', $symptom)
					->get();
		return $data;
	}

    public static function hitung_gejala_kasus($id)
	{
		$data = DB::table('cases')
					->where('cases_no', $id)
					->get();
		return $data;
	}

	public static function get_penyakit_by_kasus_name($val)
	{
		$data = DB::table('cases')
					->leftJoin('diseases', 'diseases.id', '=', 'cases.disease_id')
					->select('disease')
					->where('cases_no', $val)
					->value('disease');
		return $data;
	}

	public static function get_penyakit_by_kasus_id($val)
	{
		$data = DB::table('cases')
					->leftJoin('diseases', 'diseases.id', '=', 'cases.disease_id')
					->select('*', 'diseases.id as id_disease')
					->where('cases_no', $val)
					->value('id_disease');
		return $data;
	}
}
