<?php

namespace App\Http\Controllers;

use App\Models\Comunidad;
use Illuminate\Http\Request;

class ComunidadController extends Controller
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
        $datos = Comunidad::where('id','like','%'.$busqueda.'%')
                            ->orWhere('comunidad','like','%'.$busqueda.'%')
                            ->paginate(6);
        return view('comunidad.index', compact('datos','busqueda'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('comunidad.create');
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
            'comunidad' => 'required',
        ]);
        $datos = $request->except('_token');
        Comunidad::insert($datos);
        return redirect('/comunidades');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Comunidad  $comunidad
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $datos = Comunidad::find($id);
        return view('comunidad.show', compact('datos'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Comunidad  $comunidad
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $datos = Comunidad::findOrFail($id);
        return view('comunidad.edit', compact('datos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Comunidad  $comunidad
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $datos = $request->except('_token','_method');
        Comunidad::where('id','=',$id)->update($datos);
        return redirect('/comunidades');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Comunidad  $comunidad
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Comunidad::destroy($id);
        return redirect('/comunidades');
    }
}
