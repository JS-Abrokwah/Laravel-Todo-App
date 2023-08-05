@extends('layouts.app')

@section('content')
<div class="container text-center">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header fw-bold fs-3">Edit Task {{ $todo->title }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('todos.update') }}">
                        @csrf
                        @method('PATCH')
                        <input type="hidden" name="todo_id" value="{{ $todo->id }}" class="form-control">
                        <div class="mb-3">
                            <div class="row">
                                <div class="col-md-3">
                                    <label for="title" class="form-label">Title</label>

                                </div>
                                <div class="col-md-9">
                                    <input type="text" name="title" value="{{ $todo->title }}" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="row">
                                <div class="col-md-3">
                                    <label for="description" class="form-label">Description</label>
                                </div>
                                <div class="col-md-9">
                            <textarea name="description" cols="30" rows="5" class="form-control">{{ $todo->description }}</textarea>
                                </div>
                            </div>     
                        </div>
                        <div class="mb-3">
                            <div class="row">
                                <div class="col-md-3">
                                    <label for="is_complete" class="form-label">Status</label>

                                </div>
                                <div class="col-md-9">
                                    <select name="is_completed" class="form-select form-select-sm">
                                        <option disabled selected>Select Option</option>
                                        <option value="1">Mark as Done</option>
                                        <option value="0">Undone</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-success">Save Changes</button>
                    </form>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection