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
            color: black;
            text-align: center;
            
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
        }

        



    /*-------------------------------------------------caja contenedor---------------------------------------------------- */

    body{
        background-color: #dee9ff ;
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
            width: 350px;
        }

        .card-header {
            color: white;
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
</body>
</html>



<!--<header class="header">
        Sistema de Asistencia
        <a href="{{ route('profile.show') }}">Ver perfil</a>

    </header>-->