@extends('layout')
@section('content')
    <h2>Search Results</h2>
    <div class="row">
        <div class="col-sm-4">
            <h3>Projects</h3>
            @if( $projects->isEmpty() )
                No results found
            @else
                <ul class="search_results">
                @foreach($projects as $project )
                    <li>
                        <a href="{!! route( 'project.show', $project->id ) !!}">{{ $project->name }}</a>
                    </li>
                @endforeach
                </ul>
            @endif
        </div>
        <div class="col-sm-4">
            <h3>Servers</h3>
            @if( $servers->isEmpty() )
                No results found
            @else
                <ul class="search_results">
                @foreach($servers as $server )
                    <li>
                        <a href="{!! route( 'server.show', $server->id ) !!}">{{ $server->name }}</a>
                    </li>
                @endforeach
                </ul>
            @endif
        </div>
        <div class="col-sm-4">
            <h3>Environments</h3>
            @if( $envs->isEmpty() )
                No results found
            @else
                <ul class="search_results">
                @foreach($envs as $env )
                    <li>
                        <a href="{!! route( 'environment.show', $env->id ) !!}">{{ $env->name }}</a>
                    </li>
                @endforeach
                </ul>
            @endif
        </div>
    </div>
@endsection
