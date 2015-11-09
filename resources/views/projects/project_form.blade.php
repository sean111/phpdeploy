@if( isset( $target_project ) )
    {!! Form::model( $target_project, [ 'route' => [ 'project.update', $target_project->id ], 'method' => 'put' ] ) !!}
@else
    {!! Form::open( [ 'route' => 'project.store' ] ) !!}
@endif
    {!! Form::label( 'name', 'Name' ) !!}
    {!! Form::text( 'name' ) !!}
    @if( isset( $target_project ) )
        {!! Form::submit( 'Rename Project', [ 'class' => 'btn btn-success' ] ) !!}
    @else
        {!! Form::submit( 'Create Project', [ 'class' => 'btn btn-success' ] ) !!}
    @endif
{!! Form::close() !!}
