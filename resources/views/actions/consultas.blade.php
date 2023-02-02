@role('Paciente')
    <a class="btn btn-primary btn-sm" href="{{ route('ver.odontograma',$id) }}">Odontograma</a>
@else
    @can('odontograma')
        <a class="btn btn-primary btn-sm" href="{{ route('nuevo.odontograma',$id) }}">Curaciones</a>
    @endcan
@endrole
@can('editar-curacion')
<button class="btn btn-warning btn-sm" onclick="f_editar_consulta({{$id}},'{{$diagnostico}}','{{$medicamentos}}','{{$alergias}}','{{$enfermedades}}','{{$estado}}','{{$fecha_inicio}}','{{$fecha_final}}',{{$costo_total}},{{$id_paciente}},'{{$ci_paciente}}','{{$nom_paciente}}','{{$pat_paciente}}','{{$mat_paciente}}')">Editar </button>
@endcan
<a target="_blank" class="btn btn-danger btn-sm" href="{{ route('reporte.historia_clinica', $id) }}">Historia Clinica</a>
@role('Doctor|Admin|Asistente')
<a target="_blank" class="btn btn-info btn-sm" href="{{ route('reporte.consulta.cobros', $id) }}">Recibo</a>
@endrole

