<?php include("../conexion.php");
   $key=$_GET['key']; 
$fech=date("Y-m-d",strtotime("-6 hour"));
  $gurad ="update contrato set jarec='1',  jafechar='$fech'  where id =".$key."";
mysqli_query( $conexion, $gurad ); 

echo "<script>location.href='asignacion.php';</script>";
 ?>