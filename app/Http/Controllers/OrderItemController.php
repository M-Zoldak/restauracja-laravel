<?php

namespace App\Http\Controllers;

use App\Models\Dish;
use App\Models\OrderItem;
use Illuminate\Http\Request;

class OrderItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $dishes = Dish::all();
        $id = $request->input('order_id');
        return view('order_items.create', ['dishes'=>$dishes, 'id'=>$id]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $id = $request->input('order_id');
        $orderItem = new OrderItem();
        $orderItem->order_id = $id;
        $orderItem->meal_id = $request->input("dish");
        $orderItem->amount = $request->input("amount");
        $orderItem->save();
        return redirect('orders');
    }

    /**
     * Display the specified resource.
     */
    public function show(OrderItem $orderItem)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(OrderItem $orderItem)
    {
        $dishes = Dish::all();
        return view('order_items.edit',['orderItem'=>$orderItem, 'dishes'=>$dishes]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, OrderItem $orderItem)
    {
        $orderItem->meal_id = $request->input("dish");
        $orderItem->amount = $request->input("amount");
        $orderItem->save();
        return redirect('orders');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(OrderItem $orderItem)
    {
        $orderItem->delete();
        return redirect('orders');
    }
}
