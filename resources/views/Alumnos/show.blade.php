@extends('layouts.layout_principal')

@section('content')
    <div class="container">
        <p class="d-flex justify-content-center fs-1">{{ $alumno->nombre }}</p>
    </div>

    <div class="card shadow-sm">
        <div class="card-body">
            <div class="row">
                <div class="col">
                    <p class="display-6"># Identidad: {{ $alumno->numero_identidad }}</p>
                </div>
                <div class="col">
                    <p class="display-6"># Cuenta: {{ $alumno->numero_cuenta }}</p>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <p class="display-6">Teléfono: {{ $alumno->telefono }}</p>
                </div>
                <div class="col">
                    <p class="display-6">Estado:
                        @if ($alumno->estado == 0)
                            <span class="badge bg-danger">Inactivo</span>
                        @else
                            <span class="badge bg-success">Activo</span>
                        @endif
                    </p>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <p class="display-6">Grado: {{ $alumno->grado->nombre }}</p>
                </div>
            </div>
        </div>
    </div>


@endsection
