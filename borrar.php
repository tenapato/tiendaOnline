
<?php
    session_start();

    error_reporting(E_ALL); //DEBUG
ini_set('display_errors', 1);  //DEBUG
//borrar el carrito de cada persona
    
    $enlace = mysqli_connect("127.0.0.1:3308", "usuarioTienda", "Pass1357!", "tiendaonline");
	$total = $_SESSION["total"];

	$us = $_SESSION["username"];
	$idC = $_SESSION["idCarrito"];

    echo $idC;


	$query_borrarCarrito = " SELECT * 
                FROM carrito_has_prodcuto join carrito join productos
                WHERE (Id_Carrito = id_car) AND (id_usuario = '$us' ) AND (Id_prod = id_producto) AND (Id_carrito = '$idC') ORDER BY cantidad;";

	$resultBorrar = mysqli_query($enlace,$query_borrarCarrito);

	$rowBorrar = mysqli_fetch_array($resultBorrar);

	//$idProductoABorrar = $rowBorrar["Id_prod"];
	//$idCarritoABorrar = $rowBorrar["id_car"];
	$cantidadABorrar = $rowBorrar["cantidad"];

    echo $cantidadABorrar;

	if(mysqli_num_rows($resultBorrar) > 0) {

	
	while ($rowBorrar = mysqli_fetch_array($resultBorrar)) {

	$queryBorrar = "DELETE FROM carrito_has_prodcuto
	WHERE
	(id_car = '$idC' AND cantidad = '$cantidadABorrar');   ";

	$insert_query = mysqli_query($enlace, $queryBorrar);

    }
}

echo '<script>window.location="index.php"</script>';
?>