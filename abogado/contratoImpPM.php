<?php
include("../conexion.php");
$cl = $_GET["cl"];
$consulta = "SELECT *  FROM contrato as c, sub_partida as sub where c.id='$cl' and sub.id=c.sub_partida ";
$jt = mysqli_fetch_array(mysqli_query($conexion, $consulta));

$consulta2 = "SELECT * FROM `impresion_contratopm` WHERE id_cont='$cl'";
$jt1 = mysqli_query($conexion, $consulta2);
$jt2 = mysqli_fetch_array($jt1);

require '../compon/numAletra/vendor/autoload.php';

use Luecano\NumeroALetras\NumeroALetras;

$formatter = new NumeroALetras();
if (mysqli_num_rows($jt1) > 0) {

  $decomopara = str_replace(' ', '',  $jt2['de_check']);
  $check_representante = str_replace(' ', '',  $jt2['check_representante']);
  $check_subdir = str_replace(' ', '',  $jt2['check_subdir']);
  $check_art_org = str_replace(' ', '',  $jt2['check_articuloOrg']);
  $check_jefe_cp = str_replace(' ', '',  $jt2['check_jefe_cp']);
  $check32d = str_replace(' ', '',  $jt2['check_32']);
  $check_fiscal = str_replace(' ', '',  $jt2['check_fiscal']);
  $check_divisible = str_replace(' ', '',  $jt2['divisible']);
  $check_numeral1 = str_replace(' ', '',  $jt2['numeral']);


  $check_numeral2 = str_replace(' ', '',  $jt2['check_numeral']);
  $check_deduc = str_replace(' ', '',  $jt2['check_deduc']);
  $check_incisco_anexo = str_replace(' ', '',  $jt2['check_inciso_anexo']);
  $check_servicios_rec = str_replace(' ', '',  $jt2['check_servicios_rec']);
  $check_depart_rec = str_replace(' ', '',  $jt2['check_depart_rec']);
  $check_responsable = str_replace(' ', '',  $jt2['responsable1']);
  $administrador = str_replace(' ', '',  $jt2['administrador']);
  $encargado = str_replace(' ', '',  $jt2['encargado']);


  if ($check_responsable = null) {
    $check_responsable = "1";
  }
}
?>


