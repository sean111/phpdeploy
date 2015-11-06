@extends('layout')

@section( 'content' )
    <table>
        <tr>
            <th>
                Name
            </th>
            <th colspan='2'>
                &nbsp;
            </th>
        </tr>
        @if( $projects->isEmpty() )
            <tr>
                <td colspan="3">No projects found</td>
            </tr>
        @else
            @foreach( $projects as $project)
                <tr>
                    <th>
                        {{ $project->name }}
                    </th>
                </tr>
            @endforeach
        @endif
    </table>
    @include( 'projects/project_form' )
@endsection
