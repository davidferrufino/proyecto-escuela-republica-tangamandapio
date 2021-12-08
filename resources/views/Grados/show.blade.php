@extends('layouts.layout_principal')

@section('content')

    <div class="container">
        <h3 class="d-flex justify-content-center">
            {{ $grado->nombre }}
            <small class="text-muted">({{ $grado->codigo }})</small>
        </h3>

        <div class="d-flex justify-content-end py-2">
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-outline-primary btn-sm" data-bs-toggle="modal"
                data-bs-target="#exampleModal">
                Agregar Profesor
            </button>

            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Agregar Profesor</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form method="POST" action="{{ route('grados.agregar_profesor', [$grado->id]) }}">
                                @csrf

                                <div class="mb-3">
                                    <label class="form-label">Seleccione el profesor</label>
                                    <select class="form-select mb-3" aria-label="Default select example"
                                        value="{{ old('profesor') }}" name="profesor">
                                        <option selected>Elegir</option>
                                        @foreach ($profesores as $profesor)
                                            <option value="{{ $profesor->id }}">{{ $profesor->nombre }}</option>
                                        @endforeach
                                    </select>
                                    @error('profesor')
                                        <span class="text-danger">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Cancelar</button>
                                <button type="submit" class="btn btn-danger">Agregar</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <h4>Profesores:</h4>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Profesor</th>
                    <th scope="col">Identidad</th>
                    <th scope="col"># Empleado</th>
                    <th scope="col">Profesión</th>
                    <th scope="col">Estado</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                @forelse ($grado->profesores()->paginate(10) as $profesor )
                    <tr>
                        <th scope="row">{{ $loop->index + 1 }}</th>
                        <td>{{ $profesor->nombre }}</td>
                        <td>{{ $profesor->numero_identidad }}</td>
                        <td>{{ $profesor->numero_empleado }}</td>
                        <td>{{ $profesor->profesion }}</td>
                        <td>
                            @if ($profesor->estado == 0)
                                <span class="badge bg-danger">Inactivo</span>
                            @else
                                <span class="badge bg-success">Activo</span>
                            @endif
                        </td>
                    </tr>
                @empty
                    <td colspan="3">No hay Profesores</td>
                @endforelse
            </tbody>
        </table>
        <div class="d-flex justify-content-center">
            {{ $grado->profesores()->paginate(10)->links() }}
        </div>
    </div>


    <div class="container">
        <h4>Alumnos:</h4>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Alumno</th>
                    <th scope="col">Identidad</th>
                    <th scope="col"># Cuenta</th>
                    <th scope="col">Estado</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                @forelse ($grado->alumnos()->paginate(10) as $alumno )
                    <tr>
                        <th scope="row">{{ $loop->index + 1 }}</th>
                        <td>{{ $alumno->nombre }}</td>
                        <td>{{ $alumno->numero_identidad }}</td>
                        <td>{{ $alumno->numero_cuenta }}</td>
                        <td>
                            @if ($alumno->estado == 0)
                                <span class="badge bg-danger">Inactivo</span>
                            @else
                                <span class="badge bg-success">Activo</span>
                            @endif
                        </td>
                    </tr>
                @empty
                    <td colspan="3">No hay Alumnos matriculados.</td>
                @endforelse
            </tbody>
        </table>
        <div class="d-flex justify-content-center">
            {{ $grado->alumnos()->paginate(10)->links() }}
        </div>
    </div>
    </div>
@endsection
