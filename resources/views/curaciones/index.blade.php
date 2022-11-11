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
                                <a href="{{route('nueva.consulta')}}"  class="btn btn-sm btn-primary">
                                    <i data-feather='plus'></i>
                                    Nuevo
                                </a>
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
                                                    <th>Nº</th>
                                                    <th>C.I. Paciente</th>
                                                    <th>Paciente</th>
                                                    <th>Doctor</th>
                                                    <th>Motivos</th>
                                                    <th>Diagnosticos</th>
                                                    <th>Medicamentos</th>
                                                    <th>Alergias</th>
                                                    <th>Enfermedades</th>
                                                    <th>Costo Total</th>
                                                    <th>Estado</th>
                                                    <th >Action</th>
                                                </tr>
                                            </thead>
                                            <tbody >
                                                @foreach ($consultas as $row)
                                                    <tr>
                                                    <th >
                                                        {{ $loop->iteration }}
                                                    </th>
                                                    <th scope="row">
                                                        {{ $row->ci_paciente }}
                                                    </th>
                                                    <td>
                                                        {{ $row->nombre_paciente }}
                                                    </td>
                                                    <td>
                                                        {{ $row->nombre_doctor }}
                                                    </td>
                                                    <td>
                                                        {{ $row->motivo }}
                                                    </td>
                                                    <td>
                                                        {{ $row->diagnostico }}
                                                    </td>
                                                    <td>
                                                        {{ $row->medicamentos }}
                                                    </td>
                                                    <td>
                                                        {{ $row->alergias }}
                                                    </td>
                                                    <td>
                                                        {{ $row->enfermedades }}
                                                    </td>
                                                    <td>
                                                        {{ $row->costo_total }}
                                                    </td>
                                                    <td>
                                                        {{ $row->estado }}
                                                    </td>
                                                    <td>
                                                        <a  href="javascript:void(0)"  class="btn btn-sm btn-primary" onclick=""><i data-feather='edit'></i>Editar</a>

                                                        <a href="javascript:void(0)"  class="btn btn-sm btn-danger" onclick=""><i data-feather='trash-2' ></i>Eliminar</a>

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

                                </div>
                            </div>
                        </div>
                    </div>
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
    <script src="{{ asset('js/especialidad.js') }}"></script>
    <script src="{{ asset('js/sonrident.js') }}"></script>
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

    });
});

</script>
@endpush
