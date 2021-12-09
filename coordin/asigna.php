<?php include("../conexion.php");

$idl = $_POST["idd"];

$idus = $_POST['idus'];
$value = $_POST["aboAsignado"];
$fech = date("Y-m-d", strtotime("-6 hour"));
$query2 = "update seg_cont set coorasignabool='1',coafecha='$fech', userclic6='$idus'  where id_cont=" . $idl . "  AND num_rechazo='0'  ";
mysqli_query($conexion, $query2);
$query3 = "update contrato set coorasigna='$value' where id=" . $idl . "  ";
mysqli_query($conexion, $query3);


echo "<script>location.href='asignacion.php';</script>";
