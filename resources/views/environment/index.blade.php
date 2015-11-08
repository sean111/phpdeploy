@extends('layout')
@section('content')
    <table class="table">
        <tr>
            <th>
                Name
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

            @endforeach
        @endif
    </table>
    <a href="{!! route( 'environment.create' )!!}" class="btn btn-primary">New Environment</a>
@endsection
