<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Servicio;
use App\Logo;
use App\Imagen;
use App\Informacion;

class WelcomeController extends Controller
{
    public function index()
    {
        $imagenes       = Imagen::orderBy('created_at', 'ASC')->get();
        $logos          = Logo::orderBy('created_at', 'ASC')->get();
        $servicios      = Servicio::orderBy('created_at', 'ASC')->get();
        $informaciones  = Informacion::where('tipoInformacion', 'nosotros')->first();

        return view('welcome', compact('imagenes', 'servicios', 'logos', 'informaciones'));
    }

    public function getServicio($slug)
    {
        $servicio = Servicio::where('slug', $slug)->firstOrFail();

        return view('servicio', compact('servicio'));
    }

    public function getInformacion($tipoInformacion)
    {
        $informacion = Informacion::where('tipoInformacion', $tipoInformacion)->firstOrFail();

        return view('informacion', compact('informacion'));
    }
}
