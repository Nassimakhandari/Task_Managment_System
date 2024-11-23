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

    public function destroy($id)
    {
        // Find the task by ID
        $task = Creation::findOrFail($id);

        // Optional: Add authorization logic if needed
        // if (auth()->id() !== $task->user_id) {
        //     abort(403, 'Unauthorized action.');
        // }

        // Delete the task
        $task->delete();

        // Redirect back with a success message
        return redirect()->back()->with('success', 'Task deleted successfully.');
    }

    public function update(Request $request, $id)
    {
        // Validate the incoming request data
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'deadline' => 'required|date',
            'priority' => 'required|string|in:high,medium,low',
            'assignee_id' => 'required|exists:users,id',
            'status' => 'required|string|in:pending,completed',
        ]);
    
        // Find the task by ID and update it
        $task = Creation::findOrFail($id);
        $task->update([
            'name' => $request->name,
            'description' => $request->description,
            'deadline' => $request->deadline,
            'priority' => $request->priority,
            'assignee_id' => $request->assignee_id,
            'status' => $request->status,
        ]);
    
        // Redirect back with a success message
        return redirect()->route('tasks.index')->with('success', 'Task updated successfully.');
    }
}
