<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Collection;

class CollectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $collections = Collection::all();
        return view('scenes.collections.index')->with('collections', $collections);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $context = [
          'show_back' => true,
          'back_url' => '/'
        ];
        return view('scenes.collections.create')->with('context', $context);
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
          'collection_name' => 'required',
          'collection_description' => 'required'
        ]);

        // Store
        $collection = new Collection;
        $collection->name = $request->input('collection_name');
        $collection->description = $request->input('collection_description');
        $collection->save();

        // Redirect
        return redirect()->route('collection.show', ['id' => $collection->id])->with('success', 'Collection added successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $context = [
          'show_back' => true,
          'back_url' => '/'
        ];
        $collection = Collection::find($id);
        return view('scenes.collections.show')
          ->with('collection', $collection)
          ->with('context', $context);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $context = [
          'show_back' => true,
          'back_url' => '/collection/' . $id
        ];
        $collection = Collection::find($id);
        return view('scenes.collections.edit')
          ->with('collection', $collection)
          ->with('context', $context);
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
          'collection_name' => 'required',
          'collection_description' => 'required'
        ]);

        // Update
        $collection = Collection::find($id);
        $collection->name = $request->input('collection_name');
        $collection->description = $request->input('collection_description');
        $collection->save();

        // Redirect
        return redirect()->route('collection.show', ['id' => $id])->with('success', 'Collection updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $collection = Collection::find($id);
        $collection->delete();
        return redirect('/')->with('success', 'Collection removed successfully');
    }
}
