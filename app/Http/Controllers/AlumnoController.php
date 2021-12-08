<?php

namespace App\Http\Controllers;

use App\Models\Alumno;
use App\Models\Grado;
use Illuminate\Http\Request;

class AlumnoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Alumnos.index', [
            'alumnos' => Alumno::paginate(10),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Alumnos.create', [
            'grados' => Grado::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreAlumnoRequest  $request
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
            'numero_identidad' => 'required|unique:alumnos',
            'numero_cuenta' => 'required|unique:alumnos',
            'telefono' => 'required',
            'id_grado' => 'required',
        ], [
            'nombre.required' => 'El nombre es obligatorio.',
            'numero_identidad.required' => 'El número de identiad es obligatorio.',
            'numero_identidad.unique' => 'El número de identiad ya esta registrado.',
            'numero_cuenta.required' => 'El número de cuenta es obligatorio.',
            'numero_cuenta.unique' => 'El número de cuenta ya esta registrado.',
            'telefono.required' => 'El telefono es obligatorio.',
            'id_grado.required' => 'El grado es obligatorio.',
        ]);

        Alumno::create([
            'nombre' => $validado['nombre'],
            'numero_identidad' => $validado['numero_identidad'],
            'numero_cuenta' => $validado['numero_cuenta'],
            'telefono' => $validado['telefono'],
            'id_grado' => $validado['id_grado'],
            'estado' => $estado,
        ]);

        return redirect()->route('alumnos.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Alumno  $alumno
     * @return \Illuminate\Http\Response
     */
    public function show(Alumno $alumno)
    {
        return view('Alumnos.show', ['alumno' => $alumno]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Alumno  $alumno
     * @return \Illuminate\Http\Response
     */
    public function edit(Alumno $alumno)
    {
        // dd($alumno);
        return view('Alumnos.edit', [
            'alumno' => $alumno,
            'grados' => Grado::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateAlumnoRequest  $request
     * @param  \App\Models\Alumno  $alumno
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Alumno $alumno)
    {
        
        if ($request->has('estado')) {
            $estado = true;
        } else {
            $estado = false;
        }

        $validado = $request->validate([
            'nombre' => 'required',
            'numero_identidad' => 'required',
            'numero_cuenta' => 'required',
            'telefono' => 'required',
            'id_grado' => 'required',
        ], [
            'nombre.required' => 'El nombre es obligatorio.',
            'numero_identidad.required' => 'El número de identiad es obligatorio.',
            'numero_cuenta.required' => 'El número de cuenta es obligatorio.',
            'telefono.required' => 'El telefono es obligatorio.',
            'id_grado.required' => 'El grado es obligatorio.',
        ]);

        $alumno->nombre = $validado['nombre'];
        $alumno->numero_identidad = $validado['numero_identidad'];
        $alumno->numero_cuenta = $validado['numero_cuenta'];
        $alumno->telefono = $validado['telefono'];
        $alumno->id_grado = $validado['id_grado'];
        $alumno->estado = $estado;

        $alumno->save();

        return redirect()->route('alumnos.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Alumno  $alumno
     * @return \Illuminate\Http\Response
     */
    public function destroy(Alumno $alumno)
    {
        $alumno->delete();

        return redirect()->route('alumnos.index');
    }

    public function filter(Request $request)
    {
        if($request->busqueda != ""){
            return view('Alumnos.index', [
                'alumnos' => Alumno::filter($request->busqueda)->paginate(10),
            ]);
        }else{
            return redirect()->route('alumnos.index');
        }
        
    }
}
