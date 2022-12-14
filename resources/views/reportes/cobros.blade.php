<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Document</title>
        <style>
        h1{
        text-align: center;
        text-transform: uppercase;
        }
        .contenido{
        font-size: 20px;
        }
        #primero{
        background-color: #ccc;
        }
        #segundo{
        color:#44a359;
        }
        #tercero{
        text-decoration:line-through;
        }
    </style><!DOCTYPE html>
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
            margin: 0 1rem 0 1rem;
            margin-bottom: 0
        }
        .bottom-underline{
            margin: 0;
            padding: 0;
        }


    </style>
</head>
<body>
    <p class="text-center">

    </p>
    <h3 class="text-center">CONTROL DE COBROS</h3>
    <br>
    <h6 class="text-end">Desde la fecha {{$inicio}} al {{$fin}}</h6>
    <hr>
    <table  style="border-collapse:collapse;border=0px; border-radius: 10px;">

        <tr align="center">
            <th width = "20px" style="border: 1px solid">Nro.</th>
            <th  width = "60px" style="border: 1px solid">C.I.</th>
            <th width = "220px" style="border: 1px solid">Paciente</th>
            <th  width = "30px" style="border: 1px solid">Sexo</th>
            <th  width = "40px" style="border: 1px solid">Edad</th>
            <th  width = "210px" style="border: 1px solid">Tratamiento</th>
            <th width = "60px" style="border: 1px solid">Costo Total</th>
            <th width = "60px" style="border: 1px solid">Total Pagado</th>


        </tr>
        @php
            $total_recaudado=00.00;
        @endphp
        @foreach ($pagos as $item)
            <tr align="center" >
                <td style="padding-top:.5em;padding-bottom:.5em;border: 1px solid;font-weight: bold">{{$loop->iteration}}</td>
                <td style="padding-top:.5em;padding-bottom:.5em;border: 1px solid">{{$item->ci_paciente}}</td>
                <td style="padding-top:.5em;padding-bottom:.5em;border: 1px solid">{{$item->nombre_paciente}}</td>
                <td style="padding-top:.5em;padding-bottom:.5em;border: 1px solid">{{$item->sexo}}</td>
                @php
                    $fecha_nac = new DateTime(date('Y/m/d',strtotime($item->fec_nac))); // Creo un objeto DateTime de la fecha ingresada
                    $fecha_hoy =  new DateTime(date('Y/m/d',time())); // Creo un objeto DateTime de la fecha de hoy
                    $edad = date_diff($fecha_hoy,$fecha_nac); // La funcion ayuda a calcular la diferencia, esto seria un objeto
                    $myedad=$edad->format('%Y');
                @endphp
                <td style="padding-top:.5em;padding-bottom:.5em;border: 1px solid">{{$myedad}}</td>
                <td style="padding-top:.5em;padding-bottom:.5em;border: 1px solid">{{$item->diagnostico}}</td>
                <td style="padding-top:.5em;padding-bottom:.5em;border: 1px solid">{{$item->costo_total}}</td>
                <td style="padding-top:.5em;padding-bottom:.5em;border: 1px solid">{{$item->total_pagado}}</td>
                @php
                    $total_recaudado+=$item->total_pagado;
                @endphp
            </tr>
        @endforeach
        <tr>
            <td align="center"  style="padding-top:.5em;padding-bottom:.5em;border: 1px solid" colspan="7">Total Recaudado Bs.</td>
            <td style="display: none;" ></td>
            <td style="display: none;" ></td>
            <td style="display: none;" ></td>
            <td style="display: none;" ></td>
            <td style="display: none;" ></td>
            <td style="display: none;" ></td>
            <td style="padding-top:.5em;padding-bottom:.5em;border: 1px solid">{{ sprintf("%.2f",$total_recaudado);}}</td>
        </tr>
    </table>
    <hr>
</body>

