<?php

namespace App\Http\Controllers;

use App\Models\Beca;
use Illuminate\Http\Request;

class BecaController extends Controller
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
        $datos = Beca::where('id','like','%'.$busqueda.'%')
        ->orWhere('beca','like','%'.$busqueda.'%')
        ->paginate(6);
        return view('becas.index', compact('datos','busqueda'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('becas.create');
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
            'beca' => 'required',
        ]);
        $datos = $request->except('_token');
        Beca::insert($datos);
        return redirect('/beca');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Beca  $beca
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $datos = Beca::find($id);
        return view('becas.show', compact('datos'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Beca  $beca
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $datos = Beca::findOrFail($id);
        return view('becas.edit', compact('datos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Beca  $beca
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $datos = $request->except('_token','_method');
        Beca::where('id','=',$id)->update($datos);
        return redirect('/beca');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Beca  $beca
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Beca::destroy($id);
        return redirect('/beca');
    }
}
