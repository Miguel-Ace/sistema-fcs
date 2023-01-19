<?php

namespace App\Http\Controllers;

use App\Models\BajasPadrino;
use App\Models\Expediente;
use App\Models\MotivoBaja;
use App\Models\Padrino;
use Illuminate\Http\Request;

class BajasPadrinoController extends Controller
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
        $expedientes = Expediente::all();
        $datos = BajasPadrino::where('id_expediente','like','%'.$busqueda.'%')
                                ->paginate(6);
        return view('bajas_padrino.index', compact('datos','busqueda','expedientes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $padrinos = Padrino::all();
        $expedientes = Expediente::all();
        $motivoBajas = MotivoBaja::all();
        $datos = BajasPadrino::all();
        $valor = 0;
        return view('bajas_padrino.create', compact('padrinos','expedientes','motivoBajas','datos','valor'));
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
            'id_padrino' => 'required',
            'id_expediente' => 'required',
            'fecha_baja' => 'required',
            'quien_sale' => 'required',
            'id_motivo_baja' => 'required',
        ]);
        $datos = $request->except('_token');
        BajasPadrino::insert($datos);
        return redirect('/baja_padrinos');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BajasPadrino  $bajasPadrino
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $datos = BajasPadrino::find($id);
        return view('bajas_padrino.show', compact('datos'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BajasPadrino  $bajasPadrino
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $datos = BajasPadrino::findOrFail($id);
        $padrinos = Padrino::all();
        $expedientes = Expediente::all();
        $motivoBajas = MotivoBaja::all();
        return view('bajas_padrino.edit', compact('datos','padrinos','expedientes','motivoBajas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BajasPadrino  $bajasPadrino
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $datos = $request->except('_token','_method');
        BajasPadrino::where('id','=',$id)->update($datos);
        return redirect('/baja_padrinos');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BajasPadrino  $bajasPadrino
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        BajasPadrino::destroy($id);
        return redirect('/baja_padrinos');
    }
}
