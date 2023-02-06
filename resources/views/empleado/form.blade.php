<h1>{{ $modo }} empleado</h1>

{{-- Si hay errores --}}
@if(count($errors)>0)
    <div class="alert alert-danger" role="alert">
        <ul>
            {{-- Se muestra cada un en lista --}}
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="form-group">
    {{-- En value se pasan los datos en caso de edit --}}
    <label for="Nombre">Nombre</label>
    <input type="text" name="Nombre" class="form-control" 
    {{-- Si existe el valor, imprime, sino, el ultimo escrito --}}
    value="{{ isset($empleado->Nombre)?$empleado->Nombre:old('Nombre') }}"
    id="Nombre"/>
    <br>
</div>

<div class="form-group">
    <label for="ApellidoPaterno">Apellido Paterno</label>
    <input type="text" name="ApellidoPaterno" class="form-control" 
    value="{{ isset($empleado->ApellidoPaterno)?$empleado->ApellidoPaterno:old('ApellidoPaterno') }}" id="ApellidoPaterno">
    <br>
</div>

<div class="form-group">
    <label for="ApellidoMaterno">Apellido Materno</label>
    <input type="text" name="ApellidoMaterno" class="form-control" 
    value="{{ isset($empleado->ApellidoMaterno)?$empleado->ApellidoMaterno:old('ApellidoMaterno') }}" id="ApellidoMaterno">
    <br>
</div>

<div class="form-group">
    <label for="Correo">Correo</label>
    <input type="text" name="Correo" class="form-control" 
    value="{{ isset($empleado->Correo)?$empleado->Correo:old('Correo') }}" id="Correo">
    <br>
</div>

<div class="form-group">
    <label for="Foto"></label>
    {{-- Si existe, se muestra la imagen --}}
    @if(isset($empleado->Foto))
        <img src="{{ asset('storage').'/'.$empleado->Foto }}" alt="Imagen de perfil" width="100" class="img-thumbnail img-fluid">
    @endif
    <input type="file" name="Foto" id="Foto" class="form-control">
    <br>
</div>

{{-- Se puede modificar texto en modo --}}
<input type="submit" value="{{ $modo }} datos" class="btn btn-success">

<a href="{{ url('empleado') }}" class="btn btn-primary">Regresar</a>

<br>