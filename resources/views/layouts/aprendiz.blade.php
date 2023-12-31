<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Asistencia - @yield('title', 'Inicio')</title>

    <!-- Bootstrap CSS -->
    <link href="https://fonts.googleapis.com/css2?family=Oswald&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Lato&display=swap" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

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
                background-color: #fc7323; 
                color: white;
                padding: 3px;
                font-size: 2.5rem;
                height: 130px;
                font-weight: bold;
                line-height: 90px;
            }

        label{
        font-weight: bold;
        }

    /*------------------------------------------menu header----------------------------------------------------------- */

    /*------------------------------------------menu header----------------------------------------------------------- */

    @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700;800;900&display=swap');

.content {
    min-height: 700px;
    padding: 20px;
}

.atras {
    width: 50px;
    height: 50px;
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
    font-weight: 800;
    font-size: 3vw;
    line-height: 1;
    color: black;
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
    width: 30%;
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
    color: #fc7323;
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

    /*-----------------------Regresar--------------------*/

    /*-----------------------boton Regresar-------------------*/
    .regresar{
            background-color: #fc7323;
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
            border: 2px solid #fc7323;
        }


        .regresar:hover {
            background-color: #fc7323; 
            color: white;
        }

        /*-----------------------Calendario--------------------*/
        .calendario{
            background-color: #fc7323;
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

        .calendario{
            background-color: white; 
            color: black; 
            border: 2px solid #fc7323;
        }


        .calendario:hover {
            background-color: #fc7323; 
            color: white;
        }
        

        


    /*-------------------------------------------------caja contenedor---------------------------------------------------- */

    body{
        background-color: #f8efe6;
    }

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
        border-bottom-left-radius: 30px;
        border-bottom-right-radius: 30px;
        box-shadow: 0px 2px 10px rgba(0, 0, 0, 0.075);
    }

    .registration-form .form-icon{
        text-align: center;
        background-color: #fc7323;
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
        background-color: #fc7323;
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
        color: #fc7323;
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
                background-color:#fc7323;
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

        /* --------------fiachas ------------ */

        .p-5{
            background: linear-gradient(to left,  #36dda3, #4582b4);
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
            background-color:#fc7323 ;
            margin: 10px;
            border-radius: 10px;
            box-shadow: 0 2px 20px rgba(0, 0, 0, 0.2);
            overflow: hidden;
            width: 300px;
        }
        .card-header img {
            background-color: #fc7323 ;
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
  
        
       
        
        
        /*---------------boton buscar--------------------*/
        .input-group-append{
            text-align: center;
        }
        

        /*---------------busqueda--------------------*/

        .form-control{
            margin-top: 33px;
        }


        /* ----------------------- Pasar de pagina-----------------*/
        .pasarDePagina{
            text-align: center;
        }


        

        /*-------------------Titulos----------------- */

        h1{
            margin-top: 33px;
            margin-bottom: 33px;
            
            font-size: 41px;
            text-align: center;
            font-weight: 1000;           
        }

        

        h2{
            margin-top: 33px;
            margin-bottom: 10px;
            
            font-size: 41px;
            text-align: center;
            font-weight: 0;  
        }

        h3, .textGrupos{
            margin-top: 33px;
            margin-bottom: 10px;
            font-size: 41px;
            text-align: center;
            padding: 0px; 
        }


        @media screen and (max-width:320px){
            h3, .textGrupos{
            margin-top: 33px;
            margin-bottom: 10px;
            font-size: 25px;
            text-align: center;
            display: flex;
            align-items: flex-start;
            padding: 0px; 
        }

        }


        /* -------------------Tablas---------------- */
        table, td, th { 
            text-align: center;
            font-family: "Calibri";
            background-color: #fff;

        }

        

        th {
            border-top: 1px solid;
            background: black;
        }

        

        thead{
            border-right: 1px solid;
            border-left: 1px solid;
            border-collapse: collapse;
            background-color: #fc7323;
        }

        thead th {
            color: #fff;
            }

        @media screen and (max-width: 480px) {
            
            table{
                display: block;
                overflow-x: auto;
            
            }
            h1{
            padding: 20px;
            font-size: 30px;
        }
        .custom-input-file {
            
            width: 156px;
            }
            
        }
        
        

        

        /*footer*/


            .footer-distributed {
                background-color: black;
                box-shadow: 0 1px 1px 0 rgba(0, 0, 0, 0.12);
                box-sizing: border-box;
                width: 100%;
                text-align: left;
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
        

        <input class="menu-icon" type="checkbox" id="menu-icon" name="menu-icon"/>
        <label for="menu-icon"></label>
        <nav class="nav"> 		
            <ul class="pt-5">
                <li><a href="{{ route('excuse.create') }}"  id="excusa1">Subir Excusa</a></li>
                <li><a href="{{ route('excuses') }}"  id="excusa2">Mis excusas</a></li>
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

    <!-- Opcional: JavaScript de Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz4fnFO9gybB5Vj1X2FB5c//8Ezj1GX6kXpDpODf6G1U6gx/wB2I5fA/" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-cn7l7gDp0eyniUwwAZgrzD06kc/tftFf19TOAs2zVinnD/C7E91j9yyk5//jjpt/" crossorigin="anonymous"></script>
    
    <footer class="footer-distributed">

    <div class="footer-left">
  
      <p class="footer-links">
        <a class="link-1" href="#">Integrantes</a>
  
        <a href="#">Simón Ramirez</a>
  
        <a href="#">Angie Jimenez</a>
  
        <a href="#">Esteban Morales</a>

        <img class="icon-image-footer" src="{{url('images/logo-sena2.svg')}}" alt="">
      </p>
  
      <p>QR Services &copy; 2023</p>
    </div>
  
  </footer>



</body>
</html>