<?php

	session_start();

	$total = $_SESSION["total"];

	$us = $_SESSION["username"];
	$idC = $_SESSION["idCarrito"];

	$enlace = mysqli_connect("127.0.0.1:3308", "usuarioTienda", "Pass1357!", "tiendaonline");


//Query para crear ticket
	$query_insert = "INSERT INTO ticket
            (id_usuario, precio_total, Fecha)
            VALUES
            ('$us', '$total', now());" ;
            

    $insert_query = mysqli_query($enlace, $query_insert );



	$query = "SELECT Fecha, id_ticket FROM ticket";

	$result = mysqli_query($enlace,$query);

	$row = mysqli_fetch_array($result);


	//query para llenar informacion de pago

	$numTar = $_POST["numTarjeta"];
	$ccv = $_POST["ccv"];
	$fechaE = $_POST["fechaExp"];

	$query_pago = "INSERT INTO informacion_pago
	(Num_tarjeta, id_usuario, CCV, Fecha_expiracion)
	VALUES
	('$numTar', '$us', '$ccv', '$fechaE')";
	$insert_query = mysqli_query($enlace, $query_pago );


	//query para llenar el carrito has venta

	$idTick = $row["id_ticket"];


	$query4 = "INSERT INTO carrito_has_venta
	(num_ticket, id_carrito, precio_total)
	VALUES
	('$idTick','$idC', '$total')";
	$insert_query = mysqli_query($enlace, $query4);




	
?>








<!DOCTYPE html>
<html lang="zxx" class="no-js">

<head>
	<!-- Mobile Specific Meta -->
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<!-- Favicon-->
	<link rel="shortcut icon" href="img/fav.png">
	<!-- Author Meta -->
	<meta name="author" content="CodePixar">
	<!-- Meta Description -->
	<meta name="description" content="">
	<!-- Meta Keyword -->
	<meta name="keywords" content="">
	<!-- meta character set -->
	<meta charset="UTF-8">
	<!-- Site Title -->
	<title>PC Shop</title>

	<meta http-equiv="refresh" content="3;URL=borrar2.php">
	<!--
		CSS
		============================================= -->
	<link rel="stylesheet" href="css/linearicons.css">
	<link rel="stylesheet" href="css/owl.carousel.css">
	<link rel="stylesheet" href="css/themify-icons.css">
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="css/nice-select.css">
	<link rel="stylesheet" href="css/nouislider.min.css">
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="css/main.css">
</head>

