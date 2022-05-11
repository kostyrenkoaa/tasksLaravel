<?php

namespace App\Http\Controllers;

use App\Repositories\PriorityRepository;
use App\Models\Task;
use App\Services\PriorityService;
use App\Services\TaskService;

class HomeController extends Controller
{
    /**
     * HomeController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Выводит страницу задач
     */
    public function index(PriorityService $priorityService, TaskService $taskService)
    {
        $params = [
            'priorities' => $priorityService->getAll(),
            'statuses' => $taskService->getAll()
        ];

        return view('home', $params);
    }
}
