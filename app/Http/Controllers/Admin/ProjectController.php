<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\SaveProjectRequest;
use App\Http\Controllers\Controller;
use App\Project;
use App\Client;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = Project::orderBy('id', 'desc') ->paginate(5);
        //dd($projects);
        return view('admin.project.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $clients = Client ::orderBy('id','desc') ->lists('name', 'id');
       // dd($clients);
       return view('admin.project.create', compact('clients'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SaveProjectRequest $request)
    {
        $data = [
            'name'=> $request -> get('name'),
            'description'=> $request->get('description'),
            'startDate'=> $request->get('startDate'),
            'state' => $request->get('state' ),
            'client_id' => $request->get('client_id' )

        ];
        $project = Project :: create($data);
        $message = $project ? 'Proyecto agregado correctamente' : 'El  proyecto no pudo agregarse';
        return redirect() -> route('admin.project.index') ->with('message', $message);  
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        return $project;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        $clients = Client ::orderBy('id','desc') ->lists('name', 'id');
        return view('admin.project.edit', compact('clients','project'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SaveProjectRequest $request, Project $project)
    {
        $project->fill($request->all());

        $update = $project->save();
        $message = $update ? 'Proyecto actualizado correctamente' : 'El proyecto no se pudo actualizar';
        return redirect()->route('admin.project.index') -> with('message', $message);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy( Project $project)
    {
        $deleted = $project ->delete();
        $message = $deleted ? 'Cliente eliminado correctamente' : 'El cliente no se pudo eliminar';
        return redirect()->route('admin.project.index')-> with('message', $message);
    }
}
