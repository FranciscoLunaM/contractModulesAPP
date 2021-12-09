<?php include("../conexion.php");
// $cl=$_GET["cl"];
if (isset($_POST["guardareimp"])) {
  $cl = $_POST["cl"];
  $idus = $_POST["idus"];
  $pluri = $_POST['rp'];
  @$fecin = date("Y-m-d", strtotime($_POST["c7"]));
  @$fecinr = date("Y-m-d", strtotime($_POST["c8"]));
  $gurad = "update contrato set servicio='" . utf8_decode($_POST["c2"]) . "', contrato='', prestador='" . utf8_decode($_POST["c3"]) . "',area='" . $_POST["c4"] . "', administrador='" . utf8_decode($_POST["c5"]) . "', auxadmin='" . utf8_decode($_POST["c6"]) . "', vfe_ini='$fecin', vfe_fin='$fecinr',pluri='$pluri', monto='" . $_POST["c9"] . "', iva='" . $_POST["c19"] . "', total='" . $_POST["c29"] . "', partida='" . $_POST["c39"] . "', sub_partida='" . $_POST["c49"] . "', categoria ='" . $_POST["cate_id"] . "', sub_cat='" . $_POST["c10"] . "', enlace='" . utf8_decode($_POST["c11"]) . "', tipop='" . $_POST["prove_id"] . "', tipo='" . $_POST["c12"] . "', cap='" . $_POST["cap_id"] . "', status='1', obs_abogado ='" . utf8_decode($_POST["notas"]) . "' where id =" . $_REQUEST["cl"] . "";
  mysqli_query($conexion, $gurad);

  $i = 1;
  foreach ($_POST['idab'] as $value) {
    $radio1 = $_POST['r' . $i];
    @$esteob1 = json_encode($_POST['ob' . $i]);
    $query2 = " update det_abog set c1='$radio1', obs='$esteob1' where id =$value";
    $i++;
    mysqli_query($conexion, $query2);
  }

  $fechh = date("Y-m-d", strtotime("-6 hour"));
  $gurad = "update seg_cont set coorevisa='1', coorfecha='$fechh', userclic10='$idus', cooaceptarevcuali='1', cooarcualifecha='$fechh',  userclic11='$idus' where id_cont =" . $cl . "  AND num_rechazo='0'";
  mysqli_query($conexion, $gurad);
}

//rechazo de coordinador 
if (isset($_POST["rechazareimp"])) {
  $cl = $_POST["cl"];
  $idus = $_POST["idus"];
  $pluri = $_POST['rp'];
  @$fecin = date("Y-m-d", strtotime($_POST["c7"]));
  @$fecinr = date("Y-m-d", strtotime($_POST["c8"]));
  $gurad = "update contrato set servicio='" . utf8_decode($_POST["c2"]) . "', contrato='', prestador='" . utf8_decode($_POST["c3"]) . "',area='" . $_POST["c4"] . "', administrador='" . utf8_decode($_POST["c5"]) . "', auxadmin='" . utf8_decode($_POST["c6"]) . "', vfe_ini='$fecin', vfe_fin='$fecinr', pluri='$pluri', monto='" . $_POST["c9"] . "', iva='" . $_POST["c19"] . "', total='" . $_POST["c29"] . "', partida='" . $_POST["c39"] . "', sub_partida='" . $_POST["c49"] . "', categoria ='" . $_POST["cate_id"] . "', sub_cat='" . $_POST["c10"] . "', enlace='" . utf8_decode($_POST["c11"]) . "', tipop='" . $_POST["prove_id"] . "', tipo='" . $_POST["c12"] . "', cap='" . $_POST["cap_id"] . "',  etapa='3',  status='3', obs_abogado='" . utf8_decode($_POST["notas"]) . "' where id =" . $_REQUEST["cl"] . "";
  mysqli_query($conexion, $gurad);

  $rechas = " SELECT COUNT(*) as trechazados from rechazo where id_cont='$cl' and tiporechazo = '3' ";
  $rechazo = @mysqli_fetch_array(mysqli_query($conexion, $rechas));
  $trech = ($rechazo['trechazados'] + 1);

  $i = 1;
  foreach ($_POST['idab'] as $value) {
    $radio1 = $_POST['r' . $i];
    @$esteob1 = json_encode($_POST['ob' . $i]);
    $query2 = " update det_abog set c1='$radio1', obs='$esteob1', num_rechazo='$trech' where id =$value";
    $i++;
    mysqli_query($conexion, $query2);
  }

  $fechh = date("Y-m-d", strtotime("-6 hour"));
  $gurad = "update seg_cont set coorevisa='1', coorfecha='$fechh', userclic10='$idus', coorechazorevcuali='1', coorrcualifecha='$fechh', userclic12='$idus' where id_cont =" . $cl . "  AND num_rechazo='0'";
  mysqli_query($conexion, $gurad);

  $fech = date("Y-m-d H:i:s", strtotime("-6 hour"));
  $gurr = "INSERT INTO rechazo (id, id_cont, fecha, tiporechazo, numrechazo, obs_abogado) value ( '' ,'$cl', '$fech', '3', '$trech', '" . $_POST["notas"] . "' )";
  mysqli_query($conexion, $gurr);
  //fin del rechazo
}

