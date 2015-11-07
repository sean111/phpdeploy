@if( isset( $target_project ) )
    {!! Form::model( $target_project, [ 'route' => [ 'project.update', $target_project->id ] ] ) !!}
@else
    {!! Form::open( [ 'route' => 'project.store' ] ) !!}
@endif
    {!! Form::label( 'name', 'Name' ) !!}
    {!! Form::text( 'name' ) !!}
    @if( isset( $target_project ) )
        {!! Form::submit( 'Rename Project') !!}
    @else
        {!! Form::submit( 'Create Project') !!}
    @endif
{!! Form::close() !!}
