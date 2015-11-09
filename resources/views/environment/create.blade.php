@extends( 'layout' )
@section( 'content' )
    <div class="panel panel-default">
        <div class="panel-heading">
            Create a new environment
        </div>
        <div class="panel-body">
            @include( 'environment/environment_form' )
        </div>
    </div>
@endsection
