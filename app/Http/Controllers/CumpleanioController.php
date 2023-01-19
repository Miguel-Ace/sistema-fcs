<?php

namespace App\Http\Controllers;

use App\Models\BajasPadrino;
use App\Models\Padrino;
use App\Models\Cumpleanio;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CumpleanioController extends Controller
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
        $datos = Cumpleanio::where('id','like','%'.$busqueda.'%')
                            ->orWhere('id_padrino','like','%'.$busqueda.'%')
                            ->paginate(6);
        $fecha = Carbon::now();
        $bajaPadrinos = BajasPadrino::all();
        $valor = 0;
        return view('cumpleanio.index', compact('datos','fecha','busqueda','valor','bajaPadrinos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $padrinos = Padrino::all();
        $bajaPadrinos = BajasPadrino::all();
        $datos = Cumpleanio::all();
        return view('cumpleanio.create', compact('padrinos','bajaPadrinos','datos'));
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
            'fecha' => 'required',
            'fecha_entrega_carta' => 'required',
            'entrega_carta_presentacion' => 'required',
            'entrega_video' => 'required',
            'observaciones' => 'required',
        ]);
        $datos = $request->except('_token');
        Cumpleanio::insert($datos);
        return redirect('/cumpleanios');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cumpleanio  $cumpleanio
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $datos = Cumpleanio::find($id);
        return view('cumpleanio.show', compact('datos'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cumpleanio  $cumpleanio
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $datos = Cumpleanio::findOrFail($id);
        $padrinos = Padrino::all();
        $bajaPadrinos = BajasPadrino::all();
        $valor = 0;
        return view('cumpleanio.edit', compact('datos','padrinos','bajaPadrinos','valor'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cumpleanio  $cumpleanio
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $datos = $request->except('_token','_method');
        Cumpleanio::where('id','=',$id)->update($datos);
        return redirect('/cumpleanios');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cumpleanio  $cumpleanio
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Cumpleanio::destroy($id);
        return redirect('/cumpleanios');
    }
}
