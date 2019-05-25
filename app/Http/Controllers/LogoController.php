<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use App\Logo;

class LogoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $logos = Logo::orderBy('created_at', 'ASC')->get();

        return view('logos.listar', compact('logos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('logos.crear');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $logo = new Logo;
        $logo->titulo = $request->get('titulo');
        $archivo   = $request->file('url');

        Storage::putFileAs(
            'public/logos', $archivo, $archivo->getClientOriginalName()
        );

        $logo->url = "logos/{$archivo->getClientOriginalName()}";

        $logo->save();

        return redirect()->route('logos.index')->with('status', 'El logo se ha añadido con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $logo = Logo::findOrFail($id);

        return view('logos.ver', compact('logo'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $logo = Logo::findOrFail($id);

        return view('logos.editar', compact('logo'));
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
        $logo = Logo::findOrFail($id);
        $logo->titulo = $request->get('titulo');
        $archivo   = $request->file('url');

        Storage::putFileAs(
            'public/logos', $archivo, $archivo->getClientOriginalName()
        );

        $logo->url = "logos/{$archivo->getClientOriginalName()}";

        $logo->save();

        return redirect()->route('logos.index')->with('status', 'El logo se ha modificado con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Logo::destroy($id);
        return redirect()->route('logos.index')->with('status', 'El logo se ha eliminado con éxito');
    }
}
