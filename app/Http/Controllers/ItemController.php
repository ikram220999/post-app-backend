<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Receiver;
use App\Models\Staff;
use App\Models\Store;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

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

        $item = Item::all();

        return response()->json($item, Response::HTTP_OK);
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
        $item = new item();
        $receiver = new Receiver();

        $store = Store::find($request->input('store'));
        $staff = Staff::select("*")
            ->inRandomOrder()
            ->where("store_id", $request->input('store'))
            ->first();

        $receiver->name = $request->input('rcv_name');
        $receiver->phone_no = $request->input('rcv_phone');
        $receiver->address = $request->input('rcv_address');
        $receiver->state_id = $request->input('state');
        $receiver->save();

        $item->receiver_id = $receiver->id;
        $item->staff_id = $staff->id;
        $item->store_id = $request->input('store');
        $item->name = $request->input('name');
        $item->weight = $request->input('weight');
        $item->tracking_no = $request->input('tracking');
        $item->save();

        return response()->json(true, Response::HTTP_CREATED);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $item = Item::find($id);

        if ($item) {

            $receiver = Receiver::find($item->receiver_id);
            $staff = Staff::find($item->staff_id);

            if ($staff) {

                $data = [
                    'item' => $item,
                    'staff' => $staff,
                    'rcv' => $receiver,
                ];

            } else {

                $data = [
                    'item' => $item,
                    'rcv' => $receiver,
                ];
            }

            return response()->json($data, Response::HTTP_OK);
        } else {
            return response()->json(null, Response::HTTP_NOT_FOUND);
        }

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function edit(Item $item)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Item $item)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function destroy(Item $item)
    {
        //
    }
}
