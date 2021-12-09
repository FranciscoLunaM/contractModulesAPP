<?php
include("../conexion.php");
$cl = $_GET["cl"];
$consulta = "SELECT *,a.area as ar FROM contrato as c, sub_partida as sub, area as a where c.id='$cl' and sub.id=c.sub_partida and c.area=a.id";
$jt = mysqli_fetch_array(mysqli_query($conexion, $consulta));

$tipoContrato = $jt["tipop"];

$consulta2 = "SELECT * FROM `impresion_ad` WHERE id_contrato='$cl'";
$jt1 = mysqli_query($conexion, $consulta2);
$jt2 = mysqli_fetch_array($jt1);

require '../compon/numAletra/vendor/autoload.php';

use Luecano\NumeroALetras\NumeroALetras;

$formatter = new NumeroALetras();
if (mysqli_num_rows($jt1) > 0) {

  $fecha_oficio = str_replace(' ', '',  $jt2['fecha_oficio']);
}

$fundamentoLegal = "en los artículos 167 último párrafo, 168, 169, fracción V, y 228 fracción II de la Ley del Instituto de Seguridad y Servicios Sociales de los Trabajadores del Estado, 52 de la Ley Federal de Entidades Paraestatales, y el artículo 2 fracción XXXI de la Ley Federal de Presupuesto y Responsabilidad Hacendaria";