<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="shortcut icon" type="image/x-icon" href="../images/favicon.png">
  <title> IMPRIMIR DOCUMENTO </title>
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../compon/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../css/adminlte.min.css">
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
              <h1><strong>IMPRESIÓN DE CONTRATO PM</strong></h1>
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

                    <form name="form1" action="generarWordPM.php" method="post">
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
                          Nombre de empresa:
                        </span>
                      </div>
                      <input type="text" value="<?php echo utf8_encode($jt['prestador']) ?>" class="form-control" id="nombreEmpresa" name="nombreEmpresa" aria-label="Default" aria-describedby="inputGroup-sizing-default" required>
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
                            <input class="form-check-input" type="radio" name="representantes" id="LAREPRESENTANTE" value="LA" required>
                            <label class="form-check-label" for="inlineRadio1">La Representante</label>
                          </div>
                          <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="representantes" id="ELREPRESENTANTE" value="EL" required>
                            <label class="form-check-label" for="inlineRadio2">El Representante</label>
                          </div>
                        </span>
                      </div>
                      <input type="text" class="form-control" value="<?php if (mysqli_num_rows($jt1) == 0) {
                                                                        echo "";
                                                                      } else {
                                                                        echo utf8_encode($jt2['representante']);
                                                                      } ?>" id="nombreRespresentante" name="nombreRespresentante" aria-label="Default" aria-describedby="inputGroup-sizing-default" required>
                    </div>

                  </td>
                  <td colspan="3">

                    <div class="input-group mb-3">
                      <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroup-sizing-default">Caracter de representante</span>
                      </div>

                      <input type="text" name="caracterRepresentante" value="<?php if (mysqli_num_rows($jt1) == 0) {
                                                                                echo "";
                                                                              } else {
                                                                                echo utf8_encode($jt2['carac_representante']);
                                                                              } ?>" id="fechaOficioSufPre" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" required>

                    </div>

                  </td>




                </tr>



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
                      <input type="text" class="form-control" value="MTRO. LUIS ANTONIO VIDAL CALZADA" name="nombreSubdirectorAdmin" id="nombreSubdirectorAdmin" aria-label="Default" aria-describedby="inputGroup-sizing-default" required>
                    </div>


                  </td>





                </tr>

                <tr>
                  <td colspan="4">


                    <div class="input-group mb-3">
                      <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroup-sizing-default">
                          <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="artiRegO" id="ELARTICULOREGO" value="El ARTICULO " required>
                            <label class="form-check-label" for="inlineRadio1">El artículo.</label>
                          </div>
                          <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="artiRegO" id="LOSARTICULOSREGO" value="LOS ARTICULOS" required>
                            <label class="form-check-label" for="inlineRadio2">Los artículos.</label>
                          </div> del reglamento Organico
                        </span>
                      </div>
                      <input type="text" class="form-control" value="<?php if (mysqli_num_rows($jt1) == 0) {
                                                                        echo "";
                                                                      } else {
                                                                        echo utf8_encode($jt2['articulo_org']);
                                                                      } ?>" name="artiRegONombre" id="artiRegONombre" aria-label="Default" aria-describedby="inputGroup-sizing-default" required>
                    </div>


                  </td>

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
                </tr>

                <tr>


                  <td colspan="6">

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
                        <span class="input-group-text" id="inputGroup-sizing-default">No. Oficio de la <br> suficiencia presupuestal </span>
                      </div>
                      <input type="text" value="<?php if (mysqli_num_rows($jt1) == 0) {
                                                  echo "";
                                                } else {
                                                  echo utf8_encode($jt2['suf_presupuestal']);
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
                                                                            echo utf8_encode($jt2['fecha_suf_pre']);
                                                                          } ?>" id="fechaOficioSufPre" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" required>

                    </div>

                  </td>

                  </td>


                </tr>

                <tr>

                  <td colspan="6">

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
                          de C.P.

                        </span>
                      </div>
                      <input type="text" value="<?php if (mysqli_num_rows($jt1) == 0) {
                                                  echo "";
                                                } else {
                                                  echo utf8_encode($jt2['nombre_jefe_cp']);
                                                } ?>" class="form-control" name="nombreControlP" id="jefeControlPre" aria-label="Default" aria-describedby="inputGroup-sizing-default" required>
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
                                                                        echo utf8_encode($jt2['escr_pub_fov']);
                                                                      } ?>" name="numeroEscrituraPubFov" id="numeroEscrituraPubFov" aria-label="Default" aria-describedby="inputGroup-sizing-default" required>
                    </div>

                  </td>
                  <td colspan="3">

                    <div class="input-group mb-3">
                      <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroup-sizing-default">Fecha de escritura <br> pública Fovissste</span>
                      </div>
                      <input type="date" id="fechaEscrituraPublicaFov" value="<?php if (mysqli_num_rows($jt1) == 0) {
                                                                                echo "";
                                                                              } else {
                                                                                echo $jt2['fecha_esc_pub_fov'];
                                                                              } ?>" name="fechaEscrituraPublicaFov" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" required>

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
                                                                        echo utf8_encode($jt2['nombre_lic']);
                                                                      } ?>" name="nombreLicenciadoNotario" id="nombreLicenciadoNotario" aria-label="Default" aria-describedby="inputGroup-sizing-default" required>
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
                        <span class="input-group-text" id="inputGroup-sizing-default">Lugar del notario publico</span>
                      </div>
                      <input type="text" name="lugarNotario" value="<?php if (mysqli_num_rows($jt1) == 0) {
                                                                      echo "";
                                                                    } else {
                                                                      echo utf8_encode($jt2['lugar_notario']);
                                                                    } ?>" id="lugarNotario" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" required>
                    </div>

                  </td>

                  <td colspan="3">

                    <div class="input-group mb-3">
                      <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroup-sizing-default">Tipo de Sociedad.</span>
                      </div>
                      <input type="text" name="tipoSociedad" value="<?php if (mysqli_num_rows($jt1) == 0) {
                                                                      echo "";
                                                                    } else {
                                                                      echo utf8_encode($jt2['tipo_sociedad']);
                                                                    } ?>" id="tipoSociedad" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" required>
                    </div>

                  </td>
                </tr>

                <tr>

                  <td colspan="3">

                    <div class="input-group mb-3">
                      <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroup-sizing-default">No. de escritura publica de proveedor</span>
                      </div>
                      <input type="number" name="numEscPub" value="<?php if (mysqli_num_rows($jt1) == 0) {
                                                                      echo "";
                                                                    } else {
                                                                      echo utf8_encode($jt2['num_esc_pub']);
                                                                    } ?>" id="numEscPub" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" required>
                    </div>

                  </td>

                  <td colspan="3">

                    <div class="input-group mb-3">
                      <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroup-sizing-default">Fecha de escritura <br> pública de proovedor</span>
                      </div>
                      <input type="date" id="fechaEscrituraPublicaProv" value="<?php if (mysqli_num_rows($jt1) == 0) {
                                                                                  echo "";
                                                                                } else {
                                                                                  echo utf8_encode($jt2['fecha_esc_pub']);
                                                                                } ?>" name="fechaEscrituraPublicaProv" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" required>

                    </div>

                  </td>

                </tr>

                <tr>

                  <td colspan="3">

                    <div class="input-group mb-3">
                      <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroup-sizing-default">Registro de la propiedad</span>
                      </div>
                      <input type="text" name="registroPropiedad" value="<?php if (mysqli_num_rows($jt1) == 0) {
                                                                            echo "";
                                                                          } else {
                                                                            echo utf8_encode($jt2['registro_propiedad']);
                                                                          } ?>" id="registroPropiedad" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" required>
                    </div>

                  </td>

                  <td colspan="3">

                    <div class="input-group mb-3">
                      <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroup-sizing-default">Folio Mercantil elec.</span>
                      </div>
                      <input type="text" name="folioMercantil" value="<?php if (mysqli_num_rows($jt1) == 0) {
                                                                        echo "";
                                                                      } else {
                                                                        echo utf8_encode($jt2['folio_mercantil']);
                                                                      } ?>" id="folioMercantil" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" required>
                    </div>

                  </td>

                </tr>

                <tr>

                  <td colspan="3">

                    <div class="input-group mb-3">
                      <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroup-sizing-default">Fecha de Folio mercantil</span>
                      </div>
                      <input type="date" id="fechaFolioMercantil" value="<?php if (mysqli_num_rows($jt1) == 0) {
                                                                            echo "";
                                                                          } else {
                                                                            echo $jt2['fecha_folio_mercantil'];
                                                                          } ?>" name="fechaFolioMercantil" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" required>

                    </div>

                  </td>

                  <td colspan="3">

                    <div class="input-group mb-3">
                      <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroup-sizing-default">Tipo de representante.</span>
                      </div>
                      <input type="text" name="tipoRepresentante" value="<?php if (mysqli_num_rows($jt1) == 0) {
                                                                            echo "";
                                                                          } else {
                                                                            echo utf8_encode($jt2['tipo_representante']);
                                                                          } ?>" id="tipoRepresentante" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" required>
                    </div>

                  </td>
                </tr>


                <tr>

                  <td colspan="3">

                    <div class="input-group mb-3">
                      <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroup-sizing-default">No. de escritura de representante</span>
                      </div>
                      <input type="number" name="numEscRep" value="<?php if (mysqli_num_rows($jt1) == 0) {
                                                                      echo "";
                                                                    } else {
                                                                      echo utf8_encode($jt2['num_esc_rep']);
                                                                    } ?>" id="numEscRep" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" required>
                    </div>

                  </td>

                  <td colspan="3">

                    <div class="input-group mb-3">
                      <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroup-sizing-default">Fecha de escritura <br> de representante</span>
                      </div>
                      <input type="date" id="fechaEscrituraRep" value="<?php if (mysqli_num_rows($jt1) == 0) {
                                                                          echo "";
                                                                        } else {
                                                                          echo $jt2['fecha_escritura_rep'];
                                                                        } ?>" name="fechaEscrituraRep" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" required>

                    </div>

                  </td>

                </tr>

                <tr>

                  <td colspan="3">

                    <div class="input-group mb-3">
                      <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroup-sizing-default">RFC:</span>
                      </div>
                      <input type="text" id="rfc" name="rfc" value="<?php if (mysqli_num_rows($jt1) == 0) {
                                                                      echo "";
                                                                    } else {
                                                                      echo $jt2['rfc'];
                                                                    } ?>" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" required>
                    </div>

                  </td>


                  <td colspan="3">

                    <div class="input-group mb-3">
                      <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroup-sizing-default">Fecha de inicio <br> de operaciones</span>
                      </div>
                      <input type="date" id="fechaInicioOp" name="fechaInicioOp" value="<?php if (mysqli_num_rows($jt1) == 0) {
                                                                                          echo "";
                                                                                        } else {
                                                                                          echo $jt2['fecha_inicio_op'];
                                                                                        } ?>" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" required>
                    </div>

                  </td>
                </tr>

                <tr>

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
                                                                                echo utf8_encode($jt2['fecha_32']);
                                                                              } ?>" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" required>
                    </div>

                  </td>

                  <td colspan="3">

                    <div class="input-group mb-3">
                      <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroup-sizing-default">Año de ejercicio:</span>
                      </div>
                      <input type="text" id="añodeEjercicio" name="anoEjercicio" value="<?php if (mysqli_num_rows($jt1) == 0) {
                                                                                          echo "";
                                                                                        } else {
                                                                                          echo utf8_encode($jt2['ano_ejercicio']);
                                                                                        } ?>" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" required>
                    </div>

                  </td>

                </tr>

                <tr>

                  <td colspan="3">

                    <div class="input-group mb-3">
                      <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroup-sizing-default">Fecha de escrito IMSS</span>
                      </div>
                      <input type="date" id="fechaEscritoI" name="fechaEscritoI" value="<?php if (mysqli_num_rows($jt1) == 0) {
                                                                                          echo "";
                                                                                        } else {
                                                                                          echo utf8_encode($jt2['fecha_escrito_imss']);
                                                                                        } ?>" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" required>
                    </div>

                  </td>

                  <td colspan="3">

                    <div class="input-group mb-3">
                      <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroup-sizing-default">Fecha de inscrito INFONAVIT</span>
                      </div>
                      <input type="date" id="fechaEscritoINF" name="fechaEscritoINF" value="<?php if (mysqli_num_rows($jt1) == 0) {
                                                                                              echo "";
                                                                                            } else {
                                                                                              echo utf8_encode($jt2['fecha_inscrito_inf']);
                                                                                            } ?>" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" required>
                    </div>

                  </td>
                </tr>

                <tr>

                  <td colspan="3">

                    <div class="input-group mb-3">
                      <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroup-sizing-default">Actividades y Objeto Social:</span>
                      </div>
                      <input type="text" id="actObjSocial" name="actObjSocial" value="<?php if (mysqli_num_rows($jt1) == 0) {
                                                                                        echo "";
                                                                                      } else {
                                                                                        echo utf8_encode($jt2['objeto_social']);
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
                                                                        echo utf8_encode($jt2['fiscal']);
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
                                                                        echo utf8_encode($jt2['num_oficio_contrato']);
                                                                      } ?>" name="numOficioEmision" id="numOficioEmision" aria-label="Default" aria-describedby="inputGroup-sizing-default" required>
                    </div>

                  </td>

                  <td colspan="3">

                    <div class="input-group mb-3">
                      <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroup-sizing-default">Fecha de oficio de emisión <br> de contrato por jurídico</span>
                      </div>
                      <input type="date" id="fechaOficioEmisionJur" value="<?php if (mysqli_num_rows($jt1) == 0) {
                                                                              echo "";
                                                                            } else {
                                                                              echo utf8_encode($jt2['fecha_oficio']);
                                                                            } ?>" name="fechaOficioEmisionJur" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" required>
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
                                                                                  echo utf8_encode($jt2['numero_pagos']);
                                                                                } ?>" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" required>
                    </div>

                  </td>

                </tr>


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

                </tr>

                <tr>



                  <td colspan="6">

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

                  <td colspan="3">

                    <div class="input-group mb-3">
                      <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroup-sizing-default">Vigencia</span>
                      </div>
                      <input type="date" name="vigencia1" value="<?php if (mysqli_num_rows($jt1) == 0) {
                                                                    echo "";
                                                                  } else {
                                                                    echo utf8_encode($jt2['vig1']);
                                                                  } ?>" id="vigencia1" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" required>

                      y

                      <input type="date" name="vigencia2" value="<?php if (mysqli_num_rows($jt1) == 0) {
                                                                    echo "";
                                                                  } else {
                                                                    echo utf8_encode($jt2['vig2']);
                                                                  } ?>" id="vigencia2" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" required>
                    </div>

                  </td>

                  <td colspan="3">

                    <div class="input-group mb-3">
                      <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroup-sizing-default">Monto de la fianza:</span>
                      </div>
                      <input type="text" name="montoFianza" min="1" value="<?php if (mysqli_num_rows($jt1) == 0) {
                                                                              echo "";
                                                                            } else {
                                                                              echo utf8_encode($jt2['fianza']);
                                                                            } ?>" step="any" id="montoFianza" class=" form-control" id="montoSinIva" aria-label="Default" aria-describedby="inputGroup-sizing-default">
                    </div>

                  </td>

                </tr>

                <tr>



                  <td colspan="6">

                    <div class="input-group mb-3">
                      <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroup-sizing-default">Numero de cedula de identificaciòn fiscal:</span>
                      </div>
                      <input type="text" name="idFiscal" id="idFiscal" value="<?php if (mysqli_num_rows($jt1) == 0) {
                                                                                echo "";
                                                                              } else {
                                                                                echo utf8_encode($jt2['num_cedula']);
                                                                              } ?>" class=" form-control" id="montoSinIva" aria-label="Default" aria-describedby="inputGroup-sizing-default">
                    </div>

                  </td>

                </tr>

                <tr>
                  <td colspan="6">

                    <div class="input-group mb-3">
                      <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroup-sizing-default">Fecha de formalización:</span>
                      </div>
                      <input type="date" name="fechaFormalizacion" value="<?php if (mysqli_num_rows($jt1) == 0) {
                                                                            echo "";
                                                                          } else {
                                                                            echo utf8_encode($jt2['fecha_formalizacion']);
                                                                          } ?>" id="fechaFormalizacion" class=" form-control" id="montoSinIva" aria-label="Default" aria-describedby="inputGroup-sizing-default">
                    </div>

                  </td>


                </tr>

                <tr>
                  <td colspan="3">
                    <div class="input-group mb-3">
                      <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroup-sizing-default">
                          <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="obligacionGarant" id="DIVISIBLE" value="DIVISIBLE" required>
                            <label class="form-check-label" for="inlineRadio1">Divisible.</label>
                          </div>
                          <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="obligacionGarant" id="INDIVISIBLE" value="INDIVISIBLE" required>
                            <label class="form-check-label" for="inlineRadio2">Indivisible.</label>
                          </div>
                        </span>
                      </div>
                  </td>

                  <td colspan="3">

                    <div class="input-group mb-3">
                      <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroup-sizing-default">

                          <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="checkAnexoDeduc" id="NUMERALanexo1" value="NUMERAL" required>
                            <label class="form-check-label" for="inlineRadio1">Numeral:</label>
                          </div>
                          <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="checkAnexoDeduc" id="INCISOanexo1" value="INCISO" required>
                            <label class="form-check-label" for="inlineRadio2">Inciso:</label>

                          </div>
                          del anexo
                        </span>
                      </div>
                      <input type="text" id="numeralIncisoDeductivas" value="<?php if (mysqli_num_rows($jt1) == 0) {
                                                                                echo "";
                                                                              } else {
                                                                                echo utf8_encode($jt2['anexo']);
                                                                              } ?>" name="numeralIncisoDeductivas" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" required>
                    </div>

                  </td>
                </tr>

                <tr>
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
                                                                        echo utf8_encode($jt2['subdir_area']);
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
                                                                        echo utf8_encode($jt2['subdir_req']);
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
                                                                  echo utf8_encode($jt2['pena_conv']);
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
                                                                          echo utf8_encode($jt2['acum_pena']);
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
                            <input class="form-check-input" type="radio" name="checkAnexoPena" id="NUMERALPENA" value="NUMERAL " required>
                            <label class="form-check-label" for="inlineRadio1">Numeral:</label>
                          </div>
                          <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="checkAnexoPena" id="INCISOPENA" value="INCISO" required>
                            <label class="form-check-label" for="inlineRadio2">Inciso:</label>
                          </div>
                          anexo pena convencional:

                        </span>
                      </div>
                      <input type="text" id="numIncisoAnexo" value="<?php if (mysqli_num_rows($jt1) == 0) {
                                                                      echo "";
                                                                    } else {
                                                                      echo utf8_encode($jt2['anexo_pena_con']);
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
                      </div>
                      <input type="text" id="deduccionAlPago" value="<?php if (mysqli_num_rows($jt1) == 0) {
                                                                        echo "2.5";
                                                                      } else {
                                                                        echo utf8_encode($jt2['deductivas']);
                                                                      } ?>" name="deduccionPago" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" required>
                    </div>

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
                                                                          echo utf8_encode($jt2['suma_deductivas']);
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
                            <input class="form-check-input" type="radio" name="checkAnexoDeduc" id="NUMERALDEDUC" value="NUMERAL " required>
                            <label class="form-check-label" for="inlineRadio1">Numeral:</label>
                          </div>
                          <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="checkAnexoDeduc" id="INCISODEDUC" value="INCISO" required>
                            <label class="form-check-label" for="inlineRadio2">Inciso:</label>

                          </div>
                          anexo deductivas
                        </span>
                      </div>
                      <input type="text" id="numeralIncisoDeductivas" value="<?php if (mysqli_num_rows($jt1) == 0) {
                                                                                echo "";
                                                                              } else {
                                                                                echo utf8_encode($jt2['anexo_deductivas']);
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
                                                                              echo utf8_encode($jt2['declaraciones1']);
                                                                            } ?>" id="numeroDeclaraciones" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" required>
                      y <input type="text" name="numeroDeclaraciones2" value="<?php if (mysqli_num_rows($jt1) == 0) {
                                                                                echo "";
                                                                              } else {
                                                                                echo utf8_encode($jt2['declaraciones2']);
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
                                                                                      echo utf8_encode($jt2['porc_penas_conv']);
                                                                                    } ?>" name="porcentajePenasConvencionales" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" required>
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
                                                                            echo utf8_encode($jt2['fecha_firma_cont']);
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
                          </div>de servicios de recursos <br>materiales
                        </span>
                      </div>
                      <input type="text" id="jefeServiciosMateriales" value="L.C.P. OMAR FABIÁN GOMEZ GARCÍA" name="nombreJefeRecursosMat" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" required>
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
                      <input type="text" class="form-control" value="MTRA. CRISTHELL ELVIRA MEJIA CRUZ" name="nombreJefeDepartamentoRecursos" id="nombreJefeDepartamentoRecursos" aria-label="Default" aria-describedby="inputGroup-sizing-default" required>
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
            <input type="hidden" value="<?php echo $jt['tipop'] ?>" class="form-control" id="tipop" name="tipop" aria-label="Default" aria-describedby="inputGroup-sizing-default">



            <div class="form-group row">
              <div class="col-md-4 ">
              </div>
              <div class="col-md-6">


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

  <script type="text/javascript" src="js/generacionContrato.js">
  </script>

  <script src="../compon/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="../compon/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="../js/adminlte.min.js"></script>



  <script>
    <?php if (mysqli_num_rows($jt1) > 0) { ?>
      document.getElementById("<?php echo $decomopara ?>").checked = true;
      document.getElementById("<?php echo $check_representante ?>" + "REPRESENTANTE").checked = true;
      document.getElementById("<?php echo $check_subdir ?>").checked = true;
      document.getElementById("<?php echo $check_art_org ?>" + "REGO").checked = true;
      document.getElementById("<?php echo $check_jefe_cp ?>").checked = true;
      document.getElementById("<?php echo $check32d ?>").checked = true;
      document.getElementById("<?php echo $check_fiscal ?>").checked = true;
      document.getElementById("<?php echo $check_divisible ?>").checked = true;
      document.getElementById("<?php echo $check_numeral1 ?>" + "anexo1").checked = true;
      document.getElementById("<?php echo $check_numeral2 ?>" + "PENA").checked = true;
      document.getElementById("<?php echo $check_deduc ?>").checked = true;
      document.getElementById("<?php echo $check_incisco_anexo ?>" + "DEDUC").checked = true;
      document.getElementById("<?php echo $check_servicios_rec ?>" + "1").checked = true;
      document.getElementById("<?php echo $check_depart_rec ?>" + "2").checked = true;
      document.getElementById("<?php echo $administrador ?>").checked = true;
      document.getElementById("<?php echo $encargado ?>").checked = true;

      if (<?php echo $check32d ?> == false) {
        document.getElementById("<?php echo $check32d ?>").value = false;
        document.getElementById("fecha32d").disabled = true;

        document.getElementById("fecha32d").required = false;
      }


    <?php }  ?>
  </script>
</body>

</html>