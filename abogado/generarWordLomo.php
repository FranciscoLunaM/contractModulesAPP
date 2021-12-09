<?php

include("../conexion.php");
setlocale(LC_TIME, "spanish");
require_once '../compon/word/vendor/autoload.php';




$iddeContrato = $_GET["cl"];


echo  $revision = "SELECT  c.contrato, c.servicio,c.prestador,c.vfe_ini,a.id as areaid,a.area,c.tipo,c.tipop from contrato as c ,area as a where c.area=a.id and c.id='$iddeContrato'";
$conex = mysqli_fetch_array(mysqli_query($conexion, $revision));

$tipoProcedimiento = $conex["tipo"];
$tipoContrato = $conex["tipop"];

$nContrato = $conex["contrato"];
$servicio = utf8_encode($conex["servicio"]);
$prestador = utf8_encode($conex["prestador"]);
$aReq = $conex["area"];
$idarea = $conex["areaid"];
$tipop = $conex["tipop"];
$ano = $conex["vfe_ini"];
$documento = "";

switch ($idarea) {
    case '1':
        $documento = "templates/l1.docx";
        break;

    case '2':
        $documento = "templates/l2.docx";
        break;
    case '3':
        $documento = "templates/l3.docx";
        break;
    case '4':
        $documento = "templates/l4.docx";
        break;
    case '5':
        $documento = "templates/l5.docx";
        break;
    case '6':
        $documento = "templates/l6.docx";
        break;
    case '7':
        $documento = "templates/l7.docx";
        break;
    case '8':
        $documento = "templates/l8.docx";
        break;
    case '9':
        $documento = "templates/l9.docx";
        break;
}

switch ($tipop) {
    case '1':
        $tipop = "CAPÍTULO 7000";
        break;
    case '2':
        $tipop = "CAPÍTULO 7000";
        break;
    case '3':
        $tipop = "CAPÍTULO 3000";
        break;
    case '4':
        $tipop = "CAPÍTULO 3000";
        break;
}





$phpWord = new \PhpOffice\PhpWord\PhpWord();
$templateProcessor = new \PhpOffice\PhpWord\TemplateProcessor($documento);

$templateProcessor->setValue('contrato', $nContrato);
$templateProcessor->setValue('servicio', $servicio);
$templateProcessor->setValue('prestador', $prestador);
$templateProcessor->setValue('area', $aReq);
$templateProcessor->setValue('capitulo', $tipop);

$templateProcessor->setValue('ano', strtoupper(strftime("%Y ", strtotime($ano))));


ob_clean();
header("Content-Disposition: attachment; filename=lomo.docx; charset=iso-8859-1");
header('Content-Type: application/vnd.ms-word');
header('Cache-Control: max-age=0');

ob_clean();
$templateProcessor->saveAs("lomo.docx");


ob_clean();
echo file_get_contents('lomo.docx');
exit;
