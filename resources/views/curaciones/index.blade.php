@extends('vuexy.layouts.default', ['activePage' => 'curaciones'])
@section('title','Consultas')
@push('css-vendor')
    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="{!! asset('app-assets/vendors/css/tables/datatable/dataTables.bootstrap5.min.css') !!}">
    <link rel="stylesheet" type="text/css" href="{!! asset('app-assets/vendors/css/tables/datatable/responsive.bootstrap5.min.css') !!}">
    <link rel="stylesheet" type="text/css" href="{!! asset('app-assets/vendors/css/tables/datatable/buttons.bootstrap5.min.css') !!}">
    <link rel="stylesheet" type="text/css" href="{!! asset('app-assets/vendors/css/tables/datatable/rowGroup.bootstrap5.min.css') !!}">
    <link rel="stylesheet" type="text/css" href="{!! asset('app-assets/vendors/css/pickers/flatpickr/flatpickr.min.css') !!}">
    <!-- END: Vendor CSS-->
    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="{!! asset('app-assets/vendors/css/animate/animate.min.css') !!}">
    <link rel="stylesheet" type="text/css" href="{!! asset('app-assets/vendors/css/extensions/sweetalert2.min.css') !!}">
    <!-- END: Vendor CSS-->
    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="{!! asset('app-assets/css/plugins/extensions/ext-component-sweet-alerts.css') !!}">
    <!-- END: Page CSS-->
    <link rel="stylesheet" type="text/css" href="{!! asset('app-assets/vendors/css/forms/select/select2.min.css') !!}">
    <link rel="stylesheet" type="text/css" href="{!! asset('app-assets/vendors/css/pickers/pickadate/pickadate.css') !!}">
    <link rel="stylesheet" type="text/css" href="{!! asset('app-assets/vendors/css/pickers/flatpickr/flatpickr.min.css') !!}">
    <link rel="stylesheet" type="text/css" href="{!! asset('app-assets/css/plugins/forms/pickers/form-flat-pickr.css') !!}">
    <link rel="stylesheet" type="text/css" href="{!! asset('app-assets/css/plugins/forms/pickers/form-pickadate.css') !!}">
    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="{!! asset('app-assets/vendors/css/pickers/pickadate/pickadate.css') !!}">
    <link rel="stylesheet" type="text/css" href="{!! asset('app-assets/vendors/css/pickers/flatpickr/flatpickr.min.css') !!}">
    <link rel="stylesheet" type="text/css" href="{!! asset('app-assets/css/plugins/forms/pickers/form-flat-pickr.css') !!}">
    <link rel="stylesheet" type="text/css" href="{!! asset('app-assets/css/plugins/forms/pickers/form-pickadate.css') !!}">
