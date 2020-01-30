<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Client;
class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clients = Client::all();
        //dd($clients);
        return view('admin.client.index', compact('clients'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.client.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       // return $request -> all();
       $this -> validate($request, [
        'name' => 'required ',
        'cuit' => 'required',
        'state' => 'required',
        
    ]);
        $client = Client::create([
            'name'=> $request -> get('name'),
            'cuit'=> $request->get('cuit'),
            'state'=> $request->get('state')

        ]);

        $message = $client ? 'Cliente agregado correctamente' : 'El  cliente no pudo agregarse';
        return redirect() -> route('admin.client.index') ->with('message', $message);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Client $client)
    {
        return $client;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Client $client)
    {
        return view ('admin.client.edit', compact('client'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Client $client)
    {
        $client->fill($request->all());

        $update = $client->save();
        $message = $update ? 'Cliente actualizado correctamente' : 'El cliente no se pudo actualizar';
        return redirect()->route('admin.client.index') -> with('message', $message);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Client $client)
    {
        $deleted = $client ->delete();
        $message = $deleted ? 'Cliente eliminado correctamente' : 'El cliente no se pudo eliminar';
        return redirect()->route('admin.client.index') -> with('message', $message);
    }
}
