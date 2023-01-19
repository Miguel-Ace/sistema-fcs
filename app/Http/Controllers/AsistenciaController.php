<?php

namespace App\Http\Controllers;

use App\Models\Asistencia;
use App\Models\Expediente;
use Illuminate\Http\Request;

class AsistenciaController extends Controller
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
        $datos = Asistencia::where('id','like','%'.$busqueda.'%')
        ->orWhere('fecha','like','%'.$busqueda.'%')
        ->paginate(6);
        return view('asistencia.index', compact('datos','busqueda'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $expedientes = Expediente::all();
        return view('asistencia.create', compact('expedientes'));
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
            'id_expediente' => 'required',
            'fecha' => 'required',
            'sigla_asistencia' => 'required',
        ]);
        $datos = $request->except('_token');
        Asistencia::insert($datos);
        return redirect('/asistencias');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Asistencia  $asistencia
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $datos = Asistencia::find($id);
        return view('asistencia.show', compact('datos'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Asistencia  $asistencia
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $datos = Asistencia::findOrFail($id);
        $expedientes = Expediente::all();
        return view('asistencia.edit', compact('datos','expedientes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Asistencia  $asistencia
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $datos = $request->except('_token','_method');
        Asistencia::where('id','=',$id)->update($datos);
        return redirect('/asistencias');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Asistencia  $asistencia
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Asistencia::destroy($id);
        return redirect('/asistencias');
    }
}
