<?php

namespace App\Http\Controllers;

use App\Models\EvaluacionesMedica;
use App\Models\Expediente;
use App\Models\Medico;
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
        $medicos = Medico::all();
        return view('evaluaciones_medicas.create', compact('expedientes','medicos'));
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
            'id_medico' => 'required',
            'fecha' => 'required',
            'cancer' => 'required',
            'asma' => 'required',
            'diabetes' => 'required',
            'epilepcia' => 'required',
            'enfermedad_corazon' => 'required',
            'ostogenesis' => 'required',
            'sindrome_piernas_inquietas' => 'required',
            'otras_enfermedades' => 'required',
            'frenillos' => 'required',
            'anteojos' => 'required',
            'semaforo' => 'required',
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
        $medicos = Medico::all();
        return view('evaluaciones_medicas.edit', compact('datos','expedientes','medicos'));
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
