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
            margin: 0 1rem 0 1rem;
            margin-bottom: 0
        }
        .bottom-underline{
            margin: 0;
            padding: 0;
        }
        
        table{
            border-collapse: separate; 
            border-spacing: 0 1.5rem;
            border: 1px solid black;
            border-radius: 10px;
        }
    </style>
</head>
<body>
    <p class="text-center">
        
    </p>
    <h3 class="text-center">HISTORIA CLINICA ODONTOLOGICA</h3>
    <h6 class="text-end">Nº 0001</h6>
    <h6 class="text-end">C.I. {{ $usuario->ci }}</h6>
    <table class="table">
        <tr>
            <td class="text-center">
                <p class="underline">{{ $usuario->paterno }}</p>
                <p class="bottom-underline">Ap. Paterno</p>
            </td>
            <td class="text-center">
                <p class="underline">{{ $usuario->materno }}</p>
                <p class="bottom-underline">Ap. Materno</p>
            </td>
            <td class="text-center">
                <p class="underline">{{ $usuario->nombres }}</p>
                <p class="bottom-underline">Nombres</p>
            </td>
            <td class="text-center">
                <p class="underline">45</p>
                <p class="bottom-underline">Edad</p>
            </td>
        </tr>
        
        <tr>
            <td class="text-center">
                <p class="underline">25/03/2000</p>
                <p class="bottom-underline">Fecha de nacimiento</p>
            </td>
            <td class="text-center">
                <p class="underline">78541236</p>
                <p class="bottom-underline">Telefono</p>
            </td>
            <td class="text-center" colspan="2">
                <p class="underline">Calle Surco 387</p>
                <p class="bottom-underline">Domicilio</p>
            </td>
        </tr>
    </table>
</body>
</html>