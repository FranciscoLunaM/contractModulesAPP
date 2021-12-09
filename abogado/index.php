<?php session_start();
if (!(isset($_SESSION['password']) && $_SESSION['perfil'] == '4')) {
header("location:../index.html");
} else {
$us = $_SESSION["nickname"];
$usnombre = $_SESSION["nombre"];
$tipc= $_SESSION["perfil"];
 $id_cor=$_SESSION["idusuario"]; 
 include("../conexion.php");  ?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="shortcut icon" type="image/x-icon" href="../images/favicon.png">
  <title>  ABOGADO </title>
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
 <?php  include "../includes/top-menu.php";?>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
  <?php include "includes/menu.php";?>
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
          <h3 class="card-title"><strong> Reporte</strong> </h3>
        </div>
        <div class="card-body">
          
      <table class="table table-striped tabarea" width="500" >
      <thead>
      <th>Actividad</th>
      <th>Total</th>
      </thead>
      <tbody>
     <tr>
      <td><a href="asignacion.php" class="text_lead">Recibidos para Revisión Cualitativa </a></td> 
      <td align="center "> <strong><?php 
          $acprog = "Select count(con.id) as valor From seg_cont as seg, contrato as con where seg.id_cont=con.id and con.coorasigna = $id_cor and coorasignabool='1' and aborevisa='0' AND num_rechazo='0' ";
          $acpro= mysqli_fetch_array(mysqli_query( $conexion, $acprog)); echo $acpro['valor'];?> </strong></td> 
      </tr> <tr>
      <td><a href="recibireim.php" class="text_lead">Contrato y Oficio de Adjudicación</a></td> 
      <td align="center "> <strong><?php 
          $acpro = "Select count(con.id) as valor From seg_cont as seg, contrato as con where seg.id_cont=con.id and con.coorasigna = $id_cor and jaasigna2='1' and abogrecibe3='0' AND num_rechazo='0' ";
          $acpr= mysqli_fetch_array(mysqli_query( $conexion, $acpro)); echo $acpr['valor'];?> </strong></td>
      </tr><tr> 
      <td><a href="dictamen.php" class="text_lead">Observaciones de Dictamen</a></td> 
      <td align="center "> <strong><?php 
          $acp = "Select count(con.id) as valor From seg_cont as seg, contrato as con where seg.id_cont=con.id and con.coorasigna = $id_cor and mcjuentregado2='1' and abdientregado='0' AND num_rechazo='0' ";
          $ac= mysqli_fetch_array(mysqli_query( $conexion, $acp)); echo $ac['valor'];?> </strong></td> 
       </tr>
       <tr> 
      <td><a href="cuatrot.php" class="text_lead">Integración para Firma de 4 Tantos</a></td> 
      <td align="center "> <strong><?php 
          $acpro1 = "Select count(con.id) as valor From seg_cont as seg, contrato as con where seg.id_cont=con.id and con.coorasigna = $id_cor and abentregaimp='1' and abfientregado2='0'  AND num_rechazo='0'";
          $acpr1= mysqli_fetch_array(mysqli_query( $conexion, $acpro1)); echo $acpr1['valor'];?> </strong></td> 
       </tr>
 <td><a href="noauto.php" class="text_lead">Seguimiento a No Autorizados </a></td> 
        <td align="center"><strong> <?php 
         $acprog2 = "Select count(con.id) as valor From seg_cont as seg, contrato as con where seg.id_cont=con.id and con.coorasigna = $id_cor and sfinrechazado='1' and mcentrarciv='1' and aboentrcumc='0' AND num_rechazo='0' ";
        $acpro2= mysqli_fetch_array(mysqli_query( $conexion, $acprog2)); echo $acpro2['valor'];?> </strong> </td>
       
      </tbody>
      </table>


          
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <footer class="main-footer">
     <?php include "../includes/footer.php";?>
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
<?php } ?>