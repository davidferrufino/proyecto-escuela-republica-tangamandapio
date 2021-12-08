@extends('layouts.layout_principal')

@section('content')
    <div class="container">
        <p class="fs-1">Crear Alumno</p>
        <form method="POST" action="{{ route('alumnos.store') }}">
            @csrf

            <div class="mb-3">
                <label class="form-label">Nombre del Alumno</label>
                <input type="text" class="form-control" value="{{ old('nombre') }}" name="nombre">
                @error('nombre')
                    <span class="text-danger">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Número de Identidad</label>
                <input type="number" class="form-control" value="{{ old('numero_identidad') }}" name="numero_identidad">
                @error('numero_identidad')
                    <span class="text-danger">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Número de Cuenta</label>
                <input type="number" class="form-control" value="{{ old('numero_cuenta') }}" name="numero_cuenta">
                @error('numero_cuenta')
                    <span class="text-danger">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Teléfono</label>
                <input type="number" class="form-control" value="{{ old('telefono') }}" name="telefono">
                @error('telefono')
                    <span class="text-danger">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Seleccione el grado</label>
                <select class="form-select mb-3" aria-label="Default select example" value="{{ old('id_grado') }}"
                    name="id_grado">
                    <option selected>Elegir</option>
                    @foreach ($grados as $grado)
                        <option value="{{ $grado->id }}">{{ $grado->nombre }} ({{ $grado->codigo }})</option>
                    @endforeach
                </select>
                @error('id_grado')
                    <span class="text-danger">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="{{ old('estado') }}" name="estado" checked>
                <label class="form-check-label" for="flexCheckDefault">
                    Activo
                </label>
            </div>

            <button type="submit" class="btn btn-primary mb-2">Guardar</button>
            <a class="btn btn-danger mb-2" href="{{ route('alumnos.index') }}">Cancelar</a>
        </form>
    </div>


@endsection
