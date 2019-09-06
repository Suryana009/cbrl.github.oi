<?php
namespace App;

use DB;
use Illuminate\Database\Eloquent\Model;

class Languages extends Model
{
    public static function show_language_DT()
	{
		$table = "languages";
		$column_order = array(null, 'code', 'language');
		$column_search = array('code', 'language');
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

	public static function count_filtered_show_language_DT()
	{
		$table = "languages";
		$column_order = array(null, 'language');
		$column_search = array('language');
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

	public static function count_all_show_language_DT()
	{
		$table = "languages";
		return DB::table($table)->count();
	}

	public static function get_all_language()
	{
		$table = DB::table('languages')->where('status', '1')->get();
		return $table;
	}

	public static function get_language_name($code)
	{
		$language = DB::table('languages')->where('code', $code)->value('language');
		return $language;
	}

    public $fillable = [
    	'code',
    	'language',
    	'created_at',
    	'updated_at',
    	'status'
    ];
}
