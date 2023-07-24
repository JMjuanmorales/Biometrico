<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Asistencia - @yield('title', 'Inicio')</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- Estilos personalizados -->
    <style>

    /*-------------------------------------Header------------------------------------ */
        .header {
                background:linear-gradient(to left,  #36dda3, #4582b4); 
                color: white;
                padding: 20px;
                font-size: 2.5rem;
                height: 130px;
                font-weight: bold;
                line-height: 90px;
                opacity: 0.8;
            }

    /*------------------------------------------menu header----------------------------------------------------------- */

        @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700;800;900&display=swap');

        .content {
            min-height: 500px;
            padding: 20px;
        }
        
        .form-icon {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .icon-image {
            width: 140px;
            height: 140px;
        }

        h1{
            font-family: 'Lato', sans-serif;
            font-family: 'Oswald', sans-serif;
            font-weight: 800;
            font-size: 3vw;
            line-height: 1;
            color: rgb(0, 0, 0);
            text-align: center;
            padding-top: 45px;
            padding-bottom: 45px;
            
        }

        .menu-icon{
        position: absolute;
        left: -9999px;
        }

        

        
        
        .menu-icon:checked + label,
        .menu-icon:not(:checked) + label{
        position: fixed;
        top: 63px;
        right: 75px;
        display: block;
        width: 30px;
        height: 30px;
        padding: 0;
        margin: 0;
        cursor: pointer;
        z-index: 10;
        
        }
        .menu-icon:checked + label:before,
        .menu-icon:not(:checked) + label:before{
        position: absolute;
        content: '';
        display: block;
        width: 30px;
        height: 20px;
        z-index: 20;
        top: 0;
        left: 0;
        border-top: 2px solid black;
        border-bottom: 2px solid black;
        transition: border-width 100ms 1500ms ease, 
                    top 100ms 1600ms cubic-bezier(0.23, 1, 0.32, 1),
                    height 100ms 1600ms cubic-bezier(0.23, 1, 0.32, 1), 
                    background-color 200ms ease, 
                    transform 200ms cubic-bezier(0.23, 1, 0.32, 1);
        }
        .menu-icon:checked + label:after,
        .menu-icon:not(:checked) + label:after{
        position: absolute;
        content: '';
        display: block;
        width: 22px;
        height: 2px;
        z-index: 20;
        top: 10px;
        right: 4px;
        background-color: black;
        margin-top: -1px;
        transition: width 100ms 1750ms ease, 
                    right 100ms 1750ms ease,
                    margin-top 100ms ease, 
                    background-color 200ms 500ms ease #fff,
                    transform 200ms cubic-bezier(0.23, 1, 0.32, 1);
        }
        .menu-icon:checked + label:before{
        top: 10px;
        transform: rotate(45deg);
        height: 2px;
        background-color: black;
        border-width: 0;
        transition: border-width 100ms 340ms ease, 
                    top 100ms 300ms cubic-bezier(0.23, 1, 0.32, 1),
                    height 100ms 300ms cubic-bezier(0.23, 1, 0.32, 1), 
                    background-color 200ms 500ms ease ,
                    transform 200ms 1700ms cubic-bezier(0.23, 1, 0.32, 1);
        }
        .menu-icon:checked + label:after{
        width: 30px;
        margin-top: 0;
        right: 0;
        transform: rotate(-45deg);
        transition: width 100ms ease,
                    right 100ms ease,  
                    margin-top 100ms 500ms ease, 
                    transform 200ms 1700ms cubic-bezier(0.23, 1, 0.32, 1);
        }

        .nav{
            position: fixed;
            top: 0;
            right: 0;
            display: block;
            width: 0;
            height: 100vh;
            padding: 0;
            margin: 0;
            z-index: 9;
            overflow: hidden;
            box-shadow: 0 8px 30px 0 rgba(0,0,0,0.3);
            background-color: #353746;
            transition: width 3s cubic-bezier(0.23, 1, 0.32, 1);
        }
        @keyframes border-transform{
            0%,100% { border-radius: 63% 37% 54% 46% / 55% 48% 52% 45%; } 
        14% { border-radius: 40% 60% 54% 46% / 49% 60% 40% 51%; } 
        28% { border-radius: 54% 46% 38% 62% / 49% 70% 30% 51%; } 
        42% { border-radius: 61% 39% 55% 45% / 61% 38% 62% 39%; } 
        56% { border-radius: 61% 39% 67% 33% / 70% 50% 50% 30%; } 
        70% { border-radius: 50% 50% 34% 66% / 56% 68% 32% 44%; } 
        84% { border-radius: 46% 54% 50% 50% / 35% 61% 39% 65%; } 
        }

        .menu-icon:checked ~ .nav {
            width: 40%;
            transition: width 1s cubic-bezier(0.23, 1, 0.32, 1);
        }

        .nav ul{
            position: absolute;
            top: 50%;
            left: 0;
            display: block;
            width: 100%;
            padding: 0;
            margin: 0;
            z-index: 6;
            text-align: center;
            transform: translateY(-50%);
            list-style: none;
        }
        .nav ul li{
            position: relative;
            display: block;
            width: 100%;
            padding: 0;
            margin: 10px 0;
            text-align: center;
            list-style: none;
            pointer-events: none;
            opacity: 0;
            visibility: hidden;
            transform: translateY(30px);
            transition: all 250ms linear;
        }
        .nav ul li:nth-child(1){
        transition-delay: 200ms;
        }
        .nav ul li:nth-child(2){
        transition-delay: 150ms;
        }
        .nav ul li:nth-child(3){
        transition-delay: 100ms;
        }
        .nav ul li:nth-child(4){
        transition-delay: 50ms;
        }
        .nav ul li a{
            font-family: 'Montserrat', sans-serif;
            font-size: 4vh;
            text-transform: uppercase;
            line-height: 2;
            font-weight: 800;
            display: inline-block;
            position: relative;
            color: #ececee;
            transition: all 250ms linear;
        }
        .nav ul li a:hover{
            text-decoration: none;
            color: #ffeba7;
        }
        .nav ul li a:after{
            display: block;
            position: absolute;
            top: 50%;
            content: '';
            height: 2vh;
            margin-top: -1vh;
            width: 0;
            left: 0;
            background-color: #353746;
            opacity: 0.8;
            transition: width 250ms linear;
        }
        .nav ul li a:hover:after{
        width: 100%;
        }


        .menu-icon:checked ~ .nav  ul li {
            pointer-events: auto;
            visibility: visible;
            opacity: 1;
            transform: translateY(0);
            transition: opacity 350ms ease,
                        transform 250ms ease;
        }
        .menu-icon:checked ~ .nav ul li:nth-child(1){
        transition-delay: 0.3s;
        }
        .menu-icon:checked ~ .nav ul li:nth-child(2){
        transition-delay: 0.5s;
        }
        .menu-icon:checked ~ .nav ul li:nth-child(3){
        transition-delay: 0.7s;
        }
        .menu-icon:checked ~ .nav ul li:nth-child(4){
        transition-delay: 0.9s;
        }
        .menu-icon:checked ~ .nav ul li:nth-child(5){
        transition-delay: 1.1s;
        }
        .menu-icon:checked ~ .nav ul li:nth-child(6){
        transition-delay: 1.3s;
        }
        .menu-icon:checked ~ .nav ul li:nth-child(7){
        transition-delay: 1.5s;
        }



        .logo {
            position: absolute;
            top: 60px;
            left: 50px;
            display: block;
            z-index: 11;
            transition: all 250ms linear;
        }
        .logo img {
            height: 26px;
            width: auto;
            display: block;
        }

        @media screen and (max-width: 480px) {
            
            .menu-icon:checked ~ .nav {
                width: 100%;
            }

            .nav ul li a{
                font-size: 2vh;
            }
        }

        /*-----------------------logaut--------------------*/

        .regresar {
            
            background-color: #04808e;
            border: solid transparent;
            border-radius: 16px;
            border-width: 0 0 4px;
            box-sizing: border-box;
            color: black;
            cursor: pointer;
            display: inline-block;
            font-size: 15px;
            font-weight: 700;
            text-decoration: none;
            letter-spacing: .8px;
            line-height: 20px;
            margin: 0;
            outline: none;
            overflow: visible;
            padding: 13px 19px;
            text-align: center;
            text-transform: uppercase;
            touch-action: manipulation;
            transform: translateZ(0);
            transition: filter .2s;
            user-select: none;
            -webkit-user-select: none;
            vertical-align: middle;
            white-space: nowrap;
            }

        .regresar:after {
            background-clip: padding-box;
            background-color: #03a5fd;
            border: solid transparent;
            border-radius: 16px;
            border-width: 0 0 4px;
            bottom: -4px;
            content: "";
            left: 0;
            position: absolute;
            right: 0;
            top: 0;
            z-index: -1;
            }

        .regresar:focus {
            user-select: auto;
            }

        .regresar:hover:not(:disabled) {
            filter: brightness(1.1);
            }

        .regresar:disabled {
            cursor: auto;
            }

        .regresar:active:after {
            border-width: 0 0 0px;
            }

        .regresar:active {
            padding-bottom: 10px;
            }
        

        



    /*-------------------------------------------------caja contenedor---------------------------------------------------- */

    body{
        background-color:#dee9ff;
        background-size: cover;
        background-repeat: no-repeat;
        
    }

    .registration-form{
        padding: 50px 0;
        
    }

    .registration-form form{
        background-color: #fff;
        max-width: 900px;
        margin: auto;
        padding: 50px 70px;
        border-top-left-radius: 30px;
        border-top-right-radius: 30px;
        box-shadow: 0px 2px 10px rgba(0, 0, 0, 0.075);
    }

    .registration-form .form-icon{
        text-align: center;
        background-color: #39a900;
        border-radius: 50%;
        font-size: 40px;
        color: white;
        width: 100px;
        height: 100px;
        margin: auto;
        margin-bottom: 50px;
        line-height: 100px;
    }

    .registration-form .item{
        border-radius: 20px;
        margin-bottom: 25px;
        padding: 10px 20px;
    }

    .registration-form .create-account{
        border-radius: 30px;
        padding: 10px 20px;
        font-size: 18px;
        font-weight: bold;
        background-color: #5791ff;
        border: none;
        color: white;
        margin-top: 20px;
    }

    .registration-form .social-media{
        max-width: 600px;
        background-color: #fff;
        margin: auto;
        padding: 35px 0;
        text-align: center;
        border-bottom-left-radius: 30px;
        border-bottom-right-radius: 30px;
        color: #9fadca;
        border-top: 1px solid #dee9ff;
        box-shadow: 0px 2px 10px rgba(0, 0, 0, 0.075);
    }

    .registration-form .social-icons{
        margin-top: 30px;
        margin-bottom: 16px;
    }

    .registration-form .social-icons a{
        font-size: 23px;
        margin: 0 3px;
        color: #5691ff;
        border: 1px solid;
        border-radius: 50%;
        width: 45px;
        display: inline-block;
        height: 45px;
        text-align: center;
        background-color: #fff;
        line-height: 45px;
    }

    .registration-form .social-icons a:hover{
        text-decoration: none;
        opacity: 0.6;
    }

    @media (max-width: 576px) {
        .registration-form form{
            padding: 50px 20px;
        }

        .registration-form .form-icon{
            width: 70px;
            height: 70px;
            font-size: 30px;
            line-height: 70px;
        }

        .icon-image {
            width: 90px;
            height: 90px;
        }

        .header {
                background:linear-gradient(to left,  #36dda3, #4582b4); 
                color: white;
                padding: 20px;
                font-size: 20px;
                height: 130px;
                font-weight: bold;
                line-height: 90px;
            }

        .nav ul li a{
            font-size: 3vh;
        }
    }

    /* ----------------Checkbox-------------- */

    .form-check-input {
        border: 1px solid blue;
        border-radius: 3px;
        width: 16px;
        height: 16px;
        display: inline-block;
        position: relative;

        &:after {
            content: '';
            display: block;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%) scale(0);
            width: 12px;
            height: 12px;
            background-color: blue;
            border-radius: 3px;
            transition: 0.3s;
        }
    }

    /* -------------------Tablas---------------- */
    table, td, th { 
            text-align: center;
            background-color: #e7ecf1;

        }

        

    th {
            border-top: 1px solid;
            background: rgb(26, 75, 199);
        }

        

    thead{
            border-right: 1px solid;
            border-left: 1px solid;
            border-collapse: collapse;
            background: #4582b4; 
        }

    thead th {
            color: #fff;
            }
        
            /* --------------fiachas ------------ */

        .p-5{
            padding: 20px;
            
            padding: 3rem!important;
             }

        a:link, a:visited, a:active {
            text-decoration:none;
        }
        .container2 {
            display: flex;
            width: 100%;
            justify-content: space-evenly;
            flex-wrap: wrap;
            margin-top: 50px;
        }
        .card {
            background-color:#167AA5 ;
            margin: 10px;
            border-radius: 10px;
            box-shadow: 0 2px 20px rgba(0, 0, 0, 0.2);
            overflow: hidden;
            width: 300px;
        }
        .card-header img {
            background-color: #167AA5 ;
            width: 100%;
            height: 200px;
            object-fit: cover;
        }
        .card-body {
            background-color:#fff;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: flex-start;
            padding: 20px;
            min-height: 100px;
            color:black;
        }
        
        
        
        .card-body p {
            font-size: 13px;
            margin: 0 0 40px;
            color:black;
        }
        .user {
            background-color:#fff;
            display: flex;
            margin-top: auto;
            flex-direction: column;
            justify-content: center;
            align-items: flex-start;
            padding: 20px;
            color:black;

        

        }

    /*---------------------------------------------------- */
       
    /*---------------------------------------------------- */
    /*footer*/


    .footer-distributed {
                background-color: black;
                box-shadow: 0 1px 1px 0 rgba(0, 0, 0, 0.12);
                box-sizing: border-box;
                width: 100%;
                text-align: left;
                font: normal 16px sans-serif;
                padding: 45px 50px;
                
                bottom: 0;
                z-index: -2;
                }

            .footer-distributed .footer-left p {
                color: #8f9296;
                font-size: 14px;
                margin: 0;
                }
                /* Footer links */

            .footer-distributed p.footer-links {
                font-size: 18px;
                font-weight: bold;
                color: #ffffff;
                margin: 0 0 10px;
                padding: 0;
                transition: ease .25s;
                }

            .footer-distributed p.footer-links a {
                display: inline-block;
                line-height: 1.8;
                text-decoration: none;
                color: inherit;
                transition: ease .25s;
                }

            .footer-distributed .footer-links a:before {
                content: "·";
                font-size: 20px;
                left: 0;
                color: #fff;
                display: inline-block;
                padding-right: 5px;
                }

            .footer-distributed .footer-links .link-1:before {
                content: none;
                }

            .footer-distributed .footer-right {
                float: right;
                margin-top: 6px;
                max-width: 180px;
                }

            .footer-distributed .footer-right a {
                display: inline-block;
                width: 35px;
                height: 35px;
                background-color: black;
                border-radius: 2px;
                font-size: 20px;
                color: #ffffff;
                text-align: center;
                line-height: 35px;
                margin-left: 3px;
                transition:all .25s;
                }

        
        
    </style>
</head>
<body>
    <header class="header">
        Sistema de Asistencia
    </header>
        

        <input class="menu-icon" type="checkbox" id="menu-icon" name="menu-icon"/>
        <label for="menu-icon"></label>
        <nav class="nav"> 		
            <ul class="pt-5">
                @if(Auth::user()->hasRole('admin'))
                    <li><a href="{{ route('admin.users') }}" >Listar usuarios</a></li>
                    <li><a href="{{ route('admin.create-program.form') }}" >Crear Programa</a></li>
                    <li><a href="{{ route('admin.create-group.form') }}">Crear Grupo</a></li>
                    <li><a href="{{ route('admin.list-groups')}}" >Listar grupos</a></li>
                    <li><a href="{{ route('admin.create-user') }}">Crear usuario</a></li>

                @endif
                
                
                <li><a href="{{ route('profile.show') }}">Ver perfil</a></li>
                
                <li><a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form></li>
            </ul>
        </nav>



        
    
    <main class="content">
        @yield('content')
    </main>

    <footer class="footer-distributed">

    <div class="footer-left">
  
      <p class="footer-links">
        <a class="link-1" href="#">Integrantes</a>
  
        <a href="#">Simón Ramirez</a>
  
        <a href="#">Angie Jimenez</a>
  
        <a href="#">Esteban Morales</a>
  
      </p>
  
      <p>Biometric Services &copy; 2023</p>
    </div>
  
  </footer>

    <!-- Opcional: JavaScript de Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz4fnFO9gybB5Vj1X2FB5c//8Ezj1GX6kXpDpODf6G1U6gx/wB2I5fA/" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-cn7l7gDp0eyniUwwAZgrzD06kc/tftFf19TOAs2zVinnD/C7E91j9yyk5//jjpt/" crossorigin="anonymous"></script>
    <script src="sweetalert2.min.js"></script>
    <link rel="stylesheet" href="sweetalert2.min.css">
</body>
</html>



<!--<header class="header">
        Sistema de Asistencia
        <a href="{{ route('profile.show') }}">Ver perfil</a>

    </header>-->