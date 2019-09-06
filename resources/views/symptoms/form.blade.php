@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-default">
                <div class="panel-heading">@lang('general.form') @lang('general.symptom')</div>

                <div class="panel-body">
                    <form class="form-horizontal" name="form_symptom" id="form_symptom" onsubmit="return false">
                        {{ csrf_field() }}

                        <input type="hidden" name="id" class="form-control id" id="id" value="{{ ( isset($symptom) ? $symptom->id : '' ) }}">
                        <input type="hidden" name="status" class="form-control status" id="status" value="{{ ( isset($symptom) ? $symptom->status : '' ) }}">

                        <div class="form-group">
                            <label for="symptom" class="col-md-3 control-label" style="text-align: left;">@lang('general.symptom')</label>
                            <div class="col-md-9">
                                <input type="text" name="symptom" id="symptom" class="form-control symptom" value="{{ ( isset($symptom) ? $symptom->symptom : '' ) }}" placeholder="@lang('general.symptom')">
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

<script type="text/javascript">
function simpan_data()
{
    if($('#id').val() == '')
    {
        Swal.fire({
            title: "@lang('general.confirmation')",
            text: "@lang('general.confirm_save') @lang('general.symptom') ?",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: "@lang('general.yes')",
            cancelButtonText: "@lang('general.no')"
            }).then((result) => {
            if (result.value) {
                $.ajax({
                    url: "{{ url('symptom/store') }}",
                    method: "POST",
                    data: $('#form_symptom').serialize(),
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
                                location.href = "{{ url('symptom') }}";
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
            text: "@lang('general.confirm_update') @lang('general.symptom') ?",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: "@lang('general.yes')",
            cancelButtonText: "@lang('general.no')"
            }).then((result) => {
            if (result.value) {
                $.ajax({
                    url: "{{ url('symptom/update') }}/"+$('#id').val(),
                    method: "POST",
                    data: $('#form_symptom').serialize(),
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
                                location.href = "{{ url('symptom') }}";
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
            location.href = "{{ url('symptom') }}";
        }
    });
}
</script>