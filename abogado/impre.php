<?php session_start();
if (!(isset($_SESSION['password']) && $_SESSION['perfil'] == '4')) {
  header("location:../index.html");
} else {
  $us = $_SESSION["nickname"];
  $usnombre = $_SESSION["nombre"];
  $tipc = $_SESSION["perfil"];
  $id_cor = $_SESSION["idusuario"];
  include("../conexion.php");  ?>
  <!DOCTYPE html>
  <html lang="es">

  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/x-icon" href="../images/favicon.png">
    <title>| Reporte </title>
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

    if (empty($_POST['area'])) {
      $barea = "%";
    } else {
      $barea = $_POST["area"];
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
  ?>
    <script>
      window.location = "impre.php?<?php echo ("prov=" . $bprov . "&area=" . $barea . "&capi=" . $bcapi . "&serv=" . $bserv); ?>"
    </script>
  <?php }

  if (empty($_GET['area'])) {
    $bareas = "";
  } else {
    $bareas = $_GET["area"];
  }

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

          </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
          <!-- Default box -->
          <div class="card">
            <div class="card-header">
              <h3 class="card-title"><strong>Busqueda de Contrato </strong> </h3>
            </div>
            <div class="content">

              <div class="card-body">

                <form id="form1" name="form1" method="post" action="">

                  <div class="row">
                    <div class="col-sm-4 col-md-3">
                      <div class="form-group">
                        <label>Área</label>
                        <?php
                        $result = "SELECT id, area FROM area order by area asc";
                        $res = mysqli_query($conexion, $result) or die("Algo ha ido mal en la consulta a la base de datos");
                        //Llenas el combo
                        if ($row = mysqli_fetch_array($res)) { ?>
                          <select name="area" id="area" class="custom-select">
                            <option value="" selected="selected"></option>
                          <?php do {
                            echo '<option value= "' . $row["id"] . '"';
                            if (str_replace("%", "", $bareas) == $row["id"]) {
                              echo ("selected='selected'");
                            }
                            echo ' >' . utf8_encode($row["area"]) . '</option>';
                          } while ($row = mysqli_fetch_array($res));
                        } ?>
                          </select>
                      </div>
                    </div>

                    <div class="col-sm-4 col-md-3">
                      <div class="form-group">
                        <label>Prestador</label>
                        <input name="prov" type="text" value="<?php echo $fprovs ?>" class="form-control">
                      </div>
                    </div>

                    <div class="col-sm-4 col-md-2">
                      <div class="form-group">
                        <label>Capítulo</label>
                        <?php
                        $resulh = "SELECT id, nombre FROM capi order by nombre asc";
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

                    <div class="col-sm-4 col-md-3">
                      <div class="form-group">
                        <label>Servicio</label>
                        <input name="serv" type="text" value="<?php echo $fserv ?>" class="form-control">
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

                <table id="example2" class="table table-striped bulk_jar">
                  <thead>
                    <tr class="headings">
                      <th class="column-title"># </th>
                      <th class="column-title">TIPO </th>
                      <th class="column-title">ÁREA RESPONSABLE </th>
                      <th class="column-title">SERVICIO</th>
                      <th class="column-title">PROVEEDOR </th>
                      <th class="column-title">CAPÍTULOS</th>
                      <th class="column-title">VIGENCIA </th>
                      <th class="column-title">CATEGORÍA </th>
                      <th class="column-title">NOTA INFORMATIVA</th>
                      <th class="column-title">CONTRATO</th>
                      <th class="column-title">OFICIO DE ADJUDICACIÓN</th>
                      <th class="column-title">LOMO</th>

                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    if (empty($bareas) && empty($fprovs) && empty($fcapi) && empty($fserv)) {
                      $porcse = "SELECT con.id, con.servicio, con.prestador, DATE_FORMAT(con.vfe_ini, '%d/%m/%Y') as ini, DATE_FORMAT(con.vfe_fin, '%d/%m/%Y') as fin, con.cap, con.tipop, con.categoria as categ, con.administrador as administrador, seg.abogrecibe, seg.abofecha, seg.aborevisa, seg.abrefecha, ar.area as area, cat.tipo_con as categoria, subc.nombre as subcategoria, prov.nombre as proveedor, proc.nombre as procedimiento, cap.nombre as capitulo, sta.status as status, con.cuali, seg.prefirmrevisa as firma FROM contrato as con, area as ar, capi as cap, tipo_cont as cat, sub_cat as subc, tproveedor as prov, tprocedi as proc, status as sta, seg_cont as seg WHERE con.area=ar.id and con.categoria=cat.id and con.cap=cap.id and con.sub_cat=subc.id and con.tipop=prov.id and con.tipo=proc.id and con.status=sta.id and con.id=seg.id_cont and coorasigna='$id_cor' and aborevisa='1' AND num_rechazo='0' AND estatus_contrato='1' order by id asc";
                    } else {
                      $porcse = "SELECT con.id, con.servicio, con.prestador, DATE_FORMAT(con.vfe_ini, '%d/%m/%Y') as ini, DATE_FORMAT(con.vfe_fin, '%d/%m/%Y') as fin, con.cap, con.tipop, con.categoria as categ, con.administrador as administrador, seg.abogrecibe, seg.abofecha, seg.aborevisa, seg.abrefecha, ar.area as area, cat.tipo_con as categoria, subc.nombre as subcategoria, prov.nombre as proveedor, proc.nombre as procedimiento, cap.nombre as capitulo, sta.status as status, con.cuali, seg.prefirmrevisa as firma FROM contrato as con, area as ar, capi as cap, tipo_cont as cat, sub_cat as subc, tproveedor as prov, tprocedi as proc, status as sta, seg_cont as seg WHERE con.area=ar.id and con.categoria=cat.id and con.cap=cap.id and con.sub_cat=subc.id and con.tipop=prov.id and con.tipo=proc.id and con.status=sta.id and con.id=seg.id_cont and coorasigna='$id_cor' and con.area like concat('%','$bareas','%') and con.prestador like concat('%','$fprovs','%') and con.cap like '$fcapi' and con.servicio like concat('%','$fserv','%') and aborevisa='1' AND num_rechazo='0' AND estatus_contrato='1' order by id asc";
                    }
                    $porcsec = mysqli_query($conexion, $porcse);
                    $cont = 0;
                    while ($porsec = mysqli_fetch_array($porcsec)) {
                      $cont++;
                      $capi = $porsec["cap"];
                      $prov = $porsec["tipop"];
                      $cat = $porsec["categ"];
                      @$iframe = ($capi + $prov + $cat); ?>
                      <tr>
                        <td><?php echo $cont; ?> </td>
                        <td><?php echo utf8_encode($porsec["categoria"]); ?> </td>
                        <td><?php echo utf8_encode($porsec["area"]); ?> </td>
                        <td><?php echo utf8_encode($porsec["servicio"]); ?> </td>
                        <td><?php echo utf8_encode($porsec["prestador"]); ?></td>
                        <td align="center"><?php echo $porsec["capitulo"]; ?></td>
                        <td>DEL <?php echo $porsec["ini"]; ?> AL <?php echo $porsec["fin"]; ?></td>
                        <td><?php echo utf8_encode($porsec["subcategoria"]); ?></td>
                        <td class="column-title"> <a href="notainfor.php?cl=<?php echo $porsec["id"] ?>" class="btn btn-block bg-gradient-primary" target="_blank"> IMPRIMIR</a></td>
                        <?php if ($prov == 1 || $prov == 3) { ?>
                          <td class="column-title"> <a href="contratoImp.php?cl=<?php echo $porsec["id"] ?>" class="btn btn-block bg-gradient-primary" target="_blank"> IMPRIMIR</a></td>
                          <td class="column-title"> <a href="contratoImpAD.php?cl=<?php echo $porsec["id"] ?>" class="btn btn-block bg-gradient-primary" target="_blank"> IMPRIMIR</a></td>
                        <?php } else { ?>
                          <td class="column-title"> <a href="contratoImpPM.php?cl=<?php echo $porsec["id"] ?>" class="btn btn-block bg-gradient-primary" target="_blank"> IMPRIMIR</a></td>

                          <td class="column-title"> <a href="contratoImpADpm.php?cl=<?php echo $porsec["id"] ?>" class="btn btn-block bg-gradient-primary" target="_blank"> IMPRIMIR</a></td>
                        <?php } ?>
                        <td class="column-title"> <a href="generarWordLomo.php?cl=<?php echo $porsec["id"] ?>" class="btn btn-block bg-gradient-primary" target="_blank"> IMPRIMIR</a></td>
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
    <!-- DataTables  & Plugins -->
    <script src="../compon/datatables/jquery.dataTables.min.js"></script>
    <script src="../compon/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>

    <script>
      $(document).ready(function() {
        $('.report').removeClass("report").addClass("active");
        $('.impre').removeClass("impre").addClass("active");
      });
    </script>
    <script>
      $(function() {

        $('#example2').DataTable({
          "paging": true,
          "lengthChange": false,
          "searching": false,
          "ordering": true,
          "info": true,
          "autoWidth": false,
          "responsive": true,
        });
      });
    </script>

  </body>

  </html>
<?php } ?>