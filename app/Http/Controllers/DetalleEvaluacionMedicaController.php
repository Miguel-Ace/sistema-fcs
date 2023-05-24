<?php

namespace App\Http\Controllers;

use App\Models\DetalleEvaluacionMedica;
use App\Models\Especialidad;
use App\Models\EvaluacionesMedica;
use Illuminate\Http\Request;

class DetalleEvaluacionMedicaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $start = $_GET['buscar'];
        $datos = DetalleEvaluacionMedica::paginate(6);
        return view('detalle_evaluaciones_medicas.index', compact('datos','start'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $start = $_GET['buscar'];
        $evaluacionMedicas = EvaluacionesMedica::all();
        $especialidades = Especialidad::all();
        return view('detalle_evaluaciones_medicas.create', compact('evaluacionMedicas','especialidades','start'));
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
            'id_evaluacion_medica'=>'required',
            'id_especialidad'=>'required',
            'medico'=>'required',
            'diagnostico'=>'required',
            'obsevacion'=>'required',
            // 'fecha'=>'required',
            'nombre_diente'=>'nullable',
            'descripcion'=>'nullable',
            'semaforo'=>'required',
        ]);
        $datos = $request->except('_token');
        DetalleEvaluacionMedica::insert($datos);
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DetalleEvaluacionMedica  $detalleEvaluacionMedica
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $datos = DetalleEvaluacionMedica::find($id);
        return view('detalle_evaluaciones_medicas.show', compact('datos'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DetalleEvaluacionMedica  $detalleEvaluacionMedica
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $start = $_GET['buscar'];
        $datos = DetalleEvaluacionMedica::findOrFail($id);
        $evaluacionMedicas = EvaluacionesMedica::all();
        $especialidades = Especialidad::all();
        return view('detalle_evaluaciones_medicas.edit', compact('datos','evaluacionMedicas','especialidades','start'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\DetalleEvaluacionMedica  $detalleEvaluacionMedica
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $datos = $request->except('_token','_method');
        DetalleEvaluacionMedica::where('id','=',$id)->update($datos);
        // return redirect('/detalle_evaluacion_medicas');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DetalleEvaluacionMedica  $detalleEvaluacionMedica
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DetalleEvaluacionMedica::destroy($id);
        return redirect('/detalle_evaluacion_medicas');
    }
}
