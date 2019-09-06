@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-default">
                <div class="panel-heading">@lang('general.form') @lang('general.case')</div>

                <div class="panel-body">
                    <form class="form-horizontal" name="form_case" id="form_case" onsubmit="return false">
                        {{ csrf_field() }}

                        <input type="hidden" name="id" class="form-control id" id="id" value="{{ ( isset($case) ? $case->id : '' ) }}">
                        <input type="hidden" name="status" class="form-control status" id="status" value="{{ ( isset($case) ? $case->status : '' ) }}">

                        <div class="form-group">
                            <label for="cases_no" class="col-md-3 control-label" style="text-align: left;">@lang('general.cases_no')</label>
                            <div class="col-md-9">
                                <input type="text" name="cases_no" id="cases_no" class="form-control cases_no" value="{{ ( isset($case) ? $case->cases_no : '' ) }}" placeholder="@lang('general.cases_no')">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="disease_id" class="col-md-3 control-label" style="text-align: left;">@lang('general.disease')</label>
                            <div class="col-md-9">
                                <select name="disease_id" class="form-control select2 disease_id" placeholder="@lang('general.disease')" style="width: 100%;">
                                <option value="">@lang('general.choose')</option>
                                @foreach($disease as $row)
                                    <option value="{{ $row->id }}" {{(isset($case) && $case->disease_id == $row->id ? 'selected="selected"' : '' )}} >{{ $row->disease }}</option>
                                @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="symptom_id" class="col-md-3 control-label" style="text-align: left;">@lang('general.symptom')</label>
                            <div class="col-md-9">
                                <select name="symptom_id" class="form-control select2 symptom_id" placeholder="@lang('general.symptom')" style="width: 100%;">
                                <option value="">@lang('general.choose')</option>
                                @foreach($symptom as $row)
                                    <option value="{{ $row->id }}" {{(isset($case) && $case->symptom_id == $row->id ? 'selected="selected"' : '' )}} >{{ $row->symptom }}</option>
                                @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-9 col-md-offset-3">
                                <button onclick="simpan_data()" class="btn btn-primary" style="width: 70px;">@lang('general.submit')</button>
                                <button onclick="keluar_form()" class="btn btn-default" style="width: 70px;">@lang('general.cancel')</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

<script type="text/javascript" src="{{ asset('jquery/jquery-2.2.3.min.js') }}"></script>
<script type="text/javascript">
$(document).ready(function(){
    $('.select2').select2();
});

function simpan_data()
{
    if($('#id').val() == '')
    {
        Swal.fire({
            title: "@lang('general.confirmation')",
            text: "@lang('general.confirm_save') @lang('general.case') ?",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: "@lang('general.yes')",
            cancelButtonText: "@lang('general.no')"
            }).then((result) => {
            if (result.value) {
                $.ajax({
                    url: "{{ url('case/store') }}",
                    method: "POST",
                    data: $('#form_case').serialize(),
                    success: function() {
                        Swal.fire({
                            title: "@lang('general.success') !!!",
                            text: "@lang('general.alert_save')",
                            type: 'success',
                            showCancelButton: false,
                            confirmButtonColor: '#3085d6',
                            confirmButtonText: "@lang('general.yes')"
                            }).then((result) => {
                            if (result.value) {
                                location.href = "{{ url('case') }}";
                            }
                        });
                    }
                });
            }
        });
    }
    else
    {
        Swal.fire({
            title: "@lang('general.confirmation')",
            text: "@lang('general.confirm_update') @lang('general.case') ?",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: "@lang('general.yes')",
            cancelButtonText: "@lang('general.no')"
            }).then((result) => {
            if (result.value) {
                $.ajax({
                    url: "{{ url('case/update') }}/"+$('#id').val(),
                    method: "POST",
                    data: $('#form_case').serialize(),
                    success: function() {
                        Swal.fire({
                            title: "@lang('general.success') !!!",
                            text: "@lang('general.alert_update')",
                            type: 'success',
                            showCancelButton: false,
                            confirmButtonColor: '#3085d6',
                            confirmButtonText: "@lang('general.yes')"
                            }).then((result) => {
                            if (result.value) {
                                location.href = "{{ url('case') }}";
                            }
                        });
                    }
                });
            }
        });
    }
}

function keluar_form()
{
    Swal.fire({
        title: "@lang('general.confirmation')",
        text: "@lang('general.confirm_exit_form') ?",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: "@lang('general.yes')",
        cancelButtonText: "@lang('general.no')"
        }).then((result) => {
        if (result.value) {
            location.href = "{{ url('case') }}";
        }
    });
}
</script>