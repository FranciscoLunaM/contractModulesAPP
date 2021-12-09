<?php include("../conexion.php");
$key = $_POST['key'];
$idus = $_POST['idus'];
$fech = date("Y-m-d", strtotime("-6 hour"));
$gurad = "update seg_cont set corecibe='1',  cofecha='$fech', userclic5='$idus'  where id_cont =" . $key . "  AND num_rechazo='0'";
mysqli_query($conexion, $gurad);

echo "<script>location.href='asignacion.php';</script>";
