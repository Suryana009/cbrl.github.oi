@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-default">
                <div class="panel-heading">@lang('general.form') @lang('general.solution')</div>

                <div class="panel-body">
                    <form class="form-horizontal" name="form_solution" id="form_solution" onsubmit="return false">
                        {{ csrf_field() }}

                        <input type="hidden" name="id" class="form-control id" id="id" value="{{ ( isset($solution) ? $solution->id : '' ) }}">
                        <input type="hidden" name="status" class="form-control status" id="status" value="{{ ( isset($solution) ? $solution->status : '' ) }}">

                        <div class="form-group">
                            <label for="disease_id" class="col-md-3 control-label" style="text-align: left;">@lang('general.disease')</label>
                            <div class="col-md-9">
                                <select name="disease_id" class="form-control select2 disease_id" placeholder="@lang('general.disease')" style="width: 100%;">
                                <option value="">@lang('general.choose')</option>
                                @foreach($disease as $row)
                                    <option value="{{ $row->id }}" {{(isset($solution) && $solution->disease_id == $row->id ? 'selected="selected"' : '' )}} >{{ $row->disease }}</option>
                                @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="solution" class="col-md-3 control-label" style="text-align: left;">@lang('general.solution')</label>
                            <div class="col-md-9">
                                <textarea name="solution" class="form-control solution" id="solution" placeholder="@lang('general.solution')" style="height: 100px;">{{ ( isset($solution) ? $solution->solution : '' ) }}</textarea>
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
            text: "@lang('general.confirm_save') @lang('general.disease') ?",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: "@lang('general.yes')",
            cancelButtonText: "@lang('general.no')"
            }).then((result) => {
            if (result.value) {
                $.ajax({
                    url: "{{ url('solution/store') }}",
                    method: "POST",
                    data: $('#form_solution').serialize(),
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
                                location.href = "{{ url('solution') }}";
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
            text: "@lang('general.confirm_update') @lang('general.disease') ?",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: "@lang('general.yes')",
            cancelButtonText: "@lang('general.no')"
            }).then((result) => {
            if (result.value) {
                $.ajax({
                    url: "{{ url('solution/update') }}/"+$('#id').val(),
                    method: "POST",
                    data: $('#form_solution').serialize(),
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
                                location.href = "{{ url('solution') }}";
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
            location.href = "{{ url('solution') }}";
        }
    });
}
</script>