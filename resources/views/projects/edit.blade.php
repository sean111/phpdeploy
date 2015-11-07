@extends( 'layout' )
@section( 'conent' )
    <h2>Editing <strong>{{ $project->name }}</strong></h2>
    @include( 'projects/project_form' )
@endsection
