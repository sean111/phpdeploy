@if( isset( $target_project ) )
    {!! Form::model( $target_project, [ 'route' => [ 'project.update', $target_project->id ], 'method' => 'put', 'class' => 'form-inline' ] ) !!}
@else
    {!! Form::open( [ 'route' => 'project.store', 'class' => 'form-inline' ] ) !!}
@endif
    <div class="form-group">
        {!! Form::label( 'name', 'Name' ) !!}
        {!! Form::text( 'name', null, [ 'class' => 'form-control' ] ) !!}
    </div>
    <div class="form-group">
        @if( isset( $target_project ) )
            {!! Form::submit( 'Rename Project', [ 'class' => 'btn btn-success' ] ) !!}
        @else
            {!! Form::submit( 'Create Project', [ 'class' => 'btn btn-success' ] ) !!}
        @endif
    </div>
{!! Form::close() !!}
