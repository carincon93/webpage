<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Informacion;

class InformacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $informaciones = Informacion::orderBy('created_at', 'ASC')->get();

        return view('informaciones.listar', compact('informaciones'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('informaciones.crear');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $informacion = new Informacion;
        $informacion->tipoInformacion = $request->get('tipoInformacion');
        $informacion->descripcion = $request->get('descripcion');

        $informacion->save();

        return redirect()->route('informaciones.index')->with('status', 'La información se ha añadido con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $informacion = Informacion::findOrFail($id);

        return view('informaciones.ver', compact('informacion'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $informacion = Informacion::findOrFail($id);

        return view('informaciones.editar', compact('informacion'));
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
        $informacion = Informacion::findOrFail($id);
        $informacion->tipoInformacion = $request->get('tipoInformacion');
        $informacion->descripcion = $request->get('descripcion');

        $informacion->save();

        return redirect()->route('informaciones.index')->with('status', 'La información se ha modificado con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Informacion::destroy($id);
        return redirect()->route('informaciones.index')->with('status', 'La información se ha eliminado con éxito');
    }
}
