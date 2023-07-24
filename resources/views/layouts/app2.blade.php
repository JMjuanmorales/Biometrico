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
    <!-- Estilos personalizados -->
    <style>

        * {
            padding: 0;
            margin: 0;
            box-sizing: border-box;
            font-family: 'Lato', sans-serif;
            font-family: 'Oswald', sans-serif;
        }



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
            background-color: #167AA5 ;
            color: white;
            padding: 20px;
            font-size: 1.5rem;
            font-weight: bold;
        }

        .content {
            padding: 20px;
        }        

       


/*----------------fichas nuevo------------*/ 

.p-5{
  background: linear-gradient(to left, #429900, #82d836, #36dda3, #4582b4);
  padding: 3rem!important;
}

/*---------------------------------------- */

/*.container2 {
    display: flex;
    width: 100%;
    justify-content: space-evenly;
    flex-wrap: wrap;
    margin-top: 150px;
  }
  .card {
    margin: 10px;
    background-color:black;
    box-shadow: rgba(151, 65, 254, 0.2) 0 15px 3px -5px;
    background-image: linear-gradient(25deg, #FFFFFF, 33%,#118153);
    border-radius: 10px;
    box-shadow: 0 2px 20px rgba(0, 0, 0, 0.2);
    overflow: hidden;
    width: 300px;
    white-space: nowrap;
    text-overflow: ellipsis;
    overflow: hidden;
  }
  
  .card-header img {
    width: 100%;

    object-fit: cover;
  }


  .card-body {
    background-color:black;
    background: linear-gradient(to left, #FFFFFF, 33%,#118153);
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: flex-start;
    padding: 20px;

    color:#fff;
    text-decoration: none; 
    
  }
  
 
  .card-body p {
   
    font-size: 13px;
    margin: 0 0 40px;
  }
  .user {
    display: flex;
    margin-top: auto;
  }
  */
  /*.product-image {
    object-fit:cover;
    width:100%;
    text-decoration: none;
    
  }*/

  
 
    

/*------------------------------------------------- */
/*.product-card .card-body {
            z-index:10;
            background-color: #fff;
            text-align:center;
            color:black;
            text-decoration: none; 
            border-bottom-left-radius:29px;
            border-bottom-right-radius:29px;

            
        }

        .product-name {
            font-weight:bold;
            margin-bottom:10px;
            text-decoration: none;
            
        }

        .product-price {
            color:black;
        }

        .product-price:link  {
            text-decoration:none
        }
*/
/*-------------------------------------------------*/
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
  
 

/*-----------------------logaut--------------------*/

.logout {
            
            background-color: #167AA5 ;
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

        .logout:after {
            background-clip: padding-box;
            background-color: #167AA5 ;
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

        .logout:focus {
            user-select: auto;
            }

        .logout:hover:not(:disabled) {
            filter: brightness(1.1);
            }

        .logout:disabled {
            cursor: auto;
            }

        .logout:active:after {
            border-width: 0 0 0px;
            }

        .logout:active {
            padding-bottom: 10px;
            }
        
        footer{
            background-color:black;
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

    <!-- Opcional: JavaScript de Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz4fnFO9gybB5Vj1X2FB5c//8Ezj1GX6kXpDpODf6G1U6gx/wB2I5fA/" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-cn7l7gDp0eyniUwwAZgrzD06kc/tftFf19TOAs2zVinnD/C7E91j9yyk5//jjpt/" crossorigin="anonymous"></script>
    <footer class="bg-black text-white py-5">
		<div class="container">
			<div class="row">
				<div class="col-md-6">
					<h5>Integrantes</h5>
					<p>Simon Ramirez - Angie Jimenez - Steven Pino - Jeison Salazar - Valeria Ortiz</p>
				</div>
				
			</div>
			<hr>
			<p class="text-center">&copy; 2023 Biometric Services</p>
		</div>
	</footer>
</body>
</html>