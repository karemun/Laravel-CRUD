
{{-- Se obtiene la informacion del empleado a partir del id --}}
<form action="{{ url('/empleado/'.$empleado->id) }}" method="post" enctype="multipart/form-data">
    @csrf

    {{-- PATH: actualizar los datos --}}
    {{ method_field('PATCH') }}

    {{-- Se utiliza el codigo de views/empleado/form 
         Se manda mensaje para cambiar lo que dice el boton --}}
    @include('empleado.form',['modo'=>'Editar'])
</form>