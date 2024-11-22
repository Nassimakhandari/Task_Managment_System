<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;


class TodoController extends Controller
{
    public function index()
    {
        $todos = Todo::where('user_id', auth()->id())->get();
        return view("todo_list", compact("todos"));
    }

    public function store(Request $request)
    {
        // dd("hhhhhh");
        // Validate incoming request data
        $request->validate([
            'task_name' => 'required',
            'task_description' => 'required',
            'task_deadline' => 'required',
            'task_priority' => 'required',
        ]);
        Todo::create([
            'task_name' => $request->task_name,
            'task_description' => $request->task_description,
            'task_deadline' => $request->task_deadline,
            'task_priority' => $request->task_priority,
            'user_id' => auth()->id(), // Associe la tâche à l'utilisateur connecté

        ]);
        return back();
    }
}
