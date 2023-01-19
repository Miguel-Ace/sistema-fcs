<?php

namespace App\Http\Controllers;

use App\Models\Actividad;
use App\Models\Expediente;
use App\Models\TipoAsistencia;
use Illuminate\Http\Request;

class ActividadController extends Controller
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
        $datos = Actividad::where('actividad','like','%'.$busqueda.'%')
        ->orWhere('actividad','like','%'.$busqueda.'%')
        ->paginate(6);
        return view('actividad.index', compact('datos','busqueda'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tipoAsistencias = TipoAsistencia::all();
        return view('actividad.create', compact('tipoAsistencias'));
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
            'actividad' => 'required',
            'fecha_creacion' => 'required',
            'fecha_actividad' => 'required',
            'id_tipo_asistencia' => 'required',
            'observacion' => 'required',
        ]);
        $datos = $request->except('_token');
        Actividad::insert($datos);
        return redirect('/actividades');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Actividad  $actividad
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $datos = Actividad::find($id);
        return view('actividad.show', compact('datos'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Actividad  $actividad
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $datos = Actividad::findOrFail($id);
        $tipoAsistencias = TipoAsistencia::all();
        return view('actividad.edit', compact('datos','tipoAsistencias'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Actividad  $actividad
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $datos = $request->except('_token','_method');
        Actividad::where('id','=',$id)->update($datos);
        return redirect('/actividades');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Actividad  $actividad
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Actividad::destroy($id);
        return redirect('/actividades');
    }
}