@endpush
@section('content')
<div class="content-wrapper p-0">
    <div class="content-body">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header border-bottom">
                        <h4 >
                            Consultas
                        </h4>
                        <div class="pull-right">
                            <div class="input-group-prepend pull-right btnagregar">
                                {{-- <a href="{{route('nueva.consulta')}}"  class="btn btn-sm btn-primary">
                                    <i data-feather='plus'></i>
                                    Nuevo
                                </a> --}}
                                @can('crear-curacion')
                                <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#modal-message">
                                    <i data-feather='plus'></i>
                                    Nuevo
                                </button>
                                @endcan
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="table-responsive listaregistros">
                                        <table class="table table-striped table-bordered table-td-valign-middle dt-responsive" id="dt-ListaEspec">
                                            <thead class="thead">
                                                <tr>

                                                    <th>C.I. Paciente</th>
                                                    <th>Paciente</th>
                                                    <th>Doctor</th>
                                                    <th>Diagnosticos</th>
                                                    <th>Costo Total</th>
                                                    <th>Total Pagado</th>
                                                    <th>Estado</th>
                                                    <th >Action</th>
                                                </tr>
                                            </thead>
                                            <tbody >

                                            </tbody>
                                        </table>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="modal-message">
    <div class="modal-dialog" style="max-width: 40%;" role="document">
        <div class="modal-content" >
            <div class="modal-header">
                <h4 class="modal-title">Nueva consulta</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <form onSubmit="return false" id="formAdd" action="{{ route('guardar_consulta') }}">
                <div class="modal-body">
                    {{ csrf_field() }}
                    <div class="alert alert-danger print-error-msg" style="display:none">
                        <ul></ul>
                    </div>
                    <input type="hidden" value="" name="id_paciente" id="id_paciente">
                    <div class="form-group row">
                        <div class="col-md-12 text-center">
                            <div class="row">
                                <div class="col-md-8 offset-sm-3">
                                    <div class="mb-1 ">
                                        <div class="input-group " >
                                            <span class="input-group-text" >C.I.</span>
                                            <input type="text" class="form-control" name="ci" id="ci"/>
                                            <button type="button" class="btn btn-primary" onclick="f_buscar()"><i class="fa fa-search-minus"></i> Buscar</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row ">
                                <div class="col-md-12">
                                    <div class="mb-1">
                                        <div class="input-group " >
                                            <span class="input-group-text">
                                                Nombre(s)
                                            </span>
                                            <input type="text" class="form-control" id="nombres" name="nombres" placeholder="Nombres" value="" disabled/>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row ">
                                <div class="col-md">
                                    <div class="mb-1">
                                        <div class="input-group" >
                                            <span class="input-group-text">
                                                Ap. Paterno
                                            </span>
                                            <input type="text" class="form-control" id="paterno" name="paterno" placeholder="Apellido Paterno" value="" disabled/>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row ">
                                <div class="col-md">
                                    <div class="mb-1">
                                        <div class="input-group" >
                                            <span class="input-group-text">
                                                Ap. Materno
                                            </span>
                                            <input type="text" class="form-control" id="materno" name="materno" placeholder="Apellido Materno" value="" disabled/>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md">
                                    <div class="mb-1">
                                        <div class="input-group" >
                                            <span class="input-group-text">
                                                Diagnostico
                                            </span>
                                            <input type="text" class="form-control" placeholder="Diagnostico" name="diagnostico"  />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md">
                                    <div class="mb-1">
                                        <div class="input-group" >
                                            <span class="input-group-text">
                                                Medicamentos
                                            </span>
                                            <input type="text" class="form-control" placeholder="Medicamentos" name="medicamentos" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row ">
                                <div class="col-md">
                                    <div class="mb-1">
                                        <div class="input-group " >
                                            <span class="input-group-text">
                                                Alergias
                                            </span>
                                            <input type="text" class="form-control" placeholder="Alergias" name="alergias"  />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row ">
                                <div class="col-md">
                                    <div class="mb-1">
                                        <div class="input-group " >
                                            <span class="input-group-text">
                                                Enfermedades
                                            </span>
                                            <input type="text" class="form-control" placeholder="Enfermedades" name="enfermedades" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row row-space-10">
                                <div class="col-md">
                                    <div class="mb-1">
                                        <div class="input-group " >
                                            <span class="input-group-text">
                                                Fecha Ini.
                                            </span>
                                            <input type="text"  name="f_inicio" class="form-control flatpickr-basic" placeholder="YYYY-MM-DD" value="{{ old('fecha_inicio', date('Y-m-d')) }}" data-date-format="Y-m-d"/>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md">
                                    <div class="mb-1">
                                        <div class="input-group" >
                                            <span class="input-group-text">
                                                Fecha Fin
                                            </span>
                                            <input type="text" name="f_fin" class="form-control flatpickr-basic" placeholder="YYYY-MM-DD" value="{{ old('fecha_fin', date('Y-m-d')) }}" data-date-format="Y-m-d"/>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row row-space-10">
                                <div class="col-md">
                                    <div class="mb-1">
                                        <div class="input-group" >
                                            <span class="input-group-text">
                                                Costo Total
                                            </span>
                                            <input type="text" class="form-control" name="costo" placeholder="Costo Total" value="" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                </div>
                <div class="modal-footer">
                    <a href="javascript:;" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-times-circle"></i> Cerrar</a>
                    <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Guardar</button>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="modal fade" id="modal-editar">
    <div class="modal-dialog" style="max-width: 40%;" role="document">
        <div class="modal-content" >
            <div class="modal-header">
                <h4 class="modal-title">Editar consulta</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <form onSubmit="return false" id="formEdit" action="{{ route('editar_consulta') }}">
                <div class="modal-body">
                    {{ csrf_field() }}
                    <div class="alert alert-danger print-error-msg" style="display:none">
                        <ul></ul>
                    </div>
                    <input type="hidden" value="" name="id_paciente" id="id_pac">
                    <input type="hidden" value="" name="id_consulta" id="id_edit">
                    <div class="form-group row">
                        <div class="col-md-12 text-center">
                            <div class="row">
                                <div class="col-md-8 offset-sm-3">
                                    <div class="mb-1 ">
                                        <div class="input-group " >
                                            <span class="input-group-text" >C.I.</span>
                                            <input type="text" class="form-control" name="ci" id="carnet"/>
                                            <button type="button" class="btn btn-primary" onclick="f_buscar2()"><i class="fa fa-search-minus"></i> Buscar</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row ">
                                <div class="col-md-12">
                                    <div class="mb-1">
                                        <div class="input-group " >
                                            <span class="input-group-text">
                                                Nombre(s)
                                            </span>
                                            <input type="text" class="form-control" id="nombre_paciente" name="nombres" placeholder="Nombres" value="" disabled/>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row ">
                                <div class="col-md">
                                    <div class="mb-1">
                                        <div class="input-group" >
                                            <span class="input-group-text">
                                                Ap. Paterno
                                            </span>
                                            <input type="text" class="form-control" id="paterno_paciente" name="paterno" placeholder="Apellido Paterno" value="" disabled/>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row ">
                                <div class="col-md">
                                    <div class="mb-1">
                                        <div class="input-group" >
                                            <span class="input-group-text">
                                                Ap. Materno
                                            </span>
                                            <input type="text" class="form-control" id="materno_paciente" name="materno" placeholder="Apellido Materno" value="" disabled/>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md">
                                    <div class="mb-1">
                                        <div class="input-group" >
                                            <span class="input-group-text">
                                                Diagnostico
                                            </span>
                                            <input type="text" class="form-control" placeholder="Diagnostico" name="diagnostico" id="diagnostico" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md">
                                    <div class="mb-1">
                                        <div class="input-group" >
                                            <span class="input-group-text">
                                                Medicamentos
                                            </span>
                                            <input type="text" class="form-control" placeholder="Medicamentos" name="medicamentos" id="medicamentos"/>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row ">
                                <div class="col-md">
                                    <div class="mb-1">
                                        <div class="input-group " >
                                            <span class="input-group-text">
                                                Alergias
                                            </span>
                                            <input type="text" class="form-control" placeholder="Alergias" name="alergias" id="alergias" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row ">
                                <div class="col-md">
                                    <div class="mb-1">
                                        <div class="input-group " >
                                            <span class="input-group-text">
                                                Enfermedades
                                            </span>
                                            <input type="text" class="form-control" placeholder="Enfermedades" name="enfermedades" id="enfermedades"/>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row row-space-10">
                                <div class="col-md">
                                    <div class="mb-1">
                                        <div class="input-group " >
                                            <span class="input-group-text">
                                                Fecha Ini.
                                            </span>
                                            <input type="text" id="inicio" name="f_inicio" class="form-control flatpickr-basic" placeholder="YYYY-MM-DD" value="{{ old('fecha_inicio', date('Y-m-d')) }}" data-date-format="Y-m-d"/>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md">
                                    <div class="mb-1">
                                        <div class="input-group" >
                                            <span class="input-group-text">
                                                Fecha Fin
                                            </span>
                                            <input type="text" id="fin" name="f_fin" class="form-control flatpickr-basic" placeholder="YYYY-MM-DD" value="{{ old('fecha_fin', date('Y-m-d')) }}" data-date-format="Y-m-d"/>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row row-space-10">
                                <div class="col-md">
                                    <div class="mb-1">
                                        <div class="input-group" >
                                            <span class="input-group-text">
                                                Costo Total
                                            </span>
                                            <input type="text" class="form-control" id="costo" name="costo" placeholder="Costo Total" value="" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row row-space-10">
                                <div class="col-md">
                                    <div class="mb-1">
                                        <div class="input-group" >
                                            <span class="input-group-text">
                                                Estado
                                            </span>
                                            <select name="estado" id="estado" class="form-control">
                                                <option value="PROCESO">EN PROCESO</option>
                                                <option value="CONCLUIDO">CONCLUIDO</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                </div>
                <div class="modal-footer">
                    <a href="javascript:;" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-times-circle"></i> Cerrar</a>
                    <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Guardar</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- modal -->
