<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;

abstract class Service
{
    /**
     * @return \Illuminate\Contracts\Auth\Authenticatable|User
     * @throws \Exception
     */
    public function getAuthUser()
    {
        $user = $this->getAuthUserOrNull();
        if (empty($user)) {
            throw new \Exception('Пользователь не авторизован');
        }

        return $user;
    }

    /**
     * @return \Illuminate\Contracts\Auth\Authenticatable|User|null
     */
    public function getAuthUserOrNull()
    {
        return Auth::user();
    }

    protected function getCollection($items = [])
    {
        return new Collection($items);
    }


    protected function getSession()
    {
        return request()->session();
    }
}
