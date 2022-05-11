<?php

namespace App\Repositories;

use App\Models\Priority;
use Illuminate\Database\Eloquent\Collection;

class PriorityRepository extends Repository
{
    public function getModelClass(): string
    {
        return  Priority::class;
    }

    /**
     * @return Collection|Priority[]
     */
    public function getAll()
    {
        return $this->getBuilder()->get();
    }
}
