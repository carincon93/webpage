<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use App\Imagen;

class ImagenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $imagenes = Imagen::orderBy('created_at', 'ASC')->get();

        return view('imagenes.listar', compact('imagenes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('imagenes.crear');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $imagen = new Imagen;
        $imagen->titulo = $request->get('titulo');
        $archivo   = $request->file('url');
        $imagen->descripcion   = $request->get('descripcion');

        Storage::putFileAs(
            'public/imagenes', $archivo, $archivo->getClientOriginalName()
        );

        $imagen->url = "imagenes/{$archivo->getClientOriginalName()}";

        $imagen->save();

        return redirect()->route('imagenes.index')->with('status', 'La imagen se ha añadido con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $imagen = Imagen::findOrFail($id);

        return view('imagenes.ver', compact('imagen'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $imagen = Imagen::findOrFail($id);

        return view('imagenes.editar', compact('imagen'));
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
        $imagen = Imagen::findOrFail($id);
        $imagen->titulo = $request->get('titulo');
        $imagen->descripcion   = $request->get('descripcion');

        if ($request->hasFile('url')) {
            $archivo   = $request->file('url');
            Storage::putFileAs(
                'public/imagenes', $archivo, $archivo->getClientOriginalName()
            );

            $imagen->url = "imagenes/{$archivo->getClientOriginalName()}";
        }

        $imagen->save();

        return redirect()->route('imagenes.index')->with('status', 'La imagen se ha modificado con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Imagen::destroy($id);
        return redirect()->route('imagenes.index')->with('status', 'La imagen se ha eliminado con éxito');
    }
}
