<?php

namespace App\Services;

use Illuminate\Database\Eloquent\ModelNotFoundException;

use App\Models\Task;
use App\Models\User;
use App\Models\Status;

class TaskService
{
    private const STATUS_CREATED = 4;

    public function delete(int $id)
    {
        $task = null;
        
        try {
            $task = Task::findOrFail($id);
        } catch (ModelNotFoundException $e) {
            return response('', 404);
        }
        
        $task->delete();

        return response('', 204);
    }

    public function create(array $params)
    {
        $task = new Task();
        
        $task = $this->setTaskFilends(
            $task,
            $params['name'],
            $params['description'],
            (int)$params['id_owner'],
            (int)$params['id_responsible'],
        );

        $task->save();

        return response('', 204);
    }

    public function update(array $params, string $id)
    {
        $task = null;

        try {
            $task = Task::findOrFail($id);
        } catch (ModelNotFoundException $e) {
            return response('', 404);
        }

        $task = $this->setTaskFilends(
            $task,
            $params['name'],
            $params['description'],
            (int)$params['id_owner'],
            (int)$params['id_responsible'],
            (int)$params['id_status'],
        );

        $task->save();

        return response('', 204);
    }

    public function getById(int $id)
    {
        $task = null;

        try {
            $task = Task::findOrFail($id);
        } catch (ModelNotFoundException $e) {
            return response('', 404);
        }

        $this->finderWrapper($task);

        return response()->json($task);
    }

    public function get(array $params)
    {
        $query = Task::query();

        if (isset($params['id_status'])) {
            $query->where('task.id_status', $params['id_status']);
        }

        if (isset($params['date'])) {
            $query->whereDate('task.created_at', $params['date']);
        }

        $tasks = $query->get();

        $tasks->each([$this, 'finderWrapper']);

        return response()->json($tasks);
    }

    private function setTaskFilends(
        Task $task,
        string $name,
        string $description,
        int $id_owner,
        int $id_responsible, 
        int $id_status = self::STATUS_CREATED
    ): Task
    {
        $task->name = $name;
        $task->description = $description;
        $task->id_owner = $id_owner;
        $task->id_responsible = $id_responsible;
        $task->id_status = $id_status;

        return $task;
    }

    public function finderWrapper($task)
    {
        $this->ownerFinder($task);
        $this->responsibleFinder($task);
        $this->statusFinder($task);

        return $task;
    }

    private function ownerFinder($task)
    {
        $task->owner = User::find($task->id_owner);

        unset($task->id_owner);
    }

    private function responsibleFinder($task)
    {
        $task->responsible = User::find($task->id_responsible);

        unset($task->id_responsible);
    }

    private function statusFinder($task)
    {
        $task->status = Status::find($task->id_status);

        unset($task->id_status);
    }
}