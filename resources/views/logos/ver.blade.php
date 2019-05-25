@extends('layouts.panel')

@section('content')
    <div class="container py-4">
        <a href="{{ url()->previous() }}" class="btn btn-info mb-3 text-white volver-atras"><i class="fas fa-fw fa-arrow-left"></i> Volver atrás</a>
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <td>Logo</td>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            <img src="{{ Storage::url($logo->url) }}" alt="{{ $logo->titulo}}" width="250px">
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection
