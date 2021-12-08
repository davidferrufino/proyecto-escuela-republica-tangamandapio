<?php

namespace App\Http\Controllers;

use App\Models\Profesor;
use Illuminate\Http\Request;

class ProfesorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Profesores.index', [
            'profesores' => Profesor::paginate(10),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Profesores.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreProfesorRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->has('estado')) {
            $estado = true;
        } else {
            $estado = false;
        }

        $validado = $request->validate([
            'nombre' => 'required',
            'numero_identidad' => 'required',
            'numero_empleado' => 'required',
            'telefono' => 'required',
            'profesion' => 'required',
        ], [
            'nombre.required' => 'El nombre es obligatorio.',
            'numero_identidad.required' => 'El número de identiad es obligatorio.',
            'numero_empleado.required' => 'El número de empleado es obligatorio.',
            'telefono.required' => 'El telefono es obligatorio.',
            'profesion.required' => 'La profesion es obligatoria.',
        ]);

        Profesor::create([
            'nombre' => $validado['nombre'],
            'numero_identidad' => $validado['numero_identidad'],
            'numero_empleado' => $validado['numero_empleado'],
            'telefono' => $validado['telefono'],
            'profesion' => $validado['profesion'],
            'estado' => $estado,
        ]);

        return redirect()->route('profesores.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Profesor  $profesor
     * @return \Illuminate\Http\Response
     */
    public function show(Profesor $profesor)
    {
        return view('Profesores.show', ['profesor' => $profesor]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Profesor  $profesor
     * @return \Illuminate\Http\Response
     */
    public function edit(Profesor $profesor)
    {
        return view('Profesores.edit', ['profesor' => $profesor]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProfesorRequest  $request
     * @param  \App\Models\Profesor  $profesor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Profesor $profesor)
    {
        if ($request->has('estado')) {
            $estado = true;
        } else {
            $estado = false;
        }

        $validado = $request->validate([
            'nombre' => 'required',
            'numero_identidad' => 'required',
            'numero_empleado' => 'required',
            'telefono' => 'required',
            'profesion' => 'required',
        ], [
            'nombre.required' => 'El nombre es obligatorio.',
            'numero_identidad.required' => 'El número de identiad es obligatorio.',
            'numero_empleado.required' => 'El número de empleado es obligatorio.',
            'telefono.required' => 'El telefono es obligatorio.',
            'profesion.required' => 'La profesion es obligatoria.',
        ]);

        $profesor->nombre = $validado['nombre'];
        $profesor->numero_identidad = $validado['numero_identidad'];
        $profesor->numero_empleado = $validado['numero_empleado'];
        $profesor->telefono = $validado['telefono'];
        $profesor->profesion = $validado['profesion'];
        $profesor->estado =  $estado;

        $profesor->save();

        return redirect()->route('profesores.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Profesor  $profesor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Profesor $profesor)
    {
        $profesor->delete();

        return redirect()->route('profesores.index');
    }

    public function filter(Request $request)
    {
        if($request->busqueda != ""){
            return view('Profesores.index', [
                'profesores' => Profesor::filter($request->busqueda)->paginate(10),
            ]);
        }else{
            return redirect()->route('profesores.index');
        }
        
    }
}
