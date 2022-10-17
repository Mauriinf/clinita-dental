@extends('vuexy.layouts.default', ['activePage' => 'roles'])
@section('title','Ver Rol')

@section('content')

<div class="card">
    <div class="card-header">
        <h4>
            Ver Rol
        </h4>
    </div>

    <div class="card-body">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">

                    <strong>Nombre:</strong>
                    {{ $role->name }}
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Permisos:</strong>
                    @if(!empty($rolePermissions))
                        @foreach($rolePermissions as $v)
                            <label class="label label-success">{{ $v->name }},</label>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
