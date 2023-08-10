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
                            <input type="hidden" name="course_id" value="{{ $id }}">
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

                        {{ __('Enrollments') }}

                        <a href="#" class="btn btn-primary">Agregar</a>
                    </div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif


                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
