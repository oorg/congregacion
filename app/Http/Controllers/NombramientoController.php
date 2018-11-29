<?php

namespace App\Http\Controllers;

use App\Nombramiento;
use App\Integrante;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class NombramientoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    //public function agrega(Integrante $integrante, $grupo)
    public function agrega(Integrante $integrante, $grupo)
    {
        //$nombramientos = Nombramiento::all()->pluck('nombramiento', 'id')->toArray();
        $nombramientos = Nombramiento::all()->pluck('nombramiento', 'id');
        //$integrante = Integrante::find($integrante)->load('nombramientos');
        //$integrante->load('nombramientos');
        //dd($integrante);
        $selected = $integrante->nombramiento()->get()->pluck('nombramiento', 'id')->toArray();
        ///dd($selected);
        //$nombramientos = Nombramiento::all();
        //$user = Auth::user();
            //$grupo_id = $integrante->grupo_id;
        $grupo_id = $grupo;
        return view('nombramientos.nombramientoAsigna', compact('grupo_id', 'integrante', 'nombramientos', 'selected'));
//        return view('nombramientos.nombramientoAsigna', compact('nombramientos'));
    }
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $request->validate([
            'edad' => 'required|integer',
            'comentario' => 'required|min:1',
            'nombramiento_id' => 'required|array|min:1'
        ]);

        $integrante = Integrante::find($request->integrante_id);
        //dd($request->nombramiento_id);
        //dd($request->selected);
        $arrSincroniza = array();
        foreach ($request->nombramiento_id as $nomb_id) {
            $arrSincroniza += [$nomb_id => ['edad' => $request->edad, 'comentario' => $request->comentario]];
        }
        $integrante->nombramiento()->attach($arrSincroniza);
        //dd($request->grupo_id);
        //dd($integrante->id);
        $grupo_id = $request->grupo_id;
        toast('Nombramiento asignado con exito', 'success', 'top-right');
        return redirect()->route('nombramientos.agrega', compact('integrante', 'grupo_id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'edad' => 'required|integer'
        ]);
        dd($request->grupo_id);
        #$grupo = Grupo::find($id);
        //$request->merge(['grupo']);
        //
        //Agrega 'user_id' al request para que se inserte a la base de datos
        //$request->merge(['grupo_id' => \App\Grupo::id()]);

        //Debe estar $fillable o $guarded declarados en el Modelo
        Integrante::create($request->all());
        $grupo = $request->grupo_id;
        return redirect()->route('grupos.show', compact('grupo'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Nombramiento  $nombramiento
     * @return \Illuminate\Http\Response
     */
    public function show(Nombramiento $nombramiento)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Nombramiento  $nombramiento
     * @return \Illuminate\Http\Response
     */
    public function edit(Nombramiento $nombramiento)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Nombramiento  $nombramiento
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Nombramiento $nombramiento)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Nombramiento  $nombramiento
     * @return \Illuminate\Http\Response
     */
    public function destroy(Nombramiento $nombramiento)
    {
        //
    }
}
