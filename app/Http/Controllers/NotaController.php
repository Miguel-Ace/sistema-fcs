<?php

namespace App\Http\Controllers;

use App\Models\ClasificacionNota;
use App\Models\Nota;
use App\Models\Expediente;
use App\Models\GradosEscolare;
use Illuminate\Http\Request;

class NotaController extends Controller
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
        $datos = Nota::where('id_expediente','like','%'.$busqueda.'%')
                    ->paginate(6);
        return view('notas.index', compact('datos','busqueda'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $expedientes = Expediente::all();
        $gradoEscolares = GradosEscolare::all();
        $clasificacionNotas = ClasificacionNota::all();
        return view('notas.create', compact('expedientes','gradoEscolares','clasificacionNotas'));
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
            'promedio' => 'required',
            'fecha' => 'required',
            'id_grado_escolar' => 'required',
            'id_clasificacion_nota' => 'required',
            'tipo_promedio' => 'required',
        ]);
        $datos = $request->except('_token');
        Nota::insert($datos);
        return redirect('/notas');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Nota  $nota
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $datos = Nota::find($id);
        return view('notas.show', compact('datos'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Nota  $nota
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $datos = Nota::findOrFail($id);
        $expedientes = Expediente::all();
        $gradoEscolares = GradosEscolare::all();
        $clasificacionNotas = ClasificacionNota::all();
        return view('notas.edit', compact('datos','expedientes','gradoEscolares','clasificacionNotas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Nota  $nota
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $datos = $request->except('_token','_method');
        Nota::where('id','=',$id)->update($datos);
        return redirect('/notas');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Nota  $nota
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Nota::destroy($id);
        return redirect('/notas');
    }
}
