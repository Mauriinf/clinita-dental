<a class="btn btn-primary btn-sm" href="{{ route('nuevo.odontograma',$id) }}">Curaciones</a>
<button class="btn btn-warning btn-sm" onclick="f_editar_consulta({{$id}},'{{$diagnostico}}','{{$medicamentos}}','{{$alergias}}','{{$enfermedades}}','{{$estado}}','{{$fecha_inicio}}','{{$fecha_final}}',{{$costo_total}},{{$id_paciente}},'{{$ci_paciente}}','{{$nom_paciente}}','{{$pat_paciente}}','{{$mat_paciente}}')">Editar </button>
<a class="btn btn-danger btn-sm" href="{{ route('reporte.historia_clinica', $id_cliente) }}">Historia Clinica - {{$id_cliente}}</a>
