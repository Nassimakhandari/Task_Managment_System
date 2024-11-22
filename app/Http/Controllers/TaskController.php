<?php

namespace App\Http\Controllers;


use App\Models\Group;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index()
    {
        $groups = Group::where('user_id', auth()->user()->id)->get();
        return view('dashboard', compact('groups'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'deadline' => 'required|date',
            'priority' => 'required|string',
            'assignee_id' => 'nullable|exists:users,id',
            'status' => 'nullable|in:To Do,In Progress,Done',
            'group_id' => 'required|exists:groups,id',
        ]);

        Task::create([
            'name' => $request->name,
            'description' => $request->description,
            'deadline' => $request->deadline,
            'priority' => $request->priority,
            'assignee_id' => $request->assignee_id,
            'status' => $request->status ?? 'To Do',
            'group_id' => $request->group_id,
            'creator_id' => auth()->id(),  // Set the creator ID to the logged-in user

        ]);
        
        dd($request->assignee_id);
        return back();
    }

    public function update(Request $request, Task $task)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'deadline' => 'required|date',
            'priority' => 'required|in:Low,Medium,High',
        ]);

        $task->update($validated);

        return redirect()->back()->with('success', 'Task updated successfully');
    }

   

    public function markAsDone(Task $task)
    {
        $task->update(['status' => true]);
        return redirect()->back()->with('success', 'Task marked as done');
    }


    public function deleteTask($taskId)
    {
        \Log::info('Deleting task with ID: ' . $taskId);
        $task = Task::findOrFail($taskId);
        
        // Check if the logged-in user is the task creator
        if (auth()->user()->id != $task->creator_id) {
            abort(403, "You don't have permission to delete this task.");
        }
        
        $task->delete();
        
        return back();
    }
    public function updateTask(Request $request, $taskId)
    {
        $task = Task::findOrFail($taskId);
    
        // Check if the logged-in user is the task creator
        if (auth()->user()->id != $task->creator_id) {
            abort(403, "You don't have permission to update this task.");
        }
    
        $task->update($request->all());
    
        return redirect()->route('tasks.index');
    }
    
}
