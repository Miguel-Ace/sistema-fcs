<?php

namespace App\Http\Controllers;

use App\Models\Enfermedad;
use App\Models\Expediente;
use Illuminate\Http\Request;

class EnfermedadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $start = $_GET['buscar'];
        $datos = Enfermedad::paginate(6);
        $expedientes = Expediente::all();
        return view('enfermedades.index', compact('datos','start','expedientes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $start = $_GET['buscar'];
        return view('enfermedades.create', compact('start'));
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
            'id_expediente'=>'required',
            'enfermedad'=>'required',
            'medicamento'=>'required',
            'fecha'=>'required',
        ]);
        $datos = $request->except('_token');
        Enfermedad::insert($datos);
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Enfermedad  $enfermedad
     * @return \Illuminate\Http\Response
     */
    public function show(Enfermedad $enfermedad)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Enfermedad  $enfermedad
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $start = $_GET['buscar'];
        $datos = Enfermedad::findOrFail($id);
        return view('enfermedades.edit', compact('datos','start'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Enfermedad  $enfermedad
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $datos = $request->except('_token','_method');
        Enfermedad::where('id','=',$id)->update($datos);
        // return redirect('/enfermedades');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Enfermedad  $enfermedad
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Enfermedad::destroy($id);
        return redirect('/enfermedades');
    }
}