<body>

	 <!-- Inicio Header -->
	<header class="header_area sticky-header">
		<div class="main_menu">
			<nav class="navbar navbar-expand-lg navbar-light main_box">
				<div class="container">
					
					<a class="navbar-brand logo_h" href="index.php"><img src="img/logo2.png" alt=""></a>
					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
					 aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					
					<div class="collapse navbar-collapse offset" id="navbarSupportedContent">
						<ul class="nav navbar-nav menu_nav ml-auto">
							<li class="nav-item active"><a class="nav-link" href="index.php">Inicio</a></li>
							<li class="nav-item submenu dropdown">
								<a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Tienda</a>
								<ul class="dropdown-menu">
									<li class="nav-item"><a class="nav-link" href="categorias.php">Comprar por Categorias</a></li>
									<li class="nav-item"><a class="nav-link" href="checkout.php">Checkout</a></li>
									<li class="nav-item"><a class="nav-link" href="cart.php">Carrito</a></li>
									<li class="nav-item"><a class="nav-link" href="confirmation.php">Confirmacion</a></li>
								</ul>
							</li>
							<li class="nav-item active"><a class="nav-link" href="login.php">Login</a></li>
						
							<li class="nav-item"><a class="nav-link" href="">Contacto</a></li>
						</ul>
						<ul class="nav navbar-nav navbar-right">
							<li class="nav-item"><a href="cart.php" class="cart"><span class="ti-bag"></span></a></li>
							<li class="nav-item">
								<button class="search"><span class="lnr lnr-magnifier" id="search"></span></button>
							</li>
						</ul>
					</div>
				</div>
			</nav>
		</div>
		<div class="search_input" id="search_input_box">
			<div class="container">
				<form class="d-flex justify-content-between">
					<input type="text" class="form-control" id="search_input" placeholder="Search Here">
					<button type="submit" class="btn"></button>
					<span class="lnr lnr-cross" id="close_search" title="Close Search"></span>
				</form>
			</div>
		</div>
	</header>
	<!-- Fin Header -->

	<!-- Start Banner Area -->
	<section class="banner-area organic-breadcrumb">
		<div class="container">
			<div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
				<div class="col-first">
					<h1>Confirmación</h1>
					
				</div>
			</div>
		</div>
	</section>
	<!-- End Banner Area -->

	<!--================Order Details Area =================-->
	<section class="order_details section_gap">
	
		<div class="container">
			<h3 class="title_confirmation">Gracias por su compra! Tu orden ha sido recibida.</h3>
			<div class="row order_d_inner">
				<div class="col-lg-4">
					<div class="details_item">
						<h4>Informacion de compra</h4>
						<ul class="list">
							<li><a href="#"><span>Numero de Ticker</span> : <?php echo $row["id_ticket"]?></a></li>
							<li><a href="#"><span>Fecha</span> : <?php echo $row["Fecha"]?></a></li>
							<li><a href="#"><span>Total</span> : <?php echo $_SESSION["total"]?></a></li>
			
						</ul>
					</div>
				</div>
				
			</div>
			<div class="order_details_table">
				<h2>Detalles de la Orden</h2>
				<?php	

						
							$enlace = mysqli_connect("127.0.0.1:3308", "usuarioTienda", "Pass1357!", "tiendaonline");

                            $us = $_SESSION["username"];
                             $idC = $_SESSION["idCarrito"];

                            

                            $query3 = " SELECT * 
                            FROM carrito_has_prodcuto join carrito join productos
                            WHERE (Id_Carrito = id_car) AND (id_usuario = '$us' ) AND (Id_prod = id_producto) AND (Id_carrito = '$idC') ORDER BY cantidad;";


                            $query2 = " SELECT Id_prod, id_car, cantidad, Id_Carrito, id_usuario, id_producto, Nombre_producto, Precio, Compatibilidad, Categoria, Stock, imagen,  (sum(Precio*cantidad)) as Total 
                            FROM carrito_has_prodcuto join carrito join productos
                            WHERE (Id_Carrito = id_car) AND (id_usuario = '$us' ) AND (Id_prod = id_producto) AND (Id_carrito = '$idC') ORDER BY cantidad;";

                            $result3 = mysqli_query($enlace,$query3);
                            $result2 = mysqli_query($enlace, $query2);

                            $row2 = mysqli_fetch_array($result2);

                            $total = $row2["Total"];
                            

                           // $_SESSION["total"] = $row2["Total"];
                            ?>
				<div class="table-responsive">
					<table class="table">
						<thead>
							<tr>
								<th scope="col">Producto</th>
								<th scope="col">Cantidad</th>
								<th scope="col">Total</th>
							</tr>
							<?php
							if(mysqli_num_rows($result3) > 0) {

						while ($row3 = mysqli_fetch_array($result3)) {
							
						?>
						</thead>
						<tbody>
							<tr>
								<td>
									<p><?php echo $row3["Nombre_producto"]?></p>
								</td>
								<td>
									<h5>x <?php echo $row3["cantidad"]?></h5>
								</td>
								<td>
									<p><?php echo $row3["Precio"]?></p>
								</td>
							</tr>
							<?php 
                        }
                        
                    }
                            
                            
							?>
							


							<tr>
								<td>
									<h4>Total</h4>
								</td>
								<td>
									<h5></h5>
								</td>
								<td>
									<p><?php echo $row2["Total"]?></p>
								</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>
		
		
	</section>
				
	<!--================End Order Details Area =================-->

	<!-- inicio footer -->
	<footer class="footer-area section_gap">
		<div class="container">
			<div class="row">
				<div class="col-lg-3  col-md-6 col-sm-6">
					<div class="single-footer-widget">
					
			</div>
			<div class="footer-bottom d-flex justify-content-center align-items-center flex-wrap">
			<!--	<p class="footer-text m-0"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. 
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a> -->
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
</p>
			</div>
		</div>
	</footer>
	<!-- Fin footer -->




	<script src="js/vendor/jquery-2.2.4.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4"
	 crossorigin="anonymous"></script>
	<script src="js/vendor/bootstrap.min.js"></script>
	<script src="js/jquery.ajaxchimp.min.js"></script>
	<script src="js/jquery.nice-select.min.js"></script>
	<script src="js/jquery.sticky.js"></script>
	<script src="js/nouislider.min.js"></script>
	<script src="js/jquery.magnific-popup.min.js"></script>
	<script src="js/owl.carousel.min.js"></script>
	<!--gmaps Js-->
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCjCGmQ0Uq4exrzdcL6rvxywDDOvfAu6eE"></script>
	<script src="js/gmaps.min.js"></script>
	<script src="js/main.js"></script>
</body>

</html>