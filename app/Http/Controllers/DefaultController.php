<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Enivronment;
use App\Environment;
use App\Server;
use App\Project;

class DefaultController extends Controller {

    /**
    * Search for items with the inputed name
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    **/
    public function search( Request $request ) {
        $this->validate($request, [
            'term' => 'required'
        ] );
        $term = \Input::get( 'term' );
        $projects = Project::where( 'name', 'LIKE', "%$term%" )->get();
        $servers = Server::where( 'name', 'LIKE', "%$term%" )->get();
        $environments = Environment::where( 'name', 'LIKE', "%$term%" )->get();
        return view( 'search', [ 'projects' => $projects, 'servers' => $servers, 'envs' => $environments ] );
    }
}
