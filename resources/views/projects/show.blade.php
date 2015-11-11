@extends('layout')
@section('content')
    <h2>{{ $project->name }}</h2>
    <aside>
        {{ $project->token }}
    </aside>
    @foreach( $project->environments as $env )
        <div class="panel panel-default">
            <div class="panel-heading">
                {{ $env->name }} - {{ $env->token }}
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-lg-12 centered">
                        <a href="{!! route( 'deploy', $env->token ) !!}" class="btn btn-default">Deploy</a>
                    </div>
                </div>
                Environment history here....
            </div>
        </div>
    @endforeach
@endsection
