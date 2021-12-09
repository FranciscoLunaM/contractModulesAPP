<?php 
include("../conexion.php");

$tipo_contrato=$_GET["tipoc"];
$cl = $_GET["cl"];
$idus = $_GET["idus"];
// $cl=$_GET["cl"];
if (isset($_POST["guardareimp"])) {
  
  $pluri = $_POST['rp'];
  @$fecin = date("Y-m-d", strtotime($_POST["c7"]));
  @$fecinr = date("Y-m-d", strtotime($_POST["c8"]));
  $gurad = "update contrato set servicio='" . utf8_decode($_POST["c2"]) . "',  prestador='" . utf8_decode($_POST["c3"]) . "',area='" . $_POST["c4"] . "', administrador='" .utf8_decode( $_POST["c5"]). "', auxadmin='" .utf8_decode( $_POST["c6"]) . "', vfe_ini='$fecin', vfe_fin='$fecinr',pluri='$pluri', monto='" . $_POST["c9"] . "', iva='" . $_POST["c19"] . "', total='" . $_POST["c29"] . "', partida='" . $_POST["c39"] . "', sub_partida='" . $_POST["c49"] . "', categoria ='" . $_POST["cate_id"] . "', sub_cat='" . $_POST["c10"] . "', enlace='" . utf8_decode($_POST["c11"]). "', tipop='" . $_POST["prove_id"] . "', tipo='" . $_POST["c12"] . "', cap='" . $_POST["cap_id"] . "', status='1', obs_abogado ='" . utf8_decode($_POST["notas"]) . "'  where id =" . $_REQUEST["cl"] . "";
mysqli_query($conexion, $gurad) or die("error 1");

  $i = 1;
  foreach ($_POST['idab'] as $value) {
    $radio1 = $_POST['r' . $i];
    @$esteob1 = json_encode($_POST['ob' . $i]);
    @$obsO = $_POST['text' . $i];
$query2 = " update det_abog set c1='$radio1', obs='$esteob1' , obs_otros='" . utf8_decode($obsO) . "' where id =$value";
    $i++;
 mysqli_query($conexion, $query2) or die("error 2");
  }

  $fechh = date("Y-m-d", strtotime("-6 hour"));
  $gurad = "update seg_cont set coorevisa='1', coorfecha='$fechh', userclic10='$idus',userclic11='$idus',cooaceptarevcuali='1',coorechazorevcuali='0', cooarcualifecha='$fechh' where id_cont =" . $cl . "  AND num_rechazo='0'";
  mysqli_query($conexion, $gurad) or die("error 3");
}

//rechazo de coordinador 
if (isset($_POST["rechazareimp"])) {
 
  $pluri = $_POST['rp'];
  @$fecin = date("Y-m-d", strtotime($_POST["c7"]));
  @$fecinr = date("Y-m-d", strtotime($_POST["c8"]));
  $gurad = "update contrato set servicio='" . utf8_decode($_POST["c2"]) . "', prestador='" . utf8_decode($_POST["c3"]) . "',area='" . $_POST["c4"] . "', administrador='" . utf8_decode($_POST["c5"]) . "', auxadmin='" . utf8_decode($_POST["c6"]) . "', vfe_ini='$fecin', vfe_fin='$fecinr',pluri='$pluri', monto='" . $_POST["c9"] . "', iva='" . $_POST["c19"] . "', total='" . $_POST["c29"] . "', partida='" . $_POST["c39"] . "', sub_partida='" . $_POST["c49"] . "', categoria ='" . $_POST["cate_id"] . "', sub_cat='" . $_POST["c10"] . "', enlace='" . utf8_decode($_POST["c11"]) . "', tipop='" . $_POST["prove_id"] . "', tipo='" . $_POST["c12"] . "', cap='" . $_POST["cap_id"] . "', etapa='3', status='3', obs_abogado='" . utf8_decode($_POST["notas"]) . "' where id =" . $_REQUEST["cl"] . "";
  mysqli_query($conexion, $gurad);

  $rechas = " SELECT COUNT(*) as trechazados from rechazo where id_cont='$cl' and tiporechazo = '3' ";
  $rechazo = @mysqli_fetch_array(mysqli_query($conexion, $rechas));
  $trech = ($rechazo['trechazados'] + 1);

  $i = 1;
  foreach ($_POST['idab'] as $value) {
    $radio1 = $_POST['r' . $i];
    @$esteob1 = json_encode($_POST['ob' . $i]);
    @$obsO = $_POST['text' . $i];
     $query2 = " update det_abog set c1='$radio1', obs='$esteob1', obs_otros='".utf8_decode($obsO)."', num_rechazo='$trech' where id =$value";
   // $query2 = " update det_abog set c1='$radio1', obs='$esteob1',obs_otros='" . utf8_decode($obsO) . "' where id =$value";
    $i++;
    mysqli_query($conexion, $query2);
  }
  $fechh = date("Y-m-d", strtotime("-6 hour"));
  $gurad = "update seg_cont set coorevisa='1', coorfecha='$fechh', userclic10='$idus', coorechazorevcuali='1',cooaceptarevcuali='0', coorrcualifecha='$fechh', userclic12='$idus' where id_cont =" . $cl . "  AND num_rechazo='0'";
  mysqli_query($conexion, $gurad);

  $fech = date("Y-m-d H:i:s", strtotime("-6 hour"));
  $gurr = "INSERT INTO rechazo (id, id_cont, fecha, tiporechazo, numrechazo, obs_abogado) value ( '' ,'$cl', '$fech', '3', '$trech', '" . utf8_decode($_POST["notas"]) . "' )";
  mysqli_query($conexion, $gurr);
  //fin del rechazo
}

  echo "<script>location.href='notainfor.php?cl=$cl';</script>";

?>