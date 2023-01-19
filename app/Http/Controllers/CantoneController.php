<?php

namespace App\Http\Controllers;

use App\Models\Cantone;
use App\Models\Provincia;
use Illuminate\Http\Request;

class CantoneController extends Controller
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
        $datos = Cantone::where('id','like','%'.$busqueda.'%')
        ->orWhere('canton','like','%'.$busqueda.'%')
        ->paginate(6);
        return view('cantones.index', compact('datos','busqueda'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $provincias = Provincia::all();
        return view('cantones.create', compact('provincias'));
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
            'canton' => 'required',
            'id_provincia' => 'required',
        ]);
        $datos = $request->except('_token');
        Cantone::insert($datos);
        return redirect('/cantones');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cantone  $cantone
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $datos = Cantone::find($id);
        return view('cantones.show', compact('datos'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cantone  $cantone
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $datos = Cantone::findOrFail($id);
        $provincias = Provincia::all();
        return view('cantones.edit', compact('datos','provincias'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cantone  $cantone
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $datos = $request->except('_token','_method');
        Cantone::where('id','=',$id)->update($datos);
        return redirect('/cantones');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cantone  $cantone
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Cantone::destroy($id);
        return redirect('/cantones');
    }
}
