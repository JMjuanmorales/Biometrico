<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Asistencia - @yield('title', 'Inicio')</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- Estilos personalizados -->
    <style>
        .caja{
            align-items: center!important;
            width: 1200px;
            height: 254px;
            border-radius: 30px;
            background: lightgrey;
            box-shadow: rgba(50, 50, 93, 0.25) 0px 30px 50px -12px inset, rgba(0, 0, 0, 0.3) 0px 18px 26px -18px inset;

        }

        body {
            background-color: #f0f2f5;
        }

        .header {
            background-color: #4caf50;
            color: white;
            padding: 20px;
            font-size: 1.5rem;
            font-weight: bold;
        }

        .content {
            padding: 20px;
        }        

        .input-field{
            position: relative;
        }

        .input-field input {
            width: 350px;
            height: 60px;
            border-radius: 6px;
            font-size: 18px;
            padding: 0 15px;
            border: 2px solid black;
            background: transparent;
            color: black;
            outline: none;
        }

        .input-field label{
            position: absolute;
            top: 50%;
            left: 15px;
            transform: translateY(-50%);
            color: black;
            font-size: 19px;
            pointer-events: none;
            transition: .3s;
        }

        input:valid ~ label,
        input:focus ~ label {
            top: 0;
            left: 15px;
            font-size: 16px;
            padding: 0 2px;
            background: gray;
        }

        .card {
            width: 100%;
            height: 254px;
            border-radius: 30px;
            background: #e0e0e0;
            box-shadow: 15px 15px 30px #bebebe,
                        -15px -15px 30px #ffffff;
            }
        .mayor{
            position: absolute;
            top: 30%;
            left: 20%;
        }

        .cuadrado {
            width: 400px;
            height: 300px;
            position: absolute;
            top: 30%;
            left: 55%
        }

        body{
        text-align: center;
    }
    h1{
        display: inline-block;
        position: relative;
    }

    h1::after,h1::before{
        content: '';
        position: absolute;
        width: 120px;
        height: 3px;
        background-color: black;
        top: 0.6em;     
    }

    h1::before{
        left: -140px;
    }

    h1::after{
        right: -140px;
    }

    .cabeza{
        background: #28A645;; 
        color: white;
    }

    #creacion1{
        position: absolute;
        left: 7.5%;
    }

    #creacion{
        position: absolute;
        left: 17%;
    }

    #excusa1{
        position: absolute;
        right: 25%;
    }

    #excusa2{
        position: absolute;
        right: 10%;
    }

    .logout{
        position: absolute;
        left: 6.5%;
    }

    </style>
</head>
<body>
    <header class="header">
        Sistema de Asistencia
        <a href="{{ route('profile.show') }}">Ver perfil</a>

    </header>

    <main class="content">
        @yield('content')
    </main>

    <!-- Opcional: JavaScript de Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz4fnFO9gybB5Vj1X2FB5c//8Ezj1GX6kXpDpODf6G1U6gx/wB2I5fA/" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-cn7l7gDp0eyniUwwAZgrzD06kc/tftFf19TOAs2zVinnD/C7E91j9yyk5//jjpt/" crossorigin="anonymous"></script>
</body>
</html>