@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-default">
                <div class="panel-heading">@lang('general.form') @lang('general.user')</div>

                <div class="panel-body">
                    <form class="form-horizontal" name="form_user" id="form_user" onsubmit="return false">
                        {{ csrf_field() }}

                        <input type="hidden" name="id" class="form-control id" id="id" value="{{ ( isset($user) ? $user->id : '' ) }}">
                        <input type="hidden" name="status" class="form-control status" id="status" value="{{ ( isset($user) ? $user->status : '' ) }}">

                        <div class="form-group">
                            <label for="name" class="col-md-3 control-label" style="text-align: left;">@lang('general.name')</label>
                            <div class="col-md-9">
                                <input type="text" name="name" id="name" class="form-control name" value="{{ ( isset($user) ? $user->name : '' ) }}" placeholder="@lang('general.name')">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="email" class="col-md-3 control-label" style="text-align: left;">@lang('general.email')</label>
                            <div class="col-md-9">
                                <input type="text" name="email" id="email" class="form-control email" value="{{ ( isset($user) ? $user->email : '' ) }}" placeholder="@lang('general.email')">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password" class="col-md-3 control-label" style="text-align: left;">@lang('general.password')</label>
                            <div class="col-md-9">
                                <input type="password" name="password" id="password" class="form-control password" value="{{ ( isset($user) ? $user->keyword : '' ) }}" placeholder="@lang('general.password')">
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
            text: "@lang('general.confirm_save') @lang('general.user') ?",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: "@lang('general.yes')",
            cancelButtonText: "@lang('general.no')"
            }).then((result) => {
            if (result.value) {
                $.ajax({
                    url: "{{ url('user/store') }}",
                    method: "POST",
                    data: $('#form_user').serialize(),
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
                                location.href = "{{ url('user') }}";
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
                    url: "{{ url('user/update') }}/"+$('#id').val(),
                    method: "POST",
                    data: $('#form_user').serialize(),
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
                                location.href = "{{ url('user') }}";
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
            location.href = "{{ url('user') }}";
        }
    });
}
</script>