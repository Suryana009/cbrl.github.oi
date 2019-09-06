<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Diagnose;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class DiagnosesController extends Controller
{
    function index()
    {
        $symptom = DB::table('symptoms')
                    ->select('*')
                    ->orderBy('id', 'ASC')
                    ->get();
        return view('diagnoses.form', ['symptom' => $symptom]);
    }

    function process(Request $request)
    {
        $gejala         = $request->get('id_symptom');
        $hitung_check   = $request->get('hitung_checked');

        $data = DB::table('cases')
                    ->leftJoin('diseases', 'diseases.id', '=', 'cases.disease_id')
                    ->select('cases_no')
                    ->groupBy('cases_no')
                    ->get();

        foreach ($data as $value) {
            echo '<tr>
                <td>'.$value->cases_no.'</td>
                <td>'.Diagnose::hitung_gejala_cocok($value->cases_no, $gejala)->count().'</td>
                <td>'.Diagnose::hitung_gejala_kasus($value->cases_no)->count().'</td>
                <td>'.$hitung_check.'</td>
                <td>'.max($hitung_check, Diagnose::hitung_gejala_kasus($value->cases_no)->count()).'</td>
                <td>'.Diagnose::hitung_gejala_cocok($value->cases_no, $gejala)->count() / max($hitung_check, Diagnose::hitung_gejala_kasus($value->cases_no)->count()).'</td>
            </tr>';
        }
    }

    function get_case_base()
    {
        $data = DB::table('cases')
                    ->leftJoin('diseases', 'diseases.id', '=', 'cases.disease_id')
                    ->leftJoin('symptoms', 'symptoms.id', '=', 'cases.symptom_id')
                    ->select('*')
                    ->orderBy('cases.id', 'asc')
                    ->get();

        foreach ($data as $r) {
            echo '<tr>
                <td>'.$r->cases_no.'</td>
                <td>'.$r->disease.'</td>
                <td>'.$r->symptom.'</td>
            </tr>';
        }
    }

    function result(Request $request)
    {
        $gejala         = $request->get('id_symptom');
        $hitung_check   = $request->get('hitung_checked');

        $data = DB::table('cases')
                    ->leftJoin('diseases', 'diseases.id', '=', 'cases.disease_id')
                    ->select('cases_no')
                    ->groupBy('cases_no')
                    ->get();

        $table = array();
        foreach ($data as $value) {
            $jml_gejala_cocok = Diagnose::hitung_gejala_cocok($value->cases_no, $gejala)->count();
            $jml_gejala_kasus = Diagnose::hitung_gejala_kasus($value->cases_no)->count();
            $pembagi = max($hitung_check, $jml_gejala_kasus);
            $nilai_hasil = $jml_gejala_cocok / $pembagi;
            $hasil_percentase = $nilai_hasil * 100;

            $table[] = array(
                'cases'         => $value->cases_no,
                'disease'       => Diagnose::get_penyakit_by_kasus_name($value->cases_no),
                'id_disease'    => Diagnose::get_penyakit_by_kasus_id($value->cases_no),
                'value'         => number_format($hasil_percentase, 2, '.', ',')
            );
        }

        $value  = array_column($table, 'value');

        array_multisort($value, SORT_DESC, $table);

        $no = 1;
        foreach($table as $key=>$list){
            echo '<tr>
                <td>'.$no.'</td>
                <td>'.$list['cases'].'</td>
                <td style="display: none;">'.$list['id_disease'].'</td>
                <td>'.$list['disease'].'</td>
                <td>'.$list['value'].' %</td>
            </tr>';
            $no++;
        }
    }

    function get_solution_by_disease($id)
    {
        $data = DB::table('solutions')
                    ->where('disease_id', $id)
                    ->value('solution');
        echo $data;
    }
}
