@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Data @lang('general.keyword')</div>

                <div class="panel-body">
                    <div class="table-responsive">
                        <a class="btn btn-success" href="{{ url('keyword/create') }}"> @lang('general.create')</a>
                        <br>
                        <br>
                        <table class="table table-bordered" id="tbl_keyword" style="font-size: 12px;">
                        {{ csrf_field() }}
                            <thead>
                                <tr>
                                    <th class="text-center" style="width: 7%;">#</th>
                                    <th>@lang('general.keyword')</th>
                                    <th width="19%" class="text-center">@lang('general.action')</th>
                                </tr>
                            </thead>
                            <tbody>
                                
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

<script type="text/javascript" src="{{ asset('jquery/jquery-2.1.1.min.js') }}"></script>
<script type="text/javascript">
var table;
$(document).ready(function(){
    var token = $("input[name='_token']").val();
    table = $('#tbl_keyword').DataTable({ 
        "processing": true,
        "serverSide": true,
        "order": [],
        "ajax": {
            "url": "{{ url('keyword/show_keyword_DT') }}",
            data: {_token:token},
            "type": "POST"
        },
        "columnDefs": [
        { 
            "targets": [ 0, 2 ], 
            "orderable": false, 
        },
        ],
    });
});

function hapus_data(id, name)
{
    Swal.fire({
        title: "@lang('general.confirmation')",
        text: "@lang('general.confirm_delete') "+name+" ?",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: "@lang('general.yes')",
        cancelButtonText: "@lang('general.no')",
        }).then((result) => {
        if (result.value) {
            $.ajax({
                url: "{{ url('keyword/destroy') }}/"+id,
                success: function() {
                    Swal.fire({
                        title: "@lang('general.deleted') !!!",
                        text: "@lang('general.alert_delete')",
                        type: 'success',
                        showCancelButton: false,
                        confirmButtonColor: '#3085d6',
                        confirmButtonText: "@lang('general.yes')"
                        }).then((result) => {
                        if (result.value) {
                            table.ajax.reload(null);
                        }
                    });
                },
                error: function() {
                    Swal.fire({
                        title: "@lang('general.failed') !!!",
                        text: "@lang('general.alert_failed'). @lang('general.confirm_unactivate') "+name+" ?",
                        type: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        confirmButtonText: "@lang('general.yes')",
                        cancelButtonText: "@lang('general.no')"
                        }).then((result) => {
                        if (result.value) {
                            $.ajax({
                                url: "{{ url('keyword/unactivate') }}/"+id,
                                success: function() {
                                    Swal.fire({
                                        title: "@lang('general.success') !!!",
                                        text: "@lang('general.alert_unactivate')",
                                        type: 'success',
                                        showCancelButton: false,
                                        confirmButtonColor: '#3085d6',
                                        confirmButtonText: "@lang('general.yes')"
                                        }).then((result) => {
                                        if (result.value) {
                                            table.ajax.reload(null);
                                        }
                                    });
                                }
                            });
                        }
                    });
                }
            });
        }
    })
}

function aktif_data(id, name)
{
    Swal.fire({
        title: "@lang('general.confirmation')",
        text: "@lang('general.confirm_activate') "+name+" ?",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: "@lang('general.yes')",
        cancelButtonText: "@lang('general.no')"
        }).then((result) => {
        if (result.value) {
            $.ajax({
                url: "{{ url('keyword/activate') }}/"+id,
                success: function() {
                    Swal.fire({
                        title: "@lang('general.success') !!!",
                        text: "@lang('general.alert_activate')",
                        type: 'success',
                        showCancelButton: false,
                        confirmButtonColor: '#3085d6',
                        confirmButtonText: "@lang('general.yes')"
                        }).then((result) => {
                        if (result.value) {
                            table.ajax.reload(null);
                        }
                    });
                },
                error: function() {
                    // Swal.fire({
                    //     title: 'Failed !!!',
                    //     text: 'Data is failed to activate',
                    //     type: 'error',
                    //     showCancelButton: false,
                    //     confirmButtonColor: '#3085d6',
                    //     confirmButtonText: 'OK'
                    //     }).then((result) => {
                    //     if (result.value) {
                    //         table.ajax.reload(null);
                    //     }
                    // });
                }
            });
        }
    })
}
</script>