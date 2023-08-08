@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col">
                <div class="card mb-5">
                    <div class="card-header">
                        Burscar estudiante
                    </div>

                    <div class="card-body">
                        <form action="" method="POST" enctype="multipart/form-data" class="row g-3">
                            @csrf
                            <div class="col-auto">
                                <input class="form-control" type="search" id="formFile" name="search">
                            </div>

                            <div class="col-auto">
                                <button type="submit" class="btn btn-primary mb-3">Buscar</button>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header">

                        {{ __('Students') }}

                        <a href="{{ route('students.add') }}" class="btn btn-primary">Agregar</a>
                    </div>

                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">Tipo de Usuario</th>
                                <th scope="col">CUIL</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Apellido</th>
                                <th scope="col">Email</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($students as $student)
                                <tr>
                                    <th>{{ $student->user_type }}</th>
                                    <td>{{ $student->cuil }}</td>
                                    <td>{{ $student->firstname }}</td>
                                    <td>{{ $student->lastname }}</td>
                                    <td>{{ $student->email }}</td>
                                    <td>
                                        <div class="dropdown">
                                            <a class="btn btn-secondary dropdown-toggle" href="#" role="button"
                                                id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                                                Acciones
                                            </a>

                                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                <li><a class="dropdown-item"
                                                        href="{{ route('students.show', $student->id) }}">Detalle</a></li>
                                                <li><a class="dropdown-item"
                                                        href="{{ route('students.edit', $student->id) }}">Editar</a></li>
                                                <li>
                                                    <form action="{{ route('students.destroy', $student->id) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('PUT')
                                                        <button type="submit" class="dropdown-item">Eliminar</button>
                                                    </form>
                                                </li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
