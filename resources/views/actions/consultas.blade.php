@role('Paciente')
    <a class="btn btn-primary btn-sm" data-toggle="tooltip" title="Odontograma" href="{{ route('ver.odontograma',$id) }}"><i data-feather='x-square'></i></a>
@else
    @can('odontograma')
        <a class="btn btn-primary btn-sm" data-toggle="tooltip" title="Curaciones" href="{{ route('nuevo.odontograma',$id) }}"><i data-feather='x-circle'></i></a>
    @endcan
@endrole
@can('editar-curacion')
<button class="btn btn-warning btn-sm" data-toggle="tooltip" title="Editar" onclick="f_editar_consulta({{$id}},'{{$diagnostico}}','{{$medicamentos}}','{{$alergias}}','{{$enfermedades}}','{{$estado}}','{{$fecha_inicio}}','{{$fecha_final}}',{{$costo_total}},{{$id_paciente}},'{{$ci_paciente}}','{{$nom_paciente}}','{{$pat_paciente}}','{{$mat_paciente}}')"><i data-feather='edit'></i> </button>
@endcan
<a target="_blank" class="btn btn-danger btn-sm" data-toggle="tooltip" title="Historial Clinica" href="{{ route('reporte.historia_clinica', $id) }}"><i data-feather='clipboard'></i><i data-feather='file-text'></i></a>
@role('Doctor|Admin|Asistente')
<a target="_blank" class="btn btn-info btn-sm" data-toggle="tooltip" title="Recibo" href="{{ route('reporte.consulta.cobros', $id) }}"><i data-feather='file-text'></i></a>
@endrole

