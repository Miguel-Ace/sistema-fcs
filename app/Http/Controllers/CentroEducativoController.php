<?php

namespace App\Http\Controllers;

use App\Models\CentroEducativo;
use Illuminate\Http\Request;

class CentroEducativoController extends Controller
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
        $datos = CentroEducativo::where('id','like','%'.$busqueda.'%')
        ->orWhere('centro_educativo','like','%'.$busqueda.'%')
        ->paginate(6);
        return view('centro_educativo.index', compact('datos','busqueda'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('centro_educativo.create');
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
            'centro_educativo' => 'required',
        ]);
        $datos = $request->except('_token');
        CentroEducativo::insert($datos);
        return redirect('/centro_educativo');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CentroEducativo  $centroEducativo
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $datos = CentroEducativo::find($id);
        return view('centro_educativo.show', compact('datos'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CentroEducativo  $centroEducativo
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $datos = CentroEducativo::findOrFail($id);
        return view('centro_educativo.edit', compact('datos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CentroEducativo  $centroEducativo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $datos = $request->except('_token','_method');
        CentroEducativo::where('id','=',$id)->update($datos);
        return redirect('/centro_educativo');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CentroEducativo  $centroEducativo
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        CentroEducativo::destroy($id);
        return redirect('/centro_educativo');
    }
}
