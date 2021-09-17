<?php

namespace App\Http\Controllers;

use App\Models\Reservoir;
use Illuminate\Http\Request;

class ReservoirController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reservoirs = \App\Models\Reservoir::orderBy('area', 'desc')->get();

        return view('reservoirs.index', ['reservoirs' => $reservoirs]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()

    {

        return view('reservoirs.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate(
            $request,
            [
                'title' => 'required|max:200',
                'area' => 'required',
                'about' => 'required',

            ]
        );
        $reservoir = new Reservoir();
        $reservoir->fill($request->all());
        $reservoir->save();
        return redirect()->route('reservoir.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Reservoir  $reservoir
     * @return \Illuminate\Http\Response
     */
    public function show(Reservoir $reservoir)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Reservoir  $reservoir
     * @return \Illuminate\Http\Response
     */
    public function edit(Reservoir $reservoir)
    {
        return view('reservoirs.edit', ['reservoir' => $reservoir]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Reservoir  $reservoir
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Reservoir $reservoir)
    {
        $this->validate(
            $request,
            [
                'title' => 'required|max:200',
                'area' => 'required',
                'about' => 'required',
            ]
        );
        $reservoir->fill($request->all());
        $reservoir->save();
        return redirect()->route('reservoir.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Reservoir  $reservoir
     * @return \Illuminate\Http\Response
     */
    public function destroy(Reservoir $reservoir)
    {
        $reservoir->delete();
        return redirect()->route('reservoir.index');
    }
}
