<?php

namespace App\Http\Controllers;

use App\Models\TipoAsistencia;
use Illuminate\Http\Request;

class TipoAsistenciaController extends Controller
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
        $datos = TipoAsistencia::where('tipo_asistencia','like','%'.$busqueda.'%')
        ->paginate(6);
        return view('tipo_asistencia.index', compact('datos','busqueda'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tipo_asistencia.create');
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
            'tipo_asistencia' => 'required',
        ]);
        $datos = $request->except('_token');
        TipoAsistencia::insert($datos);
        return redirect('/tipo_asistencia');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TipoAsistencia  $tipoAsistencia
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $datos = TipoAsistencia::find($id);
        return view('tipo_asistencia.show', compact('datos'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TipoAsistencia  $tipoAsistencia
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $datos = TipoAsistencia::findOrFail($id);
        return view('tipo_asistencia.edit', compact('datos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TipoAsistencia  $tipoAsistencia
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $datos = $request->except('_token','_method');
        TipoAsistencia::where('id','=',$id)->update($datos);
        return redirect('/tipo_asistencia');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TipoAsistencia  $tipoAsistencia
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        TipoAsistencia::destroy($id);
        return redirect('/tipo_asistencia');
    }
}
