@extends('layouts.panel')

@section('content')
    <div class="container py-4">
        <a href="{{ route('imagenes.create') }}" class="btn btn-success mb-4">Añadir imagen</a>
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <td>Imagen</td>
                        <td>Tíulo</td>
                        <td>Descripción</td>
                        <td>Acciones</td>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($imagenes as $key => $imagen)
                        <tr>
                            <td>
                                <img src="{{ Storage::url($imagen->url) }}" alt="{{ $imagen->titulo }}" width="250px">
                            </td>
                            <td>
                                {{ $imagen->titulo }}
                            </td>
                            <td>
                                {{ $imagen->descripcion }}
                            </td>
                            <td>
                                <a href="{{ route('imagenes.edit', $imagen->id) }}">Editar</a>
                                <div class="dropdown">
                                    <div class="" id="dropdownEliminar" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <span class="text-danger">Eliminar</span>
                                    </div>

                                    <div class="dropdown-menu" aria-labelledby="dropdownEliminar">
                                        <p class="text-muted pl-1 pr-1 mt-2 mb-1 text-center mensaje-eliminar">¿Desea eliminar esta imagen?</p>
                                        <form action="{{ route('imagenes.destroy', $imagen->id) }}" method="POST" class="d-block form-destroy dropdown-item">
                                            @method('delete')
                                            @csrf

                                            <button type="submit" class="btn btn-danger d-block w-100">Confirmar</button>
                                        </form>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4">No hay datos</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
