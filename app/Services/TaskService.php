<?php

namespace App\Services;

use App\DTO\Task\StoreDTO;
use App\Models\Task;
use App\Models\User;
use App\Repositories\TaskRepository;
use Illuminate\Support\Collection;

class TaskService extends Service
{
    public function __construct(
        protected TaskRepository $taskRepository
    )
    {
    }

    /**
     * Возвращает все статусы
     *
     * @return \Illuminate\Support\Collection
     */
    public function getAll()
    {
        return $this->getCollection(Task::STATUSES);
    }

    /**
     * Все задачи для пользователя
     *
     * @param User $user
     * @return Task[]|Collection
     */
    public function getAllTaskForUser(User $user)
    {
        $tasks = $this->taskRepository->getAllTaskForUser($user->id);
        if ($tasks->isEmpty()) {
            return $this->getCollection();
        }

        return $tasks;
    }

    /**
     * Сохранение задачи
     *
     * @param StoreDTO $storeDTO
     * @param User $user
     * @param Task|null $task
     * @return Task|null
     */
    public function stotre(StoreDTO $storeDTO, User $user, Task $task = null): ?Task
    {
        if (empty($task)) {
            $task = $this->taskRepository->getNewModel();
        }

        $task->title = $storeDTO->title;
        $task->priority_id = $storeDTO->priority_id;
        $task->status = $storeDTO->status;
        $task->tags = $storeDTO->tags;
        $task->user_id = $user->id;
        $this->taskRepository->save($task);

        return $task;
    }

    /**
     * Удаление задачи
     *
     * @param User $user
     * @param Task $task
     * @return void
     * @throws \Exception
     */
    public function delete(User $user, Task $task)
    {
        if ($task->user_id != $user->id) {
            throw new \Exception('Что-то не так(');
        }

        $this->taskRepository->delete($task);
    }
}