<div class="modal fade" id="modal-reporte">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="titulo"><i class="fa fa-file-pdf" ></i> Generar Reporte </h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">X</button>
            </div>
            <div class="modal-body">
                <div class="alert alert-danger print-error-msg" style="display:none">
                    <ul></ul>
                </div>
                <div class="form-group row m-b-15">
                    <label class="col-md-3 col-sm-3 col-form-label" for="message">Tipo de Reporte: </label>
                    <div class="col-md-8 col-sm-8">
                        <select class="form-select" name="tipoReporte" id="tipoReporte">
                            <option value="ATEDIDOS">PACIENTES ATENDIDOS</option>
                            <option value="GANANCIA">GANANCIAS</option>
                        </select>

                    </div>
                </div>
                <div class="form-group row m-b-15">
                    <label class="col-md-3 col-sm-3 col-form-label" for="message">Fecha: </label>
                    <div class="col-md-8 col-sm-8">
                        <input type="text" id="fecha" class="form-control flatpickr-range" placeholder="YYYY-MM-DD a YYYY-MM-DD" />
                    </div>

                </div>
            </div>
            <div class="modal-footer">
                <a href="javascript:;" class="btn btn-secondary" data-dismiss="modal">Cancelar</a>
                <button type='button' onclick="f_imprimir()" class="btn btn-success"><i class="fa fa-file-pdf" ></i> Generar</button>
            </div>
        </div>
    </div>
