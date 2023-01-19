<?php

namespace App\Http\Controllers;

use App\Models\EvaluacionesPsicologica;
use App\Models\Expediente;
use App\Models\Medico;
use Illuminate\Http\Request;

class EvaluacionesPsicologicaController extends Controller
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
        $datos = EvaluacionesPsicologica::where('id_expediente','like','%'.$busqueda.'%')
                                        ->paginate(6);
        return view('evaluaciones_psicologicas.index', compact('datos','busqueda'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $medicos = Medico::all();
        $expedientes = Expediente::all();
        return view('evaluaciones_psicologicas.create', compact('medicos','expedientes'));
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
            'id_medico' => 'required',
            'id_expediente' => 'required',
            'categoria_psicologica' => 'required',
            'nota' => 'required',
            'semaforo' => 'required',
        ]);
        $datos = $request->except('_token');
        EvaluacionesPsicologica::insert($datos);
        return redirect('/evaluaciones_psicologicas');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\EvaluacionesPsicologica  $evaluacionesPsicologica
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $datos = EvaluacionesPsicologica::find($id);
        return view('evaluaciones_psicologicas.show', compact('datos'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\EvaluacionesPsicologica  $evaluacionesPsicologica
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $datos = EvaluacionesPsicologica::findOrFail($id);
        $medicos = Medico::all();
        $expedientes = Expediente::all();
        return view('evaluaciones_psicologicas.edit', compact('datos','medicos','expedientes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\EvaluacionesPsicologica  $evaluacionesPsicologica
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $datos = $request->except('_token','_method');
        EvaluacionesPsicologica::where('id','=',$id)->update($datos);
        return redirect('/evaluaciones_psicologicas');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\EvaluacionesPsicologica  $evaluacionesPsicologica
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        EvaluacionesPsicologica::destroy($id);
        return redirect('/evaluaciones_psicologicas');
    }
}
