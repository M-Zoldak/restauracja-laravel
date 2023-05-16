<?php

namespace App\Http\Controllers;

use App\Models\DishCategory;
use Illuminate\Http\Request;

class DishCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = DishCategory::all();
        return view('dish_categories.show',['categories'=>$categories]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dish_categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $dishCategory = new DishCategory();
        $dishCategory->name = $request->input("name");
        $dishCategory->save();
        return $this->index();
    }

    /**
     * Display the specified resource.
     */
    public function show(DishCategory $dishCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(DishCategory $dishCategory)
    {
        return view('dish_categories.edit', ['category'=>$dishCategory]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, DishCategory $dishCategory)
    {
        $dishCategory->name = $request->input("name");
        $dishCategory->save();
        return $this->index();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DishCategory $dishCategory)
    {
        //
    }
}
