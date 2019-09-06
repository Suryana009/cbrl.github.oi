<?php

namespace App\Http\Controllers;
use DB;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{
    function index()
    {
        if(Auth::user()->name == '')
        {
            return redirect('/');
        }
        else
        {
            return view('users.index');
        }
    }

    function show_user_DT()
    {
        $list = User::show_user_DT();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $part) {
            $no++;
            $row = array();
            $row[] = "<div class='text-center'>".$no."</div>";
            $row[] = $part->name;
            $row[] = $part->email;

            $edit = "<a class=\"btn btn-primary btn-sm\" style=\"width: 65px;\" href=\"user/edit/$part->id\">".__('general.edit')."</a>";

            if($part->status == 1)
            {
                $button = "<a class=\"btn btn-danger btn-sm\" style=\"width: 65px;\" onclick=\"hapus_data('$part->id', '$part->name')\">".__('general.delete')."</a>";
            }
            else
            {
                $button = "<a class=\"btn btn-warning btn-sm\" style=\"width: 65px;\" onclick=\"aktif_data('$part->id', '$part->name')\">".__('general.activate')."</a>";
            }

            $row[] = "<div class='text-center'>".$edit." ".$button."</div>";
        
            $data[] = $row;
        }

        $output = array(
                "draw" => $_POST['draw'],
                    "recordsTotal" => User::count_all_show_user_DT(),
                    "recordsFiltered" => User::count_filtered_show_user_DT(),
                "data" => $data,
        );
        //output to json format
        echo json_encode($output);
    }

    function create()
    {
        if(Auth::user()->name == '')
        {
            return redirect('/');
        }
        else
        {
            return view('users.form');
        }
    }

    function store(Request $request)
    {
        $data = new User([
            'name'       	=> $request->get('name'),
            'email'       	=> $request->get('email'),
            'password'      => bcrypt($request->get('password')),
            'keyword'       => $request->get('password'),
            'created_at'    => date('Y-m-d h:i:s', strtotime('now')),
            'status'        => 1
        ]);
        
        $data->save();
    }

    function edit($id)
    {
        $user = User::find($id);

        if(Auth::user()->name == '')
        {
            return redirect('/');
        }
        else
        {
            return view('users.form', ['user' => $user]);
        }
    }

    function update(Request $request, $id)
    {
        $data = User::find($id);
        $data->name      	= $request->get('name');
        $data->email      	= $request->get('email');
        $data->password     = bcrypt($request->get('password'));
        $data->keyword      = $request->get('password');
        $data->updated_at   = date('Y-m-d h:i:s', strtotime('now'));
        $data->status       = $request->get('status');
        
        $data->save();
    }

    function destroy($id)
    {
        $data = User::find($id);
        $data->delete();
    }

    function unactivate(Request $request, $id)
    {
        $data = User::find($id);
        $data->status   = 0;
        $data->save();
    }

    function activate(Request $request, $id)
    {
        $data = User::find($id);
        $data->status   = 1;
        $data->save();
    }
}
