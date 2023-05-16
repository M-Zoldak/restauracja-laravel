<?php

namespace App\Http\Controllers;

use App\Models\Dish;
use App\Models\DishCategory;
use Illuminate\Http\Request;

class DishController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dishes = Dish::all();
        $categories = DishCategory::all();
        return view('dishes.show',['dishes'=> $dishes, 'categories'=>$categories]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = DishCategory::all();
        return view('dishes.create',['categories'=>$categories]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $dish = new Dish;
        $dish->name = $request->input("name");
        $dish->ingredients = $request->input("ingredient");
        $dish->description = $request->input("description");
        $dish->price = $request->input("price");
        $dish->category_id = $request->input("category");
        $dish->is_available = true;
        $dish->save();
        return $this->index();
    }

    /**
     * Display the specified resource.
     */
    public function show(Dish $dish)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Dish $dish)
    {
        $categories = DishCategory::all();
        return view('dishes.edit', ['dish'=>$dish, 'categories'=>$categories]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Dish $dish)
    {
        $dish->name = $request->input("name");
        $dish->ingredients = $request->input("ingredient");
        $dish->description = $request->input("description");
        $dish->price = $request->input("price");
        $dish->category_id = $request->input("category");
        $dish->save();
        return $this->index();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Dish $dish)
    {
        $dish->delete();
        return $this->index();
    }
}
