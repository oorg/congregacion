<?php

namespace App\Http\Controllers;

use App\Integrante;
use Illuminate\Http\Request;
use App\Grupo;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class IntegranteController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->only('create', 'edit');
        $this->middleware('user')->only('create', 'edit');
        //$this->middleware('auth')->only('create');
        //$this->middleware('user')->only('create');
        //$this->middleware('admin')->only('destroy');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()

    {
        $integrantes = Integrante::paginate(10);
        return view('integrantes.integranteIndex', compact('integrantes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($grupo_id)
    {
        #$grupo = Grupo::find($grupoId);
        //dd($grupo_id);

        if (Auth::check()) {
            $user = Auth::user();
            //dd($user->name);
            //$user = $user->name;
            return view('integrantes.integranteForm', compact('grupo_id', 'user'));
        }

        return view('integrantes.integranteForm', compact('grupo_id'));
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
            'nombre' => 'required|min:4',
            'edad' => 'required|integer',
            'telefono' => 'required|min:8'
        ]);
        //dd($request->grupo_id);
        #$grupo = Grupo::find($id);
        //$request->merge(['grupo']);
        //
        //Agrega 'user_id' al request para que se inserte a la base de datos
        //$request->merge(['grupo_id' => \App\Grupo::id()]);

        //Debe estar $fillable o $guarded declarados en el Modelo
        Integrante::create($request->all());
        $grupo = $request->grupo_id;
        return redirect()->route('grupos.show', compact('grupo'));
        //return redirect()->route('grupos.index')
        //    ->with(['mensaje' => 'Materia creada con éxito', 'alert-class' => 'alert-success']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Integrante  $integrante
     * @return \Illuminate\Http\Response
     */
    public function show(Integrante $integrante)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Integrante  $integrante
     * @return \Illuminate\Http\Response
     */
    public function edit(Integrante $integrante, $grupo)
    {
        
        //dd($grupo);
        if (Auth::check()) {
            $user = Auth::user();
            //$grupo_id = $integrante->grupo_id;
            $grupo_id = $grupo;
            return view('integrantes.integranteForm', compact('grupo_id', 'user', 'integrante'));
        }

        return view('integrantes.integranteForm', compact('grupo_id', 'integrante'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Integrante  $integrante
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Integrante $integrante)
    {
        //dd($request, $integrante);
        $request->validate([
            'nombre' => 'required|min:4',
            'edad' => 'required|integer',
            'telefono' => 'required|min:8'
        ]);

        $integrante->nombre = $request->nombre;
        $integrante->edad = $request->edad;
        $integrante->telefono = $request->telefono;

        $integrante->save();
        //Alert::success('Success Title', 'Success Message');
        toast('Datos actualizados', 'success', 'top-right');
        return redirect()->route('integrantes.index');
        
      /*
        $materium->materia = $request->materia;
        $materium->crn = $request->crn;
        $materium->salon = $request->salon;
        $materium->seccion = $request->input('seccion');
        $materium->save();

        Materia::where('id', $materium->id)->update($request->except('_token', '_method'));
         */

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Integrante  $integrante
     * @return \Illuminate\Http\Response
     */
    public function destroy(Integrante $integrante)
    {
        //
    }
}
