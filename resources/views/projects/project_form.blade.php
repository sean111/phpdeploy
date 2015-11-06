@if( isset( $project ) )
    {!! Form::model( $project, [ 'route' => [ 'project.update', $project->id ] ] ) !!}
@else
    {!! Form::open( [ 'route' => 'project.store' ] ) !!}
@endif
    {!! Form::label( 'name', 'Name' ) !!}
    {!! Form::text( 'name' ) !!}
    {!! Form::submit( 'Create Project') !!}
{!! Form::close() !!}
