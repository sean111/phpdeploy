<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Environment;
use App\EnvironmentHistory;
use SensioLabs\AnsiConverter\AnsiToHtmlConverter;
use SensioLabs\AnsiConverter\Theme\SolarizedTheme;

class HistoryController extends Controller {

    public function show( $id ) {
        $history = EnvironmentHistory::findOrFail( $id );
        $theme = new SolarizedTheme();
        $converter = new AnsiToHtmlConverter( $theme, false );
        $css = $theme->asCss();
        $output = $converter->convert( $history->history );
        return view( 'history.show', [ 'history' => $history, 'output' => $output, 'css' => $css ] );
    }
}
