<?php include("../conexion.php");
   echo   $key=$_GET['cl']; 
$fech=date("Y-m-d",strtotime("-6 hour"));
  $gurad ="update seg_cont set corecibe2='1',  cofecha2='$fech'  where id_cont =".$key."  AND num_rechazo='0'";
  mysqli_query( $conexion, $gurad ); 

echo "<script>location.href='rcualitativa.php';</script>";
 ?>