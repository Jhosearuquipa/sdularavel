@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col">

                <h4 class="mb-3">Cursos</h4>

                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif

                <div class="text-end">
                    <a href="{{ route('courses.add') }}" class="btn btn-primary"> + Agregar capacitación</a>
                </div>

                {{ $dataTable->table() }}

            </div>
        </div>
    </div>
@endsection

@push('scripts')
    {{ $dataTable->scripts(attributes: ['type' => 'module']) }}
@endpush
