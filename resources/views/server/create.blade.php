@extends('layout')
@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">
            Add new server
        </div>
        <div class="panel-body">
            @include( 'server/server_form')
        </div>
    </div>
@endsection
