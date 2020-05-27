<?php
// Start the session
session_start();


if(isset($_SESSION["username"])){
	echo "Tu usuario es: " . $_SESSION["username"] . ".<br>";
	echo "Tu idCarrito es: " . $_SESSION["idCarrito"] . ".<br>";				
}else{

}

?>

<!DOCTYPE html>
<html lang="zxx" class="no-js">

<head>
	
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	
	<link rel="logo" href="img/logo2.png">
	<!-- Author Meta -->
	<meta name="author" content="Pato">
	<!-- Meta Description -->
	<meta name="description" content="">
	<!-- Meta Keyword -->
	<meta name="keywords" content="">
	<!-- meta character set -->
	<meta charset="UTF-8">
	<!-- Site Title -->
	<title>PC SHOP</title>
	<!--
		CSS Todos los CSS fueron utilizados de otra pagina CITAR PAGINA
		============================================= -->
	<link rel="stylesheet" href="css/linearicons.css">
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="css/themify-icons.css">
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="css/owl.carousel.css">
	<link rel="stylesheet" href="css/nice-select.css">
	<link rel="stylesheet" href="css/nouislider.min.css">
	<link rel="stylesheet" href="css/ion.rangeSlider.css" />
	<link rel="stylesheet" href="css/ion.rangeSlider.skinFlat.css" />
	<link rel="stylesheet" href="css/magnific-popup.css">
	<link rel="stylesheet" href="css/main.css">
</head>

<body>

<!--<meta http-equiv="refresh" content="0.5;URL=index.php"> -->






<?php 

/*
$username = $_POST['username'];
$pswd = $_POST['pswd'];

$enlace = mysqli_connect("127.0.0.1:3308", "usuarioTienda", "Pass1357!", "tiendaonline");



$query = "select * from usuario where username like '%$username%';";
    $query2 = "SELECT pass from usuario
            where(Nombre = '$username');"

$resultado_query = mysqli_query($enlace, $query);
$row_asociativo = mysqli_fetch_assoc($resultado_query);
if($row_asociativo){
  
}else{
    echo "No esta mi negro";
}
*/
   

//$query = "call busca_empleado ( '%$nombre%' );";
//echo $query;   


/*
$resultado_query = mysqli_query($enlace, $query) ;

 $query_insert = "INSERT INTO EMPLOYEE
 (Fname, Minit, Lname, Ssn, Bdate, Address, Sex, Salary, Super_ssn, Dno)
 VALUES
 ('Patricio', 'T', 'Zozaya', '012345678', '1999-03-20', 'Mi casa', 'M', 10000, null, 4);" ;
    
echo $query_insert;
$insert_query = mysqli_query($enlace, $query_insert ); */


?>


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
                            <li class="nav-item"><a class="nav-link" href="cerrarSesion.php">Cerrar Sesión</a></li>
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

	<!-- Inicio Banner -->
	<section class="banner-area">
		<div class="container">
			<div class="row fullscreen align-items-center justify-content-start">
				<div class="col-lg-12">
					<div class="active-banner-slider owl-carousel">
						<!-- single-slide -->
						<div class="row single-slide align-items-center d-flex">
							<div class="col-lg-5 col-md-6">
								<div class="imagen-central">
									<h1>Encuentra los  <br>componentes de tu PC!</h1>
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
										dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation.</p>
									<div class="add-bag d-flex align-items-center">
										<a class="add-btn" href=""><span class="lnr lnr-cross"></span></a>
										<span class="add-text text-uppercase">Añadir al carrito</span>
									</div>
								</div>
							</div>
							<div class="col-lg-7">
								<div class="pc-img">
									<img class="img-fluid" src="img/banner/pc.png" alt="">
								</div>
							</div>
						</div>
						<!-- single-slide -->
						<div class="row single-slide">
							<div class="col-lg-5">
								<div class="imagen-central">
								
								</div>
							</div>
							<div class="col-lg-7">
								<div class="banner-img">
									<img class="img-fluid" src="img/banner/pc.png" alt="">
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- Fin Banner -->



	<!-- Inicio Footer -->
	<footer class="footer-area section_gap">
		<div class="container">
			<div class="row">
				<div class="col-lg-3  col-md-6 col-sm-6">
					<div class="single-footer-widget">
			
			<div class="footer-bottom d-flex justify-content-center align-items-center flex-wrap">
				<p class="texto del copyright"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
<!--Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
</p>
			</div>
		</div>
	</footer>
	<!-- Fin Footer -->

	<script src="js/vendor/jquery-2.2.4.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4"
	 crossorigin="anonymous"></script>
	<script src="js/vendor/bootstrap.min.js"></script>
	<script src="js/jquery.ajaxchimp.min.js"></script>
	<script src="js/jquery.nice-select.min.js"></script>
	<script src="js/jquery.sticky.js"></script>
	<script src="js/nouislider.min.js"></script>
	<script src="js/countdown.js"></script>
	<script src="js/jquery.magnific-popup.min.js"></script>
	<script src="js/owl.carousel.min.js"></script>
	<!--gmaps Js-->
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCjCGmQ0Uq4exrzdcL6rvxywDDOvfAu6eE"></script>
	<script src="js/gmaps.min.js"></script>
	<script src="js/main.js"></script>
</body>

</html>