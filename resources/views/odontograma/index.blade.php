@extends('vuexy.layouts.default', ['activePage' => 'espec'])
@section('title','Especialidades')
@push('css-vendor')
<link rel="stylesheet" href="{!! asset('odontograma/css/main.css" type="text/css') !!}" />
    <!-- BEGIN: Odontograma CSS-->
    <link rel="stylesheet" type="text/css" href="{!! asset('odontograma/css/estilosOdontograma.css') !!}">
    <!-- END: Odontograma CSS-->
    <script src="{!! asset('odontograma/scripts/jquery-2.1.4.js') !!}"></script>
    <script src="{!! asset('odontograma/scripts/angular.js') !!}"></script>
@endpush
@section('content')
<div id="text" >
    <form method="POST" id="form1">
        <table>
            <tr>
                <td>Buscar por DNI</td>
                <td><input type="text" id="txtbuscar" name="txtbuscar"/></td>
                <td colspan="3"><input type="button" id="btnbuscar" name="btnbuscar" value="Buscar" /></td>
            </tr>
            <tr>
                <td>Nombre</td>
                <td><input type="text" id="txtnombre" disabled value="" name="txtnombre"/><input type="hidden" id="txtcodigo" value=""/></td>
                <td>apellido paterno</td>
                <td><input type="text" id="txtapellidopaterno" disabled value="" name="txtapellidopaterno"/></td>
                <td>apellido materno</td>
                <td><input type="text" id="txtapellidomaterno" disabled value="" name="txtapellidomaterno"/></td>
            </tr>
        </table>
    </form> </div>
    <odontogramageneral></odontogramageneral>
</div>
@endsection

@push('scripts-vendor')


<script src="{{ asset('odontograma/scripts/modulos/app.js') }}"></script>
<script src="{{ asset('odontograma/scripts/controladores/controller.js') }}"></script>
<script src="{{ asset('odontograma/scripts/directivas/canvasodontograma.js') }}"></script>
<script src="{{ asset('odontograma/scripts/directivas/opcionescanvas.js') }}"></script>
<script src="{{ asset('odontograma/scripts/directivas/odontogramaGeneral.js') }}"></script>

@endpush
@push('scripts-page')
<script>
    $btnbuscar = $('#btnbuscar');
    $txtbuscar = $('#txtbuscar');
    $txtnombre = $('#txtnombre');
    $txtapellidopaterno = $('#txtapellidopaterno');
    $txtapellidomaterno = $('#txtapellidomaterno');
    $txtcodigo = $('#txtcodigo');
    $btnbuscar.click(function(){
        $.ajax({
            url:'odontogramaRegistros.php',
            dataType:'json',
            type:'POST',
            data:{dni:$txtbuscar.val()},
            success:function(data)
            {
                $txtnombre.val(data[0].nombre);
                $txtapellidopaterno.val(data[0].apellido_paterno);
                $txtapellidomaterno.val(data[0].apellido_materno);
                $txtcodigo.val(data[0].cod_persona);
            }
        });
    });
</script>
@endpush