</div>
<!-- end modal -->
@endsection

@push('scripts-vendor')
    <!-- BEGIN: Page Vendor JS-->
    <script src="{!! asset('app-assets/vendors/js/tables/datatable/jquery.dataTables.min.js') !!}"></script>
    <script src="{!! asset('app-assets/vendors/js/tables/datatable/dataTables.bootstrap5.min.js') !!}"></script>
    <script src="{!! asset('app-assets/vendors/js/tables/datatable/dataTables.responsive.min.js') !!}"></script>
    <script src="{!! asset('app-assets/vendors/js/tables/datatable/responsive.bootstrap5.min.js') !!}"></script>
    <script src="{!! asset('app-assets/vendors/js/tables/datatable/datatables.checkboxes.min.js') !!}"></script>
    <script src="{!! asset('app-assets/vendors/js/tables/datatable/datatables.buttons.min.js') !!}"></script>
    <script src="{!! asset('app-assets/vendors/js/tables/datatable/jszip.min.js') !!}"></script>
    <script src="{!! asset('app-assets/vendors/js/tables/datatable/pdfmake.min.js') !!}"></script>
    <script src="{!! asset('app-assets/vendors/js/tables/datatable/vfs_fonts.js') !!}"></script>
    <script src="{!! asset('app-assets/vendors/js/tables/datatable/buttons.html5.min.js') !!}"></script>
    <script src="{!! asset('app-assets/vendors/js/tables/datatable/buttons.bootstrap5.min.js') !!}"></script>
    <script src="{!! asset('app-assets/vendors/js/tables/datatable/buttons.print.min.js') !!}"></script>
    <script src="{!! asset('app-assets/vendors/js/tables/datatable/dataTables.rowGroup.min.js') !!}"></script>
    <script src="{!! asset('app-assets/vendors/js/tables/datatable/rowGroup.bootstrap5.min.js') !!}"></script>
    <script src="{!! asset('app-assets/vendors/js/tables/datatable/dataTables.select.min.js') !!}"></script>
    <script src="{!! asset('app-assets/vendors/js/pickers/flatpickr/flatpickr.min.js') !!}"></script>
    <!-- END: Page Vendor JS-->
    <!-- BEGIN: Page JS-->
    <script src="{!! asset('app-assets/vendors/js/extensions/sweetalert2.all.min.js') !!}"></script>
    <script src="{!! asset('app-assets/vendors/js/extensions/polyfill.min.js') !!}"></script>
    <script src="{!! asset('app-assets/js/scripts/extensions/ext-component-sweet-alerts.js') !!}"></script>
    <!-- END: Page JS-->
    <!-- BEGIN: Page Vendor JS-->
    <script src="{!! asset('app-assets/vendors/js/pickers/pickadate/picker.js') !!}"></script>
    <script src="{!! asset('app-assets/vendors/js/pickers/pickadate/picker.date.js') !!}"></script>
    <script src="{!! asset('app-assets/vendors/js/pickers/pickadate/picker.time.js') !!}"></script>
    <script src="{!! asset('app-assets/vendors/js/pickers/pickadate/legacy.js') !!}"></script>
    <script src="{!! asset('app-assets/vendors/js/pickers/flatpickr/flatpickr.min.js') !!}"></script>
    <!-- END: Page Vendor JS-->
    <!-- BEGIN: Page JS-->
    <script src="{!! asset('app-assets/js/scripts/forms/pickers/form-pickers.js') !!}"></script>
    <!-- END: Page JS-->

