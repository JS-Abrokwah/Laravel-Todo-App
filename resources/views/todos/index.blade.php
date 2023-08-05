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
                    <div class="row">
                      <div class="col-sm-9 text-center">
                        <h3>Welcome to the best Todo App</h3>
                      </div>
                      <div class="col-sm-3 text-center">
                        <a class="btn btn-sm btn-info float-end" href="{{ route('todos.create') }}">New Task</a>
                      </div>
                    </div>
                    @if(Session::has('alert-success'))
                    <div class="alert alert-success" role=alert>
                      {{ Session::get('alert-success') }}
                    </div>
                    @endif

                    @if(Session::has('update-success'))
                    <div class="alert alert-success" role=alert>
                      {{ Session::get('update-success') }}
                    </div>
                    @endif

                    @if(Session::has('error'))
                    <div class="alert alert-danger" role=alert>
                      {{ Session::get('error') }}
                    </div>
                    @endif

                    @if (count($todos)> 0)
                      
                      <table class="table">
                          <thead>
                            <tr>
                              <th scope="col">Title</th>
                              <th scope="col">Description</th>
                              <th scope="col">Status</th>
                              <th scope="col">Actions</th>
                            </tr>
                          </thead>
                          <tbody>
                            @foreach ($todos as $todo)
                              <tr>
                                <td>{{ $todo->title }}</td>
                                <td>{{ $todo->description }}</td>
                                <td>
                                  @if ($todo->is_completed)
                                    <p class="text-success">Done</p>
                                  @else
                                    <p class="text-danger">Pending</p>
                                  @endif
                                </td>
                                <td class="d-flex flex-row justify-content-around">
                                  <a href="{{ route('todos.show', $todo->id) }}" class="btn btn-sm btn-success">View</a>
                                  <a href="{{ route('todos.edit',$todo->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                  <form method="POST" action="{{ route('todos.destroy') }}">
                                    @csrf
                                    @method('DELETE')
                                    <input type="hidden" name="todo_id" value="{{ $todo->id }}">
                                    <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                  </form>
                                </td>
                              </tr>
                            @endforeach
                          </tbody>
                      </table>
                    @else
                      <p class="fw-bold">No task available...</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection