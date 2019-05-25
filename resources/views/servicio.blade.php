@extends('layouts.app')

@section('content')
    <header>
        <div class="jumbotron">
            <figure>
                <img src="{{ Storage::url($servicio->url) }}" alt="{{ $servicio->titulo}}" class="d-block m-auto" width="150px">
            </figure>
            <h2 class="text-center text-capitalize">{{ $servicio->titulo }}</h2>
        </div>
    </header>
    <section id="descripcion" class="p-5">
        <div class="container">
            <p class="text-justify">{!! $servicio->descripcion !!}</p>
        </div>
    </section>
@endsection
