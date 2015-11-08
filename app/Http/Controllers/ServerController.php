<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Server;

class ServerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $servers = Server::all();
        return view( 'server/index', [ 'servers' => $servers ] );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view( 'server/create' );
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
            'host' => 'required',
            'username' => 'required',
            'ssh_key' => 'required'
        ] );
        $name = \Input::get( 'name' );
        $host = \Input::get( 'host' );
        $username = \Input::get( 'username' );
        $ssh_key = \Input::get( 'ssh_key' );
        $server = Server::create( [ 'name' => $name, 'host' => $host, 'username' => $username, 'ssh_key' => $ssh_key ] );
        return redirect()->route( 'server.index' );
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
        $server = Server::findOrFail( $id );
        return view( 'server/edit', [ 'server' => $server ] );
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
            'host' => 'required',
            'username' => 'required',
            'ssh_key' => 'required'
        ] );

        $server = Server::findOrFail( $id );
        $server->name = \Input::get( 'name' );
        $server->host = \Input::get( 'host' );
        $server->username = \Input::get( 'username' );
        $server->ssh_key = \Input::get( 'ssh_key' );
        $server->save();
        return redirect()->route( 'server.index' );
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
