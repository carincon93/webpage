@extends('layouts.panel')

@section('content')
    <div class="container">
        <a href="{{ url()->previous() }}" class="btn btn-info mb-3 text-white volver-atras"><i class="fas fa-fw fa-arrow-left"></i> Volver atrás</a>
        <form action="{{ route('imagenes.update', $imagen->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            {{ method_field('PUT') }}

            <div class="form-group">
                <label for="titulo">Título</label>
                <input id="titulo" class="form-control" type="text" name="titulo" value="{{ $imagen->titulo }}" required>
            </div>
            <div class="form-group">
                <label for="url">Imagen</label>
                <input id="url" class="form-control" type="file" name="url" value="{{ $imagen->url }}" accept="image/*">
            </div>
            <div class="form-group">
                <label for="descripcion">Descripción</label>
                <textarea id="descripcion" class="form-control" name="descripcion" rows="8" cols="80" required>{{ $imagen->descripcion }}</textarea>
            </div>
            <button type="submit" class="btn btn-success">Editar</button>
        </form>
    </div>
@endsection
