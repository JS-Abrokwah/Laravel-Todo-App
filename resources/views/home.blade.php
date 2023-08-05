@extends('layouts.app')

@section('content')
<div class="container-fluid text-center">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header fw-bold fs-3">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <p class="fw-bold fs-4"> Welcome To The Best Todo App</p>
                    <a href="/todos/create" class="btn btn-sm btn-info m-5">Add New Task</a>
                    <a href="/todos/index" class="btn btn-sm btn-success m-5">All Tasks</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection