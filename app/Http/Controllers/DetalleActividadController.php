<?php

namespace App\Http\Controllers;

use App\Models\Nota;
use Mockery\Undefined;
use App\Models\Actividad;
use App\Models\Expediente;
use Illuminate\Http\Request;
use App\Models\DetalleActividad;
use App\Models\EntregasMensuale;
use App\Models\EvaluacionesMedica;
use App\Models\EvaluacionesPsicologica;

class DetalleActividadController extends Controller
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
        $start = $_GET['buscar'];
        $busqueda = $request->buscar;
        $actividades = Actividad::all();
        $datos = DetalleActividad::where('id_actividad','like','%'.$busqueda.'%')
                                    // ->orWhere('id_actividad','like','%'.$busqueda.'%')
                                    ->paginate(6);
        return view('detalle_actividad.index', compact('datos','busqueda','actividades','start'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $evaluacionMedicas = EvaluacionesMedica::all();
        $evaluacionPsicologicas = EvaluacionesPsicologica::all();
        $notas = Nota::all();
        $detalleActividades = DetalleActividad::all();
        
        $semaforo = 'Verde';
        $semaforo2 = 'Verde';
        $semaforo3 = 'Verde';
        $semaforo4 = 'Verde';

        $id = 0;
        $id2 = 0;
        $id3 = 0;
        $id4 = 0;
        
        $start = $_GET['buscar'];
        $busqueda = $request->buscar;
        $actividades = Actividad::all();
        $expedientes = Expediente::all();
        $entregaMensual = EntregasMensuale::all();
        $datos = DetalleActividad::where('id_actividad','like','%'.$busqueda.'%')
                                    // ->orWhere('id_actividad','like','%'.$busqueda.'%')
                                    ->paginate(6);

                                    // foreach ($datos as $dato) {
                                    //     $valor = $dato->id_expediente;
                                    // }
                                    $valor = 0;
        return view('detalle_actividad.create', compact('expedientes','actividades','datos','start','valor','entregaMensual','evaluacionMedicas','evaluacionPsicologicas','notas','detalleActividades','semaforo','semaforo2','semaforo3','semaforo4','id','id2','id3','id4'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        request()->validate([
            'id_actividad' => 'required',
            'id_expediente' => 'required',
            'asistencia' => 'required',
            // 'observacion' => 'required',
            'semaforo' => 'required',
        ]);

        $datos = $request->except('_token');
        DetalleActividad::insert($datos);
        return redirect('/detalle_actividades/create?buscar='.$id)->with('mensaje','AGREGADO A LA LISTA EXITOSAMENTE');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DetalleActividad  $detalleActividad
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $start = $_GET['buscar'];
        $datos = DetalleActividad::find($id);
        return view('detalle_actividad.show', compact('datos','start'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DetalleActividad  $detalleActividad
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $start = $_GET['buscar'];
        $datos = DetalleActividad::findOrFail($id);
        $actividades = Actividad::all();
        $expedientes = Expediente::all();
        return view('detalle_actividad.edit', compact('datos','expedientes','actividades','start'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\DetalleActividad  $detalleActividad
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id, $start)
    {
        $datos = $request->except('_token','_method');
        DetalleActividad::where('id','=',$id)->update($datos);
        return redirect('/detalle_actividades?buscar='.$start);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DetalleActividad  $detalleActividad
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, $start)
    {
        DetalleActividad::destroy($id);
        return redirect('/detalle_actividades?buscar='.$start);
    }
}
