<?php

namespace App\Http\Controllers;

use App\Models\Provincia;
use Illuminate\Http\Request;

class ProvinciaController extends Controller
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
        $datos = Provincia::where('provincia','like','%'.$busqueda.'%')
                            ->paginate(6);
        return view('provincias.index', compact('datos','busqueda'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('provincias.create');
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
            'provincia' => 'required',
        ]);
        $datos = $request->except('_token');
        Provincia::insert($datos);
        return redirect('/provincias');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Provincia  $provincia
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $datos = Provincia::find($id);
        return view('provincias.show', compact('datos'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Provincia  $provincia
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $datos = Provincia::findOrFail($id);
        return view('provincias.edit', compact('datos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Provincia  $provincia
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $datos = $request->except('_token','_method');
        Provincia::where('id','=',$id)->update($datos);
        return redirect('/provincias');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Provincia  $provincia
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Provincia::destroy($id);
        return redirect('/provincias');
    }
}
