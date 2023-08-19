@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col">
                <div class="card mt-5">
                    <div class="card-header">

                        {{ __('Courses') }}

                        <a href="{{ route('courses.add') }}" class="btn btn-primary">Agregar</a>
                    </div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">ID SDU</th>
                                    <th scope="col">Nombre</th>
                                    <th scope="col">Fecha de inicio</th>
                                    <th scope="col">Fecha de fin</th>
                                    <th scope="col">Comentario</th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($courses as $course)
                                    <tr>
                                        <td>{{ $course->id }}</td>
                                        <td><a href="{{ route('enrollments.add', $course->id) }}"> {{ $course->name }}</a>
                                        </td>
                                        <td>{{ $course->fh_course_start }}</td>
                                        <td>{{ $course->fh_course_end }}</td>
                                        <td>{{ $course->comments }}</td>
                                        <td>
                                            <div class="dropdown">
                                                <a class="btn btn-secondary dropdown-toggle" href="#" role="button"
                                                    id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                                                    Acciones
                                                </a>

                                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                    <li><a class="dropdown-item"
                                                            href="{{ route('courses.show', $course->id) }}">Detalle</a>
                                                    </li>
                                                    <li><a class="dropdown-item"
                                                            href="{{ route('courses.edit', $course->id) }}">Editar</a>
                                                    </li>
                                                    <li>
                                                        <form action="{{ route('courses.destroy', $course->id) }}"
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
    </div>
@endsection
