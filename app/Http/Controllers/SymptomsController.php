<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Symptoms;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class SymptomsController extends Controller
{
    function index()
    {
        if(Auth::user()->name == '')
        {
            return redirect('/');
        }
        else
        {
            return view('symptoms.index');
        }
    }

    function show_symptom_DT()
    {
        $list = Symptoms::show_symptom_DT();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $part) {
            $no++;
            $row = array();
            $row[] = "<div class='text-center'>".$no."</div>";
            $row[] = $part->symptom;

            $edit = "<a class=\"btn btn-primary btn-sm\" style=\"width: 65px;\" href=\"symptom/edit/$part->id\">".__('general.edit')."</a>";

            if($part->status == 1)
            {
                $button = "<a class=\"btn btn-danger btn-sm\" style=\"width: 65px;\" onclick=\"hapus_data('$part->id', '$part->symptom')\">".__('general.delete')."</a>";
            }
            else
            {
                $button = "<a class=\"btn btn-warning btn-sm\" style=\"width: 65px;\" onclick=\"aktif_data('$part->id', '$part->symptom')\">".__('general.activate')."</a>";
            }

            $row[] = "<div class='text-center'>".$edit." ".$button."</div>";
        
            $data[] = $row;
        }

        $output = array(
                "draw" => $_POST['draw'],
                    "recordsTotal" => Symptoms::count_all_show_symptom_DT(),
                    "recordsFiltered" => Symptoms::count_filtered_show_symptom_DT(),
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
            return view('symptoms.form');
        }
    }

    function store(Request $request)
    {
        $data = new Symptoms([
            'symptom'       => $request->get('symptom'),
            'created_at'    => date('Y-m-d h:i:s', strtotime('now')),
            'status'        => 1
        ]);
        
        $data->save();
    }

    function edit($id)
    {
        $symptom = Symptoms::find($id);

        if(Auth::user()->name == '')
        {
            return redirect('/');
        }
        else
        {
            return view('symptoms.form', ['symptom' => $symptom]);
        }
    }

    function update(Request $request, $id)
    {
        $data = Symptoms::find($id);
        $data->symptom      = $request->get('symptom');
        $data->updated_at   = date('Y-m-d h:i:s', strtotime('now'));
        $data->status       = $request->get('status');
        
        $data->save();
    }

    function destroy($id)
    {
        $data = Symptoms::find($id);
        $data->delete();
    }

    function unactivate(Request $request, $id)
    {
        $data = Symptoms::find($id);
        $data->status   = 0;
        $data->save();
    }

    function activate(Request $request, $id)
    {
        $data = Symptoms::find($id);
        $data->status   = 1;
        $data->save();
    }
}
