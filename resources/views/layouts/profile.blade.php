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
                background-color:black; 
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
            color: rgb(0, 0, 0);
            text-align: center;
            padding-top: 45px;
            padding-bottom: 45px;
            
        }


        /*-----------------------boton Regresar-------------------*/
        .regresar{
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

        .regresar{
            background-color: white; 
            color: black; 
            border: 2px solid black;
        }


        .regresar:hover {
            background-color: black; 
            color: white;
        }
        

        



    /*-------------------------------------------------caja contenedor---------------------------------------------------- */

    body{
        background-color:#ffffff;
        background-size: cover;
        background-repeat: no-repeat;
        
    }

    
        
        

    /*---------------------------------------------------- */

    .registration-form{
        padding: 50px 0;
    }

    .registration-form form{
        background-color: #fff;
        max-width: 600px;
        margin: auto;
        padding: 50px 70px;
        border-top-left-radius: 30px;
        border-top-right-radius: 30px;
        box-shadow: 0px 2px 10px rgba(0, 0, 0, 0.075);
    }

    .registration-form .form-icon{
        text-align: center;
        background-color: black;
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
        background-color: black;
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
        color: black;
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

        .content {
            padding: 20px;
        }  

        
        
        .caja{
            align-items: center!important;
            width: 1200px;
            height: 254px;
            border-radius: 30px;
            background: lightgrey;
            box-shadow: rgba(50, 50, 93, 0.25) 0px 30px 50px -12px inset, rgba(0, 0, 0, 0.3) 0px 18px 26px -18px inset;

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
    <script src="sweetalert2.min.js"></script>
    <link rel="stylesheet" href="sweetalert2.min.css">
</body>
</html>