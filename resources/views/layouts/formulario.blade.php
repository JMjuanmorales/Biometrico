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

    
    *{
            font-family: 'Work Sans', sans-serif;
        }
    label{
        font-weight: bold;
    }

    .atras {
            width: 50px;
            height: 50px;
        }

    /*----------------------------------------------------------------------------------------------------- */

    .content {
    min-height: 500px;
    }

    body{
        background-color: #dee9ff;
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
        background-color: #5891ff;
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

    /* -------------------Tablas---------------- */

        
        

    /*---------------------------------------------------- */
       
    /*---------------------------------------------------- */
   
        
        
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
