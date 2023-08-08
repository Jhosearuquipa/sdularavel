@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        Importar cursos
                    </div>

                    <div class="card-body">
                        <form action="{{ route('courses.import') }}" method="POST" enctype="multipart/form-data"
                            class="row g-3">
                            @csrf
                            <div class="col-auto">
                                <input class="form-control" type="file" id="formFile" name="file">
                                <input class="form-control" type="hidden" id="formFile" name="course_id">
                            </div>

                            <div class="col-auto">
                                <button type="submit" class="btn btn-primary mb-3">Cargar archivo</button>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="card mt-5">
                    <div class="card-header">

                        Agregar capacitación

                    </div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <form action="{{ route('courses.store') }}" method="post">

                            @csrf

                            @include('pages.courses.form')

                            <div class="mb-3 text-center">
                                <a href="{{ route('courses.index') }}" class="btn btn-secondary">Cancelar</a>
                                <button type="submit" class="btn btn-primary">Guardar</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
