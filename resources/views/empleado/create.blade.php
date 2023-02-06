{{-- Plantilla:  Cabecera Log --}}
@extends('layouts.app')
@section('content')
<div class="container">

    {{-- enctype: permite enviar fotos/archivos --}}
    {{-- La informacion se envia a empleado (automaticamente va a empleado.store) --}}
    <form action="{{ url('/empleado') }}" method="post" enctype="multipart/form-data">

        @csrf {{-- Llave de seguridad de Laravel al enviar formulario --}}

        {{-- Se utiliza el codigo de views/empleado/form 
            Se manda mensaje para cambiar lo que dice el boton --}}
        @include('empleado.form',['modo'=>'Crear'])

    </form>
</div>
@endsection
