<?php include("../conexion.php");
$cl = $_GET["cl"];
$resul = "SELECT id, servicio, contrato, prestador, area, administrador, auxadmin, vfe_ini, vfe_fin,pluri,  monto, iva, total, partida, sub_partida, categoria, sub_cat, enlace, tipop, fecha, tipo, cap, status,cuali, obs_abogado FROM contrato where id='$cl'";
$jt = mysqli_fetch_array(mysqli_query($conexion, $resul));

$tipo_contrato = $jt["tipop"];
$idus = $_GET["id"];

if ($jt['cap'] == 1) {
  $acpi = '7000';
  if ($jt['tipop'] == '2') {
    $psn = 'MORAL';
    $lim = "0, 18";
    $tol = 8;
  } else {
    $psn = 'FÍSICA';
    $lim = "0, 16";
    $tol = 8;
  }
} else {
  $acpi = '3000';
  if ($jt['tipop'] == '4') {
    $psn = 'MORAL';
    $lim = "0, 24";
    $tol = 10;
  } else {
    $psn = 'FÍSICA';
    $lim = "0, 22";
    $tol = 10;
  }
}


?>


<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="shortcut icon" type="image/x-icon" href="../images/favicon.png">
  <title><?php echo $psn ?> <?php echo $acpi; ?></title>
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../compon/fontawesome-free/css/all.min.css">
  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="../compon/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- daterange picker -->
  <link rel="stylesheet" href="../compon/daterangepicker/daterangepicker.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="../compon/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../css/adminlte.min.css">
  <!-- Nuevo style -->
  <link rel="stylesheet" href="style.css">
</head>
<script language="javascript">
  function mascara(o, f) {
    v_obj = o;
    v_fun = f;
    setTimeout("execmascara()", 1);
  }

  function execmascara() {
    v_obj.value = v_fun(v_obj.value);
  }

  function cpf(v) {
    v = v.replace(/([^0-9\.]+)/g, '');
    v = v.replace(/^[\.]/, '');
    v = v.replace(/[\.][\.]/g, '');
    v = v.replace(/\.(\d)(\d)(\d)/g, '.$1$2');
    v = v.replace(/\.(\d{1,2})\./g, '.$1');
    v = v.toString().split('').reverse().join('').replace(/(\d{3})/g, '$1,');
    v = v.split('').reverse().join('').replace(/^[\,]/, '');
    return v;
  }

  function calcular() {
    var varMonto;
    var varIva;
    var varSubTotal;

    varMonto = document.getElementById("c9").value;
    varMonto = varMonto.replace(/[\,]/g, '');

    varIva = parseFloat(varMonto).toFixed(2) * 0.16;
    document.getElementById("iva").value = addCommas(parseFloat(varIva).toFixed(2));

    varSubTotal = parseFloat(varMonto) + parseFloat(varIva);
    document.getElementById("subtotal").value = addCommas(parseFloat(varSubTotal).toFixed(2));
  }

  function addCommas(nStr) {
    nStr += '';
    x = nStr.split('.');
    x1 = x[0];
    x2 = x.length > 1 ? '.' + x[1] : '';
    var rgx = /(\d+)(\d{3})/;
    while (rgx.test(x1)) {
      x1 = x1.replace(rgx, '$1' + ',' + '$2');
    }
    return x1 + x2;
  }
