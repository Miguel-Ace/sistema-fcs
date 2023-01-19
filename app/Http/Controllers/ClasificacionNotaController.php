<?php

namespace App\Http\Controllers;

use App\Models\ClasificacionNota;
use Illuminate\Http\Request;

class ClasificacionNotaController extends Controller
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
        $datos = ClasificacionNota::where('clasificacion_nota','like','%'.$busqueda.'%')
        ->paginate(6);
        return view('clasificacion_notas.index', compact('datos','busqueda'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('clasificacion_notas.create');
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
            'clasificacion_nota' => 'required',
        ]);
        $datos = $request->except('_token');
        ClasificacionNota::insert($datos);
        return redirect('/clasificacion_nota');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ClasificacionNota  $clasificacionNota
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $datos = ClasificacionNota::find($id);
        return view('clasificacion_notas.show', compact('datos'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ClasificacionNota  $clasificacionNota
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $datos = ClasificacionNota::findOrFail($id);
        return view('clasificacion_notas.edit', compact('datos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ClasificacionNota  $clasificacionNota
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $datos = $request->except('_token','_method');
        ClasificacionNota::where('id','=',$id)->update($datos);
        return redirect('/clasificacion_nota');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ClasificacionNota  $clasificacionNota
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        ClasificacionNota::destroy($id);
        return redirect('/clasificacion_nota');
    }
}
