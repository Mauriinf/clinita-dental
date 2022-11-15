@extends('vuexy.layouts.default', ['activePage' => 'nueva-curacion'])
@section('title','Nueva Curacion')
@push('css-vendor')
    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="{!! asset('app-assets/vendors/css/forms/select/select2.min.css') !!}">
    <link rel="stylesheet" type="text/css" href="{!! asset('app-assets/vendors/css/pickers/pickadate/pickadate.css') !!}">
    <link rel="stylesheet" type="text/css" href="{!! asset('app-assets/vendors/css/pickers/flatpickr/flatpickr.min.css') !!}">
    <link rel="stylesheet" type="text/css" href="{!! asset('app-assets/css/plugins/forms/pickers/form-flat-pickr.css') !!}">
    <link rel="stylesheet" type="text/css" href="{!! asset('app-assets/css/plugins/forms/pickers/form-pickadate.css') !!}">
    <link rel="stylesheet" type="text/css" href="{!! asset('app-assets/vendors/css/forms/wizard/bs-stepper.min.css') !!}">
    <link rel="stylesheet" type="text/css" href="{!! asset('app-assets/css/plugins/forms/form-wizard.css') !!}">
    <!-- END: Vendor CSS-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="{!! asset('odontograma/style.css') !!}" />
@endpush
@section('content')
<div class="content-wrapper container-xxl p-0">
    <div class="content-header row">
        <div class="content-header-left col-md-9 col-12 mb-2">
            <div class="row breadcrumbs-top">
                <div class="col-12">
                    <h2 class="content-header-title float-start mb-0">Consulta</h2>
                    <div class="breadcrumb-wrapper">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('home')}}">Principal</a>
                            </li>
                            <li class="breadcrumb-item active">Nueva Consulta
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="content-body">
        <!-- Basic Horizontal form layout section start -->
        <section id="basic-horizontal-layouts">
            <div class="row">
                <div class="col-md-6 col-12" id="prueba">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Horizontal Form</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-4 col-xl-4 col-md-4 col-4">
                                    <div class="mb-1">
                                        <label for="nombres">Nombres</label>
                                        <input type="text" class="form-control" id="nombres" name="nombres" placeholder="Nombres" value=""/>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-xl-4 col-md-4 col-4">
                                    <div class="mb-1">
                                        <label for="nombres">Paterno</label>
                                        <input type="text" class="form-control" id="paterno" name="paterno" placeholder="Paterno" value=""/>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-xl-4 col-md-4 col-4">
                                    <div class="mb-1">
                                        <label for="materno">Materno</label>
                                        <input type="text" class="form-control" id="materno" name="materno" placeholder="Materno" value=""/>
                                    </div>
                                </div>
                            </div>
                            <form action="{{ url('guardar/citas') }}" method="post">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-12 col-xl-12 col-md-12 col-12">
                                        <div class="mb-1">
                                            <label for="motivo">Motivo</label>
                                            <input type="text" class="form-control" id="motivo" name="motivo" placeholder="Motivo" value="{{ old('motivo') }}" required/>
                                            @if ($errors->has('motivo'))
                                                <span class="help-block alert alert-danger">
                                                    <strong>{{ $errors->first('motivo') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <div class="mb-1">
                                            <label for="diagnostico">Diagnostico</label>
                                            <input type="text" class="form-control" id="diagnostico" name="diagnostico" placeholder="Diagnostico" value="{{ old('diagnostico') }}" required/>
                                            @if ($errors->has('diagnostico'))
                                                <span class="help-block alert alert-danger">
                                                    <strong>{{ $errors->first('diagnostico') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <div class="mb-1">
                                            <label for="medicamentos">Medicamentos</label>
                                            <input type="text" class="form-control" id="medicamentos" name="medicamentos" placeholder="Medicamentos" value="{{ old('medicamentos') }}" required/>
                                            @if ($errors->has('medicamentos'))
                                                <span class="help-block alert alert-danger">
                                                    <strong>{{ $errors->first('medicamentos') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <div class="mb-1">
                                            <label for="alergias">Alergias</label>
                                            <input type="text" class="form-control" id="alergias" name="alergias" placeholder="Alergias" value="{{ old('alergias') }}" required/>
                                            @if ($errors->has('alergias'))
                                                <span class="help-block alert alert-danger">
                                                    <strong>{{ $errors->first('alergias') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <div class="mb-1">
                                            <label for="enfermedades">Enfermedades</label>
                                            <input type="text" class="form-control" id="enfermedades" name="enfermedades" placeholder="Enfermedades" value="{{ old('enfermedades') }}" required/>
                                            @if ($errors->has('enfermedades'))
                                                <span class="help-block alert alert-danger">
                                                    <strong>{{ $errors->first('enfermedades') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <div class="mb-1">
                                          <label for="fecha_inicio">Fecha Inicio</label>
                                          <div class="input-group input-group-alternative">
                                            <input type="text" id="inicio" class="form-control flatpickr-basic" placeholder="YYYY-MM-DD" value="{{ old('fecha_inicio', date('Y-m-d')) }}" data-date-format="Y-m-d"/>
                                            @if ($errors->has('fecha_inicio'))
                                                <span class="help-block alert alert-danger">
                                                    <strong>{{ $errors->first('fecha_inicio') }}</strong>
                                                </span>
                                            @endif
                                          </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <div class="mb-1">
                                          <label for="fecha_fin">Fecha Final</label>
                                          <div class="input-group input-group-alternative">
                                            <input type="text" id="fin" class="form-control flatpickr-basic" placeholder="YYYY-MM-DD" value="{{ old('fecha_fin', date('Y-m-d')) }}" data-date-format="Y-m-d"/>
                                            @if ($errors->has('fecha_fin'))
                                                <span class="help-block alert alert-danger">
                                                    <strong>{{ $errors->first('fecha_fin') }}</strong>
                                                </span>
                                            @endif
                                          </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <div class="mb-1">
                                            <label for="costo">Costo Total</label>
                                            <input type="text" class="form-control" id="costo" name="costo" placeholder="Costo Total" value="{{ old('costo') }}" required/>
                                            @if ($errors->has('costo'))
                                                <span class="help-block alert alert-danger">
                                                    <strong>{{ $errors->first('costo') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <div class="mb-1">
                                            <label for="otro">Otro</label>
                                            <input type="text" class="form-control" id="otro" name="otro" placeholder="Otro" value="{{ old('otro') }}" required/>
                                            @if ($errors->has('otro'))
                                                <span class="help-block alert alert-danger">
                                                    <strong>{{ $errors->first('otro') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <button class="btn  btn-primary" type="submit"><i class="fa fa-save"></i> Guardar </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-12">
                    <div id="canva-group" class="col-lg-12 col-md-12 col-sm-12">
                        <canvas id="camada1Odontograma"></canvas>
                        <canvas id="camada2Odontograma"></canvas>
                        <canvas id="camada3Odontograma"></canvas>
                        <canvas id="camada4Odontograma"></canvas>
                    </div>
                </div>
            </div>
        </section>
        <!-- Basic Horizontal form layout section end -->

        <div class="modal fade" id="modal" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalLabel">Adicionar procedimiento</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="form-row">
                            <input type="hidden" id="procedimentosRemovidos" th:field="*{procedimentosRemovidos}">
                            <div id="procedimentosDiv"></div>
                            <div class="form-group col-md-12">
                                <label for="nomeProcedimento">Nombre</label>
                                <i data-type="info" class="fas fa-info-circle fa-1x text-info" onclick="toast_message('.','info')" style="margin-left: 5px; cursor: pointer;"></i>
                                <select class="form-control" id="nomeProcedimento">
                                    <option selected value="">-- Seleccione una opción --</option>

                                </select>
                            </div>
                            <div class="form-group col-12" id="colOutroProcedimento">
                                <label for="outroProcedimento">Otro procedimiento</label>
                                <i style="margin-left:5px;cursor: pointer;" class="alerta fas fa-info-circle fa-1x text-info" data-type="info" onclick="mensagens('.','info')"></i>
                                <input id="outroProcedimento" class="form-control" type="text">
                            </div>
                            <div class="form-group col-12">
                                <label for="exampleColorInput" class="form-label">Color</label>
                                <i style="margin-left:5px;cursor: pointer;" class="alerta fas fa-info-circle fa-1x text-info" data-type="info" onclick="mensagens('.','info')"></i>
                                <input type="color" id="cor" disabled class="form-control form-control-color" value="#563d7c" title="Choose your color">
                            </div>
                            <div class="form-group col-12">
                                <label for="informacoesAdicionais">Información Adicional</label>
                                <i style="margin-left:5px;cursor: pointer;" class="alerta fas fa-info-circle fa-1x text-info" data-type="info" onclick="mensagens('.','info')"></i>
                                <textarea rows="5" id="informacoesAdicionais" maxlength="5000" class="form-control"></textarea>
                            </div>
                            <div class="form-group col-md-1 d-inline mt-2" style="text-align: center; margin: auto;">
                                <a id="botaoAdicionar" class="form-control btn-sigsaude btnCorNovo">
                                    <i class="fas fa-plus"></i>
                                </a>
                            </div>
                        </div>
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
                                                    <th class="text-center">Acción</th>
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
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Guardar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('scripts-vendor')
<script src="{!! asset('app-assets/vendors/js/forms/wizard/bs-stepper.min.js') !!}"></script>
<script src="{!! asset('app-assets/js/scripts/forms/form-wizard.js') !!}"></script>
    <!-- BEGIN: Page Vendor JS-->
    <script src="{!! asset('app-assets/vendors/js/forms/select/select2.full.min.js') !!}"></script>
    <!-- END: Page Vendor JS-->
    <!-- BEGIN: Page JS-->
    <script src="{!! asset('app-assets/js/scripts/forms/form-select2.js') !!}"></script>
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{!! asset('odontograma/odontograma.js') !!}"></script>
@endpush
