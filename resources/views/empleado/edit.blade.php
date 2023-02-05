
{{-- Se obtiene la informacion del empleado a partir del id --}}
<form action="{{ url('/empleado/'.$empleado->id) }}" method="post" enctype="multipart/form-data">
    @csrf

    {{-- PATH: actualizar los datos --}}
    {{ method_field('PATCH') }}

    @include('empleado.form') {{-- Se utiliza el codigo de views/empleado/form --}}
</form>