@extends('vuexy.layouts.default', ['activePage' => 'curaciones'])
@section('title','Odontograma')
@push('css-vendor')
<!-- BEGIN: Vendor CSS-->
<link rel="stylesheet" type="text/css" href="{!! asset('app-assets/vendors/css/animate/animate.min.css') !!}">
<link rel="stylesheet" type="text/css" href="{!! asset('app-assets/vendors/css/extensions/sweetalert2.min.css') !!}">
<!-- END: Vendor CSS-->
<!-- BEGIN: Page CSS-->
<link rel="stylesheet" type="text/css" href="{!! asset('app-assets/css/plugins/extensions/ext-component-sweet-alerts.css') !!}">
<!-- END: Page CSS-->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" />
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" />
<link rel="stylesheet" href="{!! asset('odontograma/style.css') !!}" />
@endpush
@section('content')
    <div class="content-header row">
        <div class="content-header-left col-md-9 col-12 mb-2">
            <div class="row breadcrumbs-top">
                <div class="col-12">
                    <h2 class="content-header-title float-start mb-0">Odontograma</h2>
                    <div class="breadcrumb-wrapper">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('home')}}">Principal</a>
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card-header text-center">
        <h1 class="fw-bolder">Odontograma</h1>
    </div>
    <div id="canva-group" class="col-lg-12 col-md-12 col-sm-12">
        <canvas id="camada1Odontograma"></canvas>
        <canvas id="camada2Odontograma"></canvas>
        <canvas id="camada3Odontograma"></canvas>
        <canvas id="camada4Odontograma"></canvas>
    </div>
    <input type="hidden" id="id_consulta" value="{{$id}}">
    <div class="modal fade" id="modal" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
        <div class="modal-dialog" style="max-width: 50%;">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalLabel">Procedimiento</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <div class="panel panel-default">
                                <div class="table-responsive">
                                    <table class="table display dataTable table-bordered table-striped" id="tabelaTestesEspecificosForm">
                                        <thead>
                                            <tr>
                                                <th>Nombre</th>
                                                <th>Color</th>
                                                <th>Informacion Adicional</th>
                                                <th>Pago</th>

                                            </tr>
                                        </thead>
                                        <tbody id="bodyProcedimentos">
                                            <tr>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>

                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>

@endsection
@push('scripts-page')

<!-- BEGIN: Page JS-->
<script src="{!! asset('app-assets/vendors/js/extensions/sweetalert2.all.min.js') !!}"></script>
<script src="{!! asset('app-assets/vendors/js/extensions/polyfill.min.js') !!}"></script>
<script src="{!! asset('app-assets/js/scripts/extensions/ext-component-sweet-alerts.js') !!}"></script>
<!-- END: Page JS-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="{!! asset('odontograma/ver_odontograma.js') !!}"></script>

@endpush
