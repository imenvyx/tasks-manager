<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTaskRequest;
use App\Http\Resources\TaskResource;
use App\Models\Task;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::with('keywords')->orderByDesc('created_at')->get();
        return TaskResource::collection($tasks);
    }

    public function store(StoreTaskRequest $request)
    {
        $task = Task::create($request->only('title'));
        if ($request->filled('keyword_ids')) {
            $task->keywords()->sync($request->keyword_ids);
        }
        $task->load('keywords');
        return new TaskResource($task);
    }

    public function toggle($id)
    {
        $task = Task::findOrFail($id);
        $task->is_done = !$task->is_done;
        $task->save();

        return new TaskResource($task->load('keywords'));
    }
}
