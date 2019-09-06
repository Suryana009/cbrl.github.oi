<?php
namespace App;

use DB;
use Illuminate\Database\Eloquent\Model;

class Symptoms extends Model
{
    public static function show_symptom_DT()
	{
		$table = "symptoms";
		$column_order = array(null, 'symptom');
		$column_search = array('symptom');
		$order = array('id' => 'asc'); 
	
		$query = DB::table($table)->select('*');
		
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

	public static function count_filtered_show_symptom_DT()
	{
		$table = "symptoms";
		$column_order = array(null, 'symptom');
		$column_search = array('symptom');
		$order = array('id' => 'asc'); 
	
		$query = DB::table($table)->select('*');
		
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

	public static function count_all_show_symptom_DT()
	{
		$table = "symptoms";
		return DB::table($table)->count();
	}

    public $fillable = [
    	'symptom',
    	'created_at',
    	'updated_at',
    	'status'
    ];
}
