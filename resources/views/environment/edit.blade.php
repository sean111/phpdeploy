@extends('layout')
@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">
            Update {{ $target_env->name }}
        </div>
        <div class="panel-body">
            @include('environment/environment_form')
        </div>
    </div>
@endsection
