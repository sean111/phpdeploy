@if( isset( $target_env ) )
    {!! Form::model( $target_env, [ 'route' => [ 'environment.update', $target_env->id ], 'method' => 'put' ] ) !!}
@else
    {!! Form::open( [ 'route' => 'environment.store' ] ) !!}
@endif
    <div class="form-group">
        {!! Form::label( 'name', 'Name' ) !!}
        {!! Form::text( 'name', null, [ 'class' => 'form-control' ]  ) !!}
    </div>
    <div class="form-group">
        {!! Form::label( 'path', 'Path' ) !!}
        {!! Form::text( 'path', null, [ 'class' => 'form-control' ]  ) !!}
    </div>
    <div class="form-group">
        {!! Form::label( 'project_id', 'Project' ) !!}
        {!! Form::select( 'project_id', $projects, \Input::old( 'project_id' ), [ 'class' => 'form-control' ]  ) !!}
    </div>
    <div class="form-group">
        {!! Form::label( 'server_id', 'Server' ) !!}
        {!! Form::select( 'server_id', $servers, \Input::old( 'server_id' ), [ 'class' => 'form-control' ]  ) !!}
    </div>
    @if( isset( $target_env) )
        {!! Form::submit( 'Update Environment', [ 'class' => 'btn btn-success' ] ) !!}
    @else
        {!! Form::submit( 'Create Environment', [ 'class' => 'btn btn-success' ] ) !!}
    @endif
{!! Form::close() !!}
