@extends('layouts.panel')

@section('content')
    <div class="container">
        <a href="{{ url()->previous() }}" class="btn btn-info mb-3 text-white volver-atras"><i class="fas fa-fw fa-arrow-left"></i> Volver atrás</a>
        <form action="{{ route('informaciones.update', $informacion->id) }}" method="post">
            @csrf
            {{ method_field('PUT') }}
            <div class="form-group">
                <label for="tipoInformacion">Tipo de información</label>
                <select id="tipoInformacion" class="form-control" name="tipoInformacion">
                    <option value="">Seleccione un tipo de información</option>
                    <option value="footer_sitio" {{ $informacion->tipoInformacion == 'footer_sitio' ? 'selected' : '' }}>Footer descripción</option>
                    <option value="mision" {{ $informacion->tipoInformacion == 'mision' ? 'selected' : '' }}>Misión</option>
                    <option value="vision" {{ $informacion->tipoInformacion == 'vision' ? 'selected' : '' }}>Visión</option>
                    <option value="nosotros" {{ $informacion->tipoInformacion == 'nosotros' ? 'selected' : '' }}>¿Quiénes somos?</option>
                </select>
            </div>
            <div class="form-group">
                <label for="descripcion">Descripción</label>
                <textarea id="descripcion" class="form-control" name="descripcion" rows="8" cols="80" required>{{ $informacion->descripcion }}</textarea>
            </div>
            <button type="submit" class="btn btn-success">Guardar</button>
        </form>
    </div>
@endsection
