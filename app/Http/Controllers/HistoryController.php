<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Environment;
use App\EnvironmentHistory;

class HistoryController extends Controller {

    public function show( $id ) {
        $history = EnvironmentHistory::findOrFail( $id );        
        return view( 'history.show', [ 'history' => $history ] );
    }
}
