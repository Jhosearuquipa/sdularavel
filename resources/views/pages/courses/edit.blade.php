@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col">
                <div class="card mt-5">
                    <div class="card-header">

                        Editar capacitación

                    </div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <form action="{{ route('courses.update',  $course->id) }}" method="post">

                            @csrf

                            @method('PUT')

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
