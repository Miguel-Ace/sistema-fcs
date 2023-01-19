<?php

namespace App\Http\Controllers;

use App\Models\BajasPadrino;
use App\Models\Padrino;
use Illuminate\Http\Request;
use App\Models\EntregasMensuale;
use App\Models\Expediente;
use App\Models\GradosEscolare;

class EntregasMensualeController extends Controller
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
        $datos = EntregasMensuale::where('id_expediente','like','%'.$busqueda.'%')
        ->paginate(6);
        $Bajapadrinos = BajasPadrino::all();
        $valor = 0;
        return view('entrega_mensuales.index', compact('datos','busqueda','Bajapadrinos','valor'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $expedientes = Expediente::all();
        $padrinos = Padrino::all();
        $gradoescolars = GradosEscolare::all();
        $Bajapadrinos = BajasPadrino::all();
        $valor = 0;
        return view('entrega_mensuales.create', compact('padrinos','expedientes','gradoescolars','Bajapadrinos','valor'));
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
            'id_padrino' => 'required',
            'fecha' => 'required',
            'edad' => 'required',
            'talla_pantalon' => 'required',
            'talla_camisa' => 'required',
            'talla_zapato' => 'required',
            'grado_escolar' => 'required',
            'observaciones' => 'required',
        ]);
        $datos = $request->except('_token');
        EntregasMensuale::insert($datos);
        return redirect('/entregas_mensuales');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\EntregasMensuale  $entregasMensuale
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $datos = EntregasMensuale::find($id);
        return view('entrega_mensuales.show', compact('datos'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\EntregasMensuale  $entregasMensuale
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $datos = EntregasMensuale::findOrFail($id);
        $expedientes = Expediente::all();
        $padrinos = Padrino::all();
        $Bajapadrinos = BajasPadrino::all();
        $valor = 0;
        return view('entrega_mensuales.edit', compact('datos','padrinos','expedientes','valor','Bajapadrinos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\EntregasMensuale  $entregasMensuale
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $datos = $request->except('_token','_method');
        EntregasMensuale::where('id','=',$id)->update($datos);
        return redirect('/entregas_mensuales');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\EntregasMensuale  $entregasMensuale
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        EntregasMensuale::destroy($id);
        return redirect('/entregas_mensuales');
    }
}
