@extends('layouts.app')

@section('content')
<div class="container text-center">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header fw-bold fs-3">Create New Task</div>

                <div class="card-body">

                    @if ($errors->any())
                        <div class="alert alert-danger text-start">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form method="post" action="{{ route('todos.store') }}">
                        @csrf
                        <div class="mb-3">
                            <div class="row">
                                <div class="col-md-3">
                                    <label for="title" class="form-label">Title</label>

                                </div>
                                <div class="col-md-9">
                                    <input type="text" name="title" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="row">
                                <div class="col-md-3">
                                    <label for="description" class="form-label">Description</label>
                                </div>
                                <div class="col-md-9">
                            <textarea name="description" cols="30" rows="5" class="form-control"></textarea>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Create</button>
                    </form>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection