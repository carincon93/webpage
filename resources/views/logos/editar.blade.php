@extends('layouts.panel')

@section('content')
    <div class="container">
        <a href="{{ url()->previous() }}" class="btn btn-info mb-3 text-white volver-atras"><i class="fas fa-fw fa-arrow-left"></i> Volver atrás</a>
        <form action="{{ route('logos.update', $logo->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            {{ method_field('PUT') }}

            <div class="form-group">
                <label for="titulo">Título</label>
                <input id="titulo" class="form-control" type="text" name="titulo" value="{{ $logo->titulo }}" required>
            </div>
            <div class="form-group">
                <label for="url">Logo</label>
                <input id="url" class="form-control" type="file" name="url" value="{{ $logo->url }}" accept="image/*" required>
            </div>
            <button type="submit" class="btn btn-success">Editar</button>
        </form>
    </div>
@endsection
