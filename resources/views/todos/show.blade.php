@extends('layouts.app')

@section('content')
<div class="container-fluid text-center">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header fw-bold fs-3">Task: {{ $todo->title }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <a href="{{ url()->previous() }}" class="float-start btn btn-sm btn-secondary">Go back</a>
                    <p class="fw-bold">Description</p>
                    <p>{{ $todo->description }}</p>
                    @if ($todo->is_completed)
                        <p class="text-end">Status: <span class="text-success">Done</span></p>
                    @else
                    <p class="text-end">Status: <span class="text-danger">Pending</span></p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection