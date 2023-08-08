@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col">
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

                        {{ $student->firstname . " " . $student->lastname }}

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
