<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Vocabularies;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class VocabulariesController extends Controller
{
	function index()
    {
        if(Auth::user()->name == '')
        {
            return redirect('/');
        }
        else
        {
            return view('vocabularies.index');
        }
    }

    function show_vocabulary_DT()
    {
        $list = Vocabularies::show_vocabulary_DT();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $part) {
            $no++;
            $row = array();
            $row[] = "<div class='text-center'>".$no."</div>";
            $row[] = $part->language;

            $edit = "<a class=\"btn btn-primary btn-sm\" style=\"width: 65px;\" href=\"vocabulary/edit/$part->id\">".__('general.edit')."</a>";

            $button = "<a class=\"btn btn-danger btn-sm\" style=\"width: 65px;\" onclick=\"hapus_data('$part->id', '$part->language')\">".__('general.delete')."</a>";

            $row[] = "<div class='text-center'>".$edit." ".$button."</div>";
        
            $data[] = $row;
        }

        $output = array(
                "draw" => $_POST['draw'],
                    "recordsTotal" => Vocabularies::count_all_show_vocabulary_DT(),
                    "recordsFiltered" => Vocabularies::count_filtered_show_vocabulary_DT(),
                "data" => $data,
        );
        //output to json format
        echo json_encode($output);
    }

    function store(Request $request)
    {
        $data = array(
            $request->get('id_vocabulary'),
            $request->get('key_id'),
            $request->get('description')
        );

        for ($i=0; $i<count($request->get('description')); $i++) { 
            $column = array_column($data, $i);

            if($column[0] == '')
            {
                DB::table('vocabularies')
                    ->insert([
                        'keyword_id'    => $column[1],
                        'language_id'   => $request->get('id_language'),
                        'description'   => $column[2],
                        'created_at'    => date('Y-m-d h:i:s', strtotime('now'))
                    ]);

                DB::table('languages')->where('id', $request->get('id_language'))->update(['status' => '1']);
            }
            else
            {
                DB::table('vocabularies')
                    ->where('id', $column[0])
                    ->update([
                        'keyword_id'    => $column[1],
                        'language_id'   => $request->get('id_language'),
                        'description'   => $column[2],
                        'updated_at'    => date('Y-m-d h:i:s', strtotime('now'))
                    ]);
            }
        }

        $code = DB::table('languages')->where('id', $request->get('id_language'))->value('code');

        $query = DB::table('vocabularies')
            ->leftJoin('keywords', 'keywords.id', '=', 'vocabularies.keyword_id')
            ->leftJoin('languages', 'languages.id', '=', 'vocabularies.language_id')
            ->where('code', $code)
            ->orderBy('keyword', 'asc')
            ->groupBy('keyword')
            ->get();

        $langstr="<?php"."\n"."return"."\n"."["."\n";
        foreach ($query as $row){
            $langstr.= "\t"."'".$row->keyword."' => \"$row->description\","."\n";
        }
        $langstr.= "];";

        $file_path = 'resources/lang/'.$code;

        if (!is_dir($file_path)) {
            mkdir($file_path, 0777, TRUE);
        }

        file_put_contents($file_path.'/general.php', $langstr);
    }

    function edit($id)
    {
        $vocabulary = Vocabularies::data_vocabulary($id);

        if(Auth::user()->name == '')
        {
            return redirect('/');
        }
        else
        {
            return view('vocabularies.form', ['vocabulary' => $vocabulary]);
        }
    }

    function destroy($id)
    {
        $data = DB::table('vocabularies')->where('language_id', '=', $id)->delete();
    }
}
