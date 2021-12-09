<?php include("../conexion.php");
      $key=$_GET['key']; 
	  $idus=$_GET['id'];
$fech=date("Y-m-d",strtotime("-6 hour"));
  $gurad ="update seg_cont set codicrecibe='1',  cordirfecha='$fech', userclic34='$idus' where id_cont =".$key."  AND num_rechazo='0'";
mysqli_query( $conexion, $gurad ); 
echo "<script>location.href='dictamen.php';</script>";
 ?>