@extends('vuexy.layouts.default', ['activePage' => 'users'])
@section('title','Usuarios')
@push('css-vendor')
    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="{!! asset('app-assets/vendors/css/vendors.min.css') !!}">
    <link rel="stylesheet" type="text/css" href="{!! asset('app-assets/vendors/css/tables/datatable/dataTables.bootstrap5.min.css') !!}">
    <link rel="stylesheet" type="text/css" href="{!! asset('app-assets/vendors/css/tables/datatable/responsive.bootstrap5.min.css') !!}">
    <link rel="stylesheet" type="text/css" href="{!! asset('app-assets/vendors/css/tables/datatable/buttons.bootstrap5.min.css') !!}">
    <link rel="stylesheet" type="text/css" href="{!! asset('app-assets/vendors/css/tables/datatable/rowGroup.bootstrap5.min.css') !!}">
    <link rel="stylesheet" type="text/css" href="{!! asset('app-assets/vendors/css/pickers/flatpickr/flatpickr.min.css') !!}">
    <!-- END: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="{!! asset('app-assets/vendors/css/forms/select/select2.min.css') !!}">
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
                            Usuarios
                        </h4>

                        <div class="pull-right">
                            <div class="input-group-prepend pull-right">
                                @can('crear-usuarios')
                                <a href="{{ route("users.create") }}" class="dropdown-item mb-1">
                                    <i data-feather='user-plus'></i>
                                    Nuevo Usario
                                </a>
                                @endcan
                            </div>
                        </div>

                    </div>
                    <div class="card-body">
                        @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                        <p>{{ $message }}</p>
                        </div>
                        @endif
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-datatable">
                                        <table class="table table-striped table-bordered table-td-valign-middle dt-responsive" id="dt-ListaUsers">
                                            <thead class="thead">
                                                <tr>
                                                    <th>No</th>
                                                    <th>C.I.</th>
                                                    <th>Nombres</th>
                                                    <th>Paterno</th>
                                                    <th>Materno</th>
                                                    <th>Username</th>
                                                    <th>Email</th>
                                                    <th>Teléfono</th>
                                                    <th>Roles</th>
                                                    <th >Acción</th>
                                                </tr>
                                            </thead>
                                            <tbody >
                                                @foreach ($data as $key => $user)
                                                <tr>
                                                    <td>{{$loop->iteration }}</td>
                                                    <td>{{ $user->ci }}</td>
                                                    <td>{{ $user->nombres }}</td>
                                                    <td>{{ $user->paterno }}</td>
                                                    <td>{{ $user->materno }}</td>
                                                    <td>{{ $user->username }}</td>
                                                    <td>{{ $user->email }}</td>
                                                    <td>{{ $user->telefono }}</td>
                                                    <td>

                                                    @if(!empty($user->getRoleNames()))
                                                        @php
                                                            $badges=['primary','danger','warning','info','success','dark','primary','danger','warning','info','warning','info','success','dark'];
                                                            $j=0;
                                                        @endphp
                                                        @foreach($user->getRoleNames() as $v)
                                                        <span class="{{ 'badge badge-light-'.$badges[$j] }}">{{ $v }}</span>
                                                        @php
                                                            $j++;
                                                        @endphp
                                                        @endforeach
                                                    @endif
                                                    </td>
                                                    <td>
                                                    <a class="btn btn-sm btn-info" href="{{ route('users.show',$user->id) }}">Ver</a>
                                                    @can('editar-usuarios')
                                                    <a class="btn btn-sm  btn-primary" href="{{ route('users.edit',$user->id) }}">Editar</a>
                                                    @endcan
                                                    @can('asignar-especialidad-usuario')
                                                        @foreach($user->getRoleNames() as $v)
                                                            @if($v==='Doctor')
                                                                <button class="btn btn-sm btn-warning" type="button" onclick="f_especialidades({{$user->id}})"> Especialidad </button>
                                                                @php
                                                                    break;
                                                                @endphp
                                                            @endif
                                                        @endforeach
                                                    @endcan
                                                    @can('eliminar-usuarios')
                                                        {!! Form::open(['method' => 'DELETE','route' => ['users.destroy', $user->id],'style'=>'display:inline']) !!}
                                                            <button type="submit" class="btn btn-sm  btn-danger">Eliminar</button>
                                                        {!! Form::close() !!}
                                                    @endcan
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
<!-- modal -->
<div class="modal fade" id="modal-especialidades" >
    <div class="modal-dialog" style="max-width: 50%">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="nombremateria" >Especialidades</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form onSubmit="return false" id="formAdd" action="{{ route('espec.user.save') }}">
                {{ csrf_field() }}
                <div class="modal-body">
                    <div class="alert alert-danger print-error-msg" style="display:none">
                        <ul></ul>
                    </div>
                    <div class="form-group row m-b-15">
                        <label class="col-md-2 col-sm-2 col-form-label" for="message">Especialidades: </label>
                        <div class="col-md-8 col-sm-8">
                            <select class="select2 form-control" id="especialidades" name="especialidades[]" multiple="multiple"  type="number" >

                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="hidden" id="id_usuario" name="usuario" value="0">
                    <a href="javascript:;" class="btn btn-secondary" data-dismiss="modal">Cerrar</a>
                    <button class="btn btn-success" type="submit">Guardar</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- end modal -->

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
    <!-- BEGIN: Page Vendor JS-->
    <script src="{!! asset('app-assets/vendors/js/forms/select/select2.full.min.js') !!}"></script>
    <!-- END: Page Vendor JS-->
    <!-- BEGIN: Page JS-->
    <script src="{!! asset('app-assets/js/scripts/forms/form-select2.js') !!}"></script>
    <!-- END: Page JS-->
    <!-- BEGIN: Page JS-->
    <script src="{!! asset('app-assets/vendors/js/extensions/sweetalert2.all.min.js') !!}"></script>
    <script src="{!! asset('app-assets/vendors/js/extensions/polyfill.min.js') !!}"></script>
    <script src="{!! asset('app-assets/js/scripts/extensions/ext-component-sweet-alerts.js') !!}"></script>
    <!-- END: Page JS-->
@endpush
@push('scripts-page')
<script>

    $(function () {
        var dt_table_usuarios = $('#dt-ListaUsers');
            var dt_basic = dt_table_usuarios.DataTable({
                dom: '<"dataTables_wrapper dt-bootstrap"<"row"<"col-xl-7 d-block d-sm-flex d-xl-block justify-content-center"<"d-block d-lg-inline-flex mr-0 mr-sm-3"l><"d-block d-lg-inline-flex"B>><"col-xl-5 d-flex d-xl-block justify-content-center"fr>>t<"row"<"col-sm-5"i><"col-sm-7"p>>>',
            //displayLength: 7,
            //lengthMenu: [7, 10, 25, 50, 75, 100],
            language: {
                "url": "/app-assets/js/scripts/tables/spanish.json"
            },
            buttons: [
            //{ extend: 'copy', text: 'Copiar', className: 'btn-sm' },
            //{ extend: 'csv', className: 'btn-sm' },
            {   extend: 'excel', className: 'btn-sm',
            },
            { extend: 'pdf', className: 'btn-sm' },
            { extend: 'print', text: 'Imprimir', className: 'btn-sm' }
            ],
            });
    });
    function f_especialidades(id){
        <?php echo "var especilidades='$especialidad';" ?>
        <?php echo "var espec_user='$espec_user';" ?>
        var espec=JSON.parse(especilidades);
        var esp_users=JSON.parse(espec_user);
        let html='';
        $('#especialidades').html(html);
        for(var i in espec){
            var ban=0;
            for(var j in esp_users){
                if(id===esp_users[j].user_id && espec[i].id===esp_users[j].especialidad_id){
                    ban=1;
                    break;
                }
            }
            if(ban===1){
                html+='<option value="'+espec[i].id+'" selected="selected" >'+espec[i].nombre+'</option>';
            }else{
                html+='<option value="'+espec[i].id+'" >'+espec[i].nombre+'</option>';
            }
        }
        var id_us = document.getElementById("id_usuario");
        id_us.value = id;
        $('#especialidades').html(html);
        $('#modal-especialidades').modal('toggle');
    }
    $(document).on("submit" ,"#formAdd", function(e){
        $.ajaxSetup({
            header: $('meta[name="_token"]').attr('content')
        });
        e.preventDefault(e);
        $.ajax({
            type: 'POST',
            url: $(this).attr('action'),
            data: $(this).serialize(),
            dataType: 'json',
            cache: false,
        }).done(function (data) {
            if (data.errors) {
                printErrorMsg(data,1);
            } else {
                if(data[0]==='OK'){
                    Swal.fire({
                        icon: "success",
                        title: "Registrado Correctamente"
                    });
                    $('#modal-especialidades').modal('hide');
                }else{
                    Swal.fire({
                        icon: "error",
                        title: "Error",
                        text: data[0]
                    });
                }
                $(".print-error-msg").css('display','none');//ocultar div de errores
            }
        });
    });
    function printErrorMsg (msg,accion) {
        if(accion==1){
            $(".print-error-msg").find("ul").html('');
            $(".print-error-msg").css('display','block');
            $.each( msg.errors, function( key, value ) {//mostrar la lista de errores
                $(".print-error-msg").find("ul").append('<li>'+value+'</li>');
            });
        }
        else{
            $(".print-error-msg-edit").find("ul").html('');
            $(".print-error-msg-edit").css('display','block');
            $.each( msg.errors, function( key, value ) {//mostrar la lista de errores
                $(".print-error-msg-edit").find("ul").append('<li>'+value+'</li>');
            });
        }
    }
</script>
@endpush
