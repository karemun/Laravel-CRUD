<?php

namespace App\Http\Controllers;

use App\Models\Empleado;
use Illuminate\Http\Request;

class EmpleadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Accede a la vista -> empleado -> index.blade.php
        return view('empleado.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //Accede a la vista -> empleado -> create.blade.php
        return view('empleado.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * Esta funcion recibe toda la informacion
     * y la prepara para mandarla a la BD
     * 
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        //$datosEmpleado = request()->all();      //Almacena todos los datos enviados
        $datosEmpleado = request()->except('_token'); //Almacena todo menos el token de seguridad (csrf)
        
        if($request->hasFile('Foto')){ //Si el input Foto, tiene un archivo
            /**
             * El campo Foto se inserta en la ruta:
             * storage/app/public/uploads
             */
            $datosEmpleado['Foto'] = $request->file('Foto')->store('uploads', 'public');
        }

        Empleado::insert($datosEmpleado);       //Inserta los datos en la BD

        return response()->json($datosEmpleado);//Los envia a un archivo json
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function show(Empleado $empleado)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function edit(Empleado $empleado)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Empleado $empleado)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function destroy(Empleado $empleado)
    {
        //
    }
}
