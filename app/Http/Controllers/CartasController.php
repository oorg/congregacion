<?php

namespace App\Http\Controllers;

use App\Cartas;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

use Illuminate\Support\Facades\Storage;

class CartasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cartas = Cartas::paginate(5);
        //$cartas = Cartas::all();
        #dd($cartas);
        return view('cartas.cartaIndex', compact('cartas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cartas.cartaForm');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request->file('cartas'), $request->cartas);

        $request->validate([
            'cartas' => 'required|array|min:1',
            'cartas.*' => 'required|file|mimetypes:application/pdf',
        ]);
           
        //Valida que el exista el archivo en el request y que se haya guardado correctamente.
        if ($request->hasFile('cartas')) {
            $cartas = $request->file('cartas');

            foreach ($cartas as $carta) {

                //Almacena registro con información del archivo
                $carta = Cartas::create([
                    'nombre_original' => $carta->getClientOriginalName(),
                    'nombre_hash' => $carta->store(''),
                    'size' => $carta->getClientSize(),
                    'mime' => $carta->getClientMimeType(),
                    'extension' => $carta->guessClientExtension() == null ? '' : $carta->guessClientExtension()
                ]);
                //$regCarta->save();
            }
        }
        toast('Carta compartida con exito', 'success', 'top-right');
        return redirect()->route('cartas.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Cartas  $cartas
     * @return \Illuminate\Http\Response
     */
    public function show(Cartas $cartas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Cartas  $cartas
     * @return \Illuminate\Http\Response
     */
    public function edit(Cartas $cartas)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Cartas  $cartas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cartas $cartas)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Cartas  $cartas
     * @return \Illuminate\Http\Response
     */
    public function destroy($cartas)
    {
        //dd($cartas);
        $cartas = Cartas::find($cartas);
        Storage::delete($cartas->nombre_hash);
        $cartas->delete();

        toast('Carta eliminada', 'success', 'top-right');
        return redirect()->back();
    }
}
