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
    <h3 class="text-center">LISTA DE USUARIOS ATENDIDOS</h3>
    <br>
    <h6 class="text-end">Desde la fecha {{$inicio}} al {{$fin}}</h6>
    <hr>
    <table >
        <tr align="center">
            <th  width = "656px" style="border: 1px solid">
                MÉDICO: {{$user->nombres}} {{$user->paterno}} {{$user->materno}}
            </th>

        </tr>
    </table>
    <table  style="border-collapse:collapse;border=0px; border-radius: 10px;">

        <tr align="center">
            <th width = "100px" style="border: 1px solid">Nro.</th>
            <th  width = "200px" style="border: 1px solid">C.I. Paciente</th>
            <th width = "350px" style="border: 1px solid">Nombre Paciente</th>

        </tr>
        @php
            $total_atendidos=0;
        @endphp
        @foreach ($usuarios as $item)
            <tr align="center" >
                <td style="padding-top:.5em;padding-bottom:.5em;border: 1px solid;font-weight: bold">{{$loop->iteration}}</td>
                <td style="padding-top:.5em;padding-bottom:.5em;border: 1px solid">{{$item->ci_paciente}}</td>
                <td style="padding-top:.5em;padding-bottom:.5em;border: 1px solid">{{$item->nombre_paciente}}</td>

                @php
                    $total_atendidos+=1;
                @endphp
            </tr>
        @endforeach
        <tr>
            <td align="center"  style="padding-top:.5em;padding-bottom:.5em;border: 1px solid" colspan="3">Total pacientes atendidos {{$total_atendidos}}</td>
            <td style="display: none;" ></td>
            <td style="display: none;" ></td>


        </tr>
    </table>
    <hr>
</body>

