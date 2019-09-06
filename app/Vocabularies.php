<?php
namespace App;

use DB;
use Illuminate\Database\Eloquent\Model;

class Vocabularies extends Model
{
    public static function show_vocabulary_DT()
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

		if($_POST['length'] != -1)
		{
			return $query->offset($_POST['start'])->limit($_POST['length'])->get();
		}
	}

	public static function count_filtered_show_vocabulary_DT()
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

	public static function count_all_show_vocabulary_DT()
	{
		$table = "languages";
		return DB::table($table)->count();
	}

	public static function get_all_data_key()
    {
        $table = DB::table('keywords')
        				->leftJoin('vocabularies', 'vocabularies.keyword_id', '=', 'keywords.id')
        				->select('keywords.id as id_keyword', 'vocabularies.id as id_vocabulary', 'description', 'keyword')
        				->orderBy('keyword', 'asc')
        				->groupBy('keyword')
        				->get();
        return $table;
    }

	public static function data_vocabulary($id)
	{
		$table = DB::table('languages')
						->leftJoin('vocabularies', 'vocabularies.language_id', '=', 'languages.id')
						->select('*', 'languages.id as id_language', 'vocabularies.id as id_vocabulary')
						->where('languages.id', $id);
		return $table->first();
	}

	public static function get_all_data_vocabulary($id_keyword, $id_language)
	{
		$table = DB::table('vocabularies')
						->where('keyword_id', $id_keyword)
						->where('language_id', $id_language);
		return $table;
	}

	public static function save_data_vocabulary($data)
	{
		DB::table('vocabularies')->insert($data);
		return true;
	}

	public static function update_data_vocabulary($id, $data)
	{
		DB::table('vocabularies')->where('id', $id)->update($data);
		return true;
	}

    public $fillable = [
    	'keyword_id',
    	'language_id',
    	'description',
    	'created_at',
    	'updated_at',
    	'status'
    ];
}
