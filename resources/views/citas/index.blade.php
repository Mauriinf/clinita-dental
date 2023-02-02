@extends('vuexy.layouts.default', ['activePage' => 'citas'])
@section('title','Citas')
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
@endpush
@section('content')
<div class="content-wrapper p-0">
    <div class="content-body">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header border-bottom">
                        <h4 >
                            Citas
                        </h4>
                        <div class="pull-right">
                            <div class="input-group-prepend pull-right btnagregar">
                                @can('crear-cita')
                                <a href="{{ url('crear/cita')}}" class="btn btn-sm btn-primary">
                                    <i data-feather='plus'></i>
                                    Nuevo
                                </a>
                                @endcan
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        @if (session('notificacion'))
                            <div class="alert alert-success" role="alert">
                            {{ session('notificacion') }}
                            </div>
                        @endif
                        <div class="row">
                            <ul class="nav nav-pills">
                                <li class="nav-item">
                                    <a class="nav-link active" id="home-tab" data-bs-toggle="pill" href="#home" aria-expanded="true">Proximas Citas</a>
                                </li>
                                {{-- <li class="nav-item">
                                    <a class="nav-link" id="confirmar-tab" data-bs-toggle="pill" href="#confirmar" aria-expanded="false">Citas por Confirmar</a>
                                </li> --}}
                                <li class="nav-item">
                                    <a class="nav-link" id="historial-tab" data-bs-toggle="pill" href="#historial" aria-expanded="false">Historial de Citas</a>
                                </li>
                            </ul>
                            <div class="tab-content">
                                <div role="tabpanel" class="tab-pane active" id="home" aria-labelledby="home-tab" aria-expanded="true">
                                    <table class="table table-striped table-bordered table-td-valign-middle dt-responsive" id="dt-CitasProximas">
                                        <thead class="thead">
                                            <tr>
                                                <th>Nº</th>
                                                <th>Paciente</th>
                                                <th>Descripción</th>
                                                <th>Médico</th>
                                                <th>Fecha</th>
                                                <th>Hora</th>
                                                @can('editar-cita')
                                                <th>Atendido</th>
                                                @endcan
                                                <th >Action</th>
                                            </tr>
                                        </thead>
                                        <tbody >
                                            @foreach ($citas_confirmadas as $row)
                                                <tr>
                                                <th >
                                                    {{ $loop->iteration }}
                                                </th>
                                                <td>
                                                    {{ $row->nombres_paciente }} {{ $row->paterno_paciente }} {{ $row->materno_paciente }}
                                                </td>
                                                <th >
                                                    {{ $row->descripcion }}
                                                </th>

                                                <td>
                                                    {{ $row->nombres_doctor }} {{ $row->paterno_doctor }} {{ $row->materno_doctor }}
                                                </td>
                                                <td >
                                                    @php
                                                        $date_cita = date('d/m/Y H:i:s', strtotime("$row->fecha $row->inicio"));
                                                        $date_actual = date('d/m/Y H:i:s', time());
                                                    @endphp
                                                    {{ $row->fecha }}
                                                </td>
                                                <td >
                                                    {{ $row->inicio }} - {{ $row->fin }}
                                                </td>
                                                @can('editar-cita')
                                                <td >
                                                    <label class="custom-toggle">
                                                        <form action="{{ route('cita.update.estado',$row->id) }}" id="form-estado{{$row->id}}" method="post">
                                                        @csrf
                                                        @method('PUT')
                                                        <input type="hidden" name="estado" value="{{($row->estado=='CONFIRMADO')?'ATENDIDO':'CONFIRMADO'}}">
                                                        <div class="form-check form-check-primary form-switch">
                                                            <input type="checkbox" class="form-check-input" {{ $row->estado=='ATENDIDO' ? 'checked' :"" }} onclick="event.preventDefault();
                                                            document.getElementById('form-estado<?php echo $row->id; ?>').submit();"/>
                                                        </div>
                                                        </form>
                                                    </label>

                                                </td>
                                                @endcan
                                                <td>
                                                    @php
                                                        date_default_timezone_set('America/La_Paz');
                                                        $fechahoy = date("Y-m-d");
                                                        $horahoy = date("H:i:s");
                                                        //echo (int)$horahoy-(int)$row->inicio;
                                                    @endphp
                                                    @can('editar-cita')
                                                        @role('Paciente')
                                                            @if ($row->fecha==$fechahoy && ((int)$row->inicio-(int)$horahoy)<=3 && ((int)$row->inicio-(int)$horahoy)>=0)
                                                                <button type="button" onclick="showError()" class="btn btn-sm  btn-primary" > Editar</button>
                                                            @else
                                                                <a class="btn btn-sm  btn-primary" href="{{ route('cita.edit',$row->id) }}">Editar</a>
                                                            @endif
                                                        @else
                                                            <a class="btn btn-sm  btn-primary" href="{{ route('cita.edit',$row->id) }}">Editar</a>
                                                        @endrole
                                                    @endcan
                                                    @role('Paciente')
                                                        @if ($row->fecha==$fechahoy && ((int)$row->inicio-(int)$horahoy)<=3 && ((int)$row->inicio-(int)$horahoy)>=0)
                                                            <button type="button" onclick="showError()" class="btn btn-warning btn-sm text-white" ><i data-feather='trash-2' ></i> Eliminar</button>
                                                        @else
                                                            <a href="javascript:void(0)"  class="btn btn-sm btn-danger" onclick="eliminar(<?php echo $row->id; ?>)"><i data-feather='trash-2' ></i>Eliminar</a>
                                                        @endif
                                                    @else
                                                        <a href="javascript:void(0)"  class="btn btn-sm btn-danger" onclick="eliminar(<?php echo $row->id; ?>)"><i data-feather='trash-2' ></i>Eliminar</a>
                                                    @endrole
                                                    <form id="delete-form" method="post" class="d-none">

                                                    @csrf
                                                    @method('DELETE')
                                                    </form>
                                                </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                {{-- <div class="tab-pane" id="confirmar" role="tabpanel" aria-labelledby="confirmar-tab" aria-expanded="false">
                                    <table class="table table-striped table-bordered table-td-valign-middle dt-responsive" id="dt-CitasConfirmar">
                                        <thead class="thead">
                                            <tr>
                                                <th>Nº</th>
                                                <th>Descripción</th>
                                                <th>Médico</th>
                                                <th>Fecha</th>
                                                <th>Hora</th>
                                                <th>Estado</th>
                                                <th >Action</th>
                                            </tr>
                                        </thead>
                                        <tbody >
                                            @foreach ($citas_pendientes as $row)
                                                <tr>
                                                <th >
                                                    {{ $loop->iteration }}
                                                </th>
                                                <th >
                                                    {{ $row->descripcion }}
                                                </th>
                                                <td>
                                                    {{ $row->nombres_doctor }} {{ $row->paterno_doctor }} {{ $row->materno_doctor }}
                                                </td>
                                                <td >
                                                    {{ $row->fecha }}
                                                </td>
                                                <td >
                                                    {{ $row->inicio }} - {{ $row->fin }}
                                                </td>
                                                <td >
                                                    {{ $row->estado }}
                                                </td>
                                                <td>
                                                    <a href="javascript:void(0)"  class="btn btn-sm btn-danger" onclick="eliminar(<?php echo $row->id; ?>)"><i data-feather='trash-2' ></i>Eliminar</a>

                                                    <form id="delete-form" method="post" class="d-none">

                                                    @csrf
                                                    @method('DELETE')
                                                    </form>
                                                </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div> --}}
                                <div class="tab-pane" id="historial" role="tabpanel" aria-labelledby="historial-tab" aria-expanded="false">
                                    <table class="table table-striped table-bordered table-td-valign-middle dt-responsive" id="dt-Historial">
                                        <thead class="thead">
                                            <tr>
                                                <th>Nº</th>
                                                <th>Paciente</th>
                                                <th>Especialidad</th>
                                                <th>Médico</th>
                                                <th>Fecha</th>
                                                <th>Hora</th>
                                                <th>Estado</th>
                                                <th >Action</th>
                                            </tr>
                                        </thead>
                                        <tbody >
                                            @foreach ($citas_anteriores as $row)
                                                <tr>
                                                <th >
                                                    {{ $loop->iteration }}
                                                </th>
                                                <td>
                                                    {{ $row->nombres_paciente }} {{ $row->paterno_paciente }} {{ $row->materno_paciente }}
                                                </td>
                                                <th >
                                                    {{ $row->especialidad }}
                                                </th>
                                                <td>
                                                    {{ $row->nombres_doctor }} {{ $row->paterno_doctor }} {{ $row->materno_doctor }}
                                                </td>
                                                <td >
                                                    {{ $row->fecha }}
                                                </td>
                                                <td >
                                                    {{ $row->inicio }} - {{ $row->fin }}
                                                </td>
                                                <td >
                                                    <span class="badge bg-success">{{ $row->estado }}</span>

                                                </td>
                                                <td>
                                                    <a href="{{url('/citas/'.$row->id.'/show')}}"  class="btn btn-sm btn-info" ><i data-feather='eye' ></i> Ver</a>
                                                </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- modal -->
                    <div class="modal fade" id="ErrorEliminacion">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">

                                    <h4 class="modal-title">Error de Eliminación Y Modificación</h4>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="alert alert-danger m-b-0">
                                        <p>No se puede eliminar ni editar porque el lapso de modificaciones es de 3 Horas antes de la cita programada.</p>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end modal -->
                </div>
            </div>
        </div>
    </div>
