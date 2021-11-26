<?php

namespace App\Services;

use App\Repositories\TodoRepository;

class TodoService
{

    private $todoRepository;

    public function __construct(
        TodoRepository $todoRepository
    ) {
        $this->todoRepository = $todoRepository;
    }

    public function add($data)
    {
        return $this->todoRepository->add($data);
    }

    public function getAll()
    {
        return $this->todoRepository->getAll();
    }
}

