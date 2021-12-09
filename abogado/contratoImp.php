<?php
include("../conexion.php");
$cl = $_GET["cl"];

$consulta = "SELECT *  FROM contrato as c, sub_partida as sub where c.id='$cl' and sub.id=c.sub_partida ";
$jt = mysqli_fetch_array(mysqli_query($conexion, $consulta));

$consulta2 = "SELECT * FROM `impresion_contrato` WHERE id_cont='$cl'";
$jt1 = mysqli_query($conexion, $consulta2);
$jt2 = mysqli_fetch_array($jt1);
$tipoContrato = "";
$numCont = $jt['tipop'];
if ($jt['tipop'] == 1) {
  $tipoContrato = "template7000pf";
}

if ($jt['tipop'] == 3) {
  $tipoContrato =  "template3000pf";
}
require '../compon/numAletra/vendor/autoload.php';

use Luecano\NumeroALetras\NumeroALetras;

$formatter = new NumeroALetras();
if (mysqli_num_rows($jt1) > 0) {

  $checkPrestador = str_replace(' ', '',  $jt2['check_prestador']);
  $checkServicio = str_replace(' ', '',  $jt2['check_servicio']);
  $checkSubDir = str_replace(' ', '',   $jt2['check_subDir_admin']);
  $checkArticulo = str_replace(' ', '',  $jt2['check_articulo']);
  $checkjefeCP = str_replace(' ', '',  $jt2['check_jefe_CP']);
  $checkFolio = str_replace(' ', '',  $jt2['check_folio']);
  $check_32d = str_replace(' ', '',  $jt2['check_32d']);
  $check_fiscal = str_replace(' ', '',  $jt2['check_fiscal']);
  $check_administrador = str_replace(' ', '',  $jt2['check_administrador']);
  $check_encargado = str_replace(' ', '',  $jt2['check_encargado']);
  $check_jefeSR = str_replace(' ', '',  $jt2['check_jefeSM']);
  $check_jefeDR = str_replace(' ', '',  $jt2['check_departRM']);
  $check_pagoCorrespondiente = $jt2['check_pago_correspondiente'];
  $check_subdirectorMismo = $jt2['check_subidirector_mismo'];
  $check_anexoPenaC = str_replace(' ', '',  $jt2['check_anexo_pena']);
  $check_anexoDeduc = str_replace(' ', '', $jt2['check_anexo_deduc']);
  $checkArtCons = str_replace(' ', '',  $jt2['check_art_cons'] . "CONS");
  $checkArtAd = str_replace(' ', '',  $jt2['check_art_ad'] . "AD");
  $checkDeducPago = str_replace(' ', '',  $jt2['check_deduc_pago']);
  $numeroResponsables = $jt2['num_responsables'];
  if ($numeroResponsables = null) {
    $numeroResponsables = "1";
  }
  if ($check_subdirectorMismo == null) {
    $check_subdirectorMismo = "false";
  }
  if ($check_pagoCorrespondiente == null) {
    $check_pagoCorrespondiente = "false";
  }
}

?>


<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="shortcut icon" type="image/x-icon" href="../images/favicon.png">
  <title>Fovissste | IMPRIMIR DOCUMENTO </title>
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../compon/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="css/adminlte.min.css">
  <!-- Nuevo style -->
  <link rel="stylesheet" href="style.css">


</head>

<body class="hold-transition sidebar-mini">
  <!-- Site wrapper -->
  <div class="wrapper">
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <!-- Left navbar links -->
      <?php include "../includes/top-menu.php"; ?>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <?php include "includes/menu.php"; ?>
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1><strong>IMPRESIÓN DE CONTRATO </strong></h1>
            </div>

          </div><!-- /.container-fluid -->
      </section>

      <!-- Main content -->
      <section class="content">
        <!-- Default box -->
        <div class="card">
          <div class="card-body">

            <table class="table">
              <thead>
                <tr>
                  <th scope="col"></th>
                  <th scope="col"></th>
                  <th scope="col"></th>
                  <th scope="col"></th>
                  <th scope="col"></th>
                  <th scope="col"></th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td colspan="3" style="border-top: 0px;">

                    <form name="form1" action="generarWord.php" method="post">
                      <div class="input-group mb-3">
                        <div class="input-group-prepend">
                          <span class="input-group-text" id="inputGroup-sizing-default">
                            Número de contrato
                            <div></div>
                          </span>
                        </div>
                        <input type="text" value="<?php echo utf8_encode($jt['contrato']) ?>" name="numContrato" class="form-control" aria-label="Default" id="NumContrato" aria-describedby="inputGroup-sizing-default" required>
                      </div>


                  </td>
                  <td colspan="3">

                    <div class="input-group mb-3">
                      <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroup-sizing-default">
                          <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="Prestadores" id="LAPRESTADORA" value="LA PRESTADORA" required>
                            <label class="form-check-label" for="inlineRadio1">La Prestadora</label>
                          </div>
                          <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="Prestadores" id="ELPRESTADOR" value="EL PRESTADOR" required>
                            <label class="form-check-label" for="inlineRadio2">El Prestador</label>
                          </div>
                        </span>
                      </div>
                      <input type="text" value="<?php echo utf8_encode($jt['prestador']) ?>" class="form-control" id="nombrePrestador" name="nombrePrestador" aria-label="Default" aria-describedby="inputGroup-sizing-default" required>
                    </div>

                  </td>

                </tr>
                <tr>
                  <td colspan="6">


                    <div class="input-group mb-3">
                      <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroup-sizing-default">
                          <div class="form-check form-check-inline"> Servicio: &nbsp;
                            <input class="form-check-input" type="radio" name="servicios" id="DE" value="DE " required>
                            <label class="form-check-label" for="inlineRadio1"> de</label>
                          </div>
                          <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="servicios" id="COMO" value="COMO " required>
                            <label class="form-check-label" for="inlineRadio2">como</label>
                          </div>
                          <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="servicios" id="PARA" value="PARA " required>
                            <label class="form-check-label" for="inlineRadio3">para</label>
                          </div>
                        </span>
                      </div>
                      <input type="text" name="nombreServicio" class="form-control" value="<?php echo utf8_encode($jt['servicio']) ?>" aria-label="Default" id="nombreServicio" aria-describedby="inputGroup-sizing-default" required>
                    </div>


                  </td>
                </tr>

                <tr>

                  <td colspan="3">


                    <div class="input-group mb-3">
                      <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroup-sizing-default">
                          <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="artiCons" id="ElARTICULOCONS" value="El ARTICULO " required>
                            <label class="form-check-label" for="inlineRadio1">El artículo.</label>
                          </div>
                          <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="artiCons" id="LOSARTICULOSCONS" value="LOS ARTICULOS" required>
                            <label class="form-check-label" for="inlineRadio2">Los artículos.</label>
                          </div> constitucionales
                        </span>
                      </div>
                      <input type="text" class="form-control" value="<?php if (mysqli_num_rows($jt1) == 0) {
                                                                        echo "";
                                                                      } else {
                                                                        echo utf8_encode($jt2['nom_art_cons']);
                                                                      } ?>" name="artiConsNombre" id="artiConsNombre" aria-label="Default" aria-describedby="inputGroup-sizing-default" required>
                    </div>


                  </td>
                  <td colspan="3">

                    <div class="input-group mb-3">
                      <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroup-sizing-default">
                          <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="articulosAd" id="ELARTICULOAD" value="EL ARTICULO" required>
                            <label class="form-check-label" for="inlineRadio1">El artículo.</label>
                          </div>
                          <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="articulosAd" id="LOSARTICULOSAD" value="LOS ARTICULOS" required>
                            <label class="form-check-label" for="inlineRadio2">Los artículos.</label>
                          </div>de la ley de adquisiciones
                        </span>
                      </div>
                      <input type="text" value="<?php if (mysqli_num_rows($jt1) == 0) {
                                                  echo "";
                                                } else {
                                                  echo utf8_encode($jt2['nom_art_ad']);;
                                                } ?>" name=" articulosAdNombre" class="form-control" id="articulosAdNombre" aria-label="Default" aria-describedby="inputGroup-sizing-default" required>
                    </div>

                  </td>

                </tr>

                <tr>


                  <td colspan="3">



                <tr>

                  <td colspan="3">


                    <div class="input-group mb-3">
                      <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroup-sizing-default">
                          <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="subdirectores" id="SUBDIRECTOR" value="SUBDIRECTOR " required>
                            <label class="form-check-label" for="inlineRadio1">Subdirector de Admin.</label>
                          </div>
                          <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="subdirectores" id="SUBDIRECTORA" value="SUBDIRECTORA" required>
                            <label class="form-check-label" for="inlineRadio2">Subdirectora de Admin.</label>
                          </div>
                        </span>
                      </div>
                      <input type="text" class="form-control" value="<?php if (mysqli_num_rows($jt1) == 0) {
                                                                        echo "MTRO. LUIS ANTONIO VIDAL CALZADA";
                                                                      } else {
                                                                        echo utf8_encode($jt2['nom_subDir_admin']);
                                                                      } ?>" name="nombreSubdirectorAdmin" id="nombreSubdirectorAdmin" aria-label="Default" aria-describedby="inputGroup-sizing-default" required>
                    </div>


                  </td>
                  <td colspan="3">

                    <div class="input-group mb-3">
                      <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroup-sizing-default">
                          <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="articulos" id="ELARTICULO" value="EL ARTICULO" required>
                            <label class="form-check-label" for="inlineRadio1">El artículo.</label>
                          </div>
                          <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="articulos" id="LOSARTICULOS" value="LOS ARTICULOS" required>
                            <label class="form-check-label" for="inlineRadio2">Los artículos.</label>
                          </div> del reglamento organico.
                        </span>
                      </div>
                      <input type="text" value="<?php if (mysqli_num_rows($jt1) == 0) {
                                                  echo "";
                                                } else {
                                                  echo utf8_encode($jt2['nom_articulo']);
                                                } ?>" name=" articuloInput" class="form-control" id="nombreArticulo" aria-label="Default" aria-describedby="inputGroup-sizing-default" required>
                    </div>

                  </td>

                </tr>

                <tr>



                  <td colspan="3">

                    <div class="input-group mb-3">
                      <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroup-sizing-default">No. Oficio de la <br> suficiencia presupuestal </span>
                      </div>
                      <input type="text" value="<?php if (mysqli_num_rows($jt1) == 0) {
                                                  echo "";
                                                } else {
                                                  echo utf8_encode($jt2['num_Oficio_SP']);
                                                } ?>" class="form-control" id="numeroOficioSufPre" name="numeroOficioSufPre" aria-label="Default" aria-describedby="inputGroup-sizing-default" required>
                    </div>


                  <td colspan="3">

                    <div class="input-group mb-3">
                      <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroup-sizing-default">Fecha de oficio de <br> la suficiencia presupuestal:</span>
                      </div>

                      <input type="date" name="fechaOficioSufPre" value="<?php if (mysqli_num_rows($jt1) == 0) {
                                                                            echo "";
                                                                          } else {
                                                                            echo utf8_encode($jt2['fecha_Oficio_SP']);
                                                                          } ?>" id="fechaOficioSufPre" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" required>

                    </div>

                  </td>

                  </td>


                </tr>

                <tr>


                  <td colspan="3">

                    <div class="input-group mb-3">
                      <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroup-sizing-default">Emitido por:
                          <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="jefes" id="ELJEFE" value="EL JEFE" required>
                            <label class="form-check-label" for="inlineRadio1">El Jefe</label>
                          </div>
                          <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="jefes" id="LAJEFA" value="LA JEFA" required>
                            <label class="form-check-label" for="inlineRadio2">La Jefa</label>

                          </div>

                        </span>
                      </div>
                      <input type="text" value="<?php if (mysqli_num_rows($jt1) == 0) {
                                                  echo "";
                                                } else {
                                                  echo utf8_encode($jt2['nom_jefe_CP']);
                                                } ?>" class="form-control" name="nombreControlP" id="jefeControlPre" aria-label="Default" aria-describedby="inputGroup-sizing-default" required>
                    </div>

                  </td>

                  <td colspan="3">

                    <div class="input-group mb-3">
                      <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroup-sizing-default">Cargo: </span>
                      </div>
                      <input type="text" value="<?php if (mysqli_num_rows($jt1) == 0) {
                                                  echo "";
                                                } else {
                                                  echo utf8_encode($jt2['cargo_CP']);
                                                } ?>" name="cargoCP" class="form-control" id="cargoCP" aria-label="Default" aria-describedby="inputGroup-sizing-default" required>
                    </div>

                  </td>
                </tr>

                <tr>
                  <td colspan="1">

                    <div class="input-group mb-3">
                      <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroup-sizing-default">Partida</span>
                      </div>
                      <input type="text" value="<?php echo $jt['partida'] ?>" name="partida" class="form-control" id="partida" aria-label="Default" aria-describedby="inputGroup-sizing-default" required>
                    </div>

                  </td>
                  <td colspan="1">

                    <div class="input-group mb-3">
                      <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroup-sizing-default">Sub-partida</span>
                      </div>
                      <input type="text" class="form-control" name="subpartida" value="<?php echo $jt['sub_part'] ?>" id="idsubpartida" aria-label="Default" aria-describedby="inputGroup-sizing-default" required>
                    </div>

                  </td>

                  <td colspan="4">

                    <div class="input-group mb-3">
                      <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroup-sizing-default">Nombre Sub-partida</span>
                      </div>
                      <input type="text" value="<?php echo utf8_encode($jt['subpart']) ?>" name="subpartidaNombre" class="form-control" id="nombreSubpartida" aria-label="Default" aria-describedby="inputGroup-sizing-default" required>
                    </div>

                  </td>
                </tr>

                <tr>

                  <td colspan="3">

                    <div class="input-group mb-3">
                      <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroup-sizing-default">No. de escritura <br> pública Fovissste</span>
                      </div>
                      <input type="text" class="form-control" value="<?php if (mysqli_num_rows($jt1) == 0) {
                                                                        echo "";
                                                                      } else {
                                                                        echo utf8_encode($jt2['num_escritura_P']);
                                                                      } ?>" name="numeroEscrituraPub" id="numEscrituraPublica" aria-label="Default" aria-describedby="inputGroup-sizing-default" required>
                    </div>

                  </td>
                  <td colspan="3">

                    <div class="input-group mb-3">
                      <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroup-sizing-default">Fecha de escritura <br> pública Fovissste</span>
                      </div>
                      <input type="date" id="fechaEscrituraPublica" value="<?php if (mysqli_num_rows($jt1) == 0) {
                                                                              echo "";
                                                                            } else {
                                                                              echo utf8_encode($jt2['fecha_escritura_p']);
                                                                            } ?>" name="fechaEscrituraPublica" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" required>

                    </div>

                  </td>

                </tr>

                <tr>

                  <td colspan="3">

                    <div class="input-group mb-3">
                      <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroup-sizing-default">Nombre de licenciado <br> (Notario)</span>
                      </div>
                      <input type="text" class="form-control" value="<?php if (mysqli_num_rows($jt1) == 0) {
                                                                        echo "";
                                                                      } else {
                                                                        echo utf8_encode($jt2['nombre_notario']);
                                                                      } ?>" name="nombreLicenciado" id="nombreLicenciadoNotario" aria-label="Default" aria-describedby="inputGroup-sizing-default" required>
                    </div>

                  </td>
                  <td colspan="3">

                    <div class="input-group mb-3">
                      <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroup-sizing-default">No. de notario</span>
                      </div>
                      <input type="number" name="numNotario" value="<?php if (mysqli_num_rows($jt1) == 0) {
                                                                      echo "";
                                                                    } else {
                                                                      echo utf8_encode($jt2['num_notario']);
                                                                    } ?>" id="numNotario" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" required>
                    </div>

                  </td>

                </tr>

                <tr>

                  <td colspan="3">

                    <div class="input-group mb-3">
                      <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroup-sizing-default">No. de acta <br> de nacimiento</span>
                      </div>
                      <input type="text" name="numActaNac" value="<?php if (mysqli_num_rows($jt1) == 0) {
                                                                    echo "";
                                                                  } else {
                                                                    echo utf8_encode($jt2['num_acta_nac']);
                                                                  } ?>" id="numActaNacimiento" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" required>
                    </div>

                  </td>

                  <td colspan="3">

                    <div class="input-group mb-3">
                      <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroup-sizing-default">Fecha de registro en <br> acta de nacimiento</span>
                      </div>
                      <input type="date" id="fechaRegistroActaNac" value="<?php if (mysqli_num_rows($jt1) == 0) {
                                                                            echo "";
                                                                          } else {
                                                                            echo utf8_encode($jt2['fecha_reg_acta_nac']);
                                                                          } ?>" name="fechaRegistroActaNac" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" required>

                    </div>

                  </td>


                </tr>

                <tr>

                  <td colspan="3">

                    <div class="input-group mb-3">
                      <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroup-sizing-default">Acta de nacimiento <br> expedida por:</span>
                      </div>
                      <input type="text" name="actaNacExp" value="<?php if (mysqli_num_rows($jt1) == 0) {
                                                                    echo "";
                                                                  } else {
                                                                    echo utf8_encode($jt2['acta_exp']);
                                                                  } ?>" id="actaNacimientoExpedidaPor" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" required>
                    </div>

                  </td>
                  <td colspan="3">

                    <div class="input-group mb-3">
                      <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroup-sizing-default">Fecha de expedición <br>de acta de nacimiento:</span>
                      </div>
                      <input type="date" id="fechaExpedicionActaNac" value="<?php if (mysqli_num_rows($jt1) == 0) {
                                                                              echo "";
                                                                            } else {
                                                                              echo utf8_encode($jt2['fecha_exp_acta_nac']);
                                                                            } ?>" name="fechaExpedicionActaNac" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" required>

                    </div>

                  </td>


                </tr>

                <tr>


                  <td colspan="3">

                    <div class="input-group mb-3">
                      <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroup-sizing-default">Fecha de nacimiento</span>
                      </div>
                      <input type="date" id="fechaNacimiento" name="fechaNacimiento" value="<?php if (mysqli_num_rows($jt1) == 0) {
                                                                                              echo "";
                                                                                            } else {
                                                                                              echo utf8_encode($jt2['fecha_nac']);
                                                                                            } ?>" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" required>

                    </div>

                  </td>

                  <td colspan="3">

                    <div class="input-group mb-3">
                      <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroup-sizing-default">ID. expedida por:</span>
                      </div>
                      <input type="text" name="nombreId" id="identificacionExpPor" value="<?php if (mysqli_num_rows($jt1) == 0) {
                                                                                            echo "";
                                                                                          } else {
                                                                                            echo utf8_encode($jt2['id_exp_por']);
                                                                                          } ?>" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" required>
                    </div>

                  </td>


                </tr>

                <tr>


                  <td colspan="3">

                    <div class="input-group mb-3">
                      <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroup-sizing-default">
                          <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="idfo" id="NUMERO" value="NUMERO" required>
                            <label class="form-check-label" for="inlineRadio1"> Num:</label>
                          </div>
                          <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="idfo" id="ID" value="ID" required>
                            <label class="form-check-label" for="inlineRadio1"> ID:</label>
                          </div>
                          <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="idfo" id="FOLIO" value="FOLIO" required>
                            <label class="form-check-label" for="inlineRadio2">Folio:</label>

                          </div>
                        </span>
                      </div>
                      <input type="text" name="numIdentificacion" value="<?php if (mysqli_num_rows($jt1) == 0) {
                                                                            echo "";
                                                                          } else {
                                                                            echo utf8_encode($jt2['num_folio']);
                                                                          } ?>" id="numIdentificacion" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" required>
                    </div>

                  </td>

                  <td colspan="3">

                    <div class="input-group mb-3">
                      <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroup-sizing-default">RFC:</span>
                      </div>
                      <input type="text" id="rfc" name="rfc" value="<?php if (mysqli_num_rows($jt1) == 0) {
                                                                      echo "";
                                                                    } else {
                                                                      echo utf8_encode($jt2['rfc']);
                                                                    } ?>" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" required>
                    </div>

                  </td>


                </tr>

                <tr>

                  <td colspan="3">

                    <div class="input-group mb-3">
                      <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroup-sizing-default">Fecha de inicio <br> de operaciones</span>
                      </div>
                      <input type="date" id="fechaInicioOp" name="fechaInicioOp" value="<?php if (mysqli_num_rows($jt1) == 0) {
                                                                                          echo "";
                                                                                        } else {
                                                                                          echo utf8_encode($jt2['fecha_ini_op']);
                                                                                        } ?>" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" required>
                    </div>

                  </td>
                  <td colspan="3">

                    <div class="input-group mb-3">
                      <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroup-sizing-default">Fecha de 32D:
                          <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" onclick="siAplica();" name="aplica" id="true" value="true" required>
                            <label class="form-check-label" for="inlineRadio1">Aplica</label>
                          </div>
                          <div class="form-check form-check-inline">
                            <input class="form-check-input" onclick="noAplica();" type="radio" name="aplica" id="false" value="false" required>
                            <label class="form-check-label" for="inlineRadio2">No Aplica</label>
                          </div>
                        </span>
                      </div>
                      <input type="date" id="fecha32d" name="fecha32D" value="<?php if (mysqli_num_rows($jt1) == 0) {
                                                                                echo "";
                                                                              } else {
                                                                                echo utf8_encode($jt2['fecha_32d']);
                                                                              } ?>" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" required>
                    </div>

                  </td>


                </tr>

                <tr>



                  <td colspan="3">

                    <div class="input-group mb-3">
                      <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroup-sizing-default">Año de ejercicio:</span>
                      </div>
                      <input type="text" id="añodeEjercicio" name="anoEjercicio" value="<?php if (mysqli_num_rows($jt1) == 0) {
                                                                                          echo "";
                                                                                        } else {
                                                                                          echo utf8_encode($jt2['an_ejercicio']);
                                                                                        } ?>" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" required>
                    </div>

                  </td>
                  <td colspan="3">

                    <div class="input-group mb-3">
                      <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroup-sizing-default">
                          <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="tipoDom" id="FISCAL" value="FISCAL " required>
                            <label class="form-check-label" for="inlineRadio1">Fiscal:</label>
                          </div>
                          <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="tipoDom" id="CONVENCIONAL" value="CONVENCIONAL" required>
                            <label class="form-check-label" for="inlineRadio2">Convencional:</label>

                          </div>

                        </span>
                      </div>

                      <input type="text" class="form-control" value="<?php if (mysqli_num_rows($jt1) == 0) {
                                                                        echo "";
                                                                      } else {
                                                                        echo utf8_encode($jt2['nom_fiscal']);
                                                                      } ?>" name="domicilioFiscal" id="domicilioFiscal" aria-label="Default" aria-describedby="inputGroup-sizing-default" required>
                    </div>

                  </td>


                </tr>

                <tr>

                  <td colspan="3">

                    <div class="input-group mb-3">
                      <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroup-sizing-default">No. de oficio de emisión de contrato por <br>jurídico</span>
                      </div>
                      <input type="text" class="form-control" value="<?php if (mysqli_num_rows($jt1) == 0) {
                                                                        echo "";
                                                                      } else {
                                                                        echo utf8_encode($jt2['num_oficio_emision']);
                                                                      } ?>" name="numOficioEmision" id="numOficioEmision" aria-label="Default" aria-describedby="inputGroup-sizing-default" required>
                    </div>

                  </td>

                  <td colspan="2">

                    <div class="input-group mb-3">
                      <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroup-sizing-default">Fecha de oficio de emisión <br> de contrato por jurídico</span>
                      </div>
                      <input type="date" id="fechaOficioEmision" value="<?php if (mysqli_num_rows($jt1) == 0) {
                                                                          echo "";
                                                                        } else {
                                                                          echo utf8_encode($jt2['fecha_oficio_emision']);
                                                                        } ?>" name="fechaOficioEmision" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" required>
                    </div>

                  </td>

                </tr>
                <tr>

                  <td colspan="3">

                    <div class="input-group mb-3">
                      <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroup-sizing-default">Monto sin IVA:</span>
                      </div>
                      <input type="text" value="<?php echo $jt['monto'] ?>" name="montoIva" min="1" step="any" id="montoSinIva" class=" form-control" id="montoSinIva" aria-label="Default" aria-describedby="inputGroup-sizing-default">
                      <input type="hidden" value="<?php echo $formatter->toMoney(str_replace(',', '', $jt['monto']), 2, 'pesos', 'centavos'); ?>" name="montoIvaNombre" min="1" step="any" id="montoSinIva" class=" form-control" id="montoSinIva" aria-label="Default" aria-describedby="inputGroup-sizing-default">

                    </div>

                  </td>
                  <td colspan="3">

                    <div class="input-group mb-3">
                      <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroup-sizing-default">IVA:</span>
                      </div>
                      <input type="text" id="iva" value="<?php echo $jt['iva'] ?>" name="iva" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default">
                      <input type="hidden" value="<?php echo $formatter->toMoney(str_replace(',', '', $jt['iva']), 2, 'pesos', 'centavos'); ?>" name="IvaNombre" min="1" step="any" id="montoSinIva" class=" form-control" id="montoSinIva" aria-label="Default" aria-describedby="inputGroup-sizing-default">

                    </div>

                  </td>

                </tr>

                <tr>


                  <td colspan="3">

                    <div class="input-group mb-3">
                      <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroup-sizing-default">Monto total con IVA:</span>
                      </div>
                      <input type="text" value="<?php echo $jt['total'] ?>" id="totalConIva" name="totalIva" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default">
                      <input type="hidden" value="<?php echo $formatter->toMoney(str_replace(',', '', $jt['total']), 2, 'pesos', 'centavos'); ?>" name="montoTotalIvaNombre" min="1" step="any" id="montoSinIva" class=" form-control" id="montoSinIva" aria-label="Default" aria-describedby="inputGroup-sizing-default">

                    </div>

                  </td>
                  <td colspan="3">

                    <div class="input-group mb-3">
                      <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroup-sizing-default">Número de pagos:</span>
                      </div>
                      <input type="number" id="numPagos" name="numPagos" value="<?php if (mysqli_num_rows($jt1) == 0) {
                                                                                  echo "";
                                                                                } else {
                                                                                  echo utf8_encode($jt2['num_pagos']);
                                                                                } ?>" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" required>
                    </div>

                  </td>

                </tr>

                <tr>

                  <td colspan="6">

                    <div class="input-group mb-3">
                      <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroup-sizing-default">Inicial de Abogado:</span>
                      </div>
                      <input type="text" id="iniAbo" name="iniAbo" value="<?php if (mysqli_num_rows($jt1) == 0) {
                                                                            echo "";
                                                                          } else {
                                                                            echo utf8_encode($jt2['inicial_abogado']);
                                                                          } ?>" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" required>
                    </div>



                </tr>
                <tr>
                  </td>
                  <td colspan="6">

                    <div class="input-group mb-3">
                      <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroup-sizing-default">DETALLE DE PAGOS</span>
                      </div>
                      <textarea class="form-control" id="detalleDePagos2" name="detalleDePagos2" rows="3" required><?php if (mysqli_num_rows($jt1) == 0) {
                                                                                                                      echo "";
                                                                                                                    } else {
                                                                                                                      echo utf8_encode($jt2['detalle_pagos']);
                                                                                                                    } ?></textarea>
                    </div>
                  </td>

                </tr>
                <tr>
                  <td colspan="3">

                    <div class="input-group mb-3">
                      <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroup-sizing-default">No. de dias hábiles</span>
                      </div>
                      <input type="text" class="form-control" value="<?php if (mysqli_num_rows($jt1) == 0) {
                                                                        echo "";
                                                                      } else {
                                                                        echo utf8_encode($jt2['num_dias_habiles']);
                                                                      } ?>" name="numDiasHabiles" id="numDiasHabiles" aria-label="Default" aria-describedby="inputGroup-sizing-default" required>
                    </div>

                  </td>

                  <td colspan="3">

                    <div class="input-group mb-3">
                      <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroup-sizing-default">Fecha de publicación de <br> resolución en el DOF</span>
                      </div>
                      <input type="date" name="fechaPublicacionDof" value="<?php if (mysqli_num_rows($jt1) == 0) {
                                                                              echo "";
                                                                            } else {
                                                                              echo utf8_encode($jt2['fecha_dof']);
                                                                            } ?>" id="fechaPublicacionDof" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" required>
                    </div>

                  </td>
                </tr>

                <tr>


                  <td colspan="6">

                    <div class="input-group mb-3">
                      <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroup-sizing-default">Vigencia:</span>
                      </div>
                      <input type="date" id="vigencia1" name="vigencia1" value="<?php if (mysqli_num_rows($jt1) == 0) {
                                                                                  echo "";
                                                                                } else {
                                                                                  echo utf8_encode($jt2['fecha_vigencia1']);
                                                                                } ?>" class="form-control" value="<?php echo $jt['vfe_ini'] ?>" aria-label="Default" aria-describedby="inputGroup-sizing-default" required>
                      AL <input type="date" id="vigencia2" name="vigencia2" value="<?php if (mysqli_num_rows($jt1) == 0) {
                                                                                      echo "";
                                                                                    } else {
                                                                                      echo utf8_encode($jt2['fecha_vigencia2']);
                                                                                    } ?>" class="form-control" value="<?php echo $jt['vfe_fin'] ?>" aria-label="Default" aria-describedby="inputGroup-sizing-default" required>

                    </div>

                  </td>

                </tr>

                <tr>


                  <td colspan="3">

                    <div class="input-group mb-3">
                      <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroup-sizing-default">Numeral de Anexo:</span>
                      </div>
                      <input type="text" name="numeralAnexo" value="<?php if (mysqli_num_rows($jt1) == 0) {
                                                                      echo "";
                                                                    } else {
                                                                      echo utf8_encode($jt2['numeral_anexo']);
                                                                    } ?>" id="numeralAnexo" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" required>
                    </div>

                  </td>

                  <td colspan="3">

                    <div class="input-group mb-3">
                      <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroup-sizing-default">
                          <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" name="mesDiciembre" value="false" onclick="mesdeDiciembre();" id="mesDiciembre">
                          </div>
                          EL PAGO CORRESPONDIENTE AL MES DE DICIEMBRE, <br> SE REALIZARÁ ANTES DE QUE TERMINE EL EJERCICIO PRESUPUESTAL
                        </span>
                      </div>

                    </div>
                  </td>

                </tr>

                <tr>
                  <td colspan="3">

                    <div class="input-group mb-3">
                      <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroup-sizing-default">REGLAS</span>
                      </div>
                      <input type="text" class="form-control" value="<?php if (mysqli_num_rows($jt1) == 0) {
                                                                        echo "";
                                                                      } else {
                                                                        echo utf8_encode($jt2['regla1']);
                                                                      } ?>" name="reglasContrato1" id="reglasContrato1" aria-label="Default" aria-describedby="inputGroup-sizing-default" value="2.7.1.32, 2.7.1.35" required> &nbsp;Y&nbsp;
                      <input type="text" class="form-control" value="<?php if (mysqli_num_rows($jt1) == 0) {
                                                                        echo "";
                                                                      } else {
                                                                        echo utf8_encode($jt2['regla2']);
                                                                      } ?>" name="reglasContrato2" id="reglasContrato2" aria-label="Default" aria-describedby="inputGroup-sizing-default" value="2.7.1.43 " required>
                    </div>

                  </td>

                  <td colspan="3">

                    <div class="input-group mb-3">
                      <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroup-sizing-default">
                          <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" name="mismoSubDir" value="false" onclick="subMismo();" id="submismo">
                          </div>
                          EL SUBDIRECTOR DEL AREA REQUIRENTE ES EL MISMO QUE ADMINISTRA, <br>VERIFICA, SUPERVISA Y VIGILA EL CUMPLIMIENTO DEL CONTRATO
                        </span>
                      </div>

                    </div>

                  </td>

                </tr>


                <tr>

                  <td colspan="3">

                    <div class="input-group mb-3">
                      <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroup-sizing-default">Nombre del subdirector <br> del area requiriente</span>
                      </div>
                      <input type="text" class="form-control" value="<?php if (mysqli_num_rows($jt1) == 0) {
                                                                        echo "";
                                                                      } else {
                                                                        echo utf8_encode($jt2['nom_subDirector']);
                                                                      } ?>" name="nombreSubdirectorArea" id="nombreSubdirectorArea" aria-label="Default" aria-describedby="inputGroup-sizing-default" required>
                    </div>

                  </td>

                  <td colspan="3">

                    <div class="input-group mb-3">
                      <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroup-sizing-default">Subdirección requiriente</span>
                      </div>
                      <input type="text" class="form-control" value="<?php if (mysqli_num_rows($jt1) == 0) {
                                                                        echo "";
                                                                      } else {
                                                                        echo utf8_encode($jt2['nom_subDireccion']);
                                                                      } ?>" name="subdireccionRequiriente" id="subdireccionRequiriente" aria-label="Default" aria-describedby="inputGroup-sizing-default" required>
                    </div>

                  </td>


                </tr>


                <tr>
                  <td colspan="3">

                    <div class="input-group mb-3">
                      <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroup-sizing-default">% de pena convencional</span>
                      </div>
                      <input type="text" name="penaCon" value="<?php if (mysqli_num_rows($jt1) == 0) {
                                                                  echo "";
                                                                } else {
                                                                  echo utf8_encode($jt2['porc_pena_convencional']);
                                                                } ?>" id="penaConvencional" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" required>
                    </div>

                  </td>

                  <td colspan="3">

                    <div class="input-group mb-3">
                      <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroup-sizing-default">% de acumulación <br> de pena</span>
                      </div>
                      <input type="text" name="acumulacionPena" value="<?php if (mysqli_num_rows($jt1) == 0) {
                                                                          echo "";
                                                                        } else {
                                                                          echo utf8_encode($jt2['porc_acumulacion_pena']);
                                                                        } ?>" id="acumulacionPena" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" required>
                    </div>

                  </td>

                </tr>

                <tr>

                  <td colspan="3">

                    <div class="input-group mb-3">
                      <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroup-sizing-default">

                          <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="checkAnexoPena" id="NUMERAL1" value="NUMERAL " required>
                            <label class="form-check-label" for="inlineRadio1">Numeral:</label>
                          </div>
                          <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="checkAnexoPena" id="INCISO1" value="INCISO" required>
                            <label class="form-check-label" for="inlineRadio2">Inciso:</label>
                          </div>
                          anexo pena convencional:

                        </span>
                      </div>
                      <input type="text" id="numIncisoAnexo" value="<?php if (mysqli_num_rows($jt1) == 0) {
                                                                      echo "";
                                                                    } else {
                                                                      echo utf8_encode($jt2['num_inciso_anexo']);
                                                                    } ?>" name="numeralIncisoA" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" required>
                    </div>

                  </td>

                  <td colspan="3">

                    <div class="input-group mb-3">
                      <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroup-sizing-default">Deducción al pago

                          <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="checkDeducPago" id="PORCADADIA" value="POR CADA DIA " required>
                            <label class="form-check-label" for="inlineRadio1">Por cada día:</label>
                          </div>
                          <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="checkDeducPago" id="PORACTIVIDAD" value="POR ACTIVIDAD" required>
                            <label class="form-check-label" for="inlineRadio2">Por actividad</label>
                          </div>
                        </span>

                  </td>

                </tr>
                <tr>

                  <td colspan="3">

                    <div class="input-group mb-3">
                      <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroup-sizing-default">% de deductivas</span>
                      </div>
                      <input type="text" name="porcentajeDeductiva" value="<?php if (mysqli_num_rows($jt1) == 0) {
                                                                              echo "";
                                                                            } else {
                                                                              echo utf8_encode($jt2['porc_deductivas']);
                                                                            } ?>" id="porcentajeDeductivas" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" required>
                    </div>

                  </td>
                  <td colspan="3">

                    <div class="input-group mb-3">
                      <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroup-sizing-default">% de suma de <br> deductivas</span>
                      </div>
                      <input type="text" name="porcentajeSumaDe" value="<?php if (mysqli_num_rows($jt1) == 0) {
                                                                          echo "";
                                                                        } else {
                                                                          echo utf8_encode($jt2['porc_suma_deductivas']);
                                                                        } ?>" id="porcentajeSumaDeductivas" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" required>
                    </div>

                  </td>


                </tr>

                <tr>

                  <td colspan="3">

                    <div class="input-group mb-3">
                      <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroup-sizing-default">

                          <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="checkAnexoDeduc" id="NUMERAL2" value="NUMERAL " required>
                            <label class="form-check-label" for="inlineRadio1">Numeral:</label>
                          </div>
                          <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="checkAnexoDeduc" id="INCISO2" value="INCISO" required>
                            <label class="form-check-label" for="inlineRadio2">Inciso:</label>

                          </div>
                          anexo deductivas
                        </span>
                      </div>
                      <input type="text" id="numeralIncisoDeductivas" value="<?php if (mysqli_num_rows($jt1) == 0) {
                                                                                echo "";
                                                                              } else {
                                                                                echo utf8_encode($jt2['numeral_anexo_deductivas']);
                                                                              } ?>" name="numeralIncisoDeductivas" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" required>
                    </div>

                  </td>
                  <td colspan="3">

                    <div class="input-group mb-3">
                      <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroup-sizing-default">Número de declaraciones <br> que se refieren:</span>
                      </div>
                      <input type="text" name="numeroDeclaraciones" value="<?php if (mysqli_num_rows($jt1) == 0) {
                                                                              echo "";
                                                                            } else {
                                                                              echo utf8_encode($jt2['num_declaraciones1']);
                                                                            } ?>" id="numeroDeclaraciones" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" required>
                      y <input type="text" name="numeroDeclaraciones2" value="<?php if (mysqli_num_rows($jt1) == 0) {
                                                                                echo "";
                                                                              } else {
                                                                                echo utf8_encode($jt2['num_declaraciones2']);
                                                                              } ?>" id="numeroDeclaraciones2" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" required>

                    </div>

                  </td>


                </tr>

                <tr>

                  <td colspan="3">

                    <div class="input-group mb-3">
                      <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroup-sizing-default">Porcentaje de penas <br> convencionales:</span>
                      </div>
                      <input type="text" id="porcentajePenasConvencionales" value="<?php if (mysqli_num_rows($jt1) == 0) {
                                                                                      echo "";
                                                                                    } else {
                                                                                      echo utf8_encode($jt2['porc_penas_convencionales']);
                                                                                    } ?>" name="porcentajePenasCon" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" required>
                    </div>

                  </td>

                  <td colspan="3">

                    <div class="input-group mb-3">
                      <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroup-sizing-default">Fecha de firma de <br> contratos</span>
                      </div>
                      <input type="date" id="fechaFirmaContratos" value="<?php if (mysqli_num_rows($jt1) == 0) {
                                                                            echo "";
                                                                          } else {
                                                                            echo utf8_encode($jt2['fecha_firma_contratos']);
                                                                          } ?>" name="fechaFirmaContrato" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" required>
                    </div>

                  </td>


                </tr>

                <tr>

                  <td colspan="3">

                    <div class="input-group mb-3">
                      <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroup-sizing-default">
                          <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="jefesmateriales" id="JEFA1" value="JEFA" required>
                            <label class="form-check-label" for="inlineRadio1">Jefa</label>
                          </div>
                          <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="jefesmateriales" id="JEFE1" value="JEFE" required>
                            <label class="form-check-label" for="inlineRadio2">Jefe</label>
                          </div>de servicios de recursos <br>materiales y servicios generales
                        </span>
                      </div>
                      <input type="text" id="jefeServiciosMateriales" value="<?php if (mysqli_num_rows($jt1) == 0) {
                                                                                echo "L.C.P. OMAR FABIÁN GOMEZ GARCÍA";
                                                                              } else {
                                                                                echo utf8_encode($jt2['nom_jefeSM']);
                                                                              } ?>" name="nombreJefeRecursosMat" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" required>
                    </div>

                  </td>
                  <td colspan="3">

                    <div class="input-group mb-3">
                      <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroup-sizing-default">
                          <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="jefesRecursos" id="JEFA2" value="JEFA" required>
                            <label class="form-check-label" for="inlineRadio1">Jefa</label>
                          </div>
                          <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="jefesRecursos" id="JEFE2" value="JEFE" required>
                            <label class="form-check-label" for="inlineRadio2">Jefe</label>
                          </div>de departamento de recursos <br>materiales
                        </span>
                      </div>
                      <input type="text" class="form-control" value="<?php if (mysqli_num_rows($jt1) == 0) {
                                                                        echo "MTRA. CRISTHELL ELVIRA MEJIA CRUZ";
                                                                      } else {
                                                                        echo utf8_encode($jt2['nom_departRM']);
                                                                      } ?>" name="departamentoRecursos" id="nombreJefeDepartamentoRecursos" aria-label="Default" aria-describedby="inputGroup-sizing-default" required>
                    </div>

                  </td>

                </tr>

                <tr>

                  <td colspan="3">

                    <div class=" input-group mb-3">
                      <div class=" input-group-prepend">
                        <span class="input-group-text" id="inputGroup-sizing-default">
                          <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="numResponsables" onclick="respon1();" id="responsables1" value="responsables1" required>
                            <label class="form-check-label" for="inlineRadio1">1 Responsable</label>
                          </div>
                          <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="numResponsables" onclick="respon2();" id="responsables2" value="responsables2" required>
                            <label class="form-check-label" for="inlineRadio2">2 Responsables</label>
                          </div>
                        </span>
                      </div>
                    </div>

                  </td>

                  <td colspan="3">

                    <div class="input-group mb-3">
                      <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroup-sizing-default">
                          <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="administra" id="DELADMINISTRADOR" value="DEL ADMINISTRADOR" required>
                            <label class="form-check-label" for="inlineRadio1">Administrador.</label>
                          </div>
                          <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="administra" id="DELAADMINISTRADORA" value="DE LA ADMINISTRADORA" required>
                            <label class="form-check-label" for="inlineRadio2">Administadora.</label>
                          </div>
                        </span>
                      </div>
                      <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroup-sizing-default">
                          <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="encargados" id="ENCARGADO" value="ENCARGADO" required>
                            <label class="form-check-label" for="inlineRadio1">Encargado.</label>
                          </div>
                          <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="encargados" id="ENCARGADA" value="ENCARGADA" required>
                            <label class="form-check-label" for="inlineRadio2">Encargada.</label>
                          </div>
                        </span>
                      </div>
                    </div>

                  </td>


                </tr>
                <tr>
                  <td colspan="3">

                    <div class="input-group mb-3">
                      <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroup-sizing-default">
                          RESPONSABLE 1 DE ADMINISTRAR, VERIFICAR,<br>
                          SUPERVISAR Y VIGILAR EL CUMPLIMIENTO <br>
                          DEL CONTRATO:
                        </span>
                      </div>
                      <input type="text" id="responsable1" value="<?php if (mysqli_num_rows($jt1) == 0) {
                                                                    echo "";
                                                                  } else {
                                                                    echo utf8_encode($jt2['responsable1']);
                                                                  } ?>" name="responsable1" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default  ">
                    </div>

                  </td>
                  <td colspan="3">

                    <div class="input-group mb-3">
                      <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroup-sizing-default">CARGO DE DEL RESPONSABLE 1 DE <br>ADMINISTRAR, VERIFICAR, SUPERVISAR Y <br>VIGILAR EL CUMPLIMIENTO
                          DEL CONTRATO</span>
                      </div>
                      <input type="text" class="form-control" value="<?php if (mysqli_num_rows($jt1) == 0) {
                                                                        echo "";
                                                                      } else {
                                                                        echo utf8_encode($jt2['cargo_responsable1']);
                                                                      } ?>" name="cargoResponsable1" id="cargoResponsable1" aria-label="Default" aria-describedby="inputGroup-sizing-default">
                    </div>

                  </td>


                </tr>

                <tr>
                  <td colspan="3">

                    <div class="input-group mb-3">
                      <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroup-sizing-default">RESPONSABLE 2 DE ADMINISTRAR, VERIFICAR, <br>SUPERVISAR Y VIGILAR EL CUMPLIMIENTO DEL<br> CONTRATO:</span>
                      </div>
                      <input type="text" id="responsable2" value="<?php if (mysqli_num_rows($jt1) == 0) {
                                                                    echo "";
                                                                  } else {
                                                                    echo utf8_encode($jt2['responsable2']);
                                                                  } ?>" name="responsable2" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default">
                    </div>

                  </td>
                  <td colspan="3">

                    <div class="input-group mb-3">
                      <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroup-sizing-default">CARGO DE DEL RESPONSABLE 2 DE ADMINISTRAR, <br>VERIFICAR, SUPERVISAR Y VIGILAR EL <br>CUMPLIMIENTO DEL CONTRATO</span>
                      </div>
                      <input type="text" name="cargoResponsable2" value="<?php if (mysqli_num_rows($jt1) == 0) {
                                                                            echo "";
                                                                          } else {
                                                                            echo utf8_encode($jt2['cargo_responsable2']);
                                                                          } ?>" id="cargoResponsable2" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default">
                    </div>

                  </td>


                </tr>
              </tbody>
            </table>

            <input type="hidden" value="<?php echo $cl ?>" class="form-control" id="iddecontrato" name="iddecontrato" aria-label="Default" aria-describedby="inputGroup-sizing-default">



            <div class="form-group row">
              <div class="col-md-4 ">
              </div>
              <div class="col-md-6">
                <div class="form-check form-check-inline">
                  <input type="hidden" class="form-check-input" type="radio" name="tipoContrato" id="pf7000" value="<?php echo $tipoContrato ?>">

                </div>

                <button class="btn btn-primary" name="guardareimp" id="guardareimp" value="guardareimp" type="submit">GUARDAR E IMPRIMIR CONTRATO </button>
              </div>

            </div>
          </div>
          <a href="#" class="float">
            <i class="fa fa-save my-float"></i>
          </a>
          </form>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->

      </section>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <style type="text/css" media="print">
      .main-footer {
        display: none;
      }
    </style>
    <footer class="main-footer">
      <?php include "../includes/footer.php"; ?>
    </footer>
    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
  </div>
  <!-- ./wrapper -->

  <style>
    .float {
      position: fixed;
      width: 60px;
      height: 60px;
      bottom: 40px;
      right: 40px;
      background-color: #0C9;
      color: #FFF;
      border-radius: 50px;
      text-align: center;
      box-shadow: 2px 2px 3px #999;
    }

    .my-float {
      margin-top: 22px;
    }
  </style>

  <<script type="text/javascript" src="js/generacionContrato.js">
    </script>

    <script src="../compon/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="../compon/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../js/adminlte.min.js"></script>


    <script>
      if (<?php echo $numCont ?> == "1") {
        c7000();
      }
      <?php if (mysqli_num_rows($jt1) > 0) { ?>
        document.getElementById("<?php echo $checkPrestador ?>").checked = true;
        document.getElementById("<?php echo $checkServicio ?>").checked = true;
        document.getElementById("<?php echo $checkSubDir ?>").checked = true;
        document.getElementById("<?php echo $checkArticulo ?>").checked = true;
        document.getElementById("<?php echo $checkjefeCP ?>").checked = true;
        document.getElementById("<?php echo $checkFolio ?>").checked = true;
        document.getElementById("<?php echo $check_32d ?>").checked = true;
        document.getElementById("<?php echo $checkArtCons ?>").checked = true;
        document.getElementById("<?php echo $checkArtAd ?>").checked = true;
        document.getElementById("<?php echo $checkDeducPago ?>").checked = true;


        if (<?php echo $check_32d ?> == false) {
          document.getElementById("<?php echo $check_32d ?>").value = false;
          document.getElementById("fecha32d").disabled = true;

          document.getElementById("fecha32d").required = false;
        }

        if (<?php echo $check_pagoCorrespondiente ?> == true) {
          document.getElementById("mesDiciembre").value = true;
          document.getElementById("mesDiciembre").checked = true;
        }


        if (<?php echo $check_subdirectorMismo ?> == true) {
          document.getElementById("submismo").value = true;
          document.getElementById("submismo").checked = true;

          document.getElementById("responsable1").disabled = true;
          document.getElementById("cargoResponsable1").disabled = true;
          document.getElementById("responsable2").disabled = true;
          document.getElementById("cargoResponsable2").disabled = true;
          document.getElementById("responsables1").disabled = true;
          document.getElementById("responsables2").disabled = true;
          document.getElementById("responsable1").required = false;
          document.getElementById("responsables2").required = false;
        }

        document.getElementById("<?php echo $check_fiscal ?>").checked = true;
        document.getElementById("<?php echo $check_anexoPenaC ?>" + "1").checked = true;
        document.getElementById("<?php echo $check_anexoDeduc ?>" + "2").checked = true;
        document.getElementById("<?php echo $check_administrador ?>").checked = true;
        document.getElementById("<?php echo $check_encargado ?>").checked = true;
        document.getElementById("<?php echo $check_jefeSR ?>" + "1").checked = true;
        document.getElementById("<?php echo $check_jefeDR ?>" + "2").checked = true;
      <?php }  ?>
    </script>
</body>

</html>