</script>
<script>
  function visibleDiv(obj, valor) {
    document.getElementById(obj).style.display = valor;
  }

  function validarForm(f) {
    //alert(f.elements[3].selectedIndex==0);
    var email;
    var cont = 0;
    var filter = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/
    var telefono = /^( [0-9],[a-z])+$/
    //1
    if (f.cap_id.value.length < 1) {
      visibleDiv("cap", "block");
    } else {
      visibleDiv("cap", "none");
      cont++;
    }
    //2
    if (f.prove_id.value.length < 1) {
      visibleDiv("prove", "block");
    } else {
      visibleDiv("prove", "none");
      cont++;
    }
    //3
    if (f.cate_id.value.length < 1) {
      visibleDiv("cat", "block");
    } else {
      visibleDiv("cat", "none");
      cont++;
    }
    //4
    if (f.c2.value.length < 1) {
      visibleDiv("d2", "block");
    } else {
      visibleDiv("d2", "none");
      cont++;
    }
    //5
    if (f.c3.value.length < 1) {
      visibleDiv("d3", "block");
    } else {
      visibleDiv("d3", "none");
      cont++;
    }
    //6
    if (f.c4.value.length < 1) {
      visibleDiv("d4", "block");
    } else {
      visibleDiv("d4", "none");
      cont++;
    }
    //7
    if (f.c5.value.length < 1) {
      visibleDiv("d5", "block");
    } else {
      visibleDiv("d5", "none");
      cont++;
    }
    //8
    if (f.c6.value.length < 1) {
      visibleDiv("d6", "block");
    } else {
      visibleDiv("d6", "none");
      cont++;
    }
    //9
    if (f.c7.value.length < 1) {
      visibleDiv("d7", "block");
    } else {
      visibleDiv("d7", "none");
      cont++;
    }
    //10
    if (f.c8.value.length < 1) {
      visibleDiv("d8", "block");
    } else {
      visibleDiv("d8", "none");
      cont++;
    }
    //11
    if (f.c9.value.length < 1) {
      visibleDiv("d9", "block");
    } else {
      visibleDiv("d9", "none");
      cont++;
    }
    //12
    if (f.c19.value.length < 1) {
      visibleDiv("d19", "block");
    } else {
      visibleDiv("d19", "none");
      cont++;
    }
    //13
    if (f.c29.value.length < 1) {
      visibleDiv("d29", "block");
    } else {
      visibleDiv("d29", "none");
      cont++;
    }
    //14
    if (f.c10.value.length < 1) {
      visibleDiv("d10", "block");
    } else {
      visibleDiv("d10", "none");
      cont++;
    }
    //15
    if (f.c11.value.length < 1) {
      visibleDiv("d11", "block");
    } else {
      visibleDiv("d11", "none");
      cont++;
    }
    //16
    if (f.c12.value.length < 1) {
      visibleDiv("d12", "block");
    } else {
      visibleDiv("d12", "none");
      cont++;
    }
    //si no hay error
    if (cont == 16) {
      return true;
      //enviarMail();
    } else {
      return false;
    }
  }
