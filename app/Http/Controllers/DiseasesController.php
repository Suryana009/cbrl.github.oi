<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Diseases;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DiseasesController extends Controller
{
    function index()
    {
        if(Auth::user()->name == '')
        {
            return redirect('/');
        }
        else
        {
            return view('diseases.index');
        }
    }

    function show_disease_DT()
    {
        $list = Diseases::show_disease_DT();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $part) {
            $no++;
            $row = array();
            $row[] = "<div class='text-center'>".$no."</div>";
            $row[] = $part->disease;

            $edit = "<a class=\"btn btn-primary btn-sm\" style=\"width: 65px;\" href=\"disease/edit/$part->id\">".__('general.edit')."</a>";

            if($part->status == 1)
            {
                $button = "<a class=\"btn btn-danger btn-sm\" style=\"width: 65px;\" onclick=\"hapus_data('$part->id', '$part->disease')\">".__('general.delete')."</a>";
            }
            else
            {
                $button = "<a class=\"btn btn-warning btn-sm\" style=\"width: 65px;\" onclick=\"aktif_data('$part->id', '$part->disease')\">".__('general.activate')."</a>";
            }

            $row[] = "<div class='text-center'>".$edit." ".$button."</div>";
        
            $data[] = $row;
        }

        $output = array(
                "draw" => $_POST['draw'],
                    "recordsTotal" => Diseases::count_all_show_disease_DT(),
                    "recordsFiltered" => Diseases::count_filtered_show_disease_DT(),
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
            return view('diseases.form');
        }
    }

    function store(Request $request)
    {
        $data = new Diseases([
            'disease'       => $request->get('disease'),
            'created_at'    => date('Y-m-d h:i:s', strtotime('now')),
            'status'        => 1
        ]);
        
        $data->save();
    }

    function edit($id)
    {
        $disease = Diseases::find($id);

        if(Auth::user()->name == '')
        {
            return redirect('/');
        }
        else
        {
            return view('diseases.form', ['disease' => $disease]);
        }
    }

    function update(Request $request, $id)
    {
        $data = Diseases::find($id);
        $data->disease      = $request->get('disease');
        $data->updated_at   = date('Y-m-d h:i:s', strtotime('now'));
        $data->status       = $request->get('status');
        
        $data->save();
    }

    function destroy($id)
    {
        $data = Diseases::find($id);
        $data->delete();
    }

    function unactivate(Request $request, $id)
    {
        $data = Diseases::find($id);
        $data->status   = 0;
        $data->save();
    }

    function activate(Request $request, $id)
    {
        $data = Diseases::find($id);
        $data->status   = 1;
        $data->save();
    }
}