@endpush
@push('scripts-page')
<script>
                //dom: '<"dataTables_wrapper dt-bootstrap"<"row"<"col-xl-7 d-block d-sm-flex d-xl-block justify-content-center"<"d-block d-lg-inline-flex mr-0 mr-sm-3"l><"d-block d-lg-inline-flex"B>><"col-xl-5 d-flex d-xl-block justify-content-center"fr>>t<"row"<"col-sm-5"i><"col-sm-7"p>>>',
$(document).ready( function () {
    $('#dt-ListaEspec').DataTable({
        dom: '<"dataTables_wrapper dt-bootstrap"<"row"<"col-xl-7 d-block d-sm-flex d-xl-block justify-content-center"<"d-block d-lg-inline-flex mr-0 mr-sm-3"l><"d-block d-lg-inline-flex"B>><"col-xl-5 d-flex d-xl-block justify-content-center"fr>>t<"row"<"col-sm-5"i><"col-sm-7"p>>>',
        language: {
            "url": "/app-assets/js/scripts/tables/spanish.json"
        },
        buttons: [
            {
                text: '<i class="fas fa-print"></i> Reporte',
                action: function (e, dt, node, config ){
                    generar_reporte();
                },
                className: 'btn_personalizado'
            }
        ],
        "ajax": {
            url: "{{route('lista.consultas')}}",
            type: 'GET',
        },
        columns: [
                    { data: 'ci_paciente', name: 'ci_paciente'},
                    { data: 'nombre_paciente' , name: 'nombre_paciente'},
                    { data: 'nombre_doctor' , name: 'nombre_doctor'},
                    { data: 'diagnostico' , name: 'diagnostico'},
                    {data: 'costo_total', name: 'costo_total'},
                    {data: 'total_pagado', name: 'total_pagado'},
                    {data: 'estado', name: 'estado',
                        render: function(data, type, row, meta) {
                            return data === 'PROCESO' ?
                                '<span class="badge bg-success">PROCESO</span>' :
                                '<span class="badge bg-primary">CONCLUIDO</span>';
                        }
                    },
                { data: 'botones', "orderable": false}
        ],
        error: function(jqXHR, textStatus, errorThrown){
            $("#dt-ListaEspec").DataTable().clear().draw();
        }
    });
    function generar_reporte(){
        $('#modal-reporte').modal('toggle');
    }

});
function f_imprimir(){
    let fecha=$('#fecha').val();
    let tipo_reporte=$('#tipoReporte').val();
    window.open(URL_BASE+"/reporte/fecha?fecha="+fecha+"&tipo="+tipo_reporte) ;
}
function f_buscar(){
    let nombres = document.getElementById('nombres');
    let paterno = document.getElementById('paterno');
    let materno = document.getElementById('materno');
    let paciente = document.getElementById('id_paciente');
    var ci=$('#ci').val();
    $.ajax({
        url: `/curaciones/buscar-paciente/${ci}`,
        type: 'GET',
        data: {},
        success: function(data)
        {
            if(data){
                nombres.value = data.nombres;
                paterno.value = data.paterno;
                materno.value = data.materno;
                paciente.value = data.id;
            }else{
                Swal.fire({
                    icon: "error",
                    title: "Error",
                    text: "No se encontro el C.I."
                });
            }
        }
    });
}
function f_buscar2(){
    let nombres = document.getElementById('nombre_paciente');
    let paterno = document.getElementById('paterno_paciente');
    let materno = document.getElementById('materno_paciente');
    let paciente = document.getElementById('id_pac');
    var ci=$('#carnet').val();
    $.ajax({
        url: `/curaciones/buscar-paciente/${ci}`,
        type: 'GET',
        data: {},
        success: function(data)
        {
            if(data){
                nombres.value = data.nombres;
                paterno.value = data.paterno;
                materno.value = data.materno;
                paciente.value = data.id;
            }else{
                Swal.fire({
                    icon: "error",
                    title: "Error",
                    text: "No se encontro el C.I."
                });
            }
        }
    });
}
function f_editar_consulta(id,diagnostico,medicamentos,alergias,enfermedades,estado,fecha_inicio,fecha_final,costo_total,id_paciente,ci_paciente,nom_paciente,pat_paciente,mat_paciente){
    document.getElementById('id_edit').value=id;
    document.getElementById('nombre_paciente').value=nom_paciente;
    document.getElementById('paterno_paciente').value=pat_paciente;
    document.getElementById('materno_paciente').value=mat_paciente;
    document.getElementById('id_pac').value=id_paciente;
    document.getElementById('carnet').value=ci_paciente;
    document.getElementById('diagnostico').value=diagnostico;
    document.getElementById('medicamentos').value=medicamentos;
    document.getElementById('alergias').value=alergias;
    document.getElementById('enfermedades').value=enfermedades;
    document.getElementById('costo').value=costo_total;
    document.getElementById('inicio').value=fecha_inicio;
    document.getElementById('fin').value=fecha_final;
    $('#modal-editar').modal('toggle');
}
$(document).on("submit" ,"#formEdit", function(e){
        $.ajaxSetup({
            header: $('meta[name="_token"]').attr('content')
        });
        e.preventDefault(e);
        $.ajax({
            type: 'POST',
            url: $(this).attr('action'),
            data: $(this).serialize(),
            dataType: 'json',
            cache: false,
        }).done(function (data) {
            if (data.error) {
                printErrorMsg(data,1);
            } else {
                if(data[0]==='OK'){
                    Swal.fire({
                        type: "success",
                        title: "¡Modificado Correctamente!",
                        showConfirmButton: true,
                        confirmButtonText: "Ok"

                    })
                    $('#modal-editar').modal('hide');
                }else{
                    Swal.fire({
                        icon: "error",
                        title: "Error",
                        text: data[0]
                    });
                }
                $(".print-error-msg").css('display','none');//ocultar div de errores
            }
            $('#dt-ListaEspec').DataTable().ajax.reload();
        });
    });
