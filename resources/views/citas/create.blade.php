@extends('vuexy.layouts.default', ['activePage' => 'citas'])
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
                        @if ($errors->any())
                            <div class="alert alert-danger" role="alert">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <div class="card-body">
                            <form action="" method="post">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-12 col-xl-12 col-md-12 col-12">
                                        <div class="mb-1">
                                            <label for="descripcion">Descripción</label>
                                            <input type="text" class="form-control" id="description" name="description" placeholder="Describe brevemente la consulta" required/>
                                        </div>
                                    </div>
                                    @role('Admin')
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <label for="paciente">Paciente</label>
                                        <select class="select2 form-select" data-live-search="true" name="paciente_id" required data-style="btn-inverse">
                                        <option value="">Seleccionar Paciente</option>
                                            @foreach ($pacientes as $paci)
                                                <option value="{{ $paci->id }}" @if(old('paciente_id') == $paci->id) selected @endif>{{ $paci->nombres }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    @endrole
                                    <div class="col-lg-5 col-md-5 col-sm-5 col-xs-12">
                                        <label for="especialidad">Especialidad</label>
                                        <select name="especialidad_id" id="especialidad" class=" select2 form-select form-control" required>
                                          <option value="">Seleccionar especialidad</option>
                                          @foreach ($especialidades as $specialty)
                                            <option value="{{ $specialty->id }}" @if(old('especialidad_id') == $specialty->id) selected @endif>{{ $specialty->nombre }}</option>
                                          @endforeach
                                        </select>
                                    </div>
                                    <div class="col-lg-5 col-md-5 col-sm-5 col-xs-12">
                                        <label for="email">Médico</label>
                                         <select name="doctor_id" id="doctor" required class="select2 form-select" data-live-search="true" data-style="btn-inverse">
                                           @foreach ($doctores as $doctor)
                                             <option value="{{ $doctor->id }}" @if(old('doctor_id') == $doctor->id) selected @endif>{{ $doctor->paterno }} {{ $doctor->materno }} {{ $doctor->nombres }}</option>
                                           @endforeach
                                         </select>
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <label for="dni">Fecha</label>
                                          <div class="input-group input-group-alternative">

                                            <input class="form-control flatpickr-disabled-range" placeholder="Seleccionar fecha"
                                              id="date" name="scheduled_date" type="text"
                                              value="{{ old('scheduled_date', date('Y-m-d')) }}"
                                              data-date-format="yyyy-mm-dd"
                                              data-date-start-date="{{ date('Y-m-d') }}"
                                              data-date-end-date="+30d">
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

@endpush
