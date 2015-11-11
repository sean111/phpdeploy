@extends('layout')
@section('content')
    <table class="table">
        <tr>
            <th>
                Name
            </th>
            <th>
                Path
            </th>
            <th>
                Repo
            </th>
            <th>
                Branch
            </th>
            <th>
                Project
            </th>
            <th>
                Server
            </th>
            <th colspan="2">
                &nbsp;
            </th>
        </tr>
        @if( $environments->isEmpty() )
            <tr>
                <td colspan="5">
                    No environments found
                </td>
            </tr>
        @else
            @foreach($environments as $env)
                <tr>
                    <td>
                        {{ $env->name }}
                    </td>
                    <td>
                        {{ $env->path }}
                    </td>
                    <td>
                        {{ $env->repo }}
                    </td>
                    <td>
                        {{ $env->branch }}
                    </td>
                    <td>
                        <a href="{!! route( 'project.show', $env->project->id )!!}">{{ $env->project->name }}</a>
                    </td>
                    <td>
                        <a href="{!! route( 'server.show', $env->server->id ) !!}">{{ $env->server->name }}</a>
                    </td>
                    <th>
                        <a href="{!! route( 'environment.edit', $env->id ) !!}" class="btn btn-warning">Edit</a>
                    </th>
                </tr>
            @endforeach
        @endif
    </table>
    <a href="{!! route( 'environment.create' )!!}" class="btn btn-primary">New Environment</a>
@endsection
