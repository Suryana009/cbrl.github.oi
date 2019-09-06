<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Cases;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CasesController extends Controller
{
    function index()
    {
        if(Auth::user()->name == '')
        {
            return redirect('/');
        }
        else
        {
            return view('cases.index');
        }
    }

    function show_case_DT()
    {
        $list = Cases::show_case_DT();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $part) {
            $no++;
            $row = array();
            $row[] = "<div class='text-center'>".$no."</div>";
            $row[] = $part->cases_no;
            $row[] = $part->disease;
            $row[] = $part->symptom;

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
                    "recordsTotal" => Cases::count_all_show_case_DT(),
                    "recordsFiltered" => Cases::count_filtered_show_case_DT(),
                "data" => $data,
        );
        //output to json format
        echo json_encode($output);
    }

    function create()
    {
    	$disease = DB::table('diseases')
                    ->orderBy('disease', 'asc')
                    ->get();

        $symptom = DB::table('symptoms')
                    ->orderBy('symptom', 'asc')
                    ->get();

        if(Auth::user()->name == '')
        {
            return redirect('/');
        }
        else
        {
            return view('cases.form', ['disease' => $disease, 'symptom' => $symptom]);
        }
    }

    function store(Request $request)
    {
        $data = new Cases([
            'cases_no'      => $request->get('cases_no'),
            'disease_id'    => $request->get('disease_id'),
            'symptom_id'    => $request->get('symptom_id'),
            'created_at'    => date('Y-m-d h:i:s', strtotime('now')),
            'status'        => 1
        ]);
        
        $data->save();
    }

    function edit($id)
    {
        $case = Cases::find($id);

        $disease = DB::table('diseases')
                    ->orderBy('disease', 'asc')
                    ->get();

        $symptom = DB::table('symptoms')
                    ->orderBy('symptom', 'asc')
                    ->get();

        if(Auth::user()->name == '')
        {
            return redirect('/');
        }
        else
        {
            return view('cases.form', ['case' => $case, 'disease' => $disease, 'symptom' => $symptom]);
        }
    }

    function update(Request $request, $id)
    {
        $data = Cases::find($id);
        $data->cases_no     = $request->get('cases_no');
        $data->disease_id   = $request->get('disease_id');
        $data->symptom_id   = $request->get('symptom_id');
        $data->updated_at   = date('Y-m-d h:i:s', strtotime('now'));
        $data->status       = $request->get('status');
        
        $data->save();
    }

    function destroy($id)
    {
        $data = Cases::find($id);
        $data->delete();
    }

    function unactivate(Request $request, $id)
    {
        $data = Cases::find($id);
        $data->status   = 0;
        $data->save();
    }

    function activate(Request $request, $id)
    {
        $data = Cases::find($id);
        $data->status   = 1;
        $data->save();
    }
}
