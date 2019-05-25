@extends('layouts.panel')

@section('content')
    <div class="container py-4">
        <a href="{{ url()->previous() }}" class="btn btn-info mb-3 text-white volver-atras"><i class="fas fa-fw fa-arrow-left"></i> Volver atrás</a>
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <td>Servicio</td>
                        <td>Descripción</td>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            {{ $servicio->titulo }}
                        </td>
                        <td>
                            {{ $servicio->descripcion }}
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection
