@extends('layouts.layout_principal')

@section('content')
    <div class="container">
        <p class="fs-1">Editar Alumno</p>
        <form method="POST" action="{{ route('alumnos.update', [$alumno->id]) }}">
            @method("PUT")
            @csrf

            <div class="mb-3">
                <label class="form-label">Nombre del Alumno</label>
                <input type="text" class="form-control" value="{{ $alumno->nombre }}" name="nombre">
                @error('nombre')
                    <span class="text-danger">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Número de Identidad</label>
                <input type="number" class="form-control" value="{{ $alumno->numero_identidad }}"
                    name="numero_identidad">
                @error('numero_identidad')
                    <span class="text-danger">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Número de Cuenta</label>
                <input type="number" class="form-control" value="{{ $alumno->numero_cuenta }}" name="numero_cuenta">
                @error('numero_cuenta')
                    <span class="text-danger">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Teléfono</label>
                <input type="number" class="form-control" value="{{ $alumno->telefono }}" name="telefono">
                @error('telefono')
                    <span class="text-danger">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <label class="form-label">Seleccione el grado</label>
            <select class="form-select mb-3" aria-label="Default select example" value="{{ $alumno->id_grado }}"
                name="id_grado">
                @foreach ($grados as $grado)
                    <option value="{{ $grado->id }}" {{ $alumno->id_grado==$grado->id ? "selected" : ""}}>
                        {{ $grado->nombre }} ({{ $grado->codigo }})
                    </option>
                @endforeach
            </select>

            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="{{ $alumno->estado }}"
                {{ $alumno->estado == 1 ? "checked": ""}} name="estado">
                <label class="form-check-label" for="flexCheckDefault">
                    Activo
                </label>
            </div>

            <button type="submit" class="btn btn-primary mb-2">Guardar</button>
            <a class="btn btn-danger mb-2" href="{{ route('alumnos.index') }}">Cancelar</a>
        </form>
    </div>


@endsection
