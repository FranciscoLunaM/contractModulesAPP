<?php
include("../conexion.php");

if (isset($_POST["guardareimp"])) {
    $cl = $_POST["cl"];
    $idus = $_POST["idus"];

    $pluri = $_POST['rp'];
    @$fecin = date("Y-m-d", strtotime($_POST["c7"]));
    @$fecinr = date("Y-m-d", strtotime($_POST["c8"]));
  $gurad = "update contrato set servicio='" . utf8_decode($_POST["c2"]) . "',  prestador='" . utf8_decode($_POST["c3"]) . "',area='" . $_POST["c4"] . "', administrador='" . utf8_decode($_POST["c5"]) . "', auxadmin='" . utf8_decode($_POST["c6"]) . "', vfe_ini='$fecin', vfe_fin='$fecinr',  pluri='$pluri', monto='" . $_POST["c9"] . "', iva='" . $_POST["c19"] . "', total='" . $_POST["c29"] . "', partida='" . $_POST["c39"] . "', sub_partida='" . $_POST["c49"] . "', categoria ='" . $_POST["cate_id"] . "', sub_cat='" . $_POST["c10"] . "', enlace='" . utf8_decode($_POST["c11"]) . "', tipop='" . $_POST["prove_id"] . "', tipo='" . $_POST["c12"] . "', cap='" . $_POST["cap_id"] . "', status='1', obs_abogado ='" . utf8_decode($_POST["notas"]) . "' where id =" . $_REQUEST["cl"] . "";
  mysqli_query($conexion, $gurad);

    $i = 1;
    foreach ($_POST['comen'] as $value) {
        $radio1 = $_POST['r' . $i];
        @$esteob1 = json_encode($_POST['ob' . $i]);
        @$va1 = $_POST['val' . $i];
        @$obsO = $_POST['text' . $i];
    $query2 = "INSERT INTO det_abog (id, id_cont ,id_doc, c1, obs, obs_otros, val_fecha, num_rechazo) VALUES ('', '$cl', '$value','$radio1', '$esteob1', '" . utf8_decode($obsO) . "','$va1','0')";
        
        $i++;
   mysqli_query($conexion, $query2);
    }

    $fechh = date("Y-m-d", strtotime("-6 hour"));
    $gurad = "update seg_cont set aborevisa='1', abrefecha='$fechh', userclic8='$idus' where id_cont =" . $cl ."  AND num_rechazo='0'";
    mysqli_query($conexion, $gurad);
}

 echo "<script>location.href='notainfor.php?cl=$cl';</script>";

