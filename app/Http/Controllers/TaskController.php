<?php

namespace App\Http\Controllers;

use App\Http\Requests\Task\StoreRequest;
use App\Models\Task;
use App\Services\TaskService;
use Illuminate\Http\Response;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Contracts\Foundation\Application;

class TaskController extends Controller
{
    /**
     * Возвращает все задачи указанного пользователя
     *
     * @param TaskService $taskService
     * @return Application|ResponseFactory|Response
     * @throws \Exception
     */
    public function index(TaskService $taskService)
    {
        return response($taskService->getAllTaskForUser($taskService->getAuthUser()), Response::HTTP_OK);
    }

    /**
     * Добавление задачи
     *
     * @param StoreRequest $request
     * @param TaskService $taskService
     * @return Application|ResponseFactory|Response
     * @throws \Exception
     */
    public function store(StoreRequest $request, TaskService $taskService)
    {
        return response(
            $taskService->stotre($request->getDataForm(), $taskService->getAuthUser()),
            Response::HTTP_CREATED
        );
    }

    /**
     * Изменение задачи
     *
     * @param StoreRequest $request
     * @param Task $task
     * @param TaskService $taskService
     * @return Application|ResponseFactory|Response
     * @throws \Exception
     */
    public function update(StoreRequest $request, Task $task, TaskService $taskService)
    {
        return response(
            $taskService->stotre($request->getDataForm(),
                $taskService->getAuthUser(), $task), Response::HTTP_OK
        );
    }

    /**
     * Удаление задачи
     *
     * @param Task $task
     * @param TaskService $taskService
     * @return Application|ResponseFactory|Response
     */
    public function destroy(Task $task, TaskService $taskService)
    {
        try {
            $taskService->delete($taskService->getAuthUser(), $task);
        } catch (\Exception $exception) {
            return response(null, Response::HTTP_BAD_GATEWAY);
        }

        return response(null, Response::HTTP_OK);
    }
}
