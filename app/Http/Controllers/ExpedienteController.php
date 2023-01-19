<?php

namespace App\Http\Controllers;

use App\Models\Barrio;
use App\Models\Estado;
use App\Models\Comunidad;
use App\Models\Expediente;
use App\Models\TipoPobreza;
use Illuminate\Http\Request;
use App\Models\GradosEscolare;
use App\Models\CentroEducativo;
use Barryvdh\DomPDF\Facade\Pdf;

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
        $busqueda = $request->buscar;
        $datos = Expediente::where('nombre1','like','%'.$busqueda.'%')
                            ->orWhere('nombre2','like','%'.$busqueda.'%')
                            ->orWhere('apellido1','like','%'.$busqueda.'%')
                            ->orWhere('apellido2','like','%'.$busqueda.'%')
                            ->orWhere('sexo','like','%'.$busqueda.'%')
                            ->paginate(6);
        return view('expedientes.index', compact('datos','busqueda'));
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
        return view('expedientes.create', compact('comunidades','estados','tipoPobrezas','barrios','gradoEscolares','centroEducativos'));
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
        return view('expedientes.edit', compact('datos','comunidades','estados','tipoPobrezas','barrios','gradoEscolares','centroEducativos'));
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
