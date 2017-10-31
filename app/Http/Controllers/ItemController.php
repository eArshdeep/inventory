<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Collection;
use App\Item;

class ItemController extends Controller
{
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
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // set context
        $context = [
          'show_back' => true,
          'back_url' => '/'
        ];

        // get all collections
        $collections = Collection::all();

        // return view with data
        return view('scenes.items.create')
          ->with('context', $context)
          ->with('collections', $collections);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validate
        $this->validate($request, [
          'item_name' => 'required',
          'item_description' => 'required',
          'item_parent_collection_id' => 'required'
        ]);

        // Store
        $item = new Item;
        $item->name = $request->input('item_name');
        $item->description = $request->input('item_description');
        $item->collection_id = $request->input('item_parent_collection_id');
        $item->save();

        // Redirect
        return redirect('/')->with('success', 'Item created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // retrieve item
        $item = Item::find($id);

        // set context
        $context = [
          'show_back' => true,
          'back_url' => '/collection/' . $item->collection_id
        ];

        //
        return view('scenes.items.show')
          ->with('context', $context)
          ->with('item', $item);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // set context
        $context = [
          'show_back' => true,
          'back_url' => '/item/' . $id
        ];

        // retrieve item
        $item = Item::find($id);

        // retrieve collections
        $collections = Collection::all();

        //
        return view('scenes.items.edit')
          ->with('context', $context)
          ->with('item', $item)
          ->with('collections', $collections);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // Validate
        $this->validate($request, [
          'name' => 'required',
          'description' => 'required',
          'parent_collection' => 'required'
        ]);

        // Update
        $item = Item::find($id);
        $item->name = $request->input('name');
        $item->description = $request->input('description');
        $item->collection_id = $request->input('parent_collection');
        $item->save();

        // Redirect
        return redirect()->route('item.show', ['id' => $id])->with('success', 'Item updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Item::find($id);
        /* generate redirect url (redirect to parent collection) */
        $url = 'collection/' . $item->collection_id;
        $item->delete();
        return redirect($url)->with('success', 'Item removed successfully');
    }
}
