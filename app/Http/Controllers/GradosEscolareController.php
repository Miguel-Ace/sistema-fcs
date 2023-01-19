<?php

namespace App\Http\Controllers;

use App\Models\GradosEscolare;
use Illuminate\Http\Request;

class GradosEscolareController extends Controller
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
        $datos = GradosEscolare::where('grado_escolar','like','%'.$busqueda.'%')
                            ->paginate(6);
        return view('grado_escolar.index', compact('datos','busqueda'));
    }

    // public function guardar(Request $request)
    // {
    //     $request->validate([
    //         'grado_escolar' => 'required',
    //     ]);

    //     $form = new GradosEscolare;
    //     $form->grado_escolar = $request->grado_escolar;

    //     $form->save();
    //     return back()->with('sucess', 'Formulario validado éxitosamente');
    // }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('grado_escolar.create');
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
            'grado_escolar' => 'required',
        ]);
        $datos = $request->except('_token');
        GradosEscolare::insert($datos);
        return redirect('/grado_escolar');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\GradosEscolare  $gradosEscolare
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $datos = GradosEscolare::find($id);
        return view('grado_escolar.show', compact('datos'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\GradosEscolare  $gradosEscolare
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $datos = GradosEscolare::findOrFail($id);
        return view('grado_escolar.edit', compact('datos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\GradosEscolare  $gradosEscolare
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $datos = $request->except('_token','_method');
        GradosEscolare::where('id','=',$id)->update($datos);
        return redirect('/grado_escolar');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\GradosEscolare  $gradosEscolare
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        GradosEscolare::destroy($id);
        return redirect('/grado_escolar');
    }
}
