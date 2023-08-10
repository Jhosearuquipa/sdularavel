@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        Importar participantes
                    </div>

                    <div class="card-body">
                        <form action="{{ route('students.import') }}" method="POST" enctype="multipart/form-data"
                            class="row g-3">
                            @csrf
                            <div class="col-auto">
                                <input class="form-control" type="file" id="formFile" name="file">
                            </div>

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

                        Agregar participante

                    </div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <form action="{{ route('students.store') }}" method="post">

                            @csrf

                            @include('pages.students.form')
                            <div class="mb-3 text-center">
                                <a href="{{ route('students.index') }}" class="btn btn-secondary">Cancelar</a>
                                <button type="submit" class="btn btn-primary">Guardar</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
