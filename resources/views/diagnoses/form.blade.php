@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row" id="diagnose_form">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-default">
                <div class="panel-heading">@lang('general.diagnose')</div>

                <div class="panel-body">
                    <div class="diagnose_form">
                        <h5 style="text-align: center;">@lang('general.choose') @lang('general.symptom')</h5>
                        <form class="form-horizontal" name="form_diagnose" id="form_diagnose" onsubmit="return false">
                            {{ csrf_field() }}

                            <div class="table-responsive">
                                <table class="table table-bordered table-hovered" style="font-size: 12px;">
                                    <thead>
                                        
                                    </thead>
                                    <tbody>
                                        @foreach($symptom as $key=>$row)
                                            <tr>
                                                <td><input type="checkbox" name="id_symptom[]" class="id_symptom" id="{{ $row->symptom }}" value="{{ $row->id }}"> {{ $row->symptom }}</td>
                                            </tr>
                                        @endforeach
                                        <tr>
                                            <td><button onclick="proses_perhitungan()" id="proses_data" class="btn btn-primary">@lang('general.submit')</button></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                            <input type="hidden" name="hitung_checked" id="hitung_checked" class="hitung_checked" value="0" readonly="readonly">
                            <input type="hidden" name="gejala_checked_value" id="gejala_checked_value" class="gejala_checked_value" readonly="readonly">
                            <input type="hidden" name="gejala_hasil" id="gejala_hasil" class="gejala_hasil">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row" id="diagnose_result">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">@lang('general.analysist_result')</div>

                <div class="panel-body">
                    <div class="table-responsive list_base_case">
                        <h5 style="text-align: center;">@lang('general.cases_list')</h5>
                        <table id="tbl_base_case" class="table table-bordered" style="font-size: 12px;">
                            <thead>
                                <tr>
                                    <th>@lang('general.cases_no')</th>
                                    <th>@lang('general.disease')</th>
                                    <th>@lang('general.symptom')</th>
                                </tr>
                            </thead>
                            <tbody>
                                
                            </tbody>
                        </table>
                    </div>

                    <div class="table-responsive list_symptom_chose">
                        <h5 style="text-align: center;">@lang('general.symptom_choosen')</h5>
                        <table id="tbl_symptom_chose" class="table table-bordered" style="font-size: 12px;">
                            <thead>
                                
                            </thead>
                            <tbody>
                                
                            </tbody>
                        </table>
                    </div>

                    <div class="table-responsive list_count">
                        <h5 style="text-align: center;">@lang('general.count') @lang('general.result') @lang('general.list')</h5>
                        <table id="tbl_list_count" class="table table-bordered" style="font-size: 12px;">
                            <thead>
                                <tr>
                                    <th>@lang('general.case')</th>
                                    <th>@lang('general.number_of_symptoms_suitable')</th>
                                    <th>@lang('general.number_of_case_symptoms')</th>
                                    <th>@lang('general.number_of_symptoms_chosen')</th>
                                    <th>@lang('general.divider')</th>
                                    <th>@lang('general.result')</th>
                                </tr>
                            </thead>
                            <tbody>
                                
                            </tbody>
                        </table>
                        <div style="text-align:left;"><p class="value_calculation" style="font-size: 12px;"></p></div>
                    </div>
                    <br>
                    <div class="table-responsive list_cases">
                        <center><button type="button" class="btn btn-primary" onclick="perhitungan()" id="btn_calculation" style="width: 100px;">@lang('general.calculation')</button></center>
                        <br>
                        <h5 style="text-align: center;">@lang('general.result') @lang('general.list')</h5>
                        <table id="list_cases" class="table table-bordered table-responsive" style="font-size: 12px;">
                            <thead>
                                <tr>
                                    <th>@lang('general.ranking')</th>
                                    <th>@lang('general.cases_no')</th>
                                    <th>@lang('general.disease')</th>
                                    <th>@lang('general.result') %</th>
                                </tr>
                            </thead>
                            <tbody>
                                
                            </tbody>
                        </table>
                        <div style="text-align:left;"><p class="max" style="font-size: 12px;"></p></div>
                        <div style="text-align:left;"><p class="solution" style="font-size: 12px;"></p></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