</div>


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
    <script src="{{ asset('js/citas/crear.js') }}"></script>
    <script src="{{ asset('js/sonrident.js') }}"></script>
@endpush
@push('scripts-page')
<script>
function showError(){
    $('#ErrorEliminacion').modal('toggle');
}
                //dom: '<"dataTables_wrapper dt-bootstrap"<"row"<"col-xl-7 d-block d-sm-flex d-xl-block justify-content-center"<"d-block d-lg-inline-flex mr-0 mr-sm-3"l><"d-block d-lg-inline-flex"B>><"col-xl-5 d-flex d-xl-block justify-content-center"fr>>t<"row"<"col-sm-5"i><"col-sm-7"p>>>',
$(document).ready( function () {
    $("#dt-Historial").css("width","100%");
    $("#dt-CitasConfirmar").css("width","100%");
    $("#dt-CitasProximas").css("width","100%");
    $('#dt-CitasProximas').DataTable({

        dom: '<"dataTables_wrapper dt-bootstrap"<"row"<"col-xl-7 d-block d-sm-flex d-xl-block justify-content-center"<"d-block d-lg-inline-flex mr-0 mr-sm-3"l><"d-block d-lg-inline-flex"B>><"col-xl-5 d-flex d-xl-block justify-content-center"fr>>t<"row"<"col-sm-5"i><"col-sm-7"p>>>',
        language: {
            "url": "/app-assets/js/scripts/tables/spanish.json"
        },
        buttons: [
            //{ extend: 'copy', text: 'Copiar', className: 'btn-sm' },
            //{ extend: 'csv', className: 'btn-sm' },
            {   extend: 'excel', className: 'btn-sm',
            },
            { extend: 'pdf', className: 'btn-sm' },
            { extend: 'print', text: 'Imprimir', className: 'btn-sm' }
            ],
    });
    $('#dt-CitasConfirmar').DataTable({
        dom: '<"dataTables_wrapper dt-bootstrap"<"row"<"col-xl-7 d-block d-sm-flex d-xl-block justify-content-center"<"d-block d-lg-inline-flex mr-0 mr-sm-3"l><"d-block d-lg-inline-flex"B>><"col-xl-5 d-flex d-xl-block justify-content-center"fr>>t<"row"<"col-sm-5"i><"col-sm-7"p>>>',
        language: {
            "url": "/app-assets/js/scripts/tables/spanish.json"
        },

    });
    $('#dt-Historial').DataTable({
        dom: '<"dataTables_wrapper dt-bootstrap"<"row"<"col-xl-7 d-block d-sm-flex d-xl-block justify-content-center"<"d-block d-lg-inline-flex mr-0 mr-sm-3"l><"d-block d-lg-inline-flex"B>><"col-xl-5 d-flex d-xl-block justify-content-center"fr>>t<"row"<"col-sm-5"i><"col-sm-7"p>>>',
        language: {
            "url": "/app-assets/js/scripts/tables/spanish.json"
        },

    });
});
</script>
@endpush