$resul = "SELECT con.id, servicio, contrato, prestador, ar.area, administrador, auxadmin, vfe_ini, vfe_fin, pluri, monto, iva, total, partida, par_compl as sub_partida, cat.nombre as categoria, subc.nombre as sub_cat, enlace,prov.nombre as tipop, fecha,tip.nombre as tipo,capi.nombre as cap, status,cuali, obs_abogado FROM contrato as con, area as ar, sub_partida as sub, categoria as cat, sub_cat as subc, tproveedor as prov, tprocedi as tip, capi as capi where con.area=ar.id and con.sub_partida=sub.id and con.categoria=cat.tipo and con.sub_cat=subc.id and con.tipop=prov.id and con.tipo=tip.id and con.cap=capi.id and con.id='$cl'";
$jt = mysqli_fetch_array(mysqli_query($conexion, $resul));


?>
<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="shortcut icon" type="image/x-icon" href="../images/favicon.png">
  <title> Nota Informativa </title>
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
              <h1><strong>Nota Informativa </strong></h1>
            </div>

          </div>
        </div><!-- /.container-fluid -->
      </section>

      <!-- Main content -->
      <section class="content">
        <!-- Default box -->
        <div class="card">
          <div class="card-body">

            <table class="table table-striped texttopo">
              <tr>
                <td><strong>CAPÍTULO: </strong> <?php echo   $jt['cap']; ?> </td>
                <td><strong>TIPO DE PERSONA: </strong> <?php echo   utf8_encode($jt['tipop']); ?> </td>
                <td><strong>TIPO DE PROCEDIMIENTO </strong> <?php echo   utf8_encode($jt['tipo']); ?> </td>
              </tr>
              <tr>
                <td colspan="3"><strong>CATEGORÍA: </strong> <?php echo   $jt['sub_cat']; ?></td>
              </tr>
              <tr>
                <td colspan="3"><strong>PRESTADOR: </strong> <?php echo   utf8_encode($jt['prestador']); ?> </td>
              </tr>
              <tr>
                <td colspan="3"><strong>SERVICIO: </strong> <?php echo   utf8_encode($jt['servicio']); ?> </td>
              </tr>
              <tr>
                <td colspan="3"><strong>ÁREA REQUIRENTE </strong> <?php echo   utf8_encode($jt['area']); ?></td>
              </tr>
              <tr>
                <td><strong>ADMIN. DEL CONTRATO: </strong><?php echo  utf8_encode($jt['administrador']); ?> </td>
                <td colspan="2"><strong>AUXILIAR DEL ADMIN.: </strong> <?php echo  utf8_encode($jt['auxadmin']); ?> </td>
              </tr>
              <tr>
                <td colspan="3"><strong>VIGENCIA:</strong> DEL <?php echo date("d-m-Y", strtotime($jt["vfe_ini"])); ?> AL <?php echo date("d-m-Y", strtotime($jt["vfe_fin"])); ?> </td>
              </tr>
              <td><strong>MONTO: $</strong> <?php echo $jt['monto']; ?> </td>
              <td><strong>IVA: $</strong> <?php echo $jt['iva']; ?> </td>
              <td><strong>TOTAL: $</strong> <?php echo  $jt['total']; ?> </td>
              </tr>

              <tr>
                <td><strong>PARTIDA PRESUPUESTAL: </strong> <?php echo $jt['partida']; ?> </td>
                <td colspan="2"><strong>SUB-PARTIDA PRESUPUESTAL: </strong> <?php echo   utf8_encode($jt['sub_partida']); ?> </td>
              </tr>
              <tr>
                <td colspan="3"><strong>ENLACE: </strong> <?php echo utf8_encode($jt['enlace']); ?> </td>
              </tr>
            </table>
            <hr>
            <?php
            // Array containing search string
            $searchVal = array("[", "]",);
            // Array containing replace string from  search string
            $replaceVal = array("(", ")");
            ?>
            <table class="table table-striped texttopo">
              <thead>
                <tr class="headings">
                  <th width="30%" colspan="2">DOCUMENTACIÓN ÁREA REQUIRENTE</th>
                  <th>OBSERVACIONES </th>
                </tr>
              </thead>
              <tbody>
                <?php $pocse = "SELECT * FROM ( SELECT abo.id, abo.id_cont ,abo.id_doc as doc ,doc.nombre_doc, abo.c1, abo.obs, abo.val_fecha, num_rechazo, tipo_doc FROM det_abog AS abo ,cat_doc AS doc WHERE abo.id_doc= doc.id and id_cont='$cl' ORDER BY abo.id desc LIMIT 0, 16 ) AS DEMO ORDER BY doc ASC";
                $pocsec = mysqli_query($conexion, $pocse);
                $cont = 1;
                while (@$pc = mysqli_fetch_array($pocsec)) {
                  if ($pc["c1"] == 0) {
                ?>
                    <tr>
                      <td><?php echo $cont; ?></td>
                      <td><?php echo utf8_encode($pc["nombre_doc"]); ?></td>
                      <td><?php $res1 = str_replace($searchVal, $replaceVal, $pc['obs']);
                          $porcse = "SELECT id, observacion FROM obs_abogado WHERE id IN $res1";
                          $porcsec = mysqli_query($conexion, $porcse);
                          while (@$porsec = mysqli_fetch_array($porcsec)) {
                            echo utf8_encode($porsec["observacion"]);
                            echo "<br>";
                          } ?> </td>
                    </tr>
                  <?php } else {
                  }
                  if ($cont == '8') { ?>
              </tbody>
            </table>
            <hr>
            <table class="table table-striped texttopo">
              <thead>
                <tr class="headings">
                  <th width="30%" colspan="2">DOCUMENTACIÓN LEGAL DEL PROVEEDOR</th>
                  <th>OBSERVACIONES </th>
                </tr>
              </thead>
              <tbody>
            <?php }
                  $cont++;
                } ?>
              </tbody>
            </table>

            <hr>
            <table class="table table-striped texttopo">
              <thead>
                <tr class="headings">
                  <th>NOTAS GENERALES </th>
                </tr>
              </thead>
              <tbody>
                <td>
                  <?php echo nl2br($jt["obs_abogado"]); ?>
                </td>
              </tbody>
            </table>
            <br>

            <br>
            <p></p>
            <br>

            <div class="form-group row">
              <div class="col-md-6 " align="center"> ____________________________________________<br> ELABORÓ </div>
              <div class="col-md-6 " align="center"> ____________________________________________<br> RECIBIDO </div>
            </div>


            <style type="text/css" media="print">
              .botnu {
                display: none;
              }
            </style>

            <div class="form-group row botnu">
              <div class="col-md-11 " align="center">
                <button class="btn btn-primary" onclick="window.print()" name="imprimir" id="imprimir" value="imprimir" type="submit">IMPRIMIR </button>
              </div>

            </div>

          </div>
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

  <!-- jQuery -->
  <script src="../compon/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="../compon/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="../js/adminlte.min.js"></script>

</body>

</html>