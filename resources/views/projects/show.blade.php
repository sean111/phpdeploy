@extends('layout')
@section('content')
    <h2>{{ $project->name }}</h2>
    @foreach( $project->environments as $env )
        <div class="panel panel-default">
            <div class="panel-heading">
                {{ $env->name }}
            </div>
            <div class="panel-body">
                Environment history here....    
            </div>
        </div>
    @endforeach
@endsection
