<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Project;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = Project::all();
        \Debugbar::info( var_export( $projects, true ) );
        return view( 'projects/index', [ 'projects' => $projects ] );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view( 'projects/create' );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $name = \Input::get( 'name' );
        if( !empty( $name ) ) {
            $project = new Project;
            $project->name = $name;            
            $project->save();
            return redirect()->route( 'project.show', [ $project->id ] );
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $project = Project::findOrFail( $id );
        return view( 'projects/show', [ 'project' => $project] );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $project = Project::findOrFail( $id );
        return view( 'projects/edit', [ 'target_project' => $project ] );
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
        $this->validate( $request, [
            'name' => 'required'
        ] );
        $project = Project::findOrFail( $id );
        $project->name = \Input::get( 'name' );
        $project->save();
        return redirect()->route( 'project.index' );

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        print "Deleting #$id<br />";
        $project = Project::findOrFail( $id );
        $project->delete();
        return redirect()->route( 'project.index' );
    }
}
