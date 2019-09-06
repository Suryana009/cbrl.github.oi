<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Keywords;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class KeywordsController extends Controller
{
    function index()
    {
        if(Auth::user()->name == '')
        {
            return redirect('/');
        }
        else
        {
            return view('keywords.index');
        }
    }

    function show_keyword_DT()
    {
        $list = keywords::show_keyword_DT();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $part) {
            $no++;
            $row = array();
            $row[] = "<div class='text-center'>".$no."</div>";
            $row[] = $part->keyword;

            $edit = "<a class=\"btn btn-primary btn-sm\" style=\"width: 65px;\" href=\"keyword/edit/$part->id\">".__('general.edit')."</a>";

            if($part->status == 1)
            {
                $button = "<a class=\"btn btn-danger btn-sm\" style=\"width: 65px;\" onclick=\"hapus_data('$part->id', '$part->keyword')\">".__('general.delete')."</a>";
            }
            else
            {
                $button = "<a class=\"btn btn-warning btn-sm\" style=\"width: 65px;\" onclick=\"aktif_data('$part->id', '$part->keyword')\">".__('general.activate')."</a>";
            }

            $row[] = "<div class='text-center'>".$edit." ".$button."</div>";
        
            $data[] = $row;
        }

        $output = array(
                "draw" => $_POST['draw'],
                    "recordsTotal" => keywords::count_all_show_keyword_DT(),
                    "recordsFiltered" => keywords::count_filtered_show_keyword_DT(),
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
            return view('keywords.form');
        }
    }

    function store(Request $request)
    {
        $data = new keywords([
            'keyword'       => $request->get('keyword'),
            'created_at'    => date('Y-m-d h:i:s', strtotime('now')),
            'status'        => 1
        ]);
        
        $data->save();
    }

    function edit($id)
    {
        $keyword = keywords::find($id);

        if(Auth::user()->name == '')
        {
            return redirect('/');
        }
        else
        {
            return view('keywords.form', ['keyword' => $keyword]);
        }
    }

    function update(Request $request, $id)
    {
        $data = keywords::find($id);
        $data->keyword      = $request->get('keyword');
        $data->updated_at   = date('Y-m-d h:i:s', strtotime('now'));
        $data->status       = $request->get('status');
        
        $data->save();
    }

    function destroy($id)
    {
        $data = keywords::find($id);
        $data->delete();
    }

    function unactivate(Request $request, $id)
    {
        $data = keywords::find($id);
        $data->status   = 0;
        $data->save();
    }

    function activate(Request $request, $id)
    {
        $data = keywords::find($id);
        $data->status   = 1;
        $data->save();
    }
}
