<?php

namespace App\Http\Controllers;

use App\Models\Beca;
use App\Models\Nota;
use App\Models\Barrio;
use App\Models\Estado;
use App\Models\Padrino;
use App\Models\Comunidad;
use App\Models\Expediente;
use App\Models\TipoPobreza;
use Illuminate\Http\Request;
use App\Models\GradosEscolare;
use App\Models\CentroEducativo;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\DetalleActividad;
use App\Models\EvaluacionesMedica;
use Illuminate\Support\Facades\DB;
use App\Models\EvaluacionesPsicologica;

class ExpedienteController extends Controller
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
        // $evaluacionMedicas = EvaluacionesMedica::select('id_expediente','semaforo')->get();
        // $evaluacionPsicologicas = EvaluacionesPsicologica::select('id_expediente','semaforo')->get();
        // $notas = Nota::select('id_expediente','semaforo')->get();
        // $detalleActividades = DetalleActividad::select('id_expediente','semaforo')->get();

        // $idBuscado = 1;
        // // $idBuscados = Expediente::pluck('id');
    
        // // Buscar el registro correspondiente en cada tabla
        // $evaluacionMedicas = EvaluacionesMedica::select('id_expediente','semaforo')->where('id_expediente', $idBuscado)->get();
        // $evaluacionPsicologicas = EvaluacionesPsicologica::select('id_expediente','semaforo')->where('id_expediente', $idBuscado)->get();
        // $notas = Nota::select('id_expediente','semaforo')->where('id_expediente', $idBuscado)->get();
        // $detalleActividades = DetalleActividad::select('id_expediente','semaforo')->where('id_expediente', $idBuscado)->get();
    
        // // Obtener el valor del semaforo correspondiente
        // // Evaluaciones Medicas
        // $semaforo = 'Verde';
        // $evaMedicas = collect([
        //     $evaluacionMedicas,
        // ]);
    
        // foreach ($evaMedicas as $evaMedica) {
        //     foreach ($evaMedica as $item) {
        //         if ($item->id_expediente == $idBuscado) {
        //             $semaforo = $item->semaforo;
        //             break 2;
        //         }
        //     }
        // }
    
        // // Evaluaciones Psicologicas
        // $semaforo2 = 'Verde';
        //     $evaPsicologicas = collect([
        //         $evaluacionPsicologicas,
        //     ]);
    
        //     foreach ($evaPsicologicas as $evaPsicologica) {
        //         foreach ($evaPsicologica as $item) {
        //             if ($item->id_expediente == $idBuscado) {
        //                 $semaforo2 = $item->semaforo;
        //                 break 2;
        //             }
        //         }
        //     }
    
        //     // Notas
        //     $semaforo3 = 'Verde';
        //         $sNotas = collect([
        //             $notas,
        //         ]);
    
        //         foreach ($sNotas as $sNota) {
        //             foreach ($sNota as $item) {
        //                 if ($item->id_expediente == $idBuscado) {
        //                     $semaforo3 = $item->semaforo;
        //                     break 2;
        //                 }
        //             }
        //         }
                
        //     // Detalle Actividad
        //     $semaforo4 = 'Verde';
        //         $detalleActividads = collect([
        //             $detalleActividades,
        //         ]);
    
        //         foreach ($detalleActividads as $detalleActividad) {
        //             foreach ($detalleActividad as $item) {
        //                 if ($item->id_expediente == $idBuscado) {
        //                     $semaforo4 = $item->semaforo;
        //                 }
        //             }
        //         }
    
        // $semaforos = array($semaforo, $semaforo2, $semaforo3, $semaforo4);

        // // Contar cuántas veces aparece cada valor en el array
        // $contador = array_count_values($semaforos);

        // // Encontrar el valor que aparece más veces en el array
        // $semaforo_mas_repetido = array_search(max($contador), $contador);

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

        $busqueda = $request->buscar;
        $datos = Expediente::where('nombre1','like','%'.$busqueda.'%')
                            ->orWhere('nombre2','like','%'.$busqueda.'%')
                            ->orWhere('apellido1','like','%'.$busqueda.'%')
                            ->orWhere('apellido2','like','%'.$busqueda.'%')
                            ->orWhere('sexo','like','%'.$busqueda.'%')
                            ->paginate(6);
        return view('expedientes.index', compact('datos','busqueda','evaluacionMedicas','evaluacionPsicologicas','notas','detalleActividades','semaforo','semaforo2','semaforo3','semaforo4','id','id2','id3','id4'));
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
        $comunidades = Comunidad::all();
        $estados = Estado::all();
        $tipoPobrezas = TipoPobreza::all();
        $barrios = Barrio::all();
        $gradoEscolares = GradosEscolare::all();
        $centroEducativos = CentroEducativo::all();
        $padrinos = Padrino::all();
        $becas = Beca::all();
        $cantidad = Expediente::count();
        return view('expedientes.create', compact('comunidades','estados','tipoPobrezas','barrios','gradoEscolares','centroEducativos','padrinos','becas','cantidad'));
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
            'id_comunidad' => 'required',
            'nombre1' => 'required',
            'nombre2' => 'required',
            'apellido1' => 'required',
            'apellido2' => 'required',
            'pp' => 'required',
            'id_estado' => 'required',
            'sexo' => 'required',
            'cedula' => 'required',
            'id_tipo_pobreza' => 'required',
            'id_barrio' => 'required',
            'fecha_nacimiento' => 'required',
            'representantePEM' => 'required',
            'contacto_representante' => 'required|min:8|max:8',
            'id_grado_escolar' => 'required',
            'talla_pantalon' => 'required',
            'talla_camisa' => 'required',
            'talla_zapato' => 'required',
            'activo' => 'required',
            'nombre_encargado' => 'required',
            'telefono_encargado' => 'required|min:8|max:8',
            'id_centro_educativo' => 'required',
            'padrino' => 'required',
            'escuela' => 'required',
            'beca' => 'required',
            'edad' => 'required',
        ]);
        $datos = $request->except('_token');
        Expediente::insert($datos);
        return redirect('/expedientes');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Expediente  $expediente
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $datos = Expediente::find($id);
        return view('expedientes.show', compact('datos'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Expediente  $expediente
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $datos = Expediente::findOrFail($id);
        $comunidades = Comunidad::all();
        $estados = Estado::all();
        $tipoPobrezas = TipoPobreza::all();
        $barrios = Barrio::all();
        $gradoEscolares = GradosEscolare::all();
        $centroEducativos = CentroEducativo::all();
        $padrinos = Padrino::all();
        $becas = Beca::all();
        $cantidad = Expediente::count();
        return view('expedientes.edit', compact('datos','comunidades','estados','tipoPobrezas','barrios','gradoEscolares','centroEducativos','padrinos','becas','cantidad'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Expediente  $expediente
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $datos = $request->except('_token','_method');
        Expediente::where('id','=',$id)->update($datos);
        return redirect('/expedientes');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Expediente  $expediente
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Expediente::destroy($id);
        return redirect('/expedientes');
    }
}
