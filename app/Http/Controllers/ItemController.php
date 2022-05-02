<?php

namespace App\Http\Controllers;

use App\Http\Requests\ItemRequest;
use App\Models\Item;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ItemController extends Controller
{
    /**
     * Create the controller instance.
     *
     * @return void
     */
    public function __construct(Auth $auth)
    {
        $this->auth = $auth;

        $this->authorizeResource(Item::class, 'item');
    }


    /**
     * Display a page of the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function overview(Request $request)
    {
        $this->authorize('overview');

        return view('item.overview', [
            'collection' =>
                Item::where('user_id', $this->auth::id())
                    ->orderByDesc('updated_at')
                    ->paginate(10, ['*'], 'page', $request->page)
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('item.overview', [
            'collection' =>
                Item::where('user_id', $this->auth::id())
                    ->orderByDesc('updated_at')
                    ->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('item.edit', [
            'item' => new Item(),
            'title' => __('Add Item'),
            'action' => route('items.store'),
            'method' => 'post',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\ItemRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ItemRequest $request)
    {
        $data = $request->validated();

        $data = Item::create([
            'user_id' => 1,
            'name' => $data['name'],
            'active' => $data['active'],
            'type' => $data['type'],
            'content' => $data['content'],
        ]);

        return redirect(route('items.overview'))
            ->with('status', __('Item created!'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function show(Item $item)
    {
        return view('item.detail', [
            'item' => $item
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function edit(Item $item)
    {
        return view('item.edit', [
            'item' => $item,
            'title' => __('Edit Item'),
            'action' => route('items.update', ['item' => $item]),
            'method' => 'patch',
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\ItemRequest  $request
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function update(ItemRequest $request, Item $item)
    {
        $data = $request->safe()->only(
            ['name' ,'active', 'type', 'content']
        );

        $item->fill($data)->save();

        return redirect(route('items.show', [
            'item' => $item
        ]))->with('status', __('Item updated!'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function destroy(Item $item)
    {
        $item->delete();

        return redirect(route('items.overview'))
            ->with('status', __('Item removed!'));;
    }
}
