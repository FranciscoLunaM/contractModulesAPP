<?php include("../conexion.php");
   $key=$_GET['key']; 
   $idus=$_GET['id'];
$fech=date("Y-m-d",strtotime("-6 hour"));
  $gurad ="update seg_cont set abogrecibe='1',  abofecha='$fech', userclic7='$idus'  where id_cont =".$key." AND num_rechazo='0'";
mysqli_query( $conexion, $gurad ); 

 $gurad2 ="update contrato set etapa='3' where id =".$key."";
mysqli_query( $conexion, $gurad2);

echo "<script>location.href='asignacion.php';</script>";
 ?>