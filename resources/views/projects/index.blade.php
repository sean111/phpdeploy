@extends('layout')

@section( 'content' )
    <table class='table'>
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
                    <td>
                        <a href="{!! route( 'project.show', $project->id ) !!}">{{ $project->name }}</a>
                    </td>
                    <td>
                        <a href="{!! route( 'project.edit', $project->id ) !!}" class="btn btn-warning">Rename</a>
                    </td>
                    <td>
                        {!! Form::open( [ 'route' => [ 'project.destroy', $project->id ], 'method' => 'delete' ] ) !!}
                            {!! Form::submit( 'Delete', [ 'class' => 'btn btn-danger' ] ) !!}
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
        @endif
    </table>
    @include( 'projects/project_form' )
@endsection
