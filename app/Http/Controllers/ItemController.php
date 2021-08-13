<?php

namespace App\Http\Controllers;

use App\Regional;

use App\Category;
use App\Warehouse;
use App\Item;
use Faker\Provider\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\ValidationException;

class ItemController extends Controller
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

        $items = Item::latest()->paginate(5);

        return view('items.index', compact('items'))
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
        $warehouses = Warehouse::all();
        $categories = Category::all();
        return view('items.create', compact('warehouses', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $date_out = empty($request->input('data_out')) ? $request->input('date_form') : $request->input('data_out');
        $time_out = empty($request->input('time_out')) ? $request->input('hour_form') : $request->input('time_out');

        $request->merge(array('date_out' => $date_out . " " . $time_out));

        $is_visible = $request->input('is_visible') ? "1" : "0";
        $request->merge(array('is_visible' => $is_visible));

        if (empty($request->file('file'))) {
            $request->merge(array('file_path' => 'default.png'));
        } else {
            $request->merge(array('file_path' => $request->file('file')->hashName()));
            $request->file('file')->store('itens');
        }


        if (!empty($request->input('date_form')) && !empty($request->input('hour_form')))
            $request->merge(array('date_in' => $request->input('date_form') . " " . $request->input('hour_form')));

        if (empty($request->input('categories_id')))
            $request->merge(array('categories_id' => null));



        $request->except(["date_form", "hour_form", "data_out", "time_out"]);
        //dd($request);

        $validation =  Validator::make($request->all(), Item::$requiredFields, [], Item::$niceNames);

        if ($validation->fails())
            return redirect()->back()->withErrors($validation)->withInput();



        Item::create($request->except(["date_form", "hour_form", "data_out", "time_out", "file"]));
        $msn = "Almoxarifado criado com sucesso";
        return redirect()->route('itens.index')
            ->with('success', $msn);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function show(Item $item)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Item  $item
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
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Item $item)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function destroy(Item $item)
    {
        //
    }
}
