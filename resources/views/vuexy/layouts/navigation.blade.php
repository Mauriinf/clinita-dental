<div class="main-menu menu-fixed menu-dark menu-accordion menu-shadow" data-scroll-to-active="true" id="navegation">
    <div class="navbar-header">
        <ul class="nav navbar-nav flex-row">
            <li class="nav-item me-auto"><a class="navbar-brand" href="{{route('home')}}"><span class="brand-logo">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512"  height="28">
                    <!--! Font Awesome Pro 6.2.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. -->
                <path d="M154.1 52.1C137.3 39.1 116.7 32 95.5 32C42.7 32 0 74.7 0 127.5v6.2c0 15.8 3.7 31.3 10.7 45.5l23.5 47.1c4.5 8.9 7.6 18.4 9.4 28.2L80.4 460.2c2 11.2 11.6 19.4 22.9 19.8s21.4-7.4 24-18.4l28.9-121.3C160.2 323.7 175 312 192 312s31.8 11.7 35.8 28.3l28.9 121.3c2.6 11.1 12.7 18.8 24 18.4s20.9-8.6 22.9-19.8l36.7-205.8c1.8-9.8 4.9-19.3 9.4-28.2l23.5-47.1c7.1-14.1 10.7-29.7 10.7-45.5v-2.1c0-55-44.6-99.6-99.6-99.6c-24.1 0-47.4 8.8-65.6 24.6l-3.2 2.8 19.5 15.2c7 5.4 8.2 15.5 2.8 22.5s-15.5 8.2-22.5 2.8l-24.4-19-37-28.8z" style="fill: currentColor"/>
                </svg></span>
                    <h2 class="brand-text">Sonri-Dent</h2>
                </a></li>
            <li class="nav-item nav-toggle"><a class="nav-link modern-nav-toggle pe-0" data-bs-toggle="collapse"><i class="d-block d-xl-none text-primary toggle-icon font-medium-4" data-feather="x"></i><i class="d-none d-xl-block collapse-toggle-icon font-medium-4  text-primary" data-feather="disc" data-ticon="disc"></i></a></li>
        </ul>
    </div>
    <div class="shadow-bottom"></div>
    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
            <li class=" navigation-header"><span data-i18n="Apps &amp; Pages">Menú</span><i data-feather="more-horizontal"></i>
            </li>
            @can('lista-roles')
            <li class="nav-item {{ $activePage == 'roles' ? ' active' : '' }}">
                <a class="d-flex align-items-center" href="{{ route('roles.index') }}">
                    <i data-feather="shield"></i>
                    <span class="menu-title text-truncate" ></span>Roles
                </a>
            </li>
            @endcan
            @can('lista-usuarios')
            <li class=" nav-item {{ $activePage == 'users' ? ' active' : '' }} ">
                <a class="d-flex align-items-center" href="{{ route('users.index') }}">
                    <i data-feather='users'></i><span class="menu-title text-truncate" data-i18n="Usuarios"></span>Usuarios
                </a>
            </li>
            @endcan
            @can('lista-especialidad')
            <li class=" nav-item {{ $activePage == 'espec' ? ' active' : '' }} ">
                <a class="d-flex align-items-center" href="{{ route('espec.index') }}">
                    <i data-feather='grid'></i><span class="menu-title text-truncate" data-i18n="Especialidad"></span>Especialidades
                </a>
            </li>
            @endcan
            @can('lista-tratamiento')
            <li class=" nav-item {{ $activePage == 'tratamiento' ? ' active' : '' }} ">
                <a class="d-flex align-items-center" href="{{ route('trata.index') }}">
                    <i data-feather='cpu'></i><span class="menu-title text-truncate" data-i18n="Tratamiento"></span>Tratamiento
                </a>
            </li>
            @endcan
            @can('crear-cita')
            <li class=" nav-item {{ $activePage == 'citas-crear' ? ' active' : '' }} ">
                <a class="d-flex align-items-center" href="{{ route('citas.create') }}">
                    <i data-feather='calendar'></i><span class="menu-title text-truncate" data-i18n="crear"></span>Reserva Citas
                </a>
            </li>
            @endcan
            @can('lista-cita')
            <li class=" nav-item {{ $activePage == 'citas' ? ' active' : '' }} ">
                <a class="d-flex align-items-center" href="{{ route('citas.index') }}">
                    <i data-feather='clock'></i><span class="menu-title text-truncate" data-i18n="Citas"></span>Mis Citas
                </a>
            </li>
            @endcan
            @can('configuracion-horario')
            <li class=" nav-item {{ $activePage == 'b_dia' ? ' active' : '' }} ">
                <a class="d-flex align-items-center" href="{{ route('bloque-dia.index') }}">
                    <i data-feather='watch'></i><span class="menu-title text-truncate" data-i18n="Citas"></span>Conf. Horario
                </a>
            </li>
            @endcan
            @can('lista-curacion')
            <li class=" nav-item {{ $activePage == 'curaciones' ? ' active' : '' }} ">
                <a class="d-flex align-items-center" href="{{ route('curaciones.index') }}">
                    <i data-feather='plus-square'></i><span class="menu-title text-truncate" data-i18n="Curaciones">Curaciones</span>
                </a>
            </li>
            @endcan
            @role('Doctor|Admin|Asistente')
            <li class=" nav-item {{ $activePage == 'reportes' ? ' active' : '' }} ">
                <a class="d-flex align-items-center" href="javascript:;" onclick="generar_reporte()">
                    <i data-feather='clipboard'></i><span class="menu-title text-truncate" data-i18n="Reportes">Reportes</span>
                </a>
            </li>
            @endrole
        </ul>
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
                            <option value="CITAS">CITAS</option>
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
<script>
     function generar_reporte() {
        $('#modal-reporte').modal('toggle');
    }
    function f_imprimir(){
        let fecha=$('#fecha').val();
        let tipo_reporte=$('#tipoReporte').val();
        window.open(URL_BASE+"/reporte/fecha?fecha="+fecha+"&tipo="+tipo_reporte) ;
    }
</script>
