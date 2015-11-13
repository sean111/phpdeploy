@extends('layout')
@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class='panel-title'>{{ $server->name }} Information</h3>
        </div>
        <div class="panel-body">
            <div class="row">
                <div class="col-sm-2">
                    Host:
                </div>
                <div class="col-sm-10">
                    {{ $server->host }}
                </div>
            </div>
            <div class="row">
                <div class="col-sm-2">
                    Username:
                </div>
                <div class="col-sm-10">
                    {{ $server->username }}
                </div>
            </div>
            <div class="row">
                <div class="col-sm-2">
                    Public Key:
                </div>
                <div class="col-sm-10">
                    {{ $server->ssh_key }}
                </div>
            </div>
        </div>
    </div>    
@endsection
