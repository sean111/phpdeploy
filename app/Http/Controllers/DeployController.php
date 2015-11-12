<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Environment;

class DeployController extends Controller {
    public function run( $token ) {
        $env = Environment::where( 'token', $token )->first();        
    }
}
