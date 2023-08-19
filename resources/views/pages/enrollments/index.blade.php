@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col">


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
                                    <th scope="col">Apellido</th>
                                    <th scope="col">Nombre</th>
                                    <th scope="col">Cuil</th>
                                    <th scope="col">Email</th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($students as $students)
                                    <tr>
                                        <td>{{ $students->lastname }}</td>
                                        <td>{{ $students->firstname }}</td>
                                        <td>{{ $students->cuil }}</td>
                                        <td>{{ $students->work_email }}</td>
                                        <td>{{ $students-> }}</td>

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
