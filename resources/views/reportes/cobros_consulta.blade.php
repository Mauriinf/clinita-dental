<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css">
    <style>
        p{
            font-size: .8rem
        }
        .underline{
            font-size: .8rem;
            border-bottom: 1px dashed black;
            margin: 10;
            margin-bottom: 0;


        }
        .bottom-underline{
            margin: 0;
            padding: 0;
        }
        .texto{
            padding-top: 5;
            padding-left: 10;
        }
        table{
            border: 1px solid black;
            border-radius: 10px;
        }

        .underline-solid{
            font-size: .8rem;
            border-bottom: 1px solid black;
            margin: 0 1rem 0 1rem;
        }
        th, td {
            padding: 5;
            border: 0.5px solid black;
        }
    </style>
</head>
<body>
    <h1 class="text-left">RECIBO</h1>
    <br><br>
    <h6 class="text-left">MÉDICO: Dr. {{$consulta->nombre_doctor}} </h6>
    <h6 class="text-left">C.I.: {{$consulta->ci_doctor}}</h6>
    <h6 class="text-left">DIRECCIÓN: {{$consulta->direccion_doctor}}</h6>
    <h6 class="text-left">TELÉFONO: {{$consulta->telefono_doctor}}</h6>
    <h6 class="text-left">EMAIL: {{$consulta->email_doctor}}</h6>
    <p class="text-end">Fecha: {{$fecha}}</p>
    <h6>PACIENTE</h6>
    <table class="table">
        <tr>
            <h6 class="text-left" class="texto">Nombre: {{$consulta->nombre_paciente}}</h6>
            <p class="underline"></p>
        </tr>
        <tr>
            <h6 class="text-left" class="texto">C.I.: {{$consulta->ci_paciente}}</h6>
            <p class="underline"></p>
        </tr>
        <tr>
            <h6 class="text-left" class="texto">Teléfono: {{$consulta->telefono_paciente}}</h6>
            <p class="underline"></p>
        </tr>
        <tr>
            <h6 class="text-left" class="texto">Dirección: {{$consulta->direccion_paciente}}</h6>
            <p class="underline"></p>
        </tr>
    </table>

    <table class="table">
        <thead>
            <tr>
                <th >Tratamiento</th>
                <th>Diente</th>
                {{-- <th >Parte Diente</th> --}}
                <th >Observacion</th>
                <th>Pago Bs.</th>
            </tr>
        </thead>
        <tbody>
            @php
                $total_recaudado=00.00;
            @endphp
            @foreach ($cobros as $item)
                <tr>
                    <td>{{$item->descripcion}}</td>
                    <td>{{$item->nombre}}</td>
                    {{-- <td class="text-center">{{($item->parte_diente===1)?'Superior':(($item->parte_diente===2)?'Derecha':(($item->parte_diente===3)?'Inferior':(($item->parte_diente===3)?'Izquierda':'Medio')))}}</td> --}}
                    <td>{{$item->observacion}}</td>
                    <td class="text-center">{{$item->pago}}</td>
                </tr>
                @php
                    $total_recaudado+=$item->pago;
                @endphp
            @endforeach
            <tr>
                <td align="center"  style="padding-top:.5em;padding-bottom:.5em;border: 1px solid" colspan="3">Total Cancelado Bs.</td>
                <td style="display: none;" ></td>
                <td style="display: none;" ></td>
                <td align="center" style="padding-top:.5em;padding-bottom:.5em;border: 1px solid">{{ sprintf("%.2f",$total_recaudado);}}</td>
            </tr>
        </tbody>


    </table>
    <p>Costo Consulta {{$consulta->costo_total}}</p>
    <p>Subtotal {{sprintf("%.2f",$total_recaudado);}}</p>
    @php
        $por_pagar=$consulta->costo_total-$total_recaudado;
    @endphp
    <p>Total por pagar {{sprintf("%.2f",$por_pagar);}}</p>
</body>
</html>
