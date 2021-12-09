<?php

include("../conexion.php");
setlocale(LC_TIME, "spanish");
require_once '../compon/word/vendor/autoload.php';
require '../compon/numAletra/vendor/autoload.php';

use Luecano\NumeroALetras\NumeroALetras;

$formatter = new NumeroALetras();



use PhpOffice\PhpWord\TemplateProcessor;



setlocale(LC_ALL, "es_ES");

$tipoContrato =   $_POST["tipoContrato"];
$iddecontrato =   $_POST["iddecontrato"];

$fechaOficioSQL = $_POST["fechaOficio"];
$fechaOficio = str_replace("/", "-",  $_POST["fechaOficio"]);
$fechaOficio = date("d-m-Y", strtotime($fechaOficio));
$nombrePrestador = utf8_decode($_POST["nPrestador"]);
$domPrestador = utf8_decode($_POST["domicilioPrestador"]);
$fundamentoLegal = utf8_decode($_POST["fLegal"]);
$areaReq = utf8_decode($_POST["areaRequiriente"]);
$servicioProf = utf8_decode($_POST["servicioProfesional"]);
$monto =  $_POST["monto"];
$montoCentavos = substr($monto, strpos($monto, ".") + 1);

$montoLetra =  $_POST["montoletra"];
$montoLetra = substr($montoLetra, 0, strpos($montoLetra, "PESOS"));

$vigencia1SQL = $_POST["vigencia1"];
$vigencia2SQL = $_POST["vigencia2"];

$vigencia1 = str_replace("/", "-", $_POST["vigencia1"]);
$vigencia1 = date("d-m-Y", strtotime($vigencia1));
$vigencia2 = str_replace("/", "-",  $_POST["vigencia2"]);
$vigencia2 = date("d-m-Y", strtotime($vigencia2));

$fundamentoLegalAtribuciones = utf8_decode($_POST["fLegalAt"]);
$subdirFov = utf8_decode($_POST["subdir"]);
$escrituraPub = "";
$fechaEsPubSQL = "";
$fechaEsPub = "";

$notario = "";
$numNotario = "";

if ($tipoContrato != 3) {
    $escrituraPub = utf8_decode($_POST["esPub"]);
    $fechaEsPub = str_replace("/", "-", $_POST["fEsPub"]);
    $fechaEsPub = date("d-m-Y", strtotime($fechaEsPub));
    $fechaEsPubSQL = $_POST["fEsPub"];
    $notario = utf8_decode($_POST["notario"]);
    $numNotario = $_POST["numNotario"];
}


switch ($tipoContrato) {
    case '1':
        $documento = "templates/adjudicacionPF7000.docx";
        break;

    default:
        $documento = "templates/adjudicacionPF3000.docx";
        break;
}

$phpWord = new \PhpOffice\PhpWord\PhpWord();
$templateProcessor = new \PhpOffice\PhpWord\TemplateProcessor($documento);


$templateProcessor->setValue('fecha', $fechaOficio);
$templateProcessor->setValue('prestador', $nombrePrestador);
$templateProcessor->setValue('direccion', $domPrestador);
$templateProcessor->setValue('subReq', $areaReq);
$templateProcessor->setValue('servicio', $servicioProf);
$templateProcessor->setValue('monto', $monto);
$templateProcessor->setValue('cent', $montoCentavos);

$templateProcessor->setValue('montoL', $montoLetra);

$templateProcessor->setValue('vig1', strftime("%d de %B al ", strtotime($vigencia1)));
$templateProcessor->setValue('vig2', strftime("%d de %B de %Y", strtotime($vigencia2)));
$templateProcessor->setValue('fundamentos', $fundamentoLegal);

$templateProcessor->setValue('funLegal', $fundamentoLegalAtribuciones);
$templateProcessor->setValue('subDir', $subdirFov);

if ($tipoContrato != 3) {
    $templateProcessor->setValue('esP', $escrituraPub);
    $templateProcessor->setValue('fesP', strftime("%d de %B de %Y", strtotime($fechaEsPub)));
    $templateProcessor->setValue('notario', $notario);

    $templateProcessor->setValue('numNot', $numNotario);
}




ob_clean();
header("Content-Disposition: attachment; filename=Adjudicacion.docx; charset=iso-8859-1");
header('Content-Type: application/vnd.ms-word');
header('Cache-Control: max-age=0');




$revision = "SELECT * from impresion_ad where id_contrato='$iddecontrato'";
$checkConexion = mysqli_query($conexion, $revision);

if (mysqli_num_rows($checkConexion) == 0) {
    $guardar = "INSERT INTO `impresion_ad`(`id`, `id_contrato`, `fecha_oficio`, `dom_prestador`, `vig1`, `vig2`, `fundamento_legal`, `nombre_subdir_fov`, `escritura_pub`, `fecha_esc_pub`, `nombre_notario`, `num_notario`, `fun_legal`) VALUES ('','$iddecontrato','$fechaOficioSQL','$domPrestador','$vigencia1SQL','$vigencia2SQL','$fundamentoLegalAtribuciones','$subdirFov','$escrituraPub','$fechaEsPubSQL','$notario','$numNotario','$fundamentoLegal')";
    mysqli_query($conexion, $guardar);
}
if (mysqli_num_rows($checkConexion) > 0) {

    echo $update = "UPDATE `impresion_ad` SET `fecha_oficio`='$fechaOficioSQL',`dom_prestador`='$domPrestador',`vig1`='$vigencia1SQL',`vig2`='$vigencia2SQL',`fundamento_legal`='$fundamentoLegalAtribuciones',`nombre_subdir_fov`='$subdirFov',`escritura_pub`='$escrituraPub',`fecha_esc_pub`='$fechaEsPubSQL',`nombre_notario`='$notario',`num_notario`='$numNotario',`fun_legal`='$fundamentoLegal' WHERE id_contrato='$iddecontrato'";
    mysqli_query($conexion, $update);
}




ob_clean();
echo file_get_contents('Adjudicacion.docx');
exit;
