<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Languages;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LanguagesController extends Controller
{
	function index()
    {
        if(Auth::user()->name == '')
        {
            return redirect('/');
        }
        else
        {
            return view('languages.index');
        }
    }

    function show_language_DT()
    {
        $list = languages::show_language_DT();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $part) {
            $no++;
            $row = array();
            $row[] = "<div class='text-center'>".$no."</div>";
            $row[] = $part->code;
            $row[] = $part->language;

            $edit = "<a class=\"btn btn-primary btn-sm\" style=\"width: 65px;\" href=\"language/edit/$part->id\">".__('general.edit')."</a>";

            if($part->status == 1)
            {
                $button = "<a class=\"btn btn-danger btn-sm\" style=\"width: 65px;\" onclick=\"hapus_data('$part->id', '$part->language')\">".__('general.delete')."</a>";
            }
            else
            {
                $button = "<a class=\"btn btn-warning btn-sm\" style=\"width: 65px;\" onclick=\"aktif_data('$part->id', '$part->language')\">".__('general.activate')."</a>";
            }

            $row[] = "<div class='text-center'>".$edit." ".$button."</div>";
        
            $data[] = $row;
        }

        $output = array(
                "draw" => $_POST['draw'],
                    "recordsTotal" => languages::count_all_show_language_DT(),
                    "recordsFiltered" => languages::count_filtered_show_language_DT(),
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
            return view('languages.form');
        }
    }

    function store(Request $request)
    {
        $data = new languages([
            'code'          => $request->get('code'),
            'language'      => $request->get('language'),
            'created_at'    => date('Y-m-d h:i:s', strtotime('now')),
            'status'        => 0
        ]);
        
        $data->save();
    }

    function edit($id)
    {
        $language = languages::find($id);

        if(Auth::user()->name == '')
        {
            return redirect('/');
        }
        else
        {
            return view('languages.form', ['language' => $language]);
        }
    }

    function update(Request $request, $id)
    {
        $data = languages::find($id);
        $data->code         = $request->get('code');
        $data->language     = $request->get('language');
        $data->updated_at   = date('Y-m-d h:i:s', strtotime('now'));
        $data->status       = $request->get('status');
        
        $data->save();
    }

    function destroy($id)
    {
        $data = languages::find($id);
        $data->delete();
    }

    function unactivate(Request $request, $id)
    {
        $data = languages::find($id);
        $data->status   = 0;
        $data->save();
    }

    function activate(Request $request, $id)
    {
        $data = languages::find($id);
        $data->status   = 1;
        $data->save();
    }
}
