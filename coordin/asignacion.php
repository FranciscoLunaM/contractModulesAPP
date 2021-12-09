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
    <title>signación</title>
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
      window.location = "asignacion.php?<?php echo ("prov=" . $bprov . "&area=" . $barea . "&capi=" . $bcapi . "&serv=" . $bserv); ?>"
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
            <div class="row mb-2">


            </div>
          </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
          <!-- Default box -->
          <div class="card">
            <div class="card-header">
              <h3 class="card-title"><strong>Recibidos para asignar Abogado</strong> </h3>
            </div>
            <div class="content">

              <div class="card-body">
                <form id="form2" name="form2" method="post" action="">
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

                    <div class="col-sm-4 col-md-3">
                      <div class="form-group">
                        <label>Servicio</label>
                        <input name="serv" type="text" value="<?php echo $fserv ?>" class="form-control">
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

                    <div class="col-sm-4 col-md-1">
                      <div class="form-group">
                        <label></label>
                        <button type="submit" name="buscar" value="buscar" class="btn btn-block bg-gradient-primary">Buscar</button>
                      </div>
                    </div>
                  </div>
                </form>

                <form name="form1" action="asigna.php" method="post" enctype="multipart/form-data">
                  <table class="table table-striped bulk_jar">
                    <thead>
                      <tr class="headings">
                        <th class="column-title"># </th>
                        <th class="column-title">TIPO </th>
                        <th class="column-title">ÁREA</th>
                        <th class="column-title">PRESTADOR </th>
                        <th class="column-title">CAPÍTULO</th>
                        <th class="column-title">MONTO SIN IVA</th>
                        <th class="column-title">VIGENCIA</th>
                        <th class="column-title">CATEGORÍA</th>
                        <th class="column-title">SERVICIO</th>
                        <th class="column-title">REGRESO A JEFE DE ÁREA</th>
                        <th class="column-title">ACEPTACIÓN DE RECEPCIÓN</th>
                        <th colspan="3" class="column-title">ASIGNACIÓN A ABOGADO </th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php if (empty($bareas) && empty($fprovs) && empty($fcapi) && empty($fserv)) {
                        $porcse = "SELECT con.id, con.servicio, con.prestador, DATE_FORMAT(con.vfe_ini, '%d/%m/%Y') as ini, DATE_FORMAT(con.vfe_fin, '%d/%m/%Y') as fin, con.cap, con.tipop, con.categoria as categ, con.administrador as administrador, seg.corecibe, seg.cofecha,  con.monto as monto, ar.area as area, cat.tipo_con as categoria, subc.nombre as subcategoria, prov.nombre as proveedor, proc.nombre as procedimiento, cap.nombre as capitulo, sta.status as status, con.cuali, con.jaasigna FROM contrato as con, area as ar, capi as cap, tipo_cont as cat, sub_cat as subc, tproveedor as prov, tprocedi as proc, status as sta, seg_cont as seg WHERE con.area=ar.id and con.categoria=cat.id and con.cap=cap.id and con.sub_cat=subc.id and con.tipop=prov.id and con.tipo=proc.id and con.status=sta.id and con.id=seg.id_cont and con.jaasigna='$id_cor' and seg.coorasignabool='0' AND num_rechazo='0' AND estatus_contrato='1' order by id asc";
                      } else {
                        $porcse = "SELECT con.id, con.servicio, con.prestador, DATE_FORMAT(con.vfe_ini, '%d/%m/%Y') as ini, DATE_FORMAT(con.vfe_fin, '%d/%m/%Y') as fin, con.cap, con.tipop, con.categoria as categ, con.administrador as administrador, seg.corecibe, seg.cofecha,  con.monto as monto, ar.area as area, cat.tipo_con as categoria, subc.nombre as subcategoria, prov.nombre as proveedor, proc.nombre as procedimiento, cap.nombre as capitulo, sta.status as status, con.cuali, con.jaasigna FROM contrato as con, area as ar, capi as cap, tipo_cont as cat, sub_cat as subc, tproveedor as prov, tprocedi as proc, status as sta, seg_cont as seg WHERE con.area=ar.id and con.categoria=cat.id and con.cap=cap.id and con.sub_cat=subc.id and con.tipop=prov.id and con.tipo=proc.id and con.status=sta.id and con.id=seg.id_cont and con.jaasigna='$id_cor' and seg.coorasignabool='0' AND num_rechazo='0' AND estatus_contrato='1' AND con.area like concat('%','$bareas','%') and con.prestador like concat('%','$fprovs','%') and con.cap like '$fcapi' and con.servicio like concat('%','$fserv','%') order by id asc";
                      }



                      $porcsec = mysqli_query($conexion, $porcse);
                      $x = 1;
                      $cont_tr = 1;
                      while ($porsec = mysqli_fetch_array($porcsec)) {
                        $capi = $porsec["cap"];
                        $prov = $porsec["tipop"];
                        $cat = $porsec["categ"];

                        @$iframe = ($capi + $prov + $cat);

                      ?>
                        <tr id="tr<?php echo $cont_tr ?>">
                          <td><?php echo $x; ?> </td>
                          <td><?php echo utf8_encode($porsec["categoria"]); ?> </td>
                          <td> <?php echo utf8_encode($porsec["area"]); ?> </td>
                          <td align=" justify"><?php echo utf8_encode($porsec["prestador"]); ?></td>
                          <td align="center"><?php echo $porsec["capitulo"]; ?></td>
                          <td align="center">$ <?php echo utf8_encode($porsec["monto"]); ?></td>
                          <td class="text-center">DEL <?php echo $porsec["ini"]; ?> AL <?php echo $porsec["fin"]; ?></td>
                          <td><?php echo utf8_encode($porsec["subcategoria"]); ?></td>
                          <td align=" justify"><?php echo utf8_encode($porsec["servicio"]); ?> </td>
                          <td class="text-muted text-center text-sm"><?php if ($porsec["corecibe"] == '1') {
                                                                        echo "REGRESAR";
                                                                      } else { ?>
                              <a href="regresoContrato.php?key=<?php echo $porsec["id"]; ?>&perf=<?php echo $tipc; ?>" class="btn btn-block bg-gradient-primary text-center">REGRESAR</a> <?php } ?>
                          </td>
                          <td class="text-sm" align="center"><?php if ($porsec["corecibe"] == '1') {
                                                                echo "RECIBIDO";
                                                              } else { ?>
                              <input class="btn btn-primary" type="button" id="asignacion<?php echo $porsec['id'] ?>" class="btn btn-primary" onclick="asignado('' + <?php echo $porsec['id'] ?>+ '','' + <?php echo $id_cor ?>+ '')" value="RECIBIR"> <?php } ?>
                          </td>
                          <td class="text-sm">




                            <?php
                            // $area= $jt["area"];
                            $result = " SELECT us.id, us.nombre, us.nickname   FROM  user as us, coor_abog as ca where us.id= ca.id_abog and  id_coor='$id_cor' ORDER BY ca.orden_abog ASC";
                            $res = mysqli_query($conexion, $result);
                            //Llenas el combo
                            if ($row = mysqli_fetch_array($res)) { ?>
                              <select name="comen[]" id="select<?php echo $porsec["id"]; ?>" class="form-control text-uppercase text-xs" style="min-width:145px;">
                                <option value="" selected="selected"></option>
                              <?php do {
                                echo '<option value= "' . $row["id"] . '"';
                                if (str_replace("%", "", @$values) == $row["id"]) {
                                  echo ("selected='selected'");
                                }
                                echo ' >' . utf8_encode($row["nickname"]) . '</option>';
                              } while ($row = mysqli_fetch_array($res));
                            } ?>
                              </select>

                              <input type="hidden" id="resc<?php echo $porsec["id"]; ?>" name="resc[]" value="<?php echo $porsec["corecibe"]; ?>">
                              <input type="hidden" name="idd[]" value="<?php echo $porsec["id"]; ?>">
                              <input type="hidden" name="idus" value="<?php echo $id_cor; ?>">
                          </td>
                          <td class="text-sm">
                            <a data-fancybox-type='iframe' class=" various btn btn-block bg-gradient-primary" href="abogado.php?key=<?php echo $porsec["jaasigna"]; ?>">ASIGNADO </a>
                          </td>

                          <td class="text-sm" align="center"> <?php if ($porsec["corecibe"] == '1') { ?>
                              <input onclick="asigna('' + <?php echo $porsec['id'] ?>+ '','' + <?php echo  $cont_tr ?>+  '','' + <?php echo  $id_cor ?>+'')" name="asignar" value="ASIGNAR" class="btn btn-block bg-gradient-primary">
                            <?php } else { ?>
                              <input onclick="asigna('' + <?php echo $porsec['id'] ?>+ '','' + <?php echo  $cont_tr ?>+  '','' + <?php echo  $id_cor ?>+'')" name="asignar" value="ASIGNAR" id="asignar<?php echo $porsec["id"]; ?>" class="btn btn-secondary btn" disabled>
                            <?php } ?>
                          </td>
                        </tr>
                      <?php $x++;
                        $cont_tr++;
                      } ?>
                    </tbody>
                  </table>

                </form>
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
    <!-- fancybox2 -->
    <script type="text/javascript" src="../js/fancybox2/lib/jquery.mousewheel.pack.js?v=3.1.3"></script>
    <script type="text/javascript" src="../js/fancybox2/source/jquery.fancybox.pack.js?v=2.1.5"></script>
    <link rel="stylesheet" type="text/css" href="../js/fancybox2/source/jquery.fancybox.css?v=2.1.5" media="screen" />
    <link rel="stylesheet" type="text/css" href="../js/fancybox2/source/helpers/jquery.fancybox-buttons.css?v=1.0.5" />
    <script type="text/javascript" src="../js/fancybox2/source/helpers/jquery.fancybox-buttons.js?v=1.0.5"></script>
    <link rel="stylesheet" type="text/css" href="../js/fancybox2/source/helpers/jquery.fancybox-thumbs.css?v=1.0.7" />
    <script type="text/javascript" src="../js/fancybox2/source/helpers/jquery.fancybox-thumbs.js?v=1.0.7"></script>
    <script type="text/javascript" src="../js/fancybox2/source/helpers/jquery.fancybox-media.js?v=1.0.6"></script>
    <script>
      $(document).ready(function() {
        $('.report').removeClass("report").addClass("active");
        $('.repot').removeClass("repot").addClass("active");
      });
    </script>
    <script type="text/javascript">
      $(document).ready(function() {
        $(".various").fancybox({
          maxWidth: 720,
          maxHeight: 6000,
          fitToView: false,
          autoSize: false,
          closeClick: false,
          openEffect: 'none',
          closeEffect: 'none',
          iframe: {
            preload: false
          }
        });
        $(".variousarc").fancybox({
          maxWidth: 720,
          maxHeight: 6000,
          fitToView: false,
          width: '70%',
          height: '75%',
          autoSize: false,
          closeClick: false,
          openEffect: 'none',
          closeEffect: 'none',
          iframe: {
            preload: false
          }
        });
      });

      function asignado(dato, dato2) {



        $.ajax({
          url: 'cooabo.php',
          type: 'POST',
          data: {
            "key": dato,
            "idus": dato2
          },
          success: console.log(dato2)
        });

        document.getElementById("asignacion" + dato).replaceWith("RECIBIDO")
        document.getElementById("asignar" + dato).className = "btn btn-block bg-gradient-primary";
        document.getElementById("asignar" + dato).className = "btn btn-block bg-gradient-primary";
        document.getElementById("asignar" + dato).removeAttribute("disabled");
        document.getElementById("resc" + dato).value = "1";


      }


      function asigna(id, contTR, idus) {

        const selectV = document.getElementById("select" + id).value;


        if (selectV == "") {
          alert("Elija un coordinador");
        } else {

          $.ajax({
            url: 'asigna.php',
            type: 'POST',
            data: {
              "idd": id,
              "idus": idus,
              "aboAsignado": selectV
            },
            success: console.log("enviado a asigna")
          });


          document.getElementById("tr" + contTR).replaceWith("");

        }
      }
    </script>

  </body>

  </html>
<?php } ?>