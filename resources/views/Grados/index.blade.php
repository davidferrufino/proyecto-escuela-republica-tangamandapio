@extends('layouts.layout_principal')

@section('content')
    <div class="container">
        <div class="d-flex justify-content-end py-2">
            <a type="button" href="{{ route('grados.create') }}" class="btn btn-outline-primary btn-sm">
                Agregar
            </a>
        </div>
        <form method="POST" action="{{ route('grados.filter') }}" class="d-flex">
            @csrf
            <input class="form-control me-2" type="search" placeholder="Buscar..." name="busqueda" aria-label="Search">
            <button class="btn btn-outline-primary" type="submit">Buscar</button>
        </form>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Código</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                @forelse ($grados as $grado )
                    <tr>
                        <td scope="row">{{ $loop->index + 1 }}</td>
                        <td><a href="{{ route('grados.show', [$grado->id]) }}">{{ $grado->nombre }}</a></td>
                        <td>{{ $grado->codigo }}</td>
                        <td>
                            <div class="d-flex flex-row justify-content-center gap-2">
                                <a type="button" href="{{ route('grados.edit', [$grado->id]) }}"
                                    class="btn btn-outline-primary btn-sm">
                                    Editar
                                </a>
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-outline-danger btn-sm" data-bs-toggle="modal"
                                    data-bs-target="#exampleModal">
                                    Eliminar
                                </button>

                                <!-- Modal -->
                                <div class="modal fade" id="exampleModal" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <form method="POST" action="{{ route('grados.delete', [$grado->id]) }}">
                                                @method('DELETE')
                                                @csrf
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Eliminar</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    ¿Esta seguro que desea eliminar este {{ $grado->nombre }}?
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-dark"
                                                        data-bs-dismiss="modal">Cancelar</button>
                                                    <button type="submit" class="btn btn-danger">Aceptar</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </td>
                    </tr>
                @empty
                    <td colspan="3">No hay Grados</td>
                @endforelse
            </tbody>
        </table>
    </div>
    <div class="d-flex justify-content-center">
        {{ $grados->links() }}
    </div>

@endsection
