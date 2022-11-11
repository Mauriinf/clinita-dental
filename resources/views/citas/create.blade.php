@extends('vuexy.layouts.default', ['activePage' => 'citas-crear'])
@section('title','Agendar Cita')
@push('css-vendor')
    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="{!! asset('app-assets/vendors/css/forms/select/select2.min.css') !!}">
    <link rel="stylesheet" type="text/css" href="{!! asset('app-assets/vendors/css/pickers/pickadate/pickadate.css') !!}">
    <link rel="stylesheet" type="text/css" href="{!! asset('app-assets/vendors/css/pickers/flatpickr/flatpickr.min.css') !!}">
    <link rel="stylesheet" type="text/css" href="{!! asset('app-assets/css/plugins/forms/pickers/form-flat-pickr.css') !!}">
    <link rel="stylesheet" type="text/css" href="{!! asset('app-assets/css/plugins/forms/pickers/form-pickadate.css') !!}">
    <!-- END: Vendor CSS-->
@endpush
@section('content')
<div class="content-wrapper container-xxl p-0">
    <div class="content-header row">
        <div class="content-header-left col-md-9 col-12 mb-2">
            <div class="row breadcrumbs-top">
                <div class="col-12">
                    <h2 class="content-header-title float-start mb-0">Citas</h2>
                    <div class="breadcrumb-wrapper">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('home')}}">Principal</a>
                            </li>
                            <li class="breadcrumb-item active">Nueva Cita
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        {{-- <div class="content-header-right text-md-end col-md-3 col-12 d-md-block d-none">
            <div class="mb-1 breadcrumb-right">
                <div class="dropdown">
                    <button class="btn-icon btn btn-primary btn-round btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i data-feather="grid"></i></button>
                    <div class="dropdown-menu dropdown-menu-end"><a class="dropdown-item" href="app-todo.html"><i class="me-1" data-feather="check-square"></i><span class="align-middle">Todo</span></a><a class="dropdown-item" href="app-chat.html"><i class="me-1" data-feather="message-square"></i><span class="align-middle">Chat</span></a><a class="dropdown-item" href="app-email.html"><i class="me-1" data-feather="mail"></i><span class="align-middle">Email</span></a><a class="dropdown-item" href="app-calendar.html"><i class="me-1" data-feather="calendar"></i><span class="align-middle">Calendar</span></a></div>
                </div>
            </div>
        </div> --}}
    </div>
    <div class="content-body">
        <!-- Basic Inputs start -->
        <section id="basic-input">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Nueva Cita</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ url('guardar/citas') }}" method="post">
                                @csrf
                                <input type="hidden" id="hora" name="hora"/>
                                <div class="row">
                                    <div class="col-lg-12 col-xl-12 col-md-12 col-12">
                                        <div class="mb-1">
                                            <label for="descripcion">Descripción</label>
                                            <input type="text" class="form-control" id="descripcion" name="descripcion" placeholder="Describe brevemente la consulta" value="{{ old('descripcion') }}" required/>
                                            @if ($errors->has('descripcion'))
                                                <span class="help-block alert alert-danger">
                                                    <strong>{{ $errors->first('descripcion') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    @role('Admin')
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <div class="mb-1">
                                            <label for="paciente">Paciente</label>
                                            <select class="select2 form-select" data-live-search="true" name="paciente"  data-style="btn-inverse" required>
                                            <option value="">Seleccionar Paciente</option>
                                                @foreach ($pacientes as $paci)
                                                    <option value="{{ $paci->id }}" @if(old('paciente') == $paci->id) selected @endif>{{ $paci->nombres }}</option>
                                                @endforeach
                                            </select>
                                            @if ($errors->has('paciente'))
                                                <span class="help-block alert alert-danger">
                                                    <strong>{{ $errors->first('paciente') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    @endrole
                                    <div class="col-lg-5 col-md-5 col-sm-5 col-xs-12">
                                        <div class="mb-1">
                                            <label for="especialidad">Especialidad</label>
                                            <select name="especialidad" id="especialidad" class=" select2 form-select form-control" required>
                                            <option value="">Seleccionar especialidad</option>
                                            @foreach ($especialidades as $specialty)
                                                <option value="{{ $specialty->id }}" >{{ $specialty->nombre }}</option>
                                            @endforeach
                                            </select>
                                            @if ($errors->has('especialidad'))
                                                <span class="help-block alert alert-danger">
                                                    <strong>{{ $errors->first('especialidad') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-5 col-md-5 col-sm-5 col-xs-12">
                                        <div class="mb-1">
                                            <label for="email">Médico</label>
                                            <select name="doctor" id="doctor" required class="select2 form-select" data-live-search="true" data-style="btn-inverse">

                                            </select>
                                            @if ($errors->has('doctor'))
                                                <span class="help-block alert alert-danger">
                                                    <strong>{{ $errors->first('doctor') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <div class="mb-1">
                                          <label for="dni">Fecha</label>
                                          <div class="input-group input-group-alternative">
                                            <input type="text" id="date" name="fecha_cita" class="form-control flatpickr-basic" placeholder="YYYY-MM-DD" value="{{ old('fecha_cita', date('Y-m-d')) }}" data-date-format="Y-m-d"/>

                                            @if ($errors->has('fecha_cita'))
                                                <span class="help-block alert alert-danger">
                                                    <strong>{{ $errors->first('fecha_cita') }}</strong>
                                                </span>
                                            @endif
                                          </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <div class="mb-2">
                                            <label for="address">Hora de atención</label>
                                            <div class="row"  id="horas" >
                                                <div class="alert alert-info" role="alert">
                                                    <div class="alert-body">
                                                    Seleccione un médico y una fecha, para ver sus horas disponibles.
                                                    </div>
                                                </div>
                                                @if ($errors->has('id_bloque'))
                                                    <span class="help-block alert alert-danger">
                                                        <strong>{{ $errors->first('id_bloque') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
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
    <script src="{{ asset('js/citas/crear.js') }}"></script>
@endpush
