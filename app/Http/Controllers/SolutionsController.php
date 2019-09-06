<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Solutions;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class SolutionsController extends Controller
{
    function index()
    {
        if(Auth::user()->name == '')
        {
            return redirect('/');
        }
        else
        {
            return view('solutions.index');
        }
    }

    function show_solution_DT()
    {
        $list = Solutions::show_solution_DT();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $part) {
            $no++;
            $row = array();
            $row[] = "<div class='text-center'>".$no."</div>";
            $row[] = $part->disease;
            $row[] = $part->solution;

            $edit = "<a class=\"btn btn-primary btn-sm\" style=\"width: 65px;\" href=\"solution/edit/$part->id\">".__('general.edit')."</a>";

            if($part->status == 1)
            {
                $button = "<a class=\"btn btn-danger btn-sm\" style=\"width: 65px;\" onclick=\"hapus_data('$part->id', '$part->solution')\">".__('general.delete')."</a>";
            }
            else
            {
                $button = "<a class=\"btn btn-warning btn-sm\" style=\"width: 65px;\" onclick=\"aktif_data('$part->id', '$part->solution')\">".__('general.activate')."</a>";
            }

            $row[] = "<div class='text-center'>".$edit." ".$button."</div>";
        
            $data[] = $row;
        }

        $output = array(
                "draw" => $_POST['draw'],
                    "recordsTotal" => Solutions::count_all_show_solution_DT(),
                    "recordsFiltered" => Solutions::count_filtered_show_solution_DT(),
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

        if(Auth::user()->name == '')
        {
            return redirect('/');
        }
        else
        {
            return view('solutions.form', ['disease' => $disease]);
        }
    }

    function store(Request $request)
    {
        $data = new Solutions([
            'solution'      => $request->get('solution'),
            'disease_id'    => $request->get('disease_id'),
            'created_at'    => date('Y-m-d h:i:s', strtotime('now')),
            'status'        => 1
        ]);
        
        $data->save();
    }

    function edit($id)
    {
        $solution = Solutions::find($id);

        $disease = DB::table('diseases')
                    ->orderBy('disease', 'asc')
                    ->get();

        if(Auth::user()->name == '')
        {
            return redirect('/');
        }
        else
        {
            return view('solutions.form', ['solution' => $solution, 'disease' => $disease]);
        }
    }

    function update(Request $request, $id)
    {
        $data = Solutions::find($id);
        $data->solution     = $request->get('solution');
        $data->disease_id   = $request->get('disease_id');
        $data->updated_at   = date('Y-m-d h:i:s', strtotime('now'));
        $data->status       = $request->get('status');
        
        $data->save();
    }

    function destroy($id)
    {
        $data = Solutions::find($id);
        $data->delete();
    }

    function unactivate(Request $request, $id)
    {
        $data = Solutions::find($id);
        $data->status   = 0;
        $data->save();
    }

    function activate(Request $request, $id)
    {
        $data = Solutions::find($id);
        $data->status   = 1;
        $data->save();
    }
}
