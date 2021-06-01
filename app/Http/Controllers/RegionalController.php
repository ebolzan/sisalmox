<?php

namespace App\Http\Controllers;

use App\Regional;
use App\Warehouse;
use Exception;
use Illuminate\Http\Request;


class RegionalController extends Controller
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


        /*     $regional = new Regional;
        $warehouse = Warehouse::find(1);

        $regional->name = 'Surcen';
        $regional->city = 'santa maria';
        $regional->address = 'rodolfo behr';
        $regional->observations = 'sada';
        $regional->local_reference = 'nada';
        $regional->warehouse_id = $warehouse->id;

        $regional->save(); */

        $regionals = Regional::latest()->paginate(5);

        return view('regionals.index', compact('regionals'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
        return view('regionals.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('regionals.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'city' => 'required',
        ]);

        Regional::create($request->all());
        $msn = "Regional criada com sucesso";
        return redirect()->route('regionals.index')
            ->with('success', $msn);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Regional  $regional
     * @return \Illuminate\Http\Response
     */
    public function show(Regional $regional)
    {
        return view('regionals.show', compact('regional'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Regional  $regional
     * @return \Illuminate\Http\Response
     */
    public function edit(Regional $regional)
    {
        return view('regionals.edit', compact('regional'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Regional  $regional
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Regional $regional)
    {
        $request->validate([
            'name' => 'required',
            'city' => 'required',
        ]);

        $regional->update($request->all());

        return redirect()->route('regionals.index')
            ->with('success', 'Regional updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Regional  $regional
     * @return \Illuminate\Http\Response
     */
    public function destroy(Regional $regional)
    {

        $regional->delete();

        return redirect()->route('regionals.index')
            ->with('success', 'Regional deleted successfully');
    }
}
