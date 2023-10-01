<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Table;
use App\Http\Requests\TableStoreRequest;
use App\Repository\TableRepository;

class TableContrller extends Controller
{
    public $table;

    public function __construct(TableRepository $table)
    {
        $this->table = $table;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       $tables =  $this->table->getAll();
        return view('admin.tables.index', compact('tables'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.tables.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TableStoreRequest $request)
    {
        $this->table->create($request->validated());
        return redirect(route('admin.tables.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Table $table)
    {
        return view('admin.tables.edit',compact('table'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TableStoreRequest $request, Table $table)
    {
        $this->table->update($table->id,$request->validated());
        return redirect(route('admin.tables.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Table $table)
    {
        $this->table->delete($table->id);
        return redirect(route('admin.tables.index'));
    }
}
