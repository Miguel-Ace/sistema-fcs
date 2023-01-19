<?php

namespace App\Http\Controllers;

use App\Models\Barrio;
use App\Models\Cantone;
use Illuminate\Http\Request;

class BarrioController extends Controller
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
        // Buscador
        $busqueda = $request->buscar;
        $datos = Barrio::where('id','like','%'.$busqueda.'%')
        ->orWhere('barrio','like','%'.$busqueda.'%')
        ->paginate(6);
        // Retornar la vista pricipal
        return view('barrios.index', compact('datos','busqueda'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cantones = Cantone::all();
        return view('barrios.create', compact('cantones'));
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
            'barrio' => 'required',
            'id_canton' => 'required',
        ]);
        $datos = $request->except('_token');
        Barrio::insert($datos);
        return redirect('/barrios');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Barrio  $barrio
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $datos = Barrio::find($id);
        return view('barrios.show', compact('datos'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Barrio  $barrio
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $datos = Barrio::findOrFail($id);
        $cantones = Cantone::all();
        return view('barrios.edit', compact('datos','cantones'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Barrio  $barrio
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $datos = $request->except('_token','_method');
        Barrio::where('id','=',$id)->update($datos);
        return redirect('/barrios');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Barrio  $barrio
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Barrio::destroy($id);
        return redirect('/barrios');
    }
}
