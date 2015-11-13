<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Environment;
use App\EnvironmentHistory;
use Symfony\Component\Process\Process;
use Symfony\Component\Process\Exception\ProcessFailedException;

class DeployController extends Controller {
    private $steps = [
        'deploy:prepare',
        'deploy:release',
        'deploy:update_code',
        'deploy:vendors',
    ];
    public function run( $token ) {
        $env = Environment::where( 'token', $token )->first();
        if( is_null( $env ) ) {
            return json_encode( [ 'error' => true, 'output' => 'invalid token' ] );
        }
        if( \Storage::exists( $token . '.php' ) ) {
            $tokenFile = \Storage::disk('local')->getDriver()->getAdapter()->getPathPrefix() . "/" . $token . ".php";
            $output = null;
            $error = false;
            foreach( $this->steps as $step ) {
                $command = "dep --ansi --file=$tokenFile $step " . $env->server->host;
                $output .= $command . "\n";
                $process = new Process( $command );
                $process->run();
                if( !$process->isSuccessful() ) {
                    $output .= $process->getErrorOutput();
                    $error = true;
                    break;
                }
                else {
                    $output .= $process->getOutput();
                }
            }
            $history = EnvironmentHistory::create( [
                'environment_id' => $env->id,
                'status' => ( $error ) ? 'fail' : 'success',
                'history' => $output
            ] );            
            return json_encode( [ 'error' => $error, 'output' => $output ] );
        }
    }
}
