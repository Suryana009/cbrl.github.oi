@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">@lang('general.form') @lang('general.vocabulary')</div>

                <div class="panel-body">
                    <form class="form-horizontal" name="form_vocabulary" id="form_vocabulary" onsubmit="return false">
                        {{ csrf_field() }}

                        <input type="hidden" name="id_language" class="form-control id_language" id="id_language" value="{{ $vocabulary->id_language }}">

                        @foreach( App\Vocabularies::get_all_data_key() as $keys)
                            <div class="form-group">
                                <label for="language" class="col-md-4 control-label" style="text-align: left;">{{ $keys->keyword }}</label>
                                <div class="col-md-8">
                                    <input type="hidden" name="id_vocabulary[]" id="id_vocabulary" class="form-control id_vocabulary" value="{{ App\Vocabularies::get_all_data_vocabulary($keys->id_keyword, $vocabulary->id_language)->value('id') }}" placeholder="Vocabulary" readonly="readonly">
                                    <input type="hidden" name="key_id[]" id="key_id" class="form-control key_id" value="{{ $keys->id_keyword }}" placeholder="Key" readonly="readonly">
                                    <input type="text" name="description[]" id="description" class="form-control description" value="{{ App\Vocabularies::get_all_data_vocabulary($keys->id_keyword, $vocabulary->id_language)->value('description') }}" placeholder="{{ $vocabulary->language }}">
                                </div>
                            </div>
                        @endforeach

                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
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
    Swal.fire({
        title: "@lang('general.confirmation')",
        text: "@lang('general.confirm_save') @lang('general.vocabulary') ?",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: "@lang('general.yes')",
        cancelButtonText: "@lang('general.no')"
        }).then((result) => {
        if (result.value) {
            $.ajax({
                url: "{{ url('vocabulary/store') }}",
                method: "POST",
                data: $('#form_vocabulary').serialize(),
                success: function(test) {
                    Swal.fire({
                        title: "@lang('general.success') !!!",
                        text: "@lang('general.alert_save')",
                        type: 'success',
                        showCancelButton: false,
                        confirmButtonColor: '#3085d6',
                        confirmButtonText: "@lang('general.yes')"
                        }).then((result) => {
                        if (result.value) {
                            location.href = "{{ url('vocabulary') }}";
                        }
                    });
                }
            });
        }
    });
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
            location.href = "{{ url('vocabulary') }}";
        }
    });
}
</script>