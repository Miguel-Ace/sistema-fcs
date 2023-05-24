<?php

namespace App\Http\Controllers;

use App\Models\Clinica;
use App\Models\Especialidad;
use App\Models\EvaluacionesMedica;
use App\Models\Expediente;
use Illuminate\Http\Request;

class EvaluacionesMedicaController extends Controller
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
        $datos = EvaluacionesMedica::where('id_expediente','like','%'.$busqueda.'%')
                                    ->paginate(6);
        return view('evaluaciones_medicas.index', compact('datos','busqueda'));
    }

    // public function pdf()
    // {
    //     $datos = Expediente::paginate();
    //     $pdf = PDF::loadView('expedientes.pdfexpediente',['expedientes'=>$datos]);
    //     return $pdf->stream();
    // }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $expedientes = Expediente::all();
        $clinicas = Clinica::all();
        return view('evaluaciones_medicas.create', compact('expedientes','clinicas'));
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
            'id_clinica' => 'required',
            'fecha' => 'required',
            'peso' => 'required',
            'talla' => 'required',
            'signos' => 'required',
            'notas' => 'nullable',
            // 'semaforo' => 'required',
        ]);
        $datos = $request->except('_token');
        EvaluacionesMedica::insert($datos);
        return redirect('/evaluaciones_medicas');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\EvaluacionesMedica  $evaluacionesMedica
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $datos = EvaluacionesMedica::find($id);
        return view('evaluaciones_medicas.show', compact('datos'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\EvaluacionesMedica  $evaluacionesMedica
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $datos = EvaluacionesMedica::findOrFail($id);
        $expedientes = Expediente::all();
        $clinicas = Clinica::all();
        $especialidades = Especialidad::all();
        return view('evaluaciones_medicas.edit', compact('datos','expedientes','clinicas','especialidades'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\EvaluacionesMedica  $evaluacionesMedica
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $datos = $request->except('_token','_method');
        EvaluacionesMedica::where('id','=',$id)->update($datos);
        return redirect('/evaluaciones_medicas');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\EvaluacionesMedica  $evaluacionesMedica
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        EvaluacionesMedica::destroy($id);
        return redirect('/evaluaciones_medicas');
    }
}
