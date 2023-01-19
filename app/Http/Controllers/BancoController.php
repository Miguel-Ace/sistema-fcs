<?php

namespace App\Http\Controllers;

use App\Models\Banco;
use Illuminate\Http\Request;

class BancoController extends Controller
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
        $datos = Banco::where('id','like','%'.$busqueda.'%')
        ->orWhere('banco','like','%'.$busqueda.'%')
        ->paginate(6);
        return view('bancos.index', compact('datos','busqueda'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('bancos.create');
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
            'banco' => 'required',
        ]);
        $datos = $request->except('_token');
        Banco::insert($datos);
        return redirect('/banco');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Banco  $banco
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $datos = Banco::find($id);
        return view('bancos.show', compact('datos'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Banco  $banco
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $datos = Banco::findOrFail($id);
        return view('bancos.edit', compact('datos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Banco  $banco
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $datos = $request->except('_token','_method');
        Banco::where('id','=',$id)->update($datos);
        return redirect('/banco');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Banco  $banco
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Banco::destroy($id);
        return redirect('/banco');
    }
}
