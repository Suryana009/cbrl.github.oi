@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-default">
                <div class="panel-heading">@lang('general.form') @lang('general.language')</div>

                <div class="panel-body">
                    <form class="form-horizontal" name="form_language" id="form_language" onsubmit="return false">
                        {{ csrf_field() }}

                        <input type="hidden" name="id" class="form-control id" id="id" value="{{ ( isset($language) ? $language->id : '' ) }}">
                        <input type="hidden" name="status" class="form-control status" id="status" value="{{ ( isset($language) ? $language->status : '' ) }}">

                        <div class="form-group">
                            <label for="language" class="col-md-3 control-label" style="text-align: left;">@lang('general.code')</label>
                            <div class="col-md-9">
                                <input type="text" name="code" id="code" class="form-control code" value="{{ ( isset($language) ? $language->code : '' ) }}" placeholder="@lang('general.code')">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="language" class="col-md-3 control-label" style="text-align: left;">@lang('general.language')</label>
                            <div class="col-md-9">
                                <input type="text" name="language" id="language" class="form-control language" value="{{ ( isset($language) ? $language->language : '' ) }}" placeholder="@lang('general.language')">
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
            text: "@lang('general.confirm_save') @lang('general.language') ?",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: "@lang('general.yes')",
            cancelButtonText: "@lang('general.no')"
            }).then((result) => {
            if (result.value) {
                $.ajax({
                    url: "{{ url('language/store') }}",
                    method: "POST",
                    data: $('#form_language').serialize(),
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
                                location.href = "{{ url('language') }}";
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
            text: "@lang('general.confirm_update') @lang('general.language') ?",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: "@lang('general.yes')",
            cancelButtonText: "@lang('general.no')"
            }).then((result) => {
            if (result.value) {
                $.ajax({
                    url: "{{ url('language/update') }}/"+$('#id').val(),
                    method: "POST",
                    data: $('#form_language').serialize(),
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
                                location.href = "{{ url('language') }}";
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
            location.href = "{{ url('language') }}";
        }
    });
}
</script>