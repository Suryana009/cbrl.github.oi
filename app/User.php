<?php
namespace App;

use DB;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    public static function show_user_DT()
    {
        $table = "users";
        $column_order = array(null, 'name', 'email');
        $column_search = array('name', 'email');
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

    public static function count_filtered_show_user_DT()
    {
        $table = "users";
        $column_order = array(null, 'name', 'email');
        $column_search = array('name', 'email');
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

    public static function count_all_show_user_DT()
    {
        $table = "users";
        return DB::table($table)->count();
    }

    protected $fillable = [
        'name', 'email', 'password', 'status'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public static function cek_password($value)
    {
        $data = DB::table('users')
                    ->where('password', $value)
                    ->get();
        return $data;
    }
}
