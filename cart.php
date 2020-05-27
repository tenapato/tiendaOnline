
<?php
    session_start();
   
    $enlace = mysqli_connect("127.0.0.1:3308", "usuarioTienda", "Pass1357!", "tiendaonline");

    $guardarCarrito = false;
    $correr = false;
    




    if (isset($_POST["add"])){
        
        if (isset($_SESSION["cart"])){
                   
           
            $item_array_id = array_column($_SESSION["cart"],"id");
            if (!in_array($_GET["id"],$item_array_id)){
                $count = count($_SESSION["cart"]);
                $item_array = array(
                    'id_producto' => $_GET["id"],
                    'nombre' => $_POST["hidden_name"],
                    'precio' => $_POST["hidden_price"],
                    'cantidad_items' => $_POST["quantity"],
                );

                $_SESSION["cart"][$count] = $item_array;
                $idProd = $_GET["id"];
                $canti = $_POST["quantity"];
                $us = $_SESSION["username"];
                $idC = $_SESSION["idCarrito"];


                //echo $idProd;
                //echo $canti;
                //echo $us;
              
                //echo $idC;
            $query_insert = "INSERT INTO carrito_has_prodcuto
            (Id_prod, id_car, cantidad)
            VALUES
            ('$idProd', '$idC', '$canti');" ;
            

            $insert_query = mysqli_query($enlace, $query_insert );
            

           // echo '<script>window.location="categorias.php"</script>';
            }else{
                echo '<script>alert("Product is already Added to Cart")</script>';
                echo '<script>window.location="cart.php"</script>';
            }
            }else{
            $item_array = array(
                'id_producto' => $_GET["id"],
                'nombre' => $_POST["hidden_name"],
                'precio' => $_POST["hidden_price"],
                'cantidad_items' => $_POST["quantity"],
            );
            $_SESSION["cart"][0] = $item_array;

            $idProd = $_GET["id"];
            $canti = $_POST["quantity"];
            $us = $_SESSION["username"];
            $idC = $_SESSION["idCarrito"];
            $query_insert = "INSERT INTO carrito_has_prodcuto
            (Id_prod, id_car, cantidad)
            VALUES
            ('$idProd', '$idC', '$canti');" ;
            

            $insert_query = mysqli_query($enlace, $query_insert );
        }
    }


    //Falta poder borrar los productos de la tabla carrito_has_prodcuto
    if (isset($_GET["action"])){
        if ($_GET["action"] == "delete"){
            foreach ($_SESSION["cart"] as $keys => $value){
                if ($value["id_producto"] == $_GET["id"]){
                    unset($_SESSION["cart"][$keys]);

                    $idProdABorrar = $_GET["id"]; 
                    $idC = $_SESSION["idCarrito"];
                    //echo $idProdABorrar;
                      $query_delete = "DELETE FROM carrito_has_prodcuto
                       WHERE (Id_prod = '$idProdABorrar' AND id_car = '$idC');" ;
                        
                      //  DELETE FROM `tiendaonline`.`carrito_has_prodcuto` WHERE (`Id_producto` = '1');
            $insert_query = mysqli_query($enlace, $query_delete );
                    




                    echo '<script>alert("Product has been Removed...!")</script>';
                    echo '<script>window.location="cart.php"</script>';
                }
            }
        }
    }



    

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

    <!--
            CSS
            ============================================= -->
    <link rel="stylesheet" href="css/linearicons.css">
    <link rel="stylesheet" href="css/owl.carousel.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/themify-icons.css">
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
                    <h1>Carrito</h1>
                    
                </div>
            </div>
        </div>
    </section>
    <!-- End Banner Area -->

    <!--================Cart Area =================-->
    <section class="cart_area">
        <div class="container">
            <div class="cart_inner">
                <div class="table-responsive">
                

    
        <h3 class="title2">Shopping Cart Details</h3>
        <div class="table-responsive">
            <table class="table table-bordered">
            <tr>
                <th width="30%">Producto</th>
                <th width="10%">Cantidad</th>
                <th width="13%">Price Details</th>
                <th width="10%">Total</th>
                <th width="17%">Remove Item</th>
            </tr>

            <?php
                if(!empty($_SESSION["cart"])){
                    $total = 0;
                    foreach ($_SESSION["cart"] as $key => $value) {
                        ?>
                        <tr>
                            <td><?php echo $value["nombre"]; ?></td>
                            <td><?php echo $value["cantidad_items"]; ?></td>
                            <td>$ <?php echo $value["precio"]; ?></td>
                            <td>
                                $ <?php echo number_format($value["cantidad_items"] * $value["precio"], 2); ?></td>
                            <td><a href="cart.php?action=delete&id=<?php echo $value["id_producto"]; ?>"><span
                                        class="text-danger">Remove Item</span></a></td>

                        </tr>
                        <?php
                        $total = $total + ($value["cantidad_items"] * $value["precio"]);
                    }
                        ?>
                        <tr>
                            <td colspan="3" align="right">Total</td>
                            <th align="right">$ <?php echo number_format($total, 2); ?></th>
                            <td></td>
                        </tr>
                        <?php
                    }
                ?>
            </table>
        </div>

                            
                          
                            <tr class="out_button_area">
                                <td>

                                </td>
                                <td>

                                </td>
                                <td>

                                </td>
                                <td>
                                    <div class="checkout_btn_inner d-flex align-items-center">
                                        <a class="gray_btn" href="categorias.php">Seguir Comprando</a>
                                        <a class="primary-btn" href="checkout.php">Proceder al checkout</a>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
    <!--================End Cart Area =================-->

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