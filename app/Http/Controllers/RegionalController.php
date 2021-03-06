<?php

namespace App\Http\Controllers;

use App\Regional;
use App\Warehouse;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


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
        $regionals = Regional::latest()->paginate(5);

        return view('regionals.index', compact('regionals'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
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
        $validation =  Validator::make($request->all(), Regional::$requiredFields, [], Regional::$niceNames);

        if ($validation->fails())
            return redirect()->back()->withErrors($validation)->withInput();

        Regional::create($request->all());
        $msn = "Regional criada com sucesso";
        return redirect()->route('regionais.index')
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
        $validation =  Validator::make($request->all(), Regional::$requiredFields, [], Regional::$niceNames);

        if ($validation->fails())
            return redirect()->back()->withErrors($validation)->withInput();

        $regional->update($request->all());

        return redirect()->route('regionais.index')
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

        return redirect()->route('regionais.index')
            ->with('success', 'Regional deleted successfully');
    }
}
