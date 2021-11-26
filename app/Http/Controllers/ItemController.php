<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Todo;
use Illuminate\Http\Request;
use App\Services\ItemService;
use App\Http\Requests\ItemRequest;
use App\Http\Requests\ItemUpdateRequest;

class ItemController extends Controller
{

    protected $itemService;

    /**
     * ItemController constructor.
     * @param ItemService $itemService
     * @throws \ReflectionException
     */
    public function __construct(ItemService $itemService)
    {
        $this->itemService = $itemService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     * @param  \App\Models\Item  $todo
     * @return \Illuminate\Http\Response
     */
    public function create(Todo $todo)
    {
        return view('item.create', ['todo' => $todo]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Requests\ItemRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ItemRequest $request)
    {
        try {

            $validated = $request->validated();

            $this->itemService->add($request->all());
        } catch (\Exception $e) {
            echo $e->getMessage();
        }

        return redirect()->route('todo.view', $request->todo_id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function show(Item $item)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function edit(Item $item)
    {
        return view('item.edit', ['item' => $item]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Requests\ItemUpdateRequest  $request
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function update(ItemUpdateRequest $request, Item $item)
    {
        try {

            $validated = $request->validated();

            $this->itemService->update($request->all(), $item);
        } catch (\Exception $e) {
            echo $e->getMessage();
        }

        return redirect()->route('todo.view', $item->todo_id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function destroy(Item $item)
    {
        try {
            $this->itemService->delete($item);
            return redirect('/');
        } catch (\Exception $e) {
            echo $e->getMessage();
        }
    }

    /**
     * @param  \App\Models\Item  $item
     * @param  Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function status(Request $request, Item $item)
    {
        if ($request->ajax()) {
            if ($request->has('done')) {
                try {
                    $this->itemService->statusUpdate($request->input('done'), $item);

                    return response()->json([
                        'responseMessage' => 'success',
                        'responseStatus' => 200,
                    ]);
                } catch (\Exception $e) {
                    echo $e->getMessage();
                }
            }
        } else {
            return redirect('/');
        }
    }
}