</script>

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
              <h1> <strong>Revisión Cualitativa </strong></h1>
            </div>

          </div>
        </div><!-- /.container-fluid -->
      </section>

      <!-- Main content -->
      <section class="content">
        <!-- Default box -->
        <div class="card">
          <div class="card-header">
            <h3 class="card-title"><strong> PERSONA <?php echo $psn ?> CAP <?php echo $acpi; ?></strong> </h3>
          </div>
          <div class="card-body">

            <form name="form1" action="guardar_DB.php?cl=<?php echo $cl ?>&tipoc=<?php echo $tipo_contrato; ?>&idus=<?php echo $idus; ?>" method="post" enctype="multipart/form-data" id="demo-form2">
              <input type="hidden" name="cl" value="<?php echo $cl ?>">
              <div class="form-group row">
                <label class="col-sm-2 col-form-label">CAPÍTULO</label>
                <div class="col-sm-2">
                  <h5><strong> <?php $cap = $jt["cap"];
                                $capit = "SELECT  nombre  FROM capi WHERE id='$cap'";
                                $capitul = @mysqli_fetch_array(mysqli_query($conexion, $capit));
                                echo utf8_encode($capitul['nombre']); ?> </strong> </h5>
                  <input type="hidden" class="form-control" name="cap_id" value="<?php echo $jt["cap"]; ?>">
                  <div style="display:none; color: #FF0000;" id="cap" align="left">Seleccionar Capitulo<img src="../images/error.png" alt="" /></div>
                </div>
                <label class="col-sm-2 col-form-label" style="text-align: center; "> TIPO DE PERSONA</label>
                <div class="col-sm-2">
                  <h5><strong> <?php $tpv = $jt["tipop"];
                                $prove = "SELECT  nombre  FROM tproveedor WHERE id='$tpv'";
                                $proveer = @mysqli_fetch_array(mysqli_query($conexion, $prove));
                                echo utf8_encode($proveer['nombre']); ?> </strong> </h5>
                  <input type="hidden" class="form-control" name="prove_id" value="<?php echo $jt["tipop"]; ?>">
                  <div style="display:none; color: #FF0000;" id="prove" align="left">Seleccionar Tipo de Proveedor <img src="../images/error.png" alt="" /></div>
                </div>

                <input type="hidden" class="form-control" name="cate_id" value="<?php echo $jt["categoria"]; ?>">

              </div>

              <div class="form-group row">
                <label class="col-sm-3 col-form-label">CATEGORÍA</label>
                <div class="col-sm-9">
                  <?php $subcat = $jt["sub_cat"];
                  $rest = "SELECT id, nombre FROM sub_cat where sub_cat.id_capi= $cap order by nombre asc";
                  $resr = mysqli_query($conexion, $rest);
                  //Llenas el combo
                  if ($rowt = mysqli_fetch_array($resr)) { ?>
                    <select name="c10" id="c10" class="custom-select">
                      <option value="" selected="selected"></option>
                    <?php do {
                      echo '<option value= "' . $rowt["id"] . '"';
                      if (str_replace("%", "", $subcat) == $rowt["id"]) {
                        echo ("selected='selected'");
                      }
                      echo ' >' . utf8_encode($rowt["nombre"]) . '</option>';
                    } while ($rowt = mysqli_fetch_array($resr));
                  } ?>
                    </select>
                    <div style="display:none; color: #FF0000;" id="d10" align="left">Categoría del Servicio <img src="../images/error.png" alt="" /></div>
                </div>
              </div>

              <div class="form-group row">
                <label class="col-sm-3 col-form-label">TIPO DE PROCEDIMIENTO</label>
                <div class="col-sm-9">
                  <?php $tipo = $jt["tipo"];
                  $restp = "SELECT id, nombre FROM tprocedi where clave=$cap order by nombre asc";
                  $resrp = mysqli_query($conexion, $restp) or die("Algo ha ido mal en la consulta a la base de datos");
                  //Llenas el combo
                  if ($rowtp = mysqli_fetch_array($resrp)) { ?>
                    <select name="c12" id="c12" class="custom-select">
                      <option value="" selected="selected"></option>
                    <?php do {
                      echo '<option value= "' . $rowtp["id"] . '"';
                      if (str_replace("%", "", $tipo) == $rowtp["id"]) {
                        echo ("selected='selected'");
                      }
                      echo ' >' . utf8_encode($rowtp["nombre"]) . '</option>';
                    } while ($rowtp = mysqli_fetch_array($resrp));
                  } ?>
                    </select>
                    <div style="display:none; color: #FF0000;" id="d12" align="left">Tipo de Procedimiento <img src="../images/error.png" alt="" /></div>
                </div>
              </div>

              <div class="form-group row">
                <label class="col-sm-3 col-form-label">PRESTADOR</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control" name="c3" value="<?php echo utf8_encode($jt["prestador"]); ?>">
                  <div style="display:none; color: #FF0000;" id="d3" align="left">Nombre del Prestador <img src="../images/error.png" alt="" /></div>
                </div>
              </div>

              <div class="form-group row">
                <label class="col-sm-3 col-form-label">SERVICIO</label>
                <div class="col-sm-9">
                  <textarea class="form-control" name="c2"><?php echo utf8_encode($jt["servicio"]); ?></textarea>
                  <div style="display:none; color: #FF0000;" id="d2" align="left">Nombre del Servicio <img src="../images/error.png" alt="" /></div>
                </div>
              </div>

              <div class="form-group row">
                <label class="col-sm-3 col-form-label">ÁREA REQUIRENTE</label>
                <div class="col-sm-9">
                  <?php
                  $area = $jt["area"];
                  $result = "SELECT id, area FROM area order by area asc";
                  $res = mysqli_query($conexion, $result) or die("Algo ha ido mal en la consulta a la base de datos");
                  //Llenas el combo
                  if ($row = mysqli_fetch_array($res)) { ?>
                    <select name="c4" id="c4" class="custom-select">
                      <option value="" selected="selected"></option>
                    <?php do {
                      echo '<option value= "' . $row["id"] . '"';
                      if (str_replace("%", "", $area) == $row["id"]) {
                        echo ("selected='selected'");
                      }
                      echo ' >' . utf8_encode($row["area"]) . '</option>';
                    } while ($row = mysqli_fetch_array($res));
                  } ?>
                    </select>
                    <div style="display:none; color: #FF0000;" id="d4" align="left">Área Requirente <img src="../images/error.png" alt="" /></div>
                </div>
              </div>

              <div class="form-group row">
                <label class="col-sm-3 col-form-label">ADMINISTRADOR DEL CONTRATO </label>
                <div class="col-sm-9">
                  <input type="text" class="form-control" name="c5" id="c5" value="<?php echo utf8_encode($jt["administrador"]); ?>">
                  <div style="display:none; color: #FF0000;" id="d5" align="left">Administrador de Contrato<img src="../images/error.png" alt="" /></div>
                </div>
              </div>

              <div class="form-group row">
                <label class="col-sm-3 col-form-label">AUXILIAR DEL ADMINISTRADOR DE CONTRATO</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control" name="c6" id="c6" value="<?php echo utf8_encode($jt["auxadmin"]); ?>">
                  <div style="display:none; color: #FF0000;" id="d6" align="left">Auxiliar del Administrador de Contrato<img src="../images/error.png" alt="" /></div>
                </div>
              </div>

              <div class="form-group row">
                <label class="col-sm-3 col-form-label">VIGENCIA</label>
                <div class="col-sm-2">
                  <div class="form-group">
                    <div class="input-group date" id="reservationdate" data-target-input="nearest">
                      <input type="text" class="form-control datetimepicker-input" name="c7" data-target="#reservationdate" value="<?php echo date("d-m-Y", strtotime($jt["vfe_ini"])); ?>" />
                      <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                      </div>
                    </div>
                  </div>
                  <div style="display:none; color: #FF0000;" id="d7" align="left">Fecha de Inicio <img src="../images/error.png" alt="" /></div>


                </div>

                <div class="col-sm-2">
                  <div class="form-group">
                    <div class="input-group date" id="reservation" data-target-input="nearest">
                      <input type="text" class="form-control datetimepicker-input" name="c8" data-target="#reservation" value="<?php echo date("d-m-Y", strtotime($jt["vfe_fin"]));  ?>" />
                      <div class="input-group-append" data-target="#reservation" data-toggle="datetimepicker">
                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                      </div>
                    </div>
                  </div>
                  <div style="display:none; color: #FF0000;" id="d8" align="left">Fecha de Termino <img src="../images/error.png" alt="" /></div>
                </div>


                <label class="col-sm-1 col-form-label" style="text-align: center; ">PLURIANUAL</label>
                <div class="col-sm-2">
                  <div class="form-group">
                    <label class=" col-form-label">SI </label> &nbsp;&nbsp;
                    <div class="icheck-success d-inline" style="position: relative; top: 8px; ">
                      <input type="radio" id="radioSucces" name="rp" value="1" required <?php if ($jt['pluri'] == "1") echo 'checked="checked"' ?>>
                      <label for="radioSucces"></label>
                    </div>
                    &nbsp;&nbsp;
                    <label class=" col-form-label">NO </label> &nbsp;&nbsp;
                    <div class="icheck-success d-inline" style="position: relative; top: 8px; ">
                      <input type="radio" id="radioSuccesh" name="rp" value="0" required <?php if ($jt['pluri'] == "0") echo 'checked="checked"' ?>>
                      <label for="radioSuccesh"></label>
                    </div>

                  </div>
                </div>

              </div>

              <div class="form-group row">
                <label class="col-sm-3 col-form-label">MONTO</label>
                <div class="col-sm-2">
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-dollar-sign"></i></span>
                    </div>
                    <input type="text" class="form-control" name="c9" id="c9" onblur="calcular();" onkeypress="mascara(this,cpf)" onpaste="return false" value="<?php echo $jt["monto"]; ?>">
                  </div>
                  <div style="display:none; color: #FF0000;" id="d9" align="left">Monto del Servicio <img src="../images/error.png" alt="" /></div>
                </div>
                <label class="col-sm-1 col-form-label" style="text-align: center; ">IVA</label>
                <div class="col-sm-2">
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-dollar-sign"></i></span>
                    </div>
                    <input type="text" class="form-control" name="c19" id="iva" value="<?php echo $jt["iva"]; ?>">
                  </div>
                  <div style="display:none; color: #FF0000;" id="d19" align="left">IVA del Servicio <img src="../images/error.png" alt="" /></div>
                </div>
                <label class="col-sm-1 col-form-label" style="text-align: center; ">TOTAL</label>
                <div class="col-sm-2">
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-dollar-sign"></i></span>
                    </div>
                    <input type="text" class="form-control" name="c29" id="subtotal" value="<?php echo $jt["total"]; ?>">
                  </div>
                  <div style="display:none; color: #FF0000;" id="d29" align="left">Total del Servicio <img src="../images/error.png" alt="" /></div>
                </div>
              </div>

              <div class="form-group row">
                <label class="col-sm-3 col-form-label">PARTIDA PRESUPUESTAL</label>
                <div class="col-sm-2">

                  <?php
                  $part = $jt["partida"];
                  $resca = "SELECT id, partida FROM partida where id_capi= $cap order by partida desc";
                  $resc = mysqli_query($conexion, $resca);
                  if ($rowc = mysqli_fetch_array($resc)) { ?>
                    <select id="c39" name="c39" class="custom-select" required>
                    <?php do {
                      echo '<option value= "' . $rowc["id"] . '"';
                      if (str_replace("%", "", $part) == $rowc["id"]) {
                        echo ("selected='selected'");
                      }
                      echo ' >' . utf8_encode($rowc["partida"]) . '</option>';
                    } while ($rowc = mysqli_fetch_array($resc));
                  } ?></select>
                </div>
                <label class="col-sm-3 col-form-label" style="text-align: center; ">SUB-PARTIDA PRESUPUESTAL</label>
                <div class="col-sm-4">
                  <?php
                  $pard = $jt["sub_partida"];
                  $rescas = "SELECT id, par_compl FROM sub_partida where sub_partida.id_capi= $cap order by id asc";
                  $rescs = mysqli_query($conexion, $rescas);
                  if ($rowcs = mysqli_fetch_array($rescs)) { ?>
                    <select id="c49" name="c49" class="custom-select" required>
                    <?php do {
                      echo '<option value= "' . $rowcs["id"] . '"';
                      if (str_replace("%", "", $pard) == $rowcs["id"]) {
                        echo ("selected='selected'");
                      }
                      echo ' >' . utf8_encode($rowcs["par_compl"]) . '</option>';
                    } while ($rowcs = mysqli_fetch_array($rescs));
                  } ?> </select>
                    <div style="display:none; color: #FF0000;" id="d10" align="left">Categoría del Servicio <img src="../images/error.png" alt="" /></div>
                </div>
              </div>

              <div class="form-group row">
                <label class="col-sm-3 col-form-label">ENLACE</label>
                <div class="col-sm-9">
                  <input type="text" name="c11" id="c11" class="form-control" value="<?php echo utf8_encode($jt["enlace"]);  ?> ">
                  <div style="display:none; color: #FF0000;" id="d11" align="left">Enlace del Contrato<img src="../images/error.png" alt="" /></div>
                </div>
              </div>

              <hr>

              <table class="table table-striped tabcontrato">
                <thead>
                  <tr class="headings">
                    <th colspan="2">DOCUMENTACIÓN ADMINISTRATIVA</th>
                    <th colspan="5">VERIFICACIÓN DOCUMENTAL</th>
                    <th>OBSERVACIONES </th>
                    <th>VALIDACIÓN DE FECHA </th>
                  </tr>
                </thead>
                <tbody>
                  <?php $porcse = "SELECT * FROM (SELECT abo.id, abo.id_cont ,abo.id_doc as doc ,doc.nombre_doc, abo.c1,abo.obs_otros, abo.obs, abo.val_fecha, abo.num_rechazo, tipo_doc, con.aplica FROM det_abog AS abo ,cat_doc AS doc, det_cont as con WHERE abo.id_doc= doc.id and id_cont='$cl'  and con.num_rechazo=0 and con.id_con='$cl' and con.id_doc= abo.id_doc ORDER BY abo.id desc LIMIT $lim  ) AS DEMO ORDER BY doc ASC";
                  $porcsec = mysqli_query($conexion, $porcse);
                  $cont = 1;
                  $i = 1;
                  $k = 1;
                  while ($pc = mysqli_fetch_array($porcsec)) {
                    $y = ($k + 1);
                    $j = ($cont + 1);
                  ?>
                    <tr>
                      <td><?php echo $i; ?> <input type="hidden" name="idab[]" value="<?php echo $pc["id"]; ?>" /> </td>
                      <td><?php echo utf8_encode($pc["nombre_doc"]); ?></td>

                      <?php if ($pc["aplica"] == '1') { ?>
                        <td>CUMPLE</td>
                        <td>SI</td>
                        <td>
                          <div class="icheck-success d-inline">
                            <input type="radio" onclick="requerimientoOff(<?php echo $i; ?>);" id="radioSuccess<?php echo $k; ?>" name="r<?php echo $cont; ?>" value="1" required <?php if ($pc['c1'] == "1") echo 'checked="checked"' ?>>
                            <label for="radioSuccess<?php echo $k; ?>"></label>
                          </div>
                        </td>
                        <td>NO</td>
                        <td>
                          <div class="icheck-success d-inline">
                            <input type="radio" onclick="requerimientoOn(<?php echo $i; ?>);" id="radioSuccess<?php echo $y; ?>" name="r<?php echo $cont; ?>" value="0" required <?php if ($pc['c1'] == "0") echo 'checked="checked"' ?>>
                            <label for="radioSuccess<?php echo $y; ?>"></label>
                          </div>
                        </td>
                        <td> <?php $idpc = $pc["doc"];
                              $seleob =  (array)json_decode($pc['obs'], true);
                              $rob1 = "SELECT id, observacion FROM obs_abogado WHERE id_des='$idpc'  order by orden_obs asc";
                              $robs1 = mysqli_query($conexion, $rob1);
                              //Llenas el combo
                              if ($robse1 = mysqli_fetch_array($robs1)) {
                                $robse1["id"] ?>
                            <select id="ob<?php echo $i; ?>" name="ob<?php echo $i; ?>[]" multiple="multiple" class="custom-select" style="width: 300px;">
                            <?php do {
                                  echo '<option value= "' . $robse1["id"] . '"';
                                  $selectedNumId = $robse1['id'];
                                  @$selected = in_array($selectedNumId, $seleob) ? "selected='selected'" : '';
                                  echo '<option value= "' . $selectedNumId . '" ' . $selected . ' ';
                                  echo '  >' . utf8_encode($robse1["observacion"]) . '</option>';
                                  /**  Si la observacion contiene la palabra Otros, se crea el text area con el nombre "text" y
                                   *  la variable i
                                   *  Revisar la parte del script JS para la continuacion. 
                                   * 
                                   * En coordinador, se hace un if, y siempre y cuando tenga algun registro, se crea una variable
                                   * llamada display, que en el text area va a definir si se muestra o no                                
                                   */
                                  if ($robse1["observacion"] == "Otros") {

                                    if ($pc["obs_otros"] == "") {
                                      $display = "none";
                                    } else {
                                      $display = "block";
                                    }
                                    echo '<textarea style="text-align:center;display:' . $display . '; width: 380px" id="text' . $i . '" name="text' . $i . '">' . utf8_encode($pc["obs_otros"]) . '</textarea>';
                                  }
                                } while ($robse1 = mysqli_fetch_array($robs1));
                              } ?>
                            </select>
                        </td>
                        <?php if ($pc['c1'] == '1') { ?>
                          <style type="text/css">
                            .cerrar<?php echo $i; ?> {
                              display: none;
                            }
                          </style>
                        <?php } ?>
                        <td align="center">
                          <?php echo utf8_encode($pc["val_fecha"]); ?>
                        </td>
                      <?php } else { ?>
                        <td align="center" colspan="5"><strong>NO APLICA<input type="hidden" name="r<?php echo $cont; ?>" value="0"></strong>
                        </td>
                        <td align="center" colspan="2"><strong>NO APLICA<input type="hidden" name="ob<?php echo $i; ?>" value="null">
                            <textarea style="display:none; " id="text<?php echo $i; ?>" name="text<?php echo $i; ?>"></textarea>
                            <input type="hidden" name="val<?php echo $i; ?>[]" value="NO APLICA">
                          </strong>
                        </td>
                      <?php } ?>
                    </tr>
                    <?php if ($i == $tol) { ?>
                </tbody>
              </table>

              <hr>
              <table class="table table-striped tabcontrato">
                <thead>
                  <tr class="headings">
                    <th colspan="2">DOCUMENTACIÓN LEGAL DEL PROVEEDOR</th>
                    <th colspan="5">VERIFICACIÓN DOCUMENTAL</th>
                    <th>OBSERVACIONES </th>
                    <th>VALIDACIÓN DE FECHA </th>
                  </tr>
                </thead>
                <tbody>
              <?php }
                    $cont++;
                    $i++;
                    $k = ($k + 2);
                  } ?>
                </tbody>
              </table>

              <hr>

              <table class="table table-striped tabcontrato">
                <thead>
                  <tr class="headings">
                    <th>NOTAS GENERALES </th>
                  </tr>
                </thead>
                <tbody>
                  <td>
                    <textarea class="form-control" rows="6" name="notas"><?php echo  utf8_encode($jt['obs_abogado']); ?> </textarea>
                  </td>
                </tbody>
              </table>

              <div class="form-group row">
                <div class="col-md-6" align="center">
                  <button class="btn btn-primary" onclick="return validarForm(this.form)" name="guardareimp" id="guardareimp" value="guardareimp" type="submit">ACEPTAR </button>
                </div>
                <div class="col-md-6" align="center">
                  <button class="btn btn-danger" onclick="return validarForm(this.form)" name="rechazareimp" id="rechazareimp" value="rechazareimp">RECHAZAR </button>
                </div>
              </div>

            </form>
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
  <!-- InputMask -->
  <script src="../compon/moment/moment.min.js"></script>
  <!-- date-range-picker -->
  <script src="../compon/daterangepicker/daterangepicker.js"></script>
  <!-- Tempusdominus Bootstrap 4 -->
  <script src="../compon/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>

  <script src="js/bootstrap-multiselect.min.js"></script>
  <script src="js/bootstrap-multiselect.js"></script>
  <link rel="stylesheet" href="css/bootstrap-multiselect.css">
  <script src="js/script.js"></script>
  <script>
    $(document).ready(function() {
      $('.report').removeClass("report").addClass("active");
      $('.cuali').removeClass("cuali").addClass("active");
    });
  </script>

  <script>
    $(function() {

      $('#reservationdate').datetimepicker({
        format: 'L'
      });
      $('#reservation').datetimepicker({
        format: 'L'
      });
      $('#reservationd').datetimepicker({
        format: 'L'
      });
      $('#reservationds').datetimepicker({
        format: 'L'
      });

    });

    function requerimientoOn(dato) {
      document.getElementById("ob" + dato).required = true;
    }

    function requerimientoOff(dato) {
      document.getElementById("ob" + dato).required = false;
    }
    $("#c39").change(function() {
      console.log($("#c39").val());
      $.get("../mesac/get_subparti.php", "c39=" + $("#c39").val(), function(data) {
        $("#c49").html(data);
        console.log(data);
      });
    });
  </script>

</body>

</html>