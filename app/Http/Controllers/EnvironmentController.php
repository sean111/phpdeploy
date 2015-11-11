<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Environment;
use App\Project;
use App\Server;

class EnvironmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $environments = Environment::all();
        return view( 'environment/index', [ 'environments' => $environments ] );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $projects = Project::lists( 'name', 'id' )->prepend( '' );
        $servers = Server::lists( 'name', 'id' )->prepend( '' );
        return view( 'environment/create', [ 'projects' => $projects, 'servers' => $servers ] );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'path' => 'required',
            'project_id' => 'required',
            'server_id' => 'required',
            'repo' => 'required'
        ] );

        $environment = Environment::create( [
            'name' => \Input::get( 'name' ),
            'path' => \Input::get( 'path' ),
            'project_id' => \Input::get( 'project_id' ),
            'server_id' => \Input::get( 'server_id' ),
            'repo' => \Inpit::get( 'repo' )
        ] );

        $environment->createToken();
        $environment->save();

        return redirect()->route( 'environment.index' );
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $env = Environment::findOrFail( $id );
        $projects = Project::lists( 'name', 'id' )->prepend( '' );
        $servers = Server::lists( 'name', 'id' )->prepend( '' );

        return view( 'environment.edit', [ 'target_env' => $env, 'projects' => $projects, 'servers' => $servers ] );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'path' => 'required',
            'project_id' => 'required',
            'server_id' => 'required',
            'repo' => 'required'
        ] );

        $env = Environment::findOrFail( $id );
        $env->name = \Input::get( 'name' );
        $env->path = \Input::get( 'path' );
        $env->repo = \Input::get( 'repo' );
        $env->branch = \Input::get( 'branch' );
        $env->server_id = \Input::get( 'server_id' );
        $env->project_id = \Input::get( 'project_id' );
        $env->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
