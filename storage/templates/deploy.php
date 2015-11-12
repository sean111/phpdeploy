<?php
require 'recipe/common.php';

server( '{host}', '{host}', 22 )
    ->user( '{username}' )
    ->identityFile( '{key_path}{host}.pub','{key_path}{host}' )
    ->stage( '{host}' )
    ->env( 'deploy_path', '{path}' );

set( 'repository', '{repo}' );
set( 'branch', '{branch}' );
