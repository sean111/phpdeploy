@extends('layout')
@section('content')
    <table class="table">
        <tr>
            <th>
                Name
            </th>
            <th>
                Hostname
            </th>
            <th>
                Username
            </th>
            <th colspan="2">
                &nbsp;
            </th>
        </tr>
        @if( $servers->isEmpty() )
            <tr>
                <td colspan="3">
                    No servers found
                </td>
            </tr>
        @else
            @foreach($servers as $server)
                <tr>
                    <td>
                        {{ $server->name }}
                    </td>
                    <td>
                        {{ $serer->host }}
                    </td>
                    <td>
                        {{ $server->username }}
                    </td>
                </tr>
            @endforeach
        @endif
    </table>
    <a href="{!! route( 'server.create' )!!}" class="btn btn-primary">Add Server</a>
@endsection
