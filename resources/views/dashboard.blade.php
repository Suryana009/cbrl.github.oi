@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">@lang('general.dashboard')</div>

                <div class="panel-body">
                    <center>@lang('general.welcome') !!!</center><br>
                    <center>@lang('general.cbrs')</center>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection