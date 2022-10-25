@extends('vuexy.layouts.default', ['activePage' => 'citas'])
@section('title','Ver Cita')

@section('content')

<div class="card">
    <div class="card-header">
        <h4>
            Detalle Cita
        </h4>
    </div>

    <div class="card-body">
        <div class="row">
            <div class="col-xl-12 col-lg-12 mt-2 mt-xl-0">
                <div class="user-info-wrapper">
                    <div class="d-flex flex-wrap">
                        <div class="user-info-title">
                            <i data-feather='calendar'></i>
                            <span class="card-text user-info-title font-weight-bold mb-0">Fecha</span>
                        </div>
                        <p class="card-text mb-0">{{ $detalle->fecha }}</p>
                    </div>
                    <div class="d-flex flex-wrap my-50">
                        <div class="user-info-title">
                            <i data-feather='clock'></i>
                            <span class="card-text user-info-title font-weight-bold mb-0">Hora:</span>
                        </div>
                        <p class="card-text mb-0">{{ $detalle->inicio }} - {{ $detalle->fin }}</p>
                    </div>
                    <div class="d-flex flex-wrap my-50">
                        <div class="user-info-title">
                            <i data-feather='headphones'></i>
                            <span class="card-text user-info-title font-weight-bold mb-0">Medico:</span>
                        </div>
                        <p class="card-text mb-0">Dr. {{ $detalle->nombres_doctor }} {{ $detalle->paterno_doctor }} {{ $detalle->materno_doctor }}</p>
                    </div>
                    <div class="d-flex flex-wrap my-50">
                        <div class="user-info-title">
                            <i data-feather='user'></i>
                            <span class="card-text user-info-title font-weight-bold mb-0">Paciente:</span>
                        </div>
                        <p class="card-text mb-0">{{ $detalle->nombres_paciente }} {{ $detalle->paterno_paciente }} {{ $detalle->materno_paciente }}</p>
                    </div>
                    <div class="d-flex flex-wrap">
                        <div class="user-info-title">
                            <i data-feather='grid'></i>
                            <span class="card-text user-info-title font-weight-bold mb-0">Especialidad:</span>
                        </div>
                        <p class="card-text mb-0">{{ $detalle->especialidad }}</p>
                    </div>
                    <div class="d-flex flex-wrap my-50">
                        <div class="user-info-title">
                            <i data-feather='clipboard'></i>
                            <span class="card-text user-info-title font-weight-bold mb-0">Descripción:</span>
                        </div>
                        <p class="card-text mb-0">{{ $detalle->descripcion }}</p>
                    </div>
                    <div class="d-flex flex-wrap">
                        <div class="user-info-title">
                            <i data-feather='toggle-left'></i>
                            <span class="card-text user-info-title font-weight-bold mb-0">Estado:</span>
                        </div>
                        <p class="card-text mb-0"><span class="badge badge-light-success">{{ $detalle->estado }}}</span></p>
                    </div>
                    <br>
                    <a href="{{ url('/citas') }}" class="btn btn-info">
                        <i data-feather='arrow-left'></i>
                        Volver
                    </a>
                </div>
            </div>

        </div>
    </div>
</div>

@endsection

