@extends('layouts.layout_principal')

@section('content')
    <div class="container">
        <p class="fs-1">Editar Grado</p>
        <form method="POST" action="{{ route('grados.update', [$grado->id]) }}">
            @method('PUT')
            @csrf

            <div class="mb-3">
                <label class="form-label">Nombre del Grado</label>
                <input type="text" class="form-control" name="nombre" value="{{ $grado->nombre }}">
                @error('nombre')
                    <span class="text-danger">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="mb-3">
                <label class="form-label">Código</label>
                <input type="text" class="form-control" name="codigo" value="{{ $grado->codigo }}">
                @error('codigo')
                    <span class="text-danger">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Guardar</button>
            <a class="btn btn-danger" href="{{route('grados.index')}}">Cancelar</a>
        </form>
    </div>


@endsection
