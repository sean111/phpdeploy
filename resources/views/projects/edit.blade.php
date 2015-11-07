@extends( 'layout' )
@section( 'content' )
    <h2>Rename <strong>{{ $target_project->name }}</strong></h2>
    @include( 'projects/project_form' )
@endsection
