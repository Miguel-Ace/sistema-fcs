<?php

namespace App\Http\Controllers;

use App\Models\Medico;
use Illuminate\Http\Request;

class MedicoController extends Controller
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
        $datos = Medico::where('nombre','like','%'.$busqueda.'%')
                            ->orWhere('apellido','like','%'.$busqueda.'%')
                            ->paginate(6);
        return view('medicos.index', compact('datos','busqueda'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('medicos.create');
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
            'nombre' => 'required',
            'apellido' => 'required',
            'direccion' => 'required',
            'telefono' => 'required|min:8|max:8',
            'email' => 'required|email',
        ]);
        $datos = $request->except('_token');
        Medico::insert($datos);
        return redirect('/medicos');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Medico  $medico
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $datos = Medico::find($id);
        return view('medicos.show', compact('datos'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Medico  $medico
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $datos = Medico::findOrFail($id);
        return view('medicos.edit', compact('datos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Medico  $medico
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $datos = $request->except('_token','_method');
        Medico::where('id','=',$id)->update($datos);
        return redirect('/medicos');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Medico  $medico
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Medico::destroy($id);
        return redirect('/medicos');
    }
}
