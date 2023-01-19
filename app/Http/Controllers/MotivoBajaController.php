<?php

namespace App\Http\Controllers;

use App\Models\MotivoBaja;
use Illuminate\Http\Request;

class MotivoBajaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $busqueda = $request->buscar;
        $datos = MotivoBaja::where('motivo_baja','like','%'.$busqueda.'%')
                            ->paginate(6);
        return view('motivo_baja.index', compact('datos','busqueda'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('motivo_baja.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
            'motivo_baja' => 'required',
        ]);
        $datos = $request->except('_token');
        MotivoBaja::insert($datos);
        return redirect('/motivo_baja');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MotivoBaja  $motivoBaja
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $datos = MotivoBaja::find($id);
        return view('motivo_baja.show', compact('datos'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MotivoBaja  $motivoBaja
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $datos = MotivoBaja::findOrFail($id);
        return view('motivo_baja.edit', compact('datos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\MotivoBaja  $motivoBaja
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $datos = $request->except('_token','_method');
        MotivoBaja::where('id','=',$id)->update($datos);
        return redirect('/motivo_baja');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MotivoBaja  $motivoBaja
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        MotivoBaja::destroy($id);
        return redirect('/motivo_baja');
    }
}
