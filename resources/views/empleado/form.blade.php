
<h1>{{ $modo }} empleado</h1>

{{-- En value se pasan los datos en caso de edit --}}
<label for="Nombre">Nombre</label>
<input type="text" name="Nombre" 
value="{{ isset($empleado->Nombre)?$empleado->Nombre:'' }}" {{-- Si existe el valor, imprime, sino, nada --}}
id="Nombre">
<br>

<label for="ApellidoPaterno">Apellido Paterno</label>
<input type="text" name="ApellidoPaterno" value="{{ isset($empleado->ApellidoPaterno)?$empleado->ApellidoPaterno:'' }}" id="ApellidoPaterno">
<br>

<label for="ApellidoMaterno">Apellido Materno</label>
<input type="text" name="ApellidoMaterno" value="{{ isset($empleado->ApellidoMaterno)?$empleado->ApellidoMaterno:'' }}" id="ApellidoMaterno">
<br>

<label for="Correo">Correo</label>
<input type="text" name="Correo" value="{{ isset($empleado->Correo)?$empleado->Correo:'' }}" id="Correo">
<br>

<label for="Foto">Foto</label>
{{-- Si existe, se muestra la imagen --}}
@if(isset($empleado->Foto))
    <img src="{{ asset('storage').'/'.$empleado->Foto }}" alt="Imagen de perfil" width="100">
@endif
<input type="file" name="Foto" id="Foto">
<br>

{{-- Se puede modificar texto en modo --}}
<input type="submit" value="{{ $modo }} datos">

<a href="{{ url('empleado') }}">Regresar</a>

<br>