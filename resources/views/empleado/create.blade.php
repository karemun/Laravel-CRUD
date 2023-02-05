Formulario de creacion de empleado

{{-- enctype: permite enviar fotos/archivos --}}
{{-- La informacion se envia a empleado (automaticamente va a empleado.store) --}}
<form action="{{ url('/empleado') }}" method="post" enctype="multipart/form-data">

    @csrf {{-- Llave de seguridad de Laravel al enviar formulario --}}

    <label for="Nombre">Nombre</label>
    <input type="text" name="Nombre" id="Nombre">
    <br>

    <label for="ApellidoPaterno">Apellido Paterno</label>
    <input type="text" name="ApellidoPaterno" id="ApellidoPaterno">
    <br>

    <label for="ApellidoMaterno">Apellido Materno</label>
    <input type="text" name="ApellidoMaterno" id="ApellidoMaterno">
    <br>

    <label for="Correo">Correo</label>
    <input type="text" name="Correo" id="Correo">
    <br>

    <label for="Foto">Foto</label>
    <input type="file" name="Foto" id="Foto">
    <br>

    <label for="Enviar">Enviar</label>
    <input type="submit" value="Guardar datos">
    <br>

</form>