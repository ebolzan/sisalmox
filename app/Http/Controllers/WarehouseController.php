<?php

namespace App\Http\Controllers;

use App\Regional;
use App\Warehouse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class WarehouseController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $warehouses = Warehouse::latest()->paginate(5);

        return view('warehouses.index', compact('warehouses'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $regionais = Regional::all();
        return view('warehouses.create', compact('regionais'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validation =  Validator::make($request->all(), Warehouse::$requiredFields, [], Warehouse::$niceNames);

        if ($validation->fails())
            return redirect()->back()->withErrors($validation)->withInput();



        $name = 'evandro';

        Warehouse::create($request->all());
        $msn = "Almoxarifado criado com sucesso";
        return redirect()->route('almoxarifados.index')
            ->with('success', $msn);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Warehouse  $warehouse
     * @return \Illuminate\Http\Response
     */
    public function show(Warehouse $warehouse)
    {
        return view('warehouses.show', compact('warehouse'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Warehouse  $warehouse
     * @return \Illuminate\Http\Response
     */
    public function edit(Warehouse $warehouse)
    {
        return view('warehouses.edit', compact('warehouse'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Warehouse  $warehouse
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Warehouse $warehouse)
    {
        $validation =  Validator::make($request->all(), Warehouse::$requiredFields, [], Warehouse::$niceNames);

        if ($validation->fails())
            return redirect()->back()->withErrors($validation)->withInput();


        $warehouse->update($request->all());

        return redirect()->route('almoxarifados.index')
            ->with('success', 'Almoxarifado updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Warehouse  $warehouse
     * @return \Illuminate\Http\Response
     */
    public function destroy(Warehouse $warehouse)
    {
        $warehouse->delete();

        return redirect()->route('almoxarifados.index')
            ->with('success', 'Almoxarifado deleted successfully');
    }
}
