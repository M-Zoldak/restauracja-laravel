<?php

namespace App\Http\Controllers;

use App\Models\Table;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class TableController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tables = Table::all();
        return view("tables.index", ["tables" => $tables]);
    }

    /**
     * Display a listing of the resource.
     */
    public function edit_index()
    {
        $tables = Table::all();
        return view("tables.edit_index", ["tables" => $tables]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("tables.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'table_number' => "required|unique:tables,table_number|int|min:1",
            'places_count' => 'required|int|min:0'
        ]);

        if ($validator->fails()) {
            return Redirect::route('tables.create')
                ->withErrors($validator)
                ->withInput();
        }

        $table = new Table();
        $table->table_number = $request->get("table_number");
        $table->places_count = $request->get("places_count");
        $table->occupied_places_count = 0;
        $table->is_occupied = $this->is_table_occupied($table);
        $table->save();

        return Redirect::route("tables.edit_index")->with('confirmation', "Utworzono nowy stolik o numerze $table->table_number.");
    }

    /**
     * Display the specified resource.
     */
    public function show(Table $table)
    {
        return view("tables.show", ["table" => $table]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Table $table)
    {
        return view("tables.edit", ["table" => $table]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Table $table)
    {
        App::setLocale("PL_pl");
        // dd($request);

        $validator = Validator::make($request->all(), [
            'table_number' => "required|unique:tables,table_number,$table->id|int|min:1",
            'places_count' => 'required|int|min:0'
        ]);

        if ($validator->fails()) {
            return Redirect::route('tables.edit', $table)
                ->withErrors($validator)
                ->withInput();
        }

        $table->table_number = $request->get("table_number");
        $table->places_count = $request->get("places_count");
        $table->save();
        return Redirect::route("tables.edit", $table)->with("confirmation", "Zaktualizowano stolik.");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Table $table)
    {
        $table->delete();
        return Redirect::route("tables.edit_index")->with("confirmation", "Usunięto stolik o numerze $table->table_number");
    }

    private function is_table_occupied(Table $table)
    {
        if ($table->occupied_places_count > 0) {
            return 1;
        } else {
            return 0;
        }
    }

    public function addPersonToTable(Table $table)
    {
        if ($table->occupied_places_count < $table->places_count) {
            $table->occupied_places_count += 1;
            $table->is_occupied = $this->is_table_occupied($table);
            $table->save();
        }

        echo json_encode(["occupiedPlaces" => $table->occupied_places_count]);
    }

    public function removePersonFromTable(Table $table)
    {
        if ($table->occupied_places_count > 0) {
            $table->occupied_places_count -= 1;
            $table->is_occupied = $this->is_table_occupied($table);
            $table->save();
        }

        echo json_encode(["occupiedPlaces" => $table->occupied_places_count]);
    }
}
