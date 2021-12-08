@extends('layouts.layout_principal')

@section('content')
    <div class="container">
        <div class="d-flex justify-content-end py-2">
            <a type="button" href="{{ route('profesores.create') }}" class="btn btn-outline-primary btn-sm">
                Agregar
            </a>
        </div>
        <form method="POST" action="{{ route('profesores.filter') }}" class="d-flex">
            @csrf
            <input class="form-control me-2" type="search" placeholder="Buscar..." name="busqueda" aria-label="Search">
            <button class="btn btn-outline-primary" type="submit">Buscar</button>
        </form>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Identidad</th>
                    <th scope="col"># Empleado</th>
                    <th scope="col">Profesión</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                @forelse ($profesores as $profesor )
                    <tr>
                        <td scope="row">{{ $loop->index + 1 }}</td>
                        <td><a href="{{ route('profesores.show', [$profesor->id]) }}">{{ $profesor->nombre }}</a></td>
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
                        <td>
                            <div class="d-flex flex-row justify-content-center gap-2">
                                <a type="button" href="{{ route('profesores.edit', [$profesor->id]) }}"
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
                                        <form method="POST" action="{{ route('profesores.delete', [$profesor->id]) }}">
                                            @method('DELETE')
                                            @csrf
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Eliminar</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    ¿Esta seguro que desea eliminar a {{$profesor->nombre}}?
                                                </div>
                                                <div class="modal-footer">

                                                    <button type="button" class="btn btn-dark"
                                                        data-bs-dismiss="modal">Cancelar</button>
                                                    <button type="submit" class="btn btn-danger">Aceptar</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                        </td>
                    </tr>
                @empty
                    <td colspan="3">No hay Profesores</td>
                @endforelse
            </tbody>
        </table>
    </div>
    <div class="d-flex justify-content-center">
        {{ $profesores->links() }}
    </div>

@endsection