$(document).on("submit" ,"#formAdd", function(e){
        $.ajaxSetup({
            header: $('meta[name="_token"]').attr('content')
        });
        e.preventDefault(e);
        $.ajax({
            type: 'POST',
            url: $(this).attr('action'),
            data: $(this).serialize(),
            dataType: 'json',
            cache: false,
        }).done(function (data) {
            if (data.error) {
                printErrorMsg(data,1);
            } else {
                if(data[0]==='OK'){
                    Swal.fire({
                        type: "success",
                        title: "¡Registrado Correctamente!",
                        showConfirmButton: true,
                        confirmButtonText: "Ok"

                    })
                    $('#modal-message').modal('hide');
                }else{
                    Swal.fire({
                        icon: "error",
                        title: "Error",
                        text: data[0]
                    });
                }
                $(".print-error-msg").css('display','none');//ocultar div de errores
            }
            $('#dt-ListaEspec').DataTable().ajax.reload();
        });
    });
function printErrorMsg (msg,accion) {
    if(accion==1){
        $(".print-error-msg").find("ul").html('');
        $(".print-error-msg").css('display','block');
        $.each( msg.error, function( key, value ) {//mostrar la lista de errores
            $(".print-error-msg").find("ul").append('<li>'+value+'</li>');
        });
    }
    else{
        $(".print-error-msg-edit").find("ul").html('');
        $(".print-error-msg-edit").css('display','block');
        $.each( msg.error, function( key, value ) {//mostrar la lista de errores
            $(".print-error-msg-edit").find("ul").append('<li>'+value+'</li>');
        });
    }
}
</script>
@endpush
