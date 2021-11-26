<?php

namespace App\Repositories;

use JasonGuru\LaravelMakeRepository\Repository\BaseRepository;
use Illuminate\Support\Facades\Auth;
use App\Models\Todo;

/**
 * Class TopicRepository.
 */
class TodoRepository extends BaseRepository
{
    /**
     * @return string
     *  Return the model
     */
    public function model()
    {
        return Todo::class;
    }

    public function add($data)
    {
        return Todo::create([
            'user_id' => Auth::user()->id,
            'name' => $data['name'],
        ]);
    }

    public function getAll()
    {
        return Todo::where('user_id', Auth::user()->id)->paginate(5);
    }
}
