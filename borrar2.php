<?php
    session_start();

    error_reporting(E_ALL); //DEBUG
ini_set('display_errors', 1);  //DEBUG
//borrar el carrito de cada persona
    
    $enlace = mysqli_connect("127.0.0.1:3308", "usuarioTienda", "Pass1357!", "tiendaonline");
	$total = $_SESSION["total"];

	$us = $_SESSION["username"];
	$idC = $_SESSION["idCarrito"];

   

	$query = " SELECT * 
	FROM carrito_has_prodcuto join carrito join productos
	WHERE (Id_Carrito = id_car) AND (id_usuario = '$us' ) AND (Id_prod = id_producto) AND (Id_carrito = '$idC');";

	$result = mysqli_query($enlace, $query);

	//$row = mysqli_fetch_array($result);
	
	
	if(mysqli_num_rows($result) > 0) {

	
	while ($row = mysqli_fetch_array($result)) {

		 //Qutar articulos comprados del stock

		 $idProductoABorrar = $row["Id_prod"];
		 $cantidad = $row["cantidad"];
		 
		 
		 $stockArestar = $row["Stock"];
	 
		 $stockFinal = $stockArestar - $cantidad;




		echo "Tu id producto es: " . $idProductoABorrar . ".<br>";
		echo "Tu cantidad es: " . $cantidad . ".<br>";
		echo "Tu stock a restar es: " . $stockArestar . ".<br>";
		echo "Tu stock final es: " . $stockFinal . ".<br>";
			
			$queryUpdate = "UPDATE productos
			set Stock = '$stockFinal'
			WHERE id_producto = '$idProductoABorrar'";


			$update_query = mysqli_query($enlace, $queryUpdate);


		 

    }
}

header("Location: borrar.php");

//echo '<script>window.location="index.php"</script>';
?>