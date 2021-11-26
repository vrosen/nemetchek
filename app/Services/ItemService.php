<?php

namespace App\Services;

use App\Repositories\ItemRepository;
use App\Models\Item;

class ItemService 
{

    private $itemRepository;

    public function __construct(
        ItemRepository $itemRepository
    ) {
        $this->itemRepository = $itemRepository;
    }

    /**
     * @param array $data
     */
    public function add(array $data)
    {
        return $this->itemRepository->add($data);
    }

    /**
     * Update the specified resource in storage.
     * @param array $data
     * @param  \App\Models\Item  $item
     */
    public function update(array $data, Item $item)
    {
        return $this->itemRepository->update($data, $item);
    }

    public function getAll()
    {
        return $this->itemRepository->getAll();
    }
    
    /**
     * Delete the specified resource in storage.
     *
     * @param  \App\Models\Item  $item
     */
    public function delete(Item $item)
    {
        $this->itemRepository->deleteItem($item);
    }

    /**
     * Update the status resource in storage.
     * @param bool $done
     * @param  \App\Models\Item  $item
     */
    public function statusUpdate(bool $done, Item $item)
    {
        $this->itemRepository->statusUpdate($done, $item);
    }
}