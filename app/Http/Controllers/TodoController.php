<?php

namespace App\Http\Controllers;

use App\Http\Requests\TodoRequest;
use App\Models\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    public function index(){
        $alltodos=Todo::all();
        return view('todos.index',[
            'todos'=>$alltodos
        ]);
    }
    public function create() {
        return view('todos.create');
    }
    public function edit($id) {
        $todo=Todo::find($id);
        if(!$todo){
            request()->session()->flash('error','Sorry, but this task was not found');
            return to_route('todos.index');
        }
        return view('todos.edit',['todo'=>$todo]);
    }
    public function store(TodoRequest $request) {
        $request->validated();
        Todo::create(
            [
                'title'=>$request->title,
                'description'=>$request->description,
                'is_completed'=>0
            ]
        );
        $request->session()->flash('alert-success', 'Task created successfully');
        return to_route('todos.index');
    }
    public function show($id){
        $todo=Todo::find($id);
        if(!$todo){
            request()->session()->flash('error','Sorry, but this task was not found');
            return to_route('todos.index');
        }
        return view('todos.show',['todo'=>$todo]);
    }

    public function update(TodoRequest $request){
        $request->validated();
        $todo=Todo::find($request->todo_id);
        if(!$todo){
            request()->session()->flash('error','Sorry, but this task cannot be updated because it does not exist');
            return to_route('todos.index');
        }
        $todo->update([
            'title'=>$request->title,
            'description'=>$request->description,
            'is_completed'=> $request->is_completed || 0
        ]);

        $request->session()->flash('update-success','Task update successful');
            return to_route('todos.index');
    }

    public function destroy(Request $request){
        $todo=Todo::find($request->todo_id);
        if(!$todo){
            request()->session()->flash('error','Sorry, but this task cannot be updated because it does not exist');
            return to_route('todos.index');
        }

        $todo->delete();

        $request->session()->flash('alert-success','Task deletion successful');
            return to_route('todos.index');
    }
}
