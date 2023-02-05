Hola Mundo

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
            <td>{{ $empleado->Foto }}</td>
            <td>{{ $empleado->Nombre }}</td>
            <td>{{ $empleado->ApellidoPaterno }}</td>
            <td>{{ $empleado->ApellidoMaterno }}</td>
            <td>{{ $empleado->Correo }}</td>
            <td>Editar | 
            
            {{-- Formulario Borrar: se manda el id del empleado a eliminar --}}
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