<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\TodoService;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{

    protected $todoService;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(TodoService $todoService)
    {
        $this->todoService = $todoService;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $todos = [];

        if (Auth::check()) {
            $todos = $this->todoService->getAll();
        }
        
        return view('home',['todos' => $todos]);
    }
}
