<?php

namespace App\Http\Controllers;

use App\Models\BajasPadrino;
use App\Models\Banco;
use App\Models\MetodosPago;
use App\Models\Padrino;
use Illuminate\Http\Request;

class PadrinoController extends Controller
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
        $datos = Padrino::where('nombre','like','%'.$busqueda.'%')
                        ->orWhere('apellido','like','%'.$busqueda.'%')
                        ->paginate(6);
        $Bajapadrinos = BajasPadrino::all();
        $valor = 0;
        return view('padrino.index', compact('datos','Bajapadrinos','busqueda','valor'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $metodoPagos = MetodosPago::all();
        $bancos = Banco::all();
        return view('padrino.create', compact('metodoPagos','bancos'));
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
            'telefono' => 'required|min:8|max:8',
            'direccion' => 'required',
            'correo' => 'required|email',
            'tipo' => 'required',
            'fecha_inicio' => 'required',
            'fecha_final' => 'required',
            'fecha_nacimiento' => 'required',
            'id_metodo_pago' => 'required',
            'id_banco' => 'required',
        ]);
        $datos = $request->except('_token');
        Padrino::insert($datos);
        return redirect('/padrinos');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Padrino  $padrino
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $datos = Padrino::find($id);
        return view('padrino.show', compact('datos'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Padrino  $padrino
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $datos = Padrino::findOrFail($id);
        $metodoPagos = MetodosPago::all();
        $bancos = Banco::all();
        return view('padrino.edit', compact('datos','metodoPagos','bancos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Padrino  $padrino
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $datos = $request->except('_token','_method');
        Padrino::where('id','=',$id)->update($datos);
        return redirect('/padrinos');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Padrino  $padrino
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Padrino::destroy($id);
        return redirect('/padrinos');
    }
}
