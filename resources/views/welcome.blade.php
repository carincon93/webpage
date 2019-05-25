@extends('layouts.app')

@section('content')
    {{-- Carousel --}}
    <header>
        <div id="slider" class="owl-carousel">
            @foreach ($imagenes as $key => $slider)
                <div class="slider-item" style="background: url({{ Storage::url($slider->url) }})">
                    <div class="container caption">
                        <h1 class="text-white display-3">{{ $slider->titulo }}</h1>
                        <p class="text-white text-md-left">{{ $slider->descripcion }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </header>
    <section id="nuestra-informacion" class="p-5">
        <div class="container">
            <h1 class="text-center mb-5">¿Quiénes somos?</h1>
            <p class="text-justify">{{ $informaciones->descripcion }}</p>
        </div>
    </section>
    <section id="servicios" class="p-5">
        <div class="container">
            <h1 class="text-center mb-5">Servicios</h1>
            @foreach($servicios->chunk(3) as $chunk)
                <div class="row">
                    @foreach($chunk as $servicio)
                        <div class="col-md-4">
                            <figure>
                                <img src="{{ Storage::url($servicio->url) }}" alt="{{ $servicio->titulo }}" class="d-block m-auto" width="65px">
                            </figure>
                            <p class="text-justify">
                                {{ $servicio->descripcion }}
                            </p>
                        </div>
                    @endforeach
                </div>
            @endforeach
        </div>
    </section>
    <section id="logos" class="py-4">
        <div class="container">
            <h1 class="text-center mb-5">Nuestros aliados</h1>
            <div id="logos-carousel" class="owl-carousel">
                @foreach ($logos as $key => $logo)
                    <div>
                        <figure>
                            <img src="{{ Storage::url($logo->url) }}" alt="{{ $logo->titulo }}" class="logo d-block m-auto">
                        </figure>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
