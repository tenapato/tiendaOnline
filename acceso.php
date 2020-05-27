<!-- Inicio PHP -->
<?php
error_reporting(E_ALL); //DEBUG
ini_set('display_errors', 1);  //DEBUG

/*
echo $nombre;
echo $apellido;
echo $username;
echo $pswd; */


$enlace = mysqli_connect("127.0.0.1:3308", "usuarioTienda", "Pass1357!", "tiendaonline");

$usuario = $_POST['username']; // obtienes el nombre de usuario
$contra = $_POST['pswd'];

//query para buscar el usuario
$query = " SELECT * FROM usuario WHERE username = '$usuario' AND pass = '$contra'";

//ejecutar el query
$result = mysqli_query($enlace, $query) or die("Query 1 failed");

// La contrasenia esta mal o el usuario no existe
  if(($row = mysqli_fetch_assoc($result)) == null){

   header("Location: login.php");
  }
// si existe el usuario y la contra esta bien
else{
   session_start();
   $query = " SELECT * FROM usuario WHERE username = '$usuario' AND pass = '$contra'";
   $query2 = " SELECT * FROM carrito WHERE id_usuario = '$usuario'";
   $result = mysqli_query($enlace, $query) or die("Query 1 failed");
   $result2 = mysqli_query($enlace, $query2) or die("Query 1 failed");
   $row = mysqli_fetch_assoc($result);
   $row2 = mysqli_fetch_assoc($result2);
   $_SESSION['username'] = $usuario;
   $_SESSION['pswd'] = $pswd;
   
   $_SESSION['idCarrito'] = $row2['Id_Carrito'];
   header("Location: index.php"); //te redirije a la pantalla de inicio con la sesion iniciada
}









if(isset( $_SESSION["username"]) && (isset($_SESSION["idCarrito"])) ){
        
  $guardarCarrito = true;
 

} 

if($guardarCarrito){ //si el bool es verdaero carga los articulos que ya tenia

  //Variables
 // $idProd = $_GET["id"];
 // $canti = $_POST["quantity"];
  $us = $_SESSION["username"];
  $idC = $_SESSION["idCarrito"];


 
      $query = " SELECT * FROM carrito_has_prodcuto join carrito join productos
      WHERE (Id_Carrito = id_car) AND (id_usuario = '$us' ) AND (Id_prod = id_producto) AND (Id_carrito = '$idC') ORDER BY cantidad;";
    
     
     $result = mysqli_query($enlace, $query) or die("Query 3 failed");








//echo $row["cantidad"];
//echo $row["Id_prod"];


while($row = mysqli_fetch_assoc($result)){



  if (isset($_SESSION["cart"])){

  $item_array_id = array_column($_SESSION["cart"],"id");
  if (!in_array($row["Id_prod"],$item_array_id)){
      $count = count($_SESSION["cart"]);
      $item_array = array(
          'id_producto' => $row["Id_prod"],
          'nombre' => $row["Nombre_producto"],
          'precio' => $row["Precio"],
          'cantidad_items' => $row["cantidad"],
      );

      $_SESSION["cart"][$count] = $item_array;
    
  }
} else{

      
  $item_array = array(
      'id_producto' => $row["Id_prod"],
      'nombre' => $row["Nombre_producto"],
      'precio' => $row["Precio"],
      'cantidad_items' => $row["cantidad"],
  );
  $_SESSION["cart"][0] = $item_array;

  }
 



 


}//fin del whil


}//fin de metodo para guardar el carrito































?>
<!-- Fin PHP -->