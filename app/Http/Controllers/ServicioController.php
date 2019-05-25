<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

use App\Servicio;

class ServicioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $servicios = Servicio::orderBy('created_at', 'ASC')->get();

        return view('servicios.listar', compact('servicios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('servicios.crear');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $servicio = new Servicio;
        $servicio->titulo   = $request->get('titulo');
        $servicio->slug     = Str::slug($request->get('titulo'));
        $servicio->descripcion = $request->get('descripcion');
        $archivo   = $request->file('url');

        Storage::putFileAs(
            'public/iconos', $archivo, $archivo->getClientOriginalName()
        );

        $servicio->url = "iconos/{$archivo->getClientOriginalName()}";

        $servicio->save();

        return redirect()->route('servicios.index')->with('status', 'El servicio se ha añadido con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $servicio = Servicio::findOrFail($id);

        return view('servicios.ver', compact('servicio'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $servicio = Servicio::findOrFail($id);

        return view('servicios.editar', compact('servicio'));
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
        $servicio = Servicio::findOrFail($id);
        $servicio->titulo   = $request->get('titulo');
        $servicio->slug     = Str::slug($request->get('titulo'));
        $servicio->descripcion = $request->get('descripcion');
        $archivo   = $request->file('url');

        Storage::putFileAs(
            'public/iconos', $archivo, $archivo->getClientOriginalName()
        );

        $servicio->url = "iconos/{$archivo->getClientOriginalName()}";

        $servicio->save();

        return redirect()->route('servicios.index')->with('status', 'El servicio se ha modificado con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Servicio::destroy($id);
        return redirect()->route('servicios.index')->with('status', 'El servicio se ha eliminado con éxito');
    }
}
