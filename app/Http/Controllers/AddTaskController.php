<?php

namespace App\Http\Controllers;

use App\Models\Creation;
use Illuminate\Http\Request;

class AddTaskController extends Controller
{
    public function index()
    {
        $task = auth()->user()->creations;
        return view("task", compact('task'));
    }
    public function store(Request $request)
    {
        // Validate incoming request data
        $request->validate([
            'name_todo' => 'required|string|max:255',
            'description_todo' => 'required|string',
            'start' => 'required|date',
            'end' => 'required|date',
            'priority_todo' => 'required|string|in:Low,Medium,High',
        ]);
        Creation::create([
            'name_todo' => $request->name_todo,
            'description_todo' => $request->description_todo,
            'start' => $request->start,
            'end' => $request->end,
            'priority_todo' => $request->priority_todo,
            'user_id' => auth()->id(), // Associe la tâche à l'utilisateur connecté

        ]);
        // dd('eeeeeee');

        // Redirect back to the task list
        return back();
    }

    public function destroy(Creation $todo)
    {
        $todo->delete(); // Delete the task
        return back(); // Redirect back to the task list
    }
}
