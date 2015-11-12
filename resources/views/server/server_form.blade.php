@if( isset( $server ) )
    {!! Form::model( $server, [ 'route' => [ 'server.update', $server->id ], 'method' => 'put' ] ) !!}
@else
    {!! Form::open( [ 'route' => 'server.store' ] ) !!}
@endif
    <div class="form-group">
        {!! Form::label( 'name', 'Name' ) !!}
        {!! Form::text( 'name', null, [ 'class' => 'form-control' ] ) !!}
    </div>
    <div class="form-group">
        {!! Form::label( 'host', 'Host Name' ) !!}
        {!! Form::text( 'host', null, [ 'class' => 'form-control' ] ) !!}
    </div>
    <div class="form-group">
        {!! Form::label( 'username', 'Username' ) !!}
        {!! Form::text( 'username', null, [ 'class' => 'form-control' ] ) !!}
    </div>
    @if( isset( $server ) )
    <div class="form-group">
        {!! Form::label( 'ssh_key', 'Public SSH Key' ) !!}
        {!! Form::textarea( 'ssh_key', null, [ 'class' => 'form-control', 'dissabled' => true ] ) !!}
    </div>
    @endif
    @if( isset( $server ) )
        {!! Form::submit( 'Update Server', [ 'class' => 'btn btn-success' ] ) !!}
    @else
        {!! Form::submit( 'Create Server', [ 'class' => 'btn btn-success' ] ) !!}
    @endif
{!! Form::close() !!}
