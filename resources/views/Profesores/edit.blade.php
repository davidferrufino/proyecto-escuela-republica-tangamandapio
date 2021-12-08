@extends('layouts.layout_principal')

@section('content')
    <div class="container">
        <p class="fs-1">Editar Profesor</p>
        <form method="POST" action="{{ route('profesores.update', [$profesor->id]) }}">
            @method('PUT')
            @csrf

            <div class="mb-3">
                <label class="form-label">Nombre del Profesor</label>
                <input type="text" class="form-control" value="{{ $profesor->nombre }}" name="nombre">
                @error('nombre')
                    <span class="text-danger">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Número de Identidad</label>
                <input type="number" class="form-control" value="{{ $profesor->numero_identidad }}" name="numero_identidad">
                @error('numero_identidad')
                    <span class="text-danger">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Número de Empleado</label>
                <input type="number" class="form-control" value="{{ $profesor->numero_empleado }}" name="numero_empleado">
                @error('numero_empleado')
                    <span class="text-danger">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Teléfono</label>
                <input type="number" class="form-control" value="{{ $profesor->telefono }}" name="telefono">
                @error('telefono')
                    <span class="text-danger">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Seleccione la profesión</label>
                <select class="form-select mb-3" aria-label="Default select example" value="{{ $profesor->profesion }}"
                    name="profesion">
                    <option value="Lic. Matematicas" {{ $profesor->profesion=="Lic. Matematicas" ? "selected" : ""}}>Lic. Matematicas</option>
                    <option value="Lic. Literatura" {{ $profesor->profesion=="Lic. Literatura" ? "selected" : ""}}>Lic. Literatura</option>
                    <option value="Lic. Biologia" {{ $profesor->profesion=="Lic. Biologia" ? "selected" : ""}}>Lic. Biologia</option>
                    <option value="Lic. Quimica" {{ $profesor->profesion=="Lic. Quimica" ? "selected" : ""}}>Lic. Quimica</option>
                    <option value="Lic. Ingles" {{ $profesor->profesion=="Lic. Ingles" ? "selected" : ""}}>Lic. Ingles</option>
                </select>
                @error('profesion')
                    <span class="text-danger">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>            

            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="{{ $profesor->estado }}" name="estado"  {{ $profesor->estado == 1 ? "checked": ""}}>
                <label class="form-check-label" for="flexCheckDefault">
                    Activo
                </label>
            </div>

            <button type="submit" class="btn btn-primary mb-2">Guardar</button>
            <a class="btn btn-danger mb-2" href="{{ route('profesores.index') }}">Cancelar</a>
        </form>
    </div>


@endsection
