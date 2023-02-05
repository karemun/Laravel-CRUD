Formulario de creacion de empleado

{{-- enctype: permite enviar fotos/archivos --}}
{{-- La informacion se envia a empleado (automaticamente va a empleado.store) --}}
<form action="{{ url('/empleado') }}" method="post" enctype="multipart/form-data">

    @csrf {{-- Llave de seguridad de Laravel al enviar formulario --}}

    @include('empleado.form') {{-- Se utiliza el codigo de views/empleado/form --}}

</form>