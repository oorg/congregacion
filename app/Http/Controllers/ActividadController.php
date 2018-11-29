<?php

namespace App\Http\Controllers;

use App\Actividad;
use App\Integrante;
use App\Grupo;
use Illuminate\Http\Request;

class ActividadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $actividades = Actividad::with('asignado')->paginate(5);
        return view('actividades.actividadIndex', compact('actividades'));
    }

    public function intindex($id)
    {
        $asignado = new \stdClass();
        $asignado->type = Integrante::class;
        $asignado->id = $id;
        $actividad = Actividad::check($asignado->id, $asignado->type)->get();
        return view('actividades.typeShow', compact('asignado', 'actividad'));
    }
    public function grpindex($id)
    {
        $asignado = new \stdClass();
        $asignado->type = Grupo::class;
        $asignado->id = $id;
        $actividad = Actividad::check($asignado->id, $asignado->type)->get();
        /*$actividad = Actividad::where('asignado_id', $asignado->id)
            ->where('asignado_type', $asignado->type)
            ->get();*/
        return view('actividades.typeShow', compact('asignado', 'actividad'));
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $model = new \stdClass();
        if ($request->asignado_type == "App\Integrante") {
            $model = Integrante::find($request->asignado_id);
        } else if ($request->asignado_type == "App\Grupo") {
            $model = Grupo::find($request->asignado_id);
        }
        $asignado = new \stdClass();
        $asignado->type = $request->asignado_type;
        $asignado->id = $request->asignado_id;
        return view('actividades.createForm', compact('asignado'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $actividad = Actividad::create([
            'asignado_id' => $request->asignado_id,
            'asignado_type' => $request->asignado_type,
            'actividad' => $request->actividad,
            'descripcion' => $request->descripcion
        ]);
        if ($actividad->asignado_type == 'App\Integrante') {
            return redirect()->route('actividades.integrantes.index', ['id' => $actividad->asignado_id]);
        } else if ($request->asignado_type == "App\Grupo") {
            return redirect()->route('actividades.grupos.index', ['id' => $actividad->asignado_id]);
        }
        $asignado = new \stdClass();
        $asignado->type = $request->asignado_type;
        $asignado->id = $request->asignado_id;
        $actividad = $actividad->with('asignado')->get();
        return view('actividades.typeShow', ['asignado' => $asignado, 'actividad' => $actividad]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Actividad  $actividad
     * @return \Illuminate\Http\Response
     */
    public function show(Actividad $actividad)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Actividad  $actividad
     * @return \Illuminate\Http\Response
     */
    public function edit(Actividad $actividad)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Actividad  $actividad
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Actividad $actividad)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Actividad  $actividad
     * @return \Illuminate\Http\Response
     */
    public function destroy($actividad)
    {
        $actividad = Actividad::find($actividad);
        $actividad->delete();
        toast('Eliminada', 'success', 'top-right');
        return redirect()->back();
    }
}
