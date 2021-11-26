<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\CategoryService;
use App\Services\TopicService;
use App\Services\LessonService;
use App\Services\SubscriptionService;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

    protected $categoryService;
    protected $topicService;
    protected $lessonService;
	protected $subscriptionService;

    /**
     * CategoryController constructor.
     * @param CategoryService $categoryService
     * @param TopicService $topicService
     * @param SubscriptionService $subscriptionService
     * 
     * @throws \ReflectionException
     */
    public function __construct(
    	CategoryService $categoryService, 
    	TopicService $topicService, 
    	LessonService $lessonService,
    	SubscriptionService $subscriptionService
    ) {
        $this->categoryService = $categoryService;
        $this->topicService = $topicService;
        $this->lessonService = $lessonService;
        $this->subscriptionService = $subscriptionService;
    }

	public function index()
	{

	}

	public function subscriptions()
	{
		return $this->subscriptionService->subscriptions();
	}
}
