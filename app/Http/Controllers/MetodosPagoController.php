<?php

namespace App\Http\Controllers;

use App\Models\MetodosPago;
use Illuminate\Http\Request;

class MetodosPagoController extends Controller
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
        $datos = MetodosPago::where('metodo_pago','like','%'.$busqueda.'%')
                            ->paginate(6);
        return view('metodos_pagos.index', compact('datos','busqueda'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('metodos_pagos.create');
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
            'metodo_pago' => 'required',
        ]);
        $datos = $request->except('_token');
        MetodosPago::insert($datos);
        return redirect('/metodo_de_pago');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MetodosPago  $metodosPago
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $datos = MetodosPago::find($id);
        return view('metodos_pagos.show', compact('datos'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MetodosPago  $metodosPago
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $datos = MetodosPago::findOrFail($id);
        return view('metodos_pagos.edit', compact('datos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\MetodosPago  $metodosPago
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $datos = $request->except('_token','_method');
        MetodosPago::where('id','=',$id)->update($datos);
        return redirect('/metodo_de_pago');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MetodosPago  $metodosPago
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        MetodosPago::destroy($id);
        return redirect('/metodo_de_pago');
    }
}
