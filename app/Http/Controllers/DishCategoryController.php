<?php

namespace App\Http\Controllers;

use App\Models\Dish;
use App\Models\DishCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

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
        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:dish_categories,name',
        ]);

        if ($validator->fails()) {
            return redirect('dish_categories/create')
                ->withErrors($validator)
                ->withInput();
        }

        $dishCategory = new DishCategory();
        $dishCategory->name = $request->input("name");
        $dishCategory->save();
        return redirect('dish_categories');
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
        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:dish_categories,name,'.$dishCategory->id,
        ]);

        if ($validator->fails()) {
            return redirect()->route('dish_categories.edit', $dishCategory)
                ->withErrors($validator)
                ->withInput();
        }

        $dishCategory->name = $request->input("name");
        $dishCategory->save();
        return redirect('dish_categories');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DishCategory $dishCategory)
    {
        $items = Dish::all();
        foreach($items as $elem)
        {
            if($elem->category_id == $dishCategory->id)
            {
                return redirect()->route('dish_categories.edit', $dishCategory)
                    ->withErrors("Do kategorii przypisane są dania")
                    ->withInput();
            }
        }

        $dishCategory->delete();
        return redirect('dish_categories');
    }
}
