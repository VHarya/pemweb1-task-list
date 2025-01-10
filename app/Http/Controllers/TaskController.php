<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tasks.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => ['required', 'min:5', 'max:255'],
            'description' => ['max:255', 'nullable'],
            'deadline' => ['date', 'nullable'],
        ]);

        $validatedData['user_id'] = Auth::id();

        Task::create($validatedData);

        return redirect('/');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $task = Task::findOrFail($id);
        $task['deadline'] = Carbon::parse($task['deadline'])->format('d M Y');
        return view('tasks.detail', compact('task'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $task = Task::findOrFail($id);
        $task['deadline'] = Carbon::parse($task['deadline'])->toDateString();
        return view('tasks.edit', compact('task'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'title' => ['required', 'min:5', 'max:255'],
            'description' => ['max:255', 'nullable'],
            'deadline' => ['date', 'nullable'],
        ]);

        Task::findOrFail($id)->update($validatedData);

        return redirect(route('tasks.show', ['task' => $id]));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Task::findOrFail($id)->delete();
        return redirect('/');
    }

    public function status(string $id)
    {
        Log::debug($id);

        $task = Task::findOrFail($id);
        Log::debug('pre status: '.$task['status']);
        $task['status'] = !$task['status'];
        Log::debug('after status: '.$task['status']);
        $task->update();

        Log::debug("updated");

        return redirect('/');
    }
}
