<?php

namespace App\Http\Controllers;

use App\Models\Grado;
use App\Models\Profesor;
use Illuminate\Http\Request;

class GradoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Grados.index', [
            'grados' => Grado::paginate(10),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Grados.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreGradoRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validado = $request->validate([
            'nombre' => 'required',
            'codigo' => 'required'
        ],[
            'nombre.required' => 'El nombre es obligatorio.',
            'codigo.required' => 'El código es obligatorio.',
        ]);

        Grado::create([
            'nombre' => $validado['nombre'],
            'codigo' => $validado['codigo']
        ]);

        return redirect()->route('grados.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Grado  $grado
     * @return \Illuminate\Http\Response
     */
    public function show(Grado $grado)
    {
        return view('Grados.show', ['grado' => $grado, 'profesores' => Profesor::all()]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Grado  $grado
     * @return \Illuminate\Http\Response
     */
    public function edit(Grado $grado)
    {
        return view('Grados.edit', ['grado' => $grado]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateGradoRequest  $request
     * @param  \App\Models\Grado  $grado
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Grado $grado)
    {
        $validated = $request->validate([
            'nombre' => 'required',
            'codigo' => 'required'
        ],[
            'nombre.required' => 'El nombre es obligatorio.',
            'codigo.required' => 'El código es obligatorio.',
            'codigo.unique' => 'Ya existe un grado con este código.',
        ]);

        $grado->nombre = $validated['nombre'];
        $grado->codigo = $validated['codigo'];

        $grado->save();

        return redirect()->route('grados.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Grado  $grado
     * @return \Illuminate\Http\Response
     */
    public function destroy(Grado $grado)
    {
        $grado->delete();

        return redirect()->route('grados.index');
    }

    public function agregar_profesor(Request $request, Grado $grado){
        $validado = $request->validate([
            'profesor' => 'required',
        ]);

        $grado->profesores()->attach($validado['profesor']);

        return redirect()->route('grados.show', $grado);
    }

    public function filter(Request $request)
    {
        if($request->busqueda != ""){
            return view('Grados.index', [
                'grados' => Grado::filter($request->busqueda)->paginate(10),
            ]);
        }else{
            return redirect()->route('grados.index');
        }
        
    }
}
