<?php

namespace App\Http\Controllers;

use App\Models\Empleado;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage; //Para borrar imagen

class EmpleadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /**
         * Almacena los primeros 5 registros de la BD en 'empleados'
         * la variable 'empleados' se usara en index.blade para
         * acceder a los datos
         * 
        */
        $datos['empleados']=Empleado::paginate(5);

        //Accede a la vista -> empleado -> index.blade.php, le pasa los datos
        return view('empleado.index', $datos);
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
    public function edit($id)
    {
        //Se busca la informacion a partir del id
        $empleado = Empleado::findOrFail($id);
        //Retorna a la vista edit.blade, pasando la informacion del empleado
        return view('empleado.edit', compact('empleado'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //Almacena todo menos el token de seguridad (csrf) y el metodo(PATCH)
        $datosEmpleado = request()->except(['_token','_method']);

        if($request->hasFile('Foto')){ //Si el input Foto, tiene un archivo
            
            $empleado = Empleado::findOrFail($id); //Busca toda la informacion

            Storage::delete('public/'.$empleado->Foto); //Se borra la foto antigua

            $datosEmpleado['Foto'] = $request->file('Foto')->store('uploads', 'public'); //Se guarda la nueva foto
        }

        //Si el id coincide, se actualizan los datos
        Empleado::where('id','=',$id)->update($datosEmpleado);

        /*Se busca la informacion a partir del id
        $empleado = Empleado::findOrFail($id);
        //Retorna a la vista edit.blade, pasando la informacion del empleado (actualizada)
        return view('empleado.edit', compact('empleado'));*/
        return redirect('empleado'); //Se redirecciona a empleado
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //Elimina los datos del id
        Empleado::destroy($id);
        return redirect('empleado'); //Se redirecciona a empleado
    }
}
