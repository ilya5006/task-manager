<?php

namespace App\Http\Controllers;

use App\Http\Requests\TaskPostRequest;
use App\Http\Requests\TaskPutRequest;
use App\Http\Requests\TaskGetRequest;

use App\Services\TaskService;

class TaskController extends Controller
{
    public function __construct(private TaskService $taskService)
    {
    }

    public function delete(int $id)
    {
        return $this->taskService->delete($id);
    }

    public function create(TaskPostRequest $request)
    {
        return $this->taskService->create($request->validated());
    }

    public function update(TaskPutRequest $request, string $id)
    {
        return $this->taskService->update($request->validated(), $id);
    }

    public function getById(int $id)
    {
        return $this->taskService->getById($id);
    }

    public function get(TaskGetRequest $request)
    {
        return $this->taskService->get($request->validated());
    }
}
