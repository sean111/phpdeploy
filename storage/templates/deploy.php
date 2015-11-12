require 'recipe/common.php';

server( '{servername}', '{host}', 22 )
    ->user( '{username}' )
    ->identityFile( '{token}.pub' )
    ->stage( '{name}' )
    ->env( 'deploy_path', '{path}' );

set( 'repository', '{repo}' );
set( 'branch', '{branch}' );
