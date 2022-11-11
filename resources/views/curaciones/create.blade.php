@extends('vuexy.layouts.default', ['activePage' => 'nueva-curacion'])
@section('title','Nueva Curacion')
@push('css-vendor')
    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="{!! asset('app-assets/vendors/css/forms/select/select2.min.css') !!}">
    <link rel="stylesheet" type="text/css" href="{!! asset('app-assets/vendors/css/pickers/pickadate/pickadate.css') !!}">
    <link rel="stylesheet" type="text/css" href="{!! asset('app-assets/vendors/css/pickers/flatpickr/flatpickr.min.css') !!}">
    <link rel="stylesheet" type="text/css" href="{!! asset('app-assets/css/plugins/forms/pickers/form-flat-pickr.css') !!}">
    <link rel="stylesheet" type="text/css" href="{!! asset('app-assets/css/plugins/forms/pickers/form-pickadate.css') !!}">
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
        <!-- Basic Inputs start -->
        <section id="basic-input">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Nueva Consulta</h4>
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
            </div>
        </section>
        <!-- Basic Inputs end -->

    </div>
</div>
@endsection
@push('scripts-vendor')

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
