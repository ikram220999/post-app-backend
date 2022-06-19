<?php

namespace App\Http\Controllers;

use App\Models\Item_status;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ItemStatusController extends Controller
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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $is= new Item_status();

        $is->item_id = $request->input('id');
        $is->title = $request->input('title');
        $is->description = $request->input('description');
        $is->code_status = $request->input('status');

        $is->save();

        return response()->json($is, Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Item_status  $item_status
     * @return \Illuminate\Http\Response
     */
    public function show(Item_status $item_status)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Item_status  $item_status
     * @return \Illuminate\Http\Response
     */
    public function edit(Item_status $item_status)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Item_status  $item_status
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Item_status $item_status)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Item_status  $item_status
     * @return \Illuminate\Http\Response
     */
    public function destroy(Item_status $item_status)
    {
        //
    }
}
