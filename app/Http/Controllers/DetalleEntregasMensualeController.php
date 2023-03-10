<?php

namespace App\Http\Controllers;

use App\Models\DetalleEntregasMensuale;
use App\Models\EntregasMensuale;
use App\Models\Expediente;
use App\Models\TipoEntrega;
use Illuminate\Http\Request;

class DetalleEntregasMensualeController extends Controller
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
        $start = $_GET['buscar'];
        $busqueda = $request->buscar;
        $expedientes = Expediente::all();
        $datos = DetalleEntregasMensuale::where('id','like','%'.$busqueda.'%')
                            ->orWhere('id_expediente','like','%'.$busqueda.'%')
                            ->paginate(6);
        return view('detalle_entrega_mensuales.index', compact('datos','busqueda','start','expedientes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $start = $_GET['buscar'];
        $entregaMensuales = EntregasMensuale::all();
        $tipoEntregas = TipoEntrega::all();
        $expedientes = Expediente::all();
        $datos = DetalleEntregasMensuale::all();
        return view('detalle_entrega_mensuales.create', compact('tipoEntregas','entregaMensuales','datos','expedientes','start'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $start)
    {
        request()->validate([
            'id_expediente' => 'required',
            'id_tipoEntrega' => 'required',
        ]);
        $datos = $request->except('_token');
        DetalleEntregasMensuale::insert($datos);
        return redirect('/detalle_entregas_mensuales?buscar='.$start);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DetalleEntregasMensuale  $detalleEntregasMensuale
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $datos = DetalleEntregasMensuale::find($id);
        return view('detalle_entrega_mensuales.show', compact('datos'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DetalleEntregasMensuale  $detalleEntregasMensuale
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $datos = DetalleEntregasMensuale::findOrFail($id);
        $entregaMensuales = EntregasMensuale::all();
        $tipoEntregas = TipoEntrega::all();
        $expedientes = Expediente::all();
        $start = $_GET['buscar'];
        return view('detalle_entrega_mensuales.edit', compact('datos','tipoEntregas','entregaMensuales','expedientes','start'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\DetalleEntregasMensuale  $detalleEntregasMensuale
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id, $start)
    {
        $datos = $request->except('_token','_method');
        DetalleEntregasMensuale::where('id','=',$id)->update($datos);
        return redirect('/detalle_entregas_mensuales?buscar='.$start);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DetalleEntregasMensuale  $detalleEntregasMensuale
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, $start)
    {
        DetalleEntregasMensuale::destroy($id);
        return redirect('/detalle_entregas_mensuales?buscar='.$start);
    }
}
