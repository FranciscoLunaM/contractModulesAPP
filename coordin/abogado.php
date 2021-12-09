<?php include("../conexion.php"); ?>
<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="shortcut icon" type="image/x-icon" href="../images/favicon.png">
  <title> Asignados</title>
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../compon/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../css/adminlte.min.css">
  <!-- Nuevo style -->
  <link rel="stylesheet" href="style.css">
</head>

<body>
  <?php
  $key = $_GET["key"];
  ?>
  <table class="table  bulk_light">

    <tr>
      <th rowspan="2">ABOGADO</th>
      <th rowspan="2" width="150">CATEGORÍAS</th>
      <th colspan="2" width="150">ETAPA 3
        REVISIÓN CUALITATIVA</th>
      <th rowspan="2" width="100">ETAPA 4
        OBSERVACIONES DE ADMINISTRACIÓN</th>
      <th rowspan="2" width="100">ETAPA 5
        DICTAMEN</th>
      <th rowspan="2" width="100">ETAPA 6<br>
        POST DICTAMEN</th>
      <th rowspan="2" width="100">FIRMA DE 4 TANTOS<br>
        (ET 7,8,9,10,11)</th>
      <th rowspan="2" width="50">TOTALES</th>
    </tr>
    <tr>
      <th width="75">ABOGADO</th>
      <th width="75">COORDINADOR</th>
    </tr>
    <?php $cottas = "  SELECT  co.nombre as coordin, ab.nombre as abogado, ab.nickname, ca.id_abog, ca.id_coor FROM user as co, user as ab, coor_abog as ca where co.id= ca.id_coor and ab.id=ca.id_abog and ca.id_coor='$key' ORDER BY ca.orden_abog ASC";
    $rsuls = mysqli_query($conexion, $cottas);
    $toproing = 0;
    $tocoring = 0;
    $toreling = 0;
    $tosusing = 0;
    $toadiing = 0;
    $toincing = 0;
    while ($activs = mysqli_fetch_array($rsuls)) {
      $idabo = $activs["id_abog"];
    ?>
      <tr>
        <td class="text-uppercase" width="80"> <?php echo $activs["nickname"] ?> </td>
        <td colspan="8">

          <table width="100%" class=" table table-striped coortable">
            <tr>

              <?php $categ = "SELECT id as idcat, nombre FROM sub_cat  group by nombre order by nombre asc ";
              $rsul = mysqli_query($conexion, $categ);
              $toproin = 0;
              $tocorin = 0;
              $torelin = 0;
              $tosusin = 0;
              $toadiin = 0;
              $toincin = 0;
              while ($activ = mysqli_fetch_array($rsul)) {
                $idcat = $activ["idcat"];
                $catnom = $activ["nombre"];

                $aus = "SELECT COUNT(*) as cont FROM contrato as con, seg_cont as seg, sub_cat as cat WHERE con.id=seg.id_cont and cat.id=con.sub_cat and con.jaasigna='$key' and con.coorasigna='$idabo' and con.etapa='2' AND num_rechazo='0' and cat.id=con.sub_cat and cat.nombre= '$catnom' group by cat.nombre ";
                $use = mysqli_fetch_array(mysqli_query($conexion, $aus));



                $ausc = "SELECT COUNT(*) as cont FROM contrato as con, seg_cont as seg , sub_cat as cat WHERE con.id=seg.id_cont  and cat.id=con.sub_cat and con.jaasigna='$key' and con.coorasigna='$idabo' and cat.nombre= '$catnom' and con.etapa='3'  AND num_rechazo='0'  group by cat.nombre ";
                $usec = mysqli_fetch_array(mysqli_query($conexion, $ausc));

                $aus4 = "SELECT COUNT(*) as cont FROM contrato as con, seg_cont as seg, sub_cat as cat WHERE con.id=seg.id_cont and cat.id=con.sub_cat and con.jaasigna='$key' and  con.coorasigna='$idabo' and cat.nombre= '$catnom'   and con.etapa='4' AND num_rechazo='0' group by cat.nombre ";
                $use4 = mysqli_fetch_array(mysqli_query($conexion, $aus4));

                $aus5 = "SELECT COUNT(*) as cont FROM contrato as con, seg_cont as seg, sub_cat as cat WHERE con.id=seg.id_cont and cat.id=con.sub_cat  and con.jaasigna='$key' and con.coorasigna='$idabo' and cat.nombre= '$catnom' and con.etapa='5' AND num_rechazo='0' group by cat.nombre ";
                $use5 = mysqli_fetch_array(mysqli_query($conexion, $aus5));
                $aus6 = "SELECT COUNT(*) as cont FROM contrato as con, seg_cont as seg, sub_cat as cat WHERE con.id=seg.id_cont and cat.id=con.sub_cat and con.jaasigna='$key' and con.coorasigna='$idabo' and cat.nombre= '$catnom' and con.etapa='6'  AND num_rechazo='0' group by cat.nombre ";
                $use6 = mysqli_fetch_array(mysqli_query($conexion, $aus6));
                $auto = "SELECT COUNT(*) as cont FROM contrato as con, seg_cont as seg, sub_cat as cat WHERE con.id=seg.id_cont and cat.id=con.sub_cat and con.jaasigna='$key' and con.coorasigna='$idabo' and cat.nombre= '$catnom' and con.etapa IN ('7','8','9','10','11')  AND num_rechazo='0' group by cat.nombre ";
                $autot = mysqli_fetch_array(mysqli_query($conexion, $auto));
                if (empty($use["cont"])) {
                  $vuse = 0;
                } else {
                  $vuse = $use["cont"];
                }
                if (empty($usec["cont"])) {
                  $vusec = 0;
                } else {
                  $vusec = $usec["cont"];
                }
                if (empty($use4["cont"])) {
                  $vuse4 = 0;
                } else {
                  $vuse4 = $use4["cont"];
                }
                if (empty($use5["cont"])) {
                  $vuse5 = 0;
                } else {
                  $vuse5 = $use5["cont"];
                }
                if (empty($use6["cont"])) {
                  $vuse6 = 0;
                } else {
                  $vuse6 = $use6["cont"];
                }
                if (empty($autot["cont"])) {
                  $vautot = 0;
                } else {
                  $vautot = $autot["cont"];
                }

                $toproin = $toproin + $vuse;
                $tocorin = $tocorin + $vusec;
                $torelin = $torelin + $vuse4;
                $tosusin = $tosusin + $vuse5;
                $toadiin = $toadiin + $vuse6;
                $toincin = $toincin + $vautot;
              ?>
                <td width="125" align="left" style="text-align: left; width: 110px; "> <?php echo $activ["nombre"]; ?></td>
                <td width="70"> <?php echo $vuse ?> </td>
                <td width="80"> <?php echo $vusec ?></td>
                <td width="97"> <?php echo $vuse4 ?></td>
                <td> <?php echo $vuse5 ?></td>
                <td> <?php echo $vuse6 ?></td>
                <td> <?php echo $vautot ?> </td>
                <td width="50"> <strong> <?php echo $total = ($vuse + $vusec +  $vuse4 + $vuse5 + $vuse6 + $vautot);  ?></strong> </td>
            </tr>


          <?php } ?> <tr>
            <td style="text-align: left"> <strong> Total</strong></td>
            <td><strong> <?php echo $toproin; ?></strong></td>
            <td><strong><?php echo $tocorin; ?></strong></td>
            <td><strong><?php echo $torelin; ?></strong></td>
            <td><strong><?php echo $tosusin; ?></strong></td>
            <td><strong><?php echo $toadiin; ?></strong></td>
            <td><strong><?php echo $toincin; ?></strong></td>
            <td><strong><?php echo $tgen = ($toproin + $tocorin + $torelin + $tosusin + $toadiin + $toincin); ?> </strong></td>
          </tr>
          </table>
        </td>
      </tr>
    <?php
      $toproing = $toproing + $toproin;
      $tocoring = $tocoring + $tocorin;
      $toreling = $toreling + $torelin;
      $tosusing = $tosusing + $tosusin;
      $toadiing = $toadiing + $toadiin;
      $toincing = $toincing + $toincin;
    } ?>
    </tr>
    <tr>
      <td></td>
      <td><strong>Total General</strong> </td>
      <td><?php echo $toproing; ?> </td>
      <td><?php echo $tocoring; ?></td>
      <td><?php echo $toreling; ?></td>
      <td><?php echo $tosusing; ?></td>
      <td><?php echo $toadiing; ?></td>
      <td><?php echo $toincing; ?></td>
      <td>
        <h5> <strong> <?php echo $totalg = ($toproing + $tocoring + $toreling + $tosusing + $toadiing + $toincing); ?> </strong></h5>
      </td>

    </tr>
  </table>
</body>

</html>