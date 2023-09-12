<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Asistencia - @yield('title', 'Inicio')</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@500&family=Roboto:wght@100&family=Work+Sans:ital,wght@0,300;1,300&display=swap" rel="stylesheet">
    
    <!-- Estilos personalizados -->
    <style>
        
        @import url('https://fonts.googleapis.com/css?family=Rubik:400,500&display=swap');


        *{
            font-family: 'Work Sans', sans-serif;
        }


        p{
            text-align: center;
        }

        

        .container {
            display: flex;
            height: 100vh;
            max-width: 100%;
            margin: 0;
            padding: 0;
            }

        .content{
            display: flex;
            height: 100vh;
            
        }

        .left {
            overflow: hidden;
            display: flex;
            flex-wrap: wrap;
            flex-direction: column;
            justify-content: center;
            animation-name: left;
            animation-duration: 1s;
            animation-fill-mode: both;
            animation-delay: 1s;
            align-content: center;
            }

        .right {
            flex: 1;
            background-color: black;
            background-image: url('images/sena1.png');
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
            }



        .header > h2 {
            margin: 0;
            color: #36dda3;
            }

        .header > h4 {
            margin-top: 10px;
            font-weight: normal;
            font-size: 15px;
            color: rgba(0,0,0,.4);
            }

        .form {
            max-width: 80%;
            display: flex;
            flex-direction: column;
            }

        .form > p {
            text-align: right;
            }

        .form > p > a {
            color: #000;
            font-size: 14px;
            }

        .form-field {
            height: 46px;
            padding: 0 16px;
            border: 2px solid #ddd;
            border-radius: 4px;
            font-family: 'Rubik', sans-serif;
            outline: 0;
            transition: .2s;
            margin-top: 20px;
            }

        .form-field:focus {
            border-color: #0f7ef1;
            }

        .form > button {
            padding: 12px 10px;
            border: 0;
            background:  linear-gradient(to left,  #36dda3, #4582b4); 
            border-radius: 3px;
            margin-top: 10px;
            color: #fff;
            letter-spacing: 1px;
            font-family: 'Rubik', sans-serif;
            }

        .animation {
            animation-name: move;
            animation-duration: .4s;
            animation-fill-mode: both;
            animation-delay: 2s;
            }

        .a1 {
            animation-delay: 2s;
            }

        .a2 {
            animation-delay: 2.1s;
            }

        .a3 {
            animation-delay: 2.2s;
            }

        .a4 {
            animation-delay: 2.3s;
            }

        .a5 {
            animation-delay: 2.4s;
            }

        .a6 {
            animation-delay: 2.5s;
            }

        @keyframes move {
            0% {
                opacity: 0;
                visibility: hidden;
                transform: translateY(-40px);
            }

            100% {
                opacity: 1;
                visibility: visible;
                transform: translateY(0);
            }
            }

        @keyframes left {
            0% {
                opacity: 0;
                width: 0;
            }

            100% {
                opacity: 1;
                padding: 20px 40px;
                width: 650px;
            }
            }
    </style>
</head>
<body>

    <main class="content">
        @yield('content')
    </main>

    <!-- Opcional: JavaScript de Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz4fnFO9gybB5Vj1X2FB5c//8Ezj1GX6kXpDpODf6G1U6gx/wB2I5fA/" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-cn7l7gDp0eyniUwwAZgrzD06kc/tftFf19TOAs2zVinnD/C7E91j9yyk5//jjpt/" crossorigin="anonymous"></script>
</body>
</html>