<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Item_status;
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

        foreach($item as $key => $value) {
            $item_Status = Item_status::latest()->where('item_id', $value['id'])->first();

            // dd($value['id']);
            $value['status'] = $item_Status;
           
        }

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
        $item_status = new Item_status();

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

        $item_status->item_id = $item->id;
        $item_status->description = "Item in good condition";
        $item_status->title = "Item Pickup by Store";
        $item_status->code_status = "PS";
        $item_status->save();

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
            $status = Item_status::where('item_id', $id)->get();

            if ($staff) {

                $data = [
                    'item' => $item,
                    'staff' => $staff,
                    'rcv' => $receiver,
                    'status' => $status,
                ];

            } else {

                $data = [
                    'item' => $item,
                    'rcv' => $receiver,
                    'status' => $status,
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
