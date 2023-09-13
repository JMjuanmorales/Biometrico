<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Asistencia - @yield('title', 'Inicio')</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@500&family=Roboto:wght@100&family=Work+Sans:ital,wght@0,300;1,300&display=swap" rel="stylesheet">
    
    <!-- Estilos personalizados -->
    <style>

        *{
            font-family: 'Work Sans', sans-serif;
        }
    /*-------------------------------------Header------------------------------------ */
        .header {
                background-color: rgb(0, 0, 0); 
                color: white;
                padding: 3px;
                font-size: 2.5rem;
                height: 130px;
                font-weight: bold;
                line-height: 90px;
                opacity: 0.8;
            }

    /*------------------------------------------menu header----------------------------------------------------------- */

        @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700;800;900&display=swap');

        .content {
            min-height: 700px;
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


        /*-----------------------boton ingresar rol--------------------*/

        .rol{
            background-color: black;
            border-radius: 12px;
            color: white;
            padding: 13px 26px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 17px;
            margin: 2px 1px;
            -webkit-transition-duration: 0.4s;
            transition-duration: 0.4s;
            cursor: pointer;

        }

        .rol{
            background-color: white; 
            color: black; 
            border: 2px solid black;
        }


        .rol:hover {
            background-color: black; 
            color: white;
        }

        /*-----------------------boton ingresar rol--------------------*/

        .logout{
            background-color: black;
            border-radius: 12px;
            color: white;
            padding: 13px 26px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 17px;
            margin: 2px 1px;
            -webkit-transition-duration: 0.4s;
            transition-duration: 0.4s;
            cursor: pointer;

        }

        .logout{
            background-color: white; 
            color: black; 
            border: 2px solid black;
        }


        .logout:hover {
            background-color: black; 
            color: white;
        }
        



    /*-------------------------------------------------caja contenedor---------------------------------------------------- */

        body{
            background-color: #ffffff ;
            background-size: cover;
            background-repeat: no-repeat;
            
        }

    
 /*-------------------------------------------------caja contenedor---------------------------------------------------- */

     

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
                background-color: black; 
                color: white;
                padding: 20px;
                font-size: 14px;
                height: 130px;
                font-weight: bold;
                line-height: 90px;
            }

        .nav ul li a{
            font-size: 3vh;
        }

        h1{
            padding: 20px;
            font-size: 30px;
        }
    }
   
    
        
    /* --------------fiachas ------------ */

        
    .container2 {
            display: flex;
            width: 100%;
            justify-content: space-evenly;
            flex-wrap: wrap;
            margin-top: 50px;
            
        }
        .admin {
            background-color:#238276 ;
            margin: 10px;
            border-radius: 10px;
            box-shadow: 0 2px 20px rgba(0, 0, 0, 0.2);
            overflow: hidden;
            width: 350px;
            color: #ffffff;
        }

        .admin-header {
            color: white;
        }
        
        .admin-body {
            background-color:#fff;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: flex-start;
            padding: 20px;
            min-height: 100px;
            color:black;
        }
        
        
        
        .admin-body p {
            font-size: 13px;
            margin: 0 0 40px;
            color:black;
        }
       
        /*---------------------------------------------------- */

        .instructor {
            background-color:#39a900;
            margin: 10px;
            border-radius: 10px;
            box-shadow: 0 2px 20px rgba(0, 0, 0, 0.2);
            overflow: hidden;
            width: 350px;
            color: #ffffff;
        }

        .instructor-header {
            color: white;
        }
        
        .instructor-body {
            background-color:#fff;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: flex-start;
            padding: 20px;
            min-height: 100px;
            color:black;
        }
        
        
        
        .instructor-body p {
            font-size: 13px;
            margin: 0 0 40px;
            color:black;
        }

    /*---------------------------------------------------- */

        .aprendiz {
            background-color:#fc7323;
            margin: 10px;
            border-radius: 10px;
            box-shadow: 0 2px 20px rgba(0, 0, 0, 0.2);
            overflow: hidden;
            width: 350px;
            color: #ffffff;
        }

        .aprendiz-header {
            color: white;
        }
        
        .aprendiz-body {
            background-color:#fff;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: flex-start;
            padding: 20px;
            min-height: 100px;
            color:black;
        }
        
        
        
        .aprendiz-body p {
            font-size: 13px;
            margin: 0 0 40px;
            color:black;
        }

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
            
            .icon-image-footer {
                width: 100px;
                height: 100px;
                
            }

            

            

        
        
    </style>
</head>
<body>
    <header class="header">
        <img class="icon-image" src="{{url('images/logo-sena2.svg')}}" alt="">
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

        <img class="icon-image-footer" src="{{url('images/logo-sena2.svg')}}" alt="">
  
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