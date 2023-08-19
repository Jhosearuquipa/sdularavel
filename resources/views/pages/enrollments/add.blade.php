@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        Importar Usuarios
                    </div>

                    <div class="card-body">
                        <form action="{{ route('enrollments.import', 3) }}" method="POST" enctype="multipart/form-data"
                            class="row g-3">
                            @csrf
                            <div class="col-auto">
                                <input class="form-control" type="file" id="formFile" name="file">
                            </div>
                            <input type="hidden" name="course_id" value="{{ $course->id }}">
                            <div class="col-auto">
                                <button type="submit" class="btn btn-primary mb-3">Cargar archivo</button>
                            </div>
                        </form>
                    </div>
                </div>

                @if ($errors->any())
                    <div class="alert alert-danger mt-5">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="card mt-5">
                    <div class="card-header">

                        {{ $course->id . ' - ' . $course->name }}

                        <a href="#" class="btn btn-primary">Agregar</a>
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
                                    <th scope="col">#</th>
                                    <th scope="col">Cuil</th>
                                    <th scope="col">Apellido</th>
                                    <th scope="col">Nombre</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Calificación</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($students as $key => $students)
                                    <tr>
                                        <td>{{ $key }}</td>
                                        <td>{{ $students->cuil }}</td>
                                        <td>{{ $students->lastname }}</td>
                                        <td>{{ $students->firstname }}</td>
                                        <td>{{ $students->work_email }}</td>
                                        <td>{{ $students->remark }}</td>

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
