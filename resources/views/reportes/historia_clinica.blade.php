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

        .underline-solid{
            font-size: .8rem;
            border-bottom: 1px solid black;
            margin: 0 1rem 0 1rem;
        }
    </style>
</head>
<body>
    <h3 class="text-center">HISTORIA CLINICA ODONTOLOGICA</h3>
    <h6 class="text-end">Nº {{ $usuario->numero }}</h6>
    <h6 class="text-end">C.I. {{ $usuario->ci }}</h6>
    <h6>Datos Personales</h6>
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
                <p class="underline">{{ $usuario->edad }}</p>
                <p class="bottom-underline">Edad</p>
            </td>
        </tr>
        
        <tr>
            <td class="text-center">
                <p class="underline">{{ date_format(date_create($usuario->fec_nac), 'd - m - Y') }}</p>
                <p class="bottom-underline">Fecha de nacimiento</p>
            </td>
            <td class="text-center">
                <p class="underline">{{ $usuario->telefono }}</p>
                <p class="bottom-underline">Telefono</p>
            </td>
            <td class="text-center" colspan="2">
                <p class="underline">{{ $usuario->direccion }}</p>
                <p class="bottom-underline">Domicilio</p>
            </td>
        </tr>
    </table>

    <h6>Antecedentes Patologicos</h6>
    <table class="table">
        <tr class="text-center">
            <td>
                <p class="underline-solid">
                    <span>Alergias: </span>
                    <span>{{ $consulta->alergias ? 'SI' : 'NO'}}</span>
                </p>
            </td>
            <td>
                <p class="underline-solid">
                    <span>Enfermedades: </span>
                    <span>{{ $consulta->enfermedades ? 'SI' : 'NO'}}</span>
                </p>
            </td>
        </tr>
        <tr>
            <td>
                <p style="margin: 0 1rem 0 1rem;">
                    {{ $consulta->alergias ? $consulta->alergias : '-- NINGUNA --'}}
                </p>
            </td>
            <td>
                <p style="margin: 0 1rem 0 1rem;">
                    {{ $consulta->enfermedades ? $consulta->enfermedades : '-- NINGUNA --'}}
                </p>
            </td>
        </tr>
    </table>

    <h6>Diagnostico</h6>
    <table class="table">
        <tr>
            <td>
                <p style="margin: 0 1rem 0 1rem;">
                    {{ $consulta->diagnostico }}
                </p>
            </td>
        </tr>
    </table>

    <h6>Tratamiento</h6>
    <table class="table">
        <tr class="text-center">
            <td>
                <ul>
                    @foreach ($d_tratamientos as $dt)
                        <li>
                            <p>
                            {{ $dt->numero }} - {{ $dt->nombre }} - {{ $dt->parte_diente }} - {{ $dt->nombre }} - {{ $dt->descripcion }} - {{ $dt->costo }}
                            </p>
                        </li>
                    @endforeach
                </ul>
            </td>
        </tr>
    </table>
    <h6>Observaciones</h6>
    <p>
        ..............................
    </p>
</body>
</html>