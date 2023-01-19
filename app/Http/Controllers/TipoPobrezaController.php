<?php

namespace App\Http\Controllers;

use App\Models\TipoPobreza;
use Illuminate\Http\Request;

class TipoPobrezaController extends Controller
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
        $datos = TipoPobreza::where('tipo_pobreza','like','%'.$busqueda.'%')
                            ->paginate(6);
        return view('tipo_pobreza.index', compact('datos','busqueda'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tipo_pobreza.create');
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
            'tipo_pobreza' => 'required',
        ]);
        $datos = $request->except('_token');
        TipoPobreza::insert($datos);
        return redirect('/tipo_pobreza');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TipoPobreza  $tipoPobreza
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $datos = TipoPobreza::find($id);
        return view('tipo_pobreza.show', compact('datos'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TipoPobreza  $tipoPobreza
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $datos = TipoPobreza::findOrFail($id);
        return view('tipo_pobreza.edit', compact('datos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TipoPobreza  $tipoPobreza
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $datos = $request->except('_token','_method');
        TipoPobreza::where('id','=',$id)->update($datos);
        return redirect('/tipo_pobreza');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TipoPobreza  $tipoPobreza
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        TipoPobreza::destroy($id);
        return redirect('/tipo_pobreza');
    }
}