$fundamentoLegalAtribuciones = "por los artículos 2, 8 fracción VII y 97 fracción X del Reglamento Orgánico del Fondo de la Vivienda del Instituto de Seguridad y Servicios Sociales de los Trabajadores del Estado";

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
              <h1><strong>IMPRESIÓN DE ADJUDICACIÓN PM
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

                    <form name="form1" action="generarWordADpf.php" method="post">
                      <div class="input-group mb-3">
                        <div class="input-group-prepend">
                          <span class="input-group-text" id="inputGroup-sizing-default">
                            Fecha de Oficio
                            <div></div>
                          </span>
                        </div>
                        <input type="date" name="fechaOficio" value="<?php if (mysqli_num_rows($jt1) == 0) {
                                                                        echo "";
                                                                      } else {
                                                                        echo utf8_encode($jt2['fecha_oficio']);
                                                                      } ?>" id="fechaOficio" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" required>
                      </div>


                  </td>
                  <td colspan="3">

                    <div class="input-group mb-3">
                      <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroup-sizing-default">
                          Nombre de Empresa
                        </span>
                      </div>
                      <input type="text" value="<?php echo utf8_encode($jt['prestador']) ?>" class="form-control" id="nPrestador" name="nPrestador" aria-label="Default" aria-describedby="inputGroup-sizing-default" required>
                    </div>

                  </td>

                </tr>


                <td colspan="6">

                  <div class="input-group mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text" id="inputGroup-sizing-default">Domicilio</span>
                    </div>
                    <textarea class="form-control" id="domicilioPrestador" name="domicilioPrestador" rows="3" required><?php if (mysqli_num_rows($jt1) == 0) {
                                                                                                                          echo "";
                                                                                                                        } else {
                                                                                                                          echo utf8_encode($jt2['dom_prestador']);
                                                                                                                        } ?></textarea>
                  </div>
                </td>

                </tr>

                <tr>
                  <td colspan="6">

                    <div class="input-group mb-3">
                      <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroup-sizing-default">
                          Fundamento Legal
                        </span>
                      </div>
                      <textarea class="form-control" value="" id="fLegal" name="fLegal" rows="3" required><?php if (mysqli_num_rows($jt1) == 0) {
                                                                                                            echo $fundamentoLegal;
                                                                                                          } else {
                                                                                                            echo utf8_encode($jt2['fun_legal']);
                                                                                                          } ?></textarea>
                    </div>

                  </td>

                </tr>

                <tr>
                  <td colspan="6">

                    <div class="input-group mb-3">
                      <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroup-sizing-default">
                          Area Requiriente
                        </span>
                      </div>
                      <input type="text" value="<?php echo utf8_encode($jt['ar']) ?>" class="form-control" id="areaRequiriente" name="areaRequiriente" aria-label="Default" aria-describedby="inputGroup-sizing-default" required>
                    </div>

                  </td>
                </tr>
                <tr>
                  <td colspan="6">
                    <div class="input-group mb-3">
                      <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroup-sizing-default">
                          Servicio Profesional
                        </span>
                      </div>
                      <input type="text" class="form-control" value="<?php echo utf8_encode($jt['servicio']) ?>" id="servicioProfesional" name="servicioProfesional" aria-label="Default" aria-describedby="inputGroup-sizing-default" required>
                    </div>
                  </td>
                </tr>

                <tr>
                  <td colspan="3">
                    <div class="input-group mb-3">
                      <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroup-sizing-default">
                          Monto
                        </span>
                      </div>
                      <input type="text" value="<?php echo utf8_encode($jt['monto']) ?>" class="form-control" id="monto" name="monto" aria-label="Default" aria-describedby="inputGroup-sizing-default" required>
                      <input type="hidden" value="<?php echo $formatter->toMoney(str_replace(',', '', $jt['monto']), 2, 'pesos', 'centavos'); ?>" name="montoletra" min="1" step="any" class=" form-control" id="montoletra" aria-label="Default" aria-describedby="inputGroup-sizing-default">

                    </div>
                  </td>

                  <td colspan="3">

                    <div class="input-group mb-3">
                      <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroup-sizing-default">Vigencia</span>
                      </div>
                      <input type="date" name="vigencia1" value="<?php if (mysqli_num_rows($jt1) == 0) {
                                                                    echo "";
                                                                  } else {
                                                                    echo $jt['vfe_ini'];
                                                                  } ?>" id="vigencia1" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" required>

                      y

                      <input type="date" name="vigencia2" value="<?php if (mysqli_num_rows($jt1) == 0) {
                                                                    echo "";
                                                                  } else {
                                                                    echo $jt['vfe_fin'];;
                                                                  } ?>" id="vigencia2" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" required>
                    </div>

                  </td>
                </tr>

                <tr>
                  <td colspan="6">

                    <div class="input-group mb-3">
                      <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroup-sizing-default">fundamento Legal de atribuciones</span>
                      </div>
                      <textarea class="form-control" value="" id="fLegalAt" value="" name="fLegalAt" rows="3" required><?php if (mysqli_num_rows($jt1) == 0) {
                                                                                                                          echo $fundamentoLegalAtribuciones;
                                                                                                                        } else {
                                                                                                                          echo utf8_encode($jt2['fun_legal']);
                                                                                                                        } ?></textarea>
                    </div>
                  </td>


                </tr>

                <tr>
                  <td colspan="6">
                    <div class="input-group mb-3">
                      <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroup-sizing-default">
                          Nombre subdirector de administracion del FOVISSSTE
                        </span>
                      </div>
                      <input type="text" class="form-control" value="<?php if (mysqli_num_rows($jt1) == 0) {
                                                                        echo "";
                                                                      } else {
                                                                        echo $jt2['nombre_subdir_fov'];;
                                                                      } ?>" id="subdir" name="subdir" aria-label="Default" aria-describedby="inputGroup-sizing-default" required>
                    </div>
                  </td>


              </tbody>
            </table>

            <input type="hidden" value="<?php echo $cl ?>" class="form-control" id="iddecontrato" name="iddecontrato" aria-label="Default" aria-describedby="inputGroup-sizing-default">
            <input type="hidden" value="<?php echo $tipoContrato ?>" class="form-control" id="tipoContrato" name="tipoContrato" aria-label="Default" aria-describedby="inputGroup-sizing-default">



            <div class="form-group row">
              <div class="col-md-4 ">
              </div>
              <div class="col-md-6">


                <button class="btn btn-primary" name="guardareimp" id="guardareimp" value="guardareimp" type="submit">GUARDAR E IMPRIMIR</button>
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


</body>

</html>