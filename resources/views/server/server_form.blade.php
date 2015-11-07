@if( isset( $server ) )
    {!! Form::model( $server, [ 'route' => [ 'project.update', $server->id ] ] ) !!}
@else
    {!! Form::open( [ 'route' => 'project.store' ] ) !!}
@endif
    {!! Form::label( 'name', 'Name' ) !!}
    {!! Form::text( 'name' ) !!}
    {!! Form::label( 'host', 'Host Name' ) !!}
    {!! Form::text( 'host' ) !!}
    {!! Form::label( 'username', 'Username' ) !!}
    {!! Form::text( 'username' ) !!}
    @if( isset( $server ) )
        {!! Form::submit( 'Update Server') !!}
    @else
        {!! Form::submit( 'Create Server') !!}
    @endif
{!! Form::close() !!}
