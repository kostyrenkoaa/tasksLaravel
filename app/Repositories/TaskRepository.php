<?php

namespace App\Repositories;

use App\Models\Task;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Builder;

/**
 * @method Task getNewModel()
 */
class TaskRepository extends Repository
{
    public function getModelClass(): string
    {
        return Task::class;
    }

    /**
     * Все задачи для пользователя
     *
     * @param $id
     * @return Builder[]|Collection|Task[]
     */
    public function getAllTaskForUser($id)
    {
        return $this->getBuilder()
            ->where(Task::FIELD_USER_ID, '=', $id)
            ->get();
    }
}
