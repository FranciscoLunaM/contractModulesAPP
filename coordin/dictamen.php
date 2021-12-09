<?php session_start();
if (!(isset($_SESSION['password']) && $_SESSION['perfil'] == '3')) {
  header("location:../index.html");
} else {
  $us = $_SESSION["nickname"];
  $usnombre = $_SESSION["nombre"];
  $tipc = $_SESSION["perfil"];
  $id_cor = $_SESSION["idusuario"];
  include("../conexion.php"); ?>
  <!DOCTYPE html>
  <html lang="es">

  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/x-icon" href="../images/favicon.png">
    <title>Observaciones de Dictamen</title>
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../compon/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../css/adminlte.min.css">
    <!-- Nuevo style -->
    <link rel="stylesheet" href="style.css">

  </head>
  <?php
  if (isset($_POST["buscar"])) {

    if (empty($_POST['prov'])) {
      $bprov = "";
    } else {
      $bprov = $_POST["prov"];
    }

    if (empty($_POST['capi'])) {
      $bcapi = "";
    } else {
      $bcapi = $_POST["capi"];
    }

    if (empty($_POST['serv'])) {
      $bserv = "";
    } else {
      $bserv = $_POST["serv"];
    }

    if (empty($_POST['cont'])) {
      $bcontra = "";
    } else {
      $bcontra = $_POST["cont"];
    }
  ?>
    <script>
      window.location = "dictamen.php?<?php echo ("prov=" . $bprov . "&cont=" . $bcontra . "&capi=" . $bcapi . "&serv=" . $bserv); ?>"
    </script>
  <?php }

  if (empty($_GET['prov'])) {
    $fprovs = "";
  } else {
    $fprovs = $_GET["prov"];
  }

  if (empty($_GET['capi'])) {
    $fcapi = "%";
  } else {
    $fcapi = $_GET["capi"];
  }

  if (empty($_GET['serv'])) {
    $fserv = "";
  } else {
    $fserv = $_GET["serv"];
  }

  if (empty($_GET['cont'])) {
    $fcontra = "";
  } else {
    $fcontra = $_GET["cont"];
  }
  ?>

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


            </div>
          </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
          <!-- Default box -->
          <div class="card">
            <div class="card-header">
              <h3 class="card-title"><strong>Observaciones de Dictamen</strong> </h3>
            </div>
            <div class="content">

              <div class="card-body">
                <form name="form1" action="" method="post" enctype="multipart/form-data">
                  <div class="row">

                    <div class="col-sm-4 col-md-3">
                      <div class="form-group">
                        <label>Contrato</label>
                        <input type="text" name="cont" value="<?php echo $fcontra ?>" class="form-control">
                      </div>
                    </div>

                    <div class="col-sm-4 col-md-3">
                      <div class="form-group">
                        <label>Prestador</label>
                        <input name="prov" type="text" value="<?php echo $fprovs ?>" class="form-control">
                      </div>
                    </div>

                    <div class="col-sm-4 col-md-3">
                      <div class="form-group">
                        <label>Servicio</label>
                        <input name="serv" type="text" value="<?php echo $fserv ?>" class="form-control">
                      </div>
                    </div>

                    <div class="col-sm-4 col-md-2">
                      <div class="form-group">
                        <label>Capítulo</label>
                        <?php $resulh = "SELECT id, nombre FROM capi order by nombre asc";
                        $resh = mysqli_query($conexion, $resulh) or die("Algo ha ido mal en la consulta a la base de datos");
                        //Llenas el combo
                        if ($rot = mysqli_fetch_array($resh)) { ?>
                          <select name="capi" id="capi" class="custom-select">
                            <option value="" selected="selected"></option>
                          <?php do {
                            echo '<option value= "' . $rot["id"] . '"';
                            if (str_replace("%", "", $fcapi) == $rot["id"]) {
                              echo ("selected='selected'");
                            }
                            echo ' >' . utf8_encode($rot["nombre"]) . '</option>';
                          } while ($rot = mysqli_fetch_array($resh));
                        } ?>
                          </select>
                      </div>
                    </div>

                    <div class="col-sm-4 col-md-1">
                      <div class="form-group">
                        <label></label>
                        <button type="submit" name="buscar" value="buscar" class="btn btn-block bg-gradient-primary">Buscar</button>
                      </div>
                    </div>
                  </div>
                </form>



                <table class="table table-striped bulk_jar">
                  <thead>
                    <tr class="headings">
                      <th class="column-title"># </th>
                      <th class="column-title">TIPO </th>
                      <th class="column-title">CONTRATO</th>
                      <th class="column-title">PRESTADOR </th>
                      <th class="column-title">MONTO SIN IVA</th>
                      <th class="column-title">VIGENCIA</th>
                      <th class="column-title">CATEGORÍA</th>
                      <th class="column-title">SERVICIO</th>
                      <th class="column-title">ABOGADO REVISOR </th>
                      <th class="column-title">ACEPTACIÓN DE RECEPCIÓN</th>
                      <th colspan="2" class="column-title">ACEPTACIÓN DE REVISIÓN </th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php if (empty($bareas) && empty($fprovs) && empty($fcapi) && empty($fserv)) {
                      $porcse = "SELECT con.id, con.servicio, con.prestador, DATE_FORMAT(con.vfe_ini, '%d/%m/%Y') as ini, DATE_FORMAT(con.vfe_fin, '%d/%m/%Y') as fin, con.cap, con.tipop, con.contrato as contrato, con.categoria as categ, con.administrador as administrador, seg.codicrecibe, seg.cordirfecha, seg.codicaceptado, seg.codiafecha, seg.codirechazado, seg.codirefecha, con.coorasigna, con.monto as monto, ar.area as area, cat.tipo_con as categoria, subc.nombre as subcategoria, prov.nombre as proveedor, proc.nombre as procedimiento, cap.nombre as capitulo, sta.status as status, con.cuali, us.nickname as abogado FROM contrato as con, area as ar, capi as cap, tipo_cont as cat, sub_cat as subc, tproveedor as prov, tprocedi as proc, status as sta, seg_cont as seg, user as us WHERE con.area=ar.id and con.categoria=cat.id and con.cap=cap.id and con.sub_cat=subc.id and con.tipop=prov.id and con.tipo=proc.id and con.status=sta.id and con.id=seg.id_cont and us.id=con.coorasigna and seg.abdientregado='1' and seg.codicaceptado='0' and seg.codirechazado='0' and con.jaasigna='$id_cor' AND num_rechazo='0' AND estatus_contrato='1' order by id asc";
                    } else {
                      $porcse = "SELECT con.id, con.servicio, con.prestador, DATE_FORMAT(con.vfe_ini, '%d/%m/%Y') as ini, DATE_FORMAT(con.vfe_fin, '%d/%m/%Y') as fin, con.cap, con.tipop, con.contrato as contrato, con.categoria as categ, con.administrador as administrador, seg.codicrecibe, seg.cordirfecha, seg.codicaceptado, seg.codiafecha, seg.codirechazado, seg.codirefecha, con.coorasigna, con.monto as monto, ar.area as area, cat.tipo_con as categoria, subc.nombre as subcategoria, prov.nombre as proveedor, proc.nombre as procedimiento, cap.nombre as capitulo, sta.status as status, con.cuali, us.nickname as abogado FROM contrato as con, area as ar, capi as cap, tipo_cont as cat, sub_cat as subc, tproveedor as prov, tprocedi as proc, status as sta, seg_cont as seg, user as us WHERE con.area=ar.id and con.categoria=cat.id and con.cap=cap.id and con.sub_cat=subc.id and con.tipop=prov.id and con.tipo=proc.id and con.status=sta.id and con.id=seg.id_cont and us.id=con.coorasigna and seg.abdientregado='1' and seg.codicaceptado='0' and seg.codirechazado='0' and con.jaasigna='$id_cor' AND num_rechazo='0' AND estatus_contrato='1' and con.prestador like concat('%','$fprovs','%') and con.cap like '$fcapi' and con.servicio like concat('%','$fserv','%') and con.contrato like concat('%','$fcontra','%') order by id asc";
                    }
                    $porcsec = mysqli_query($conexion, $porcse);
                    $x = 0;
                    while ($porsec = mysqli_fetch_array($porcsec)) {
                      $capi = $porsec["cap"];
                      $prov = $porsec["tipop"];
                      $cat = $porsec["categ"];
                      @$iframe = ($capi + $prov + $cat);
                      $x++; ?>
                      <tr>
                        <td><?php echo $x; ?> </td>
                        <td><?php echo utf8_encode($porsec["categoria"]); ?> </td>
                        <td> <?php echo utf8_encode($porsec["contrato"]); ?> </td>
                        <td align=" justify"><?php echo utf8_encode($porsec["prestador"]); ?></td>
                        <td align="center">$ <?php echo utf8_encode($porsec["monto"]); ?></td>
                        <td class="text-center">DEL <?php echo $porsec["ini"]; ?> AL <?php echo $porsec["fin"]; ?></td>
                        <td><?php echo utf8_encode($porsec["subcategoria"]); ?></td>
                        <td align=" justify"><?php echo utf8_encode($porsec["servicio"]); ?> </td>
                        <td class="text-center text-uppercase"><?php echo $porsec["abogado"]; ?> </td>
                        <td align="center"><?php if ($porsec["codicrecibe"] == '1') {
                                              echo "RECIBIDO";
                                            } else { ?>
                            <a href="dicta.php?key=<?php echo $porsec["id"] ?>&id=<?php echo $id_cor; ?>" class="btn btn-block bg-gradient-primary">RECIBIR</a> <?php } ?>
                        </td>
                        <td><?php if ($porsec["codicrecibe"] == '1') { ?> <a href="dicta1.php?key=<?php echo $porsec["id"] ?>&id=<?php echo $id_cor; ?>&con=<?php echo $porsec["categ"]; ?>" class="btn btn-block bg-gradient-primary">ACEPTADO</a><?php } else { ?><a class="btn btn-block bg-gradient-secondary">ACEPTADO</a><?php } ?></td>
                        <td><?php if ($porsec["codicrecibe"] == '1') { ?> <a href="dicta2.php?key=<?php echo $porsec["id"] ?>&id=<?php echo $id_cor; ?>" class="btn btn-block bg-gradient-primary">RECHAZADO</a><?php } else { ?> <a class="btn btn-block bg-gradient-secondary">RECHAZADO</a><?php } ?> </td>
                      </tr>
                    <?php } ?>
                  </tbody>
                </table>


              </div>

            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->

        </section>
        <!-- /.content -->
      </div>
      <!-- /.content-wrapper -->

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

    <!-- jQuery -->
    <script src="../compon/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="../compon/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../js/adminlte.min.js"></script>

    <script>
      $(document).ready(function() {
        $('.report').removeClass("report").addClass("active");
        $('.dictamen').removeClass("dictamen").addClass("active");
      });
    </script>


  </body>

  </html><?php } ?>