<?php

namespace App\Repositories;

use JasonGuru\LaravelMakeRepository\Repository\BaseRepository;
use App\Models\Item;
use Illuminate\Support\Facades\Auth;

/**
 * Class TopicRepository.
 */
class ItemRepository extends BaseRepository
{
    /**
     * @return string
     *  Return the model
     */
    public function model()
    {
        return Item::class;
    }

    public function add($data)
    {
        return Item::create([
            'todo_id' => $data['todo_id'],
            'name' => $data['name'],
            'description' => $data['description'],
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Models\Item  $item
     */
    public function update($data, Item $item)
    {
        $item->name = $data['name'];
        $item->description = $data['description'];
        $item->save();
    }

    public function getAll()
    {
        return Item::all();
    }

    /**
     * Delete the specified resource in storage.
     *
     * @param  \App\Models\Item  $item
     */
    public function deleteItem(Item $item)
    {
        Item::destroy($item->id);
    }

    /**
     * Update the status resource in storage.
     *
     * @param  \App\Models\Item  $item
     */
    public function statusUpdate($done, Item $item)
    {
        $item->done = $done;
        $item->save();
    }
}