<script type="text/javascript" src="{{ asset('jquery/jquery-2.2.3.min.js') }}"></script>
<script type="text/javascript">
$(document).ready(function(){
    $('#diagnose_form').show();
    $('#diagnose_result').hide();
    $('.list_base_case').hide();
    $('.list_symptom_chose').hide();
    $('.list_count').hide();
    $('.id_symptom').prop('checked', false);

    $('.id_symptom').click(function () {
        if ($(this).is(':checked')) {
            $('.hitung_checked').val($('input:checkbox:checked').length);
            $('.gejala_checked_value').val($("input:checkbox:checked").map(function(){return $(this).val();}).get());
            
            $('#tbl_symptom_chose > tbody').append('<tr class="tr_gejala_'+$(this).val()+'"><td><center>'+$(this).attr('id')+'</center></td><tr>');
        }
        else{
            $('.hitung_checked').val($('input:checkbox:checked').length);
            $('.gejala_checked_value').val($("input:checkbox:checked").map(function(){return $(this).val();}).get());

            $('.tr_gejala_'+$(this).val()).remove();
        }
    });
});

function proses_perhitungan()
{
    $.ajax({
        url: "{{ url('diagnose/process') }}", 
        data: $('#form_diagnose').serialize(),
        success: function(result){
            $('#diagnose_form').hide();
            $('#diagnose_result').show();

            $('#tbl_list_count > tbody').html(result);
        },
        error:function(){
            alert('Gagal');
            return false;
        },
        type: "post", 
        dataType: "html"
    });

    $.ajax({
        url: "{{ url('diagnose/get_case_base') }}",
        success: function(res){
            $('#tbl_base_case > tbody').html(res);
        }
    });

    $.ajax({
        url: "{{ url('diagnose/result') }}",
        type: "post", 
        dataType: "html",
        data: $('#form_diagnose').serialize(),
        success: function(getser){
            $('#list_cases > tbody').html(getser);

            var kasus = $("#list_cases tbody").find("tr:first").map(function(){ 
                return $("#list_cases tbody").find("tr:first td:nth-child(2)").text() 
            }).get();

            var id_penyakit = $("#list_cases tbody").find("tr:first").map(function(){ 
                return $("#list_cases tbody").find("tr:first td:nth-child(3)").text() 
            }).get();

            var penyakit = $("#list_cases tbody").find("tr:first").map(function(){ 
                return $("#list_cases tbody").find("tr:first td:nth-child(4)").text() 
            }).get();

            var nilai = $("#list_cases tbody").find("tr:first").map(function(){ 
                return $("#list_cases tbody").find("tr:first td:nth-child(5)").text() 
            }).get();

            $('.value_calculation').html("@lang('general.biggest_disease') = "+id_penyakit+". "+penyakit+" @lang('general.in_case_number') "+kasus+", @lang('general.with_the_largest_percentage_value') = "+nilai+"");

            $('.max').html("@lang('general.selected_disease') = "+penyakit+" @lang('general.in_case_number') "+kasus+", @lang('general.with_the_largest_percentage_value') = "+nilai+"");

            $.ajax({
                url: "{{ url('diagnose/get_solution_by_disease') }}/"+id_penyakit,
                success: function(sol)
                {
                    $('.solution').html("@lang('general.solution') : "+sol+"");
                }
            });
        }
    });
}

function perhitungan()
{
    $('.list_base_case').show();
    $('.list_symptom_chose').show();
    $('.list_count').show();
    $('#btn_calculation').attr('onclick', 'tutup_perhitungan()').text("@lang('general.close')");
}

function tutup_perhitungan()
{
    $('.list_base_case').hide();
    $('.list_symptom_chose').hide();
    $('.list_count').hide();
    $('#btn_calculation').attr('onclick', 'perhitungan()').text("@lang('general.calculation')");
}
</script>