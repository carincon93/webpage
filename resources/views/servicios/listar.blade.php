@extends('layouts.panel')

@section('content')
    <div class="container py-4">
        <a href="{{ route('servicios.create') }}" class="btn btn-success mb-4">Añadir servicio</a>
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <td>Servicio</td>
                        <td>Descripción</td>
                        <td>Acciones</td>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($servicios as $key => $servicio)
                        <tr>
                            <td>
                                {{ $servicio->titulo }}
                            </td>
                            <td>
                                {{ $servicio->descripcion }}
                            </td>
                            <td>
                                <a href="{{ route('servicios.edit', $servicio->id) }}">Editar</a>
                                <div class="dropdown">
                                    <div class="" id="dropdownEliminar" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <span class="text-danger">Eliminar</span>
                                    </div>

                                    <div class="dropdown-menu" aria-labelledby="dropdownEliminar">
                                        <p class="text-muted pl-1 pr-1 mt-2 mb-1 text-center mensaje-eliminar">¿Desea eliminar este servicio?</p>
                                        <form action="{{ route('servicios.destroy', $servicio->id) }}" method="POST" class="d-block form-destroy dropdown-item">
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
                            <td colspan="3">No hay datos</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
