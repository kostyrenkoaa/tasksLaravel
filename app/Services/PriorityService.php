<?php

namespace App\Services;

use App\Models\Priority;
use App\Repositories\PriorityRepository;

class PriorityService extends Service
{
    public function __construct(
        protected PriorityRepository $priorityRepository
    )
    {
    }

    public function getAll()
    {
        $priorities = $this->priorityRepository->getAll();
        if ($priorities->isEmpty()) {
            return $this->getCollection();
        }

        return $priorities->keyBy(Priority::FIELD_ID);
    }
}
