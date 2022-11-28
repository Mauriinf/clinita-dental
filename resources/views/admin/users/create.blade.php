@extends('vuexy.layouts.default', ['activePage' => 'users'])
@section('title','Nuevo Usuario')
@push('css-vendor')
    <!-- BEGIN: Vendor CSS-->

    <!-- END: Vendor CSS-->
@endpush
@section('content')

<div class="card">
    <div class="card-header">
        <h4>
            Nuevo Usuario
        </h4>
    </div>

    <div class="card-body">
        @if (count($errors) > 0)
        <div class="alert alert-danger">
            <strong>Ups!</strong> Algo salió mal.<br><br>
            <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
            </ul>
        </div>
        @endif
        <!-- Pick-A-Date Picker start -->
        <section id="pick-a-date">
            <div class="card">
                <div class="card-body col-md-8 offset-xl-2">
                    {!! Form::open(array('route' => 'users.store','method'=>'POST')) !!}
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Nombres:</strong>
                            {!! Form::text('nombres', null, array('placeholder' => 'Nombres','class' => 'form-control')) !!}
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Ap. Paterno:</strong>
                            {!! Form::text('paterno', null, array('placeholder' => 'Ap. Paterno','class' => 'form-control')) !!}
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Ap. Materno:</strong>
                            {!! Form::text('materno', null, array('placeholder' => 'Ap. Materno','class' => 'form-control')) !!}
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>C.I.:</strong>
                            {!! Form::text('ci', null, array('placeholder' => 'C.I.','class' => 'form-control')) !!}
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12 form-group">
                        <label for="pd-months-year">Fecha Nac.:</label>
                        <input type="text" name="fec_nac" class="form-control flatpickr-disabled-range" placeholder="YYYY-MM-DD" />
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Dirección:</strong>
                            {!! Form::text('direccion', null, array('placeholder' => 'Dirección','class' => 'form-control')) !!}
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Teléfono:</strong>
                            {!! Form::number('telefono', null, array('placeholder' => 'Telefono','class' => 'form-control')) !!}
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Username:</strong>
                            {!! Form::text('username', null, array('placeholder' => 'Username','class' => 'form-control')) !!}
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Email:</strong>
                            {!! Form::email('email', null, array('placeholder' => 'Email','class' => 'form-control')) !!}
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Password:</strong>
                            {!! Form::password('password', array('placeholder' => 'Password','class' => 'form-control')) !!}
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Confirm Password:</strong>
                            {!! Form::password('confirm-password', array('placeholder' => 'Confirm Password','class' => 'form-control')) !!}
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Roles:</strong>
                            <select class="select2 form-control" name="roles[]" id="roles" multiple="multiple" aria-placeholder="Seleccione Rol de Usuario" onchange="getValue(this);">
                                @if ($roles)
                                @role('Doctor')
                                    <option value="Paciente">Paciente</option>
                                @else
                                    @role('Asistente')
                                        <option value="Paciente">Paciente</option>
                                    @else
                                    @foreach($roles as $role)
                                            <option value="{{ $role }}">{{ $role }}</option>
                                    @endforeach
                                    @endrole
                                @endrole
                                @endif
                            </select>

                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Activo:</strong>
                            <select name="estado" id="estado" class="form-control">
                                <option value="1" >ACTIVO</option>
                                <option value="0" >INACTIVO</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Sexo:</strong>
                            <div class="form-check my-50">
                                <input type="radio" id="validationRadio3" name="sexo" value="M" class="form-check-input" required />
                                <label class="form-check-label" for="validationRadio3">Masculino</label>
                            </div>
                            <div class="form-check">
                                <input type="radio" id="validationRadio4" name="sexo" value="F" class="form-check-input" required />
                                <label class="form-check-label" for="validationRadio4">Femenino</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Guardar</button>
                        </div>
                    </div>

                    {!! Form::close() !!}
                </div>
            </div>
        </section>
        <!-- Pick-A-Date Picker end -->

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


@endpush
@push('scripts-vendor')
<script>

</script>
@endpush
