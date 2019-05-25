@extends('layouts.panel')

@section('content')
    <div class="container py-4">
        <a href="{{ route('logos.create') }}" class="btn btn-success mb-4">Añadir logo</a>
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <td>Logo</td>
                        <td>Acciones</td>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($logos as $key => $logo)
                        <tr>
                            <td>
                                <img src="{{ Storage::url($logo->url) }}" alt="{{ $logo->titulo}}" width="150px">
                            </td>
                            <td>
                                <a href="{{ route('logos.edit', $logo->id) }}">Editar</a>
                                <div class="dropdown">
                                    <div class="" id="dropdownEliminar" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <span class="text-danger">Eliminar</span>
                                    </div>

                                    <div class="dropdown-menu" aria-labelledby="dropdownEliminar">
                                        <p class="text-muted pl-1 pr-1 mt-2 mb-1 text-center mensaje-eliminar">¿Desea eliminar esta logo?</p>
                                        <form action="{{ route('logos.destroy', $logo->id) }}" method="POST" class="d-block form-destroy dropdown-item">
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
                            <td colspan="2">No hay datos</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
