@extends('layouts.panel')

@section('content')
    <div class="container">
        <a href="{{ url()->previous() }}" class="btn btn-info mb-3 text-white volver-atras"><i class="fas fa-fw fa-arrow-left"></i> Volver atrás</a>
        <form action="{{ route('logos.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="titulo">Título</label>
                <input id="titulo" class="form-control" type="text" name="titulo" value="{{ old('titulo') }}" required>
            </div>
            <div class="form-group">
                <label for="url">Logo</label>
                <input id="url" class="form-control" type="file" name="url" value="{{ old('url') }}" accept="image/*" required>
            </div>
            <button type="submit" class="btn btn-success">Guardar</button>
        </form>
    </div>
@endsection
