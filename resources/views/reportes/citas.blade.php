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
    <h3 class="text-center">Cantidad de Citas por Paciente</h3>
    <br>
    <h6 class="text-end">Desde la fecha {{$inicio}} al {{$fin}}</h6>
    <hr>
    <table  style="border-collapse:collapse;border=0px; border-radius: 10px;">

        <tr align="center">
            <th width = "50px" style="border: 1px solid">Nro.</th>
            <th  width = "90px" style="border: 1px solid">C.I.</th>
            <th width = "220px" style="border: 1px solid">Paciente</th>
            <th  width = "50px" style="border: 1px solid">Sexo</th>
            <th  width = "50px" style="border: 1px solid">Edad</th>
            <th  width = "210px" style="border: 1px solid">Cant. Citas</th>



        </tr>
        @foreach ($citas as $item)
            <tr align="center" >
                <td style="padding-top:.5em;padding-bottom:.5em;border: 1px solid;font-weight: bold">{{$loop->iteration}}</td>
                <td style="padding-top:.5em;padding-bottom:.5em;border: 1px solid">{{$item->ci}}</td>
                <td style="padding-top:.5em;padding-bottom:.5em;border: 1px solid">{{$item->nombres}} {{$item->paterno}} {{$item->materno}}</td>
                <td style="padding-top:.5em;padding-bottom:.5em;border: 1px solid">{{$item->sexo}}</td>
                @php
                    $fecha_nac = new DateTime(date('Y/m/d',strtotime($item->fec_nac))); // Creo un objeto DateTime de la fecha ingresada
                    $fecha_hoy =  new DateTime(date('Y/m/d',time())); // Creo un objeto DateTime de la fecha de hoy
                    $edad = date_diff($fecha_hoy,$fecha_nac); // La funcion ayuda a calcular la diferencia, esto seria un objeto
                    $myedad=$edad->format('%Y');
                @endphp
                <td style="padding-top:.5em;padding-bottom:.5em;border: 1px solid">{{$myedad}}</td>
                <td style="padding-top:.5em;padding-bottom:.5em;border: 1px solid">{{$item->numero_citas}}</td>
            </tr>
        @endforeach
    </table>
    <hr>
</body>

