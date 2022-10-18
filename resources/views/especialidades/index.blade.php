@extends('vuexy.layouts.default', ['activePage' => 'espec'])
@section('title','Especialidades')
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
                            Especialidades
                        </h4>
                        <div class="pull-right">
                            <div class="input-group-prepend pull-right btnagregar">
                                @can('crear-especialidad')
                                <a href="javascript:void(0)" onclick="mostrarform(true)" class="btn btn-sm btn-primary">
                                    <i data-feather='plus'></i>
                                    Nuevo
                                </a>
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
                                                    <th>Nº</th>
                                                    <th>Nombre</th>
                                                    <th>Descripción</th>
                                                    <th>Estado</th>
                                                    <th >Action</th>
                                                </tr>
                                            </thead>
                                            <tbody >
                                                @foreach ($especialidades as $esp)
                                                    <tr>
                                                    <th >
                                                        {{ $loop->iteration }}
                                                    </th>
                                                    <th scope="row">
                                                        {{ $esp->nombre }}
                                                    </th>
                                                    <td>
                                                        {{ $esp->descripcion }}
                                                    </td>
                                                    <td >
                                                        <label class="custom-toggle">
                                                            <form action="{{ route('espec.update.estado',$esp->id) }}" id="form-estado{{$esp->id}}" method="post">
                                                            @csrf
                                                            @method('PUT')
                                                            <input type="hidden" name="estado" value="{{($esp->estado==1)?'0':'1'}}">
                                                            <div class="form-check form-check-primary form-switch">
                                                                <input type="checkbox" class="form-check-input" {{ $esp->estado==1 ? 'checked' :"" }} onclick="event.preventDefault();
                                                                document.getElementById('form-estado<?php echo $esp->id; ?>').submit();"/>

                                                            </div>

                                                            </form>
                                                        </label>
                                                    </td>
                                                    <td>
                                                        <a  href="javascript:void(0)"  class="btn btn-sm btn-primary" onclick="mostrar(<?php echo $esp->id; ?>)"><i data-feather='edit'></i>Editar</a>

                                                        <a href="javascript:void(0)"  class="btn btn-sm btn-danger" onclick="eliminar(<?php echo $esp->id; ?>)"><i data-feather='trash-2' ></i>Eliminar</a>

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
                                    <div class="panel-body formregistros">

                                        <form action="{{ url('especialidades') }}" method="post" id="formespecialidad">
                                            @csrf
                                            <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                    <label>Nombre:</label>
                                                    <input type="hidden" name="id" id="id" value="0">
                                                    <input type="text" class="form-control" id="nombre" name="name" maxlength="100" placeholder="Nombre" required value="{{ old('name') }}" />
                                                     <span class="text-danger error-text name_err"></span>
                                                  </div>

                                                  <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                    <label>Descripcion:</label>
                                                    <input type="text" class="form-control" id="descripcion" name="description" maxlength="100" placeholder="Descripcion">
                                                     <span class="text-danger error-text description_err"></span>
                                                  </div>

                                                  <div class="demo-inline-spacing col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                      <button class="btn  btn-primary" type="submit" id="btnGuardar"><i class="fa fa-save"></i> Guardar </button>

                                                      <button class="btn  btn-danger" type="button" onclick="mostrarform(false)"><i class="fa fa-save"></i> Cancelar </button>

                                                    </div>
                                        </form>



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
