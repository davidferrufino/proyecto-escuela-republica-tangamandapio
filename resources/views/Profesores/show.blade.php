@extends('layouts.layout_principal')

@section('content')

    <div class="container">
        <h3 class="d-flex justify-content-center">
            {{ $profesor->nombre }}
            <small class="text-muted">({{ $profesor->numero_empleado }})</small>
        </h3>

        <div class="card shadow-sm">
            <div class="card-body">
                <div class="row">
                    <div class="col">
                        <p class="display-6"># Identidad: {{ $profesor->numero_identidad }}</p>
                    </div>
                    <div class="col">
                        <p class="display-6"># Empleado: {{ $profesor->numero_empleado }}</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <p class="display-6">Teléfono: {{ $profesor->telefono }}</p>
                    </div>
                    <div class="col">
                        <p class="display-6">Estado:
                            @if ($profesor->estado == 0)
                                <span class="badge bg-danger">Inactivo</span>
                            @else
                                <span class="badge bg-success">Activo</span>
                            @endif
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <h4>Imparte en:</h4>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Grado</th>
                        <th scope="col">Código</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($profesor->grados()->paginate(10) as $grado )
                        <tr>
                            <th scope="row">{{ $loop->index + 1 }}</th>
                            <td>{{ $grado->nombre }}</td>
                            <td>{{ $grado->codigo }}</td>
                        </tr>
                    @empty
                        <td colspan="3">No hay Grados aún.</td>
                    @endforelse
                </tbody>
            </table>
            <div class="d-flex justify-content-center">
                {{ $profesor->grados()->paginate(10)->links() }}
            </div>
        </div>
    </div>
@endsection
