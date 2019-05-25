@extends('layouts.app')

@section('content')
    <header>
        <div class="jumbotron">
            <h2 class="text-center text-capitalize">{{ $informacion->tipoInformacion == 'mision' ? 'Misión' : 'Visión' }}</h2>
        </div>
    </header>
    <section id="descripcion" class="p-5">
        <div class="container">
            <p class="text-justify">{!! $informacion->descripcion !!}</p>
        </div>
    </section>
@endsection
