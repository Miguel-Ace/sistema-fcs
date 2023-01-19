<?php

namespace App\Http\Controllers;

use App\Models\TipoEntrega;
use Illuminate\Http\Request;

class TipoEntregaController extends Controller
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
        $datos = TipoEntrega::where('tipo_entrega','like','%'.$busqueda.'%')
                            ->paginate(6);
        return view('tipo_entrega.index', compact('datos','busqueda'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tipo_entrega.create');
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
            'tipo_entrega' => 'required',
        ]);
        $datos = $request->except('_token');
        TipoEntrega::insert($datos);
        return redirect('/tipo_entrega');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TipoEntrega  $tipoEntrega
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $datos = TipoEntrega::find($id);
        return view('tipo_entrega.show', compact('datos'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TipoEntrega  $tipoEntrega
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $datos = TipoEntrega::findOrFail($id);
        return view('tipo_entrega.edit', compact('datos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TipoEntrega  $tipoEntrega
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $datos = $request->except('_token','_method');
        TipoEntrega::where('id','=',$id)->update($datos);
        return redirect('/tipo_entrega');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TipoEntrega  $tipoEntrega
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        TipoEntrega::destroy($id);
        return redirect('/tipo_entrega');
    }
}
