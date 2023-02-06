{{-- Plantilla:  Cabecera Log --}}
@extends('layouts.app')
@section('content')
<div class="container">

    {{-- Si hay un mensaje: en caso de eliminar o editar --}}
    @if (Session::has('mensaje'))
        {{-- Muestra el mensaje --}}
        {{ Session::get('mensaje') }}
    @endif

    <a href="{{ url('empleado/create') }}">Registrar nuevo empleado</a>

    <table class="table table-light">

        <thead class="thead-light">
            <tr>
                <th>#</th>
                <th>Foto</th>
                <th>Nombre</th>
                <th>Apellido Paterno</th>
                <th>Apellido Materno</th>
                <th>Correo</th>
                <th>Acciones</th>
            </tr>
        </thead>

        <tbody>
            {{-- Se usa la variable $empleados de la funcion index del controllador --}}
            @foreach ($empleados as $empleado)
            <tr>
                <td>{{ $empleado->id }}</td>

                <td>
                    {{-- Se accede a la imagen almacenada en storage/app/public/uploads
                        Comando para dar acceso: php artisan storage:link  --}}
                    <img src="{{ asset('storage').'/'.$empleado->Foto }}" alt="Imagen de perfil" width="100">
                </td>

                <td>{{ $empleado->Nombre }}</td>
                <td>{{ $empleado->ApellidoPaterno }}</td>
                <td>{{ $empleado->ApellidoMaterno }}</td>
                <td>{{ $empleado->Correo }}</td>
                <td>
                    {{-- Enlace Editar: se manda el id del empleado y lleva a edit.blade 
                        Se ejecuta en automatico la funcion edit del controllador     --}}
                    <a href="{{ url('/empleado/'.$empleado->id.'/edit') }}">
                        Editar
                    </a>

                    | 
                    
                    {{-- Formulario Borrar: se manda el id del empleado a eliminar 
                        Se ejecuta en automatico la funcion destroy del controllador   --}}
                    <form action="{{ url('/empleado/'.$empleado->id) }}" method="post">
                        @csrf
                        {{-- Transformar metodo POST a DELETE --}}
                        {{ method_field('DELETE') }}
                        {{-- onclick: js para preguntar confirmacion --}}
                        <input type="submit" onclick="return confirm('¿Quieres borrar?')" value="Borrar">
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>

    </table>
</div>
@endsection
