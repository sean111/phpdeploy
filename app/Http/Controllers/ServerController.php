<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Server;
use Symfony\Component\Process\Process;
use Symfony\Component\Process\Exception\ProcessFailedException;

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
        ] );
        $name = \Input::get( 'name' );
        $host = \Input::get( 'host' );
        $username = \Input::get( 'username' );

        $key_file_path = \Storage::disk( 'key_files' )->getDriver()->getAdapter()->getPathPrefix();
        $process = new Process( "ssh-keygen -t rsa -b 2048 -f $key_file_path/$host -q -N '' ");
        $process->run();

        $ssh_key = \Storage::disk( 'key_files' )->get( $host . '.pub' );
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
        if( $server->host != \Input::get( 'host' ) ) {
            \Storage::disk( 'key_files' )->move( $server->host, \Input::get( 'host' ) );
            \Storage::disk( 'key_files' )->move( $server->host . '.pub', \Input::get( 'host') . '.pub' );
        }
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
        $server = Server::findOrFail( $id );
        \Storage::disk( 'key_files' )->delete( $server->host );
        \Storage::disk( 'key_files' )->delete( $server->host . '.pub' );
        $server->delete();
        return redirect()->route( 'server.index' );
    }
}
