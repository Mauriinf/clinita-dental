@extends('vuexy.layouts.default', ['activePage' => 'espec'])
@section('title','Especialidades')
@push('css-vendor')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" />
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" />
<link rel="stylesheet" href="{!! asset('odontograma/style.css') !!}" />
@endpush
@section('content')

    <div id="canva-group" class="col-lg-12 col-md-12 col-sm-12">
        <canvas id="camada1Odontograma"></canvas>
        <canvas id="camada2Odontograma"></canvas>
        <canvas id="camada3Odontograma"></canvas>
        <canvas id="camada4Odontograma"></canvas>
    </div>
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

@endsection
@push('scripts-page')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="{!! asset('odontograma/odontograma.js') !!}"></script>
@endpush
