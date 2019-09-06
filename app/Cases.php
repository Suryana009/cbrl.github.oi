<?php
namespace App;

use DB;
use Illuminate\Database\Eloquent\Model;

class Cases extends Model
{
    public static function show_case_DT()
	{
		$table = "cases";
		$column_order = array(null, 'disease', 'cases_no', 'symptom');
		$column_search = array('disease', 'cases_no', 'symptom');
		$order = array('cases.id' => 'asc'); 
	
		$query = DB::table($table)
					->leftJoin('diseases', 'diseases.id', '=', 'cases.disease_id')
                    ->leftJoin('symptoms', 'symptoms.id', '=', 'cases.symptom_id')
                    ->select('*', 'cases.id' , 'cases.status');
		
		$i = 0;
	
		foreach ($column_search as $item)
		{
			if($_POST['search']['value'])
			{
				
				if($i===0)
				{
					$query->where($item, 'like', '%'.$_POST['search']['value'].'%')->get();
				}
				else
				{
					$query->orWhere($item, 'like', '%'.$_POST['search']['value'].'%')->get();
				}
			}
			$i++;
		}
		
		if(isset($_POST['order']))
		{
			$query->orderBy($column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
		} 
		else if(isset($order))
		{
			$order = $order;
			$query->orderBy(key($order), $order[key($order)])->get();
		}
		else 
		{
			$order = $order;
			$query->orderBy(key($order), $order[key($order)])->get();
		}

		if($_POST['length'] != -1)
		{
			return $query->offset($_POST['start'])->limit($_POST['length'])->get();
		}
	}

	public static function count_filtered_show_case_DT()
	{
		$table = "cases";
		$column_order = array(null, 'disease', 'cases_no', 'symptom');
		$column_search = array('disease', 'cases_no', 'symptom');
		$order = array('cases.id' => 'asc'); 
	
		$query = DB::table($table)
					->leftJoin('diseases', 'diseases.id', '=', 'cases.disease_id')
                    ->leftJoin('symptoms', 'symptoms.id', '=', 'cases.symptom_id')
                    ->select('*', 'cases.id' , 'cases.status');
		
		$i = 0;
	
		foreach ($column_search as $item)
		{
			if($_POST['search']['value'])
			{
				
				if($i===0)
				{
					$query->where($item, 'like', '%'.$_POST['search']['value'].'%')->get();
				}
				else
				{
					$query->orWhere($item, 'like', '%'.$_POST['search']['value'].'%')->get();
				}
			}
			$i++;
		}
		
		if(isset($_POST['order']))
		{
			$query->orderBy($column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
		} 
		else if(isset($order))
		{
			$order = $order;
			$query->orderBy(key($order), $order[key($order)])->get();
		}
		else 
		{
			$order = $order;
			$query->orderBy(key($order), $order[key($order)])->get();
		}
		return $query->count();
	}

	public static function count_all_show_case_DT()
	{
		$table = "cases";
		return DB::table($table)->count();
	}

	public $fillable = [
        'cases_no',
        'disease_id',
        'symptom_id',
        'created_at',
        'updated_at',
        'status'
    ];
}
