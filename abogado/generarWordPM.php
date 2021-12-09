<?php

include("../conexion.php");
setlocale(LC_TIME, "spanish");
require_once '../compon/word/vendor/autoload.php';
require '../compon/numAletra/vendor/autoload.php';

use Luecano\NumeroALetras\NumeroALetras;

$formatter = new NumeroALetras();



use PhpOffice\PhpWord\TemplateProcessor;

$check32D = $_POST["aplica"];

setlocale(LC_ALL, "es_ES");
$iddeContrato = utf8_decode($_POST["iddecontrato"]);
$tipoPersona = utf8_decode($_POST["tipop"]);
$numeroContrato = $_POST["numContrato"];
$nombreEmpresa = utf8_decode($_POST["nombreEmpresa"]);
$decomopara = $_POST["servicios"];
$nombreServicio = utf8_decode($_POST["nombreServicio"]);
$checkRepresentante = $_POST["representantes"];
$nombreRepresentante = utf8_decode($_POST["nombreRespresentante"]);
$caracterRepresentante = utf8_decode($_POST["caracterRepresentante"]);
$subAdmin = $_POST["subdirectores"];
$nombreSubdirectorAdmin = utf8_decode($_POST["nombreSubdirectorAdmin"]);
$checkArticuloReglamentoOrganico = $_POST["artiRegO"];
$articuloReglamentoOrganico = $_POST["artiRegONombre"];
$partida = $_POST["partida"];
$subpartida = $_POST["subpartida"];
$subpartidaNombre = utf8_decode($_POST["subpartidaNombre"]);
$numeroOficioSuficienciaP = $_POST["numeroOficioSufPre"];

$fechaOficioSuficienciaP = str_replace("/", "-", $_POST["fechaOficioSufPre"]);
$fechaOficioSuficienciaP = date("d-M-Y", strtotime($fechaOficioSuficienciaP));
$fechaOficioSuficienciaPSQL = $_POST["fechaOficioSufPre"];

$checkJefeCP = $_POST["jefes"];
$nombreJefeCP = utf8_decode($_POST["nombreControlP"]);
$numEscrituraPublicaFov = $_POST["numeroEscrituraPubFov"];

$fechaEscrituraPublicaFov = str_replace("/", "-", $_POST["fechaEscrituraPublicaFov"]);
$fechaEscrituraPublicaFov = date("d-m-Y", strtotime($fechaEscrituraPublicaFov));
$fechaEscrituraPublicaFovSQL = $_POST["fechaEscrituraPublicaFov"];

$nombreNotario = utf8_decode($_POST["nombreLicenciadoNotario"]);
$numNotario = $_POST["numNotario"];
$lugarNotario = utf8_decode($_POST["lugarNotario"]);
$tipoSociedad = utf8_decode($_POST["tipoSociedad"]);
$numeroEscrituraPublicaProveedor = $_POST["numEscPub"];

$fechaEscrituraPublicaProv = str_replace("/", "-", $_POST["fechaEscrituraPublicaProv"]);
$fechaEscrituraPublicaProv = date("d-m-Y", strtotime($fechaEscrituraPublicaProv));
$fechaEscrituraPublicaProvSQL = $_POST["fechaEscrituraPublicaProv"];

$registroPropiedad = utf8_decode($_POST["registroPropiedad"]);
$folioMercantil = utf8_decode($_POST["folioMercantil"]);

$fechaFolioMercantil = str_replace("/", "-", $_POST["fechaFolioMercantil"]);
$fechaFolioMercantil = date("d-m-Y", strtotime($fechaFolioMercantil));
$fechaFolioMercantilSQL = $_POST["fechaFolioMercantil"];

$tipoRepresentante = utf8_decode($_POST["tipoRepresentante"]);
$numeroEscrituraRepresentante = $_POST["numEscRep"];

$fechaEscrituraRepresentante = str_replace("/", "-", $_POST["fechaEscrituraRep"]);
$fechaEscrituraRepresentante = date("d-m-Y", strtotime($fechaEscrituraRepresentante));
$fechaEscrituraRepresentanteSQL = $_POST["fechaEscrituraRep"];
$rfc = $_POST["rfc"];


$fechaInicioOperaciones = str_replace("/", "-", $_POST["fechaInicioOp"]);
$fechaInicioOperaciones = date("d-m-Y", strtotime($fechaInicioOperaciones));
$fechaInicioOperacionesSQL = $_POST["fechaInicioOp"];

if ($check32D == "true") {
    $fecha32D =  str_replace("/", "-",  $_POST["fecha32D"]);
    $fecha32D =  date("d-m-Y", strtotime($fecha32D));
    $fecha32DSQL = $_POST["fecha32D"];
}

$anoEjercicio = $_POST["anoEjercicio"];

$fechaEscritoImss =  str_replace("/", "-",  $_POST["fechaEscritoI"]);
$fechaEscritoImss =  date("d-m-Y", strtotime($fechaEscritoImss));
$fechaEscritoImssSQL = $_POST["fechaEscritoI"];

$fechaEscritoInf =  str_replace("/", "-",  $_POST["fechaEscritoINF"]);
$fechaEscritoInf =  date("d-m-Y", strtotime($fechaEscritoInf));
$fechaEscritoInfSQL = $_POST["fechaEscritoINF"];

$actividadObjetoSocial = utf8_decode($_POST["actObjSocial"]);
$tipoDomicilioFiscal = $_POST["tipoDom"];
$nombreDomicilioFiscal = utf8_decode($_POST["domicilioFiscal"]);
$numeroOficioEmision = utf8_decode($_POST["numOficioEmision"]);


$fechaOficioEmision =  str_replace("/", "-",  $_POST["fechaOficioEmisionJur"]);
$fechaOficioEmision =  date("d-m-Y", strtotime($fechaOficioEmision));
$fechaOficioEmisionSQL = $_POST["fechaOficioEmisionJur"];

$montoSinIva = $_POST["montoIva"];
$montoSinIvaCentavos = substr($montoSinIva, strpos($montoSinIva, ".") + 1);

$montoSinIvaNombre = $_POST["montoIvaNombre"];
$montoSinIvaNombre = substr($montoSinIvaNombre, 0, strpos($montoSinIvaNombre, "PESOS"));




$iva = $_POST["iva"];
$ivaCentavos = substr($iva, strpos($iva, ".") + 1);
$ivaNombre = $_POST["IvaNombre"];
$ivaNombre = substr($ivaNombre, 0, strpos($ivaNombre, "PESOS"));


$montoTotal = $_POST["totalIva"];
$montoTotalCentavos = substr($montoTotal, strpos($montoTotal, ".") + 1);
$montoTotalNombre = $_POST["montoTotalIvaNombre"];
$montoTotalNombre = substr($montoTotalNombre, 0, strpos($montoTotalNombre, "PESOS"));

$numPagos = $_POST["numPagos"];
$detalleDePagos = utf8_decode($_POST["detalleDePagos2"]);
$numeroDiasHabiles = $_POST["numDiasHabiles"];
$reglasContrato1 = $_POST["reglasContrato1"];
$reglasContrato2 = $_POST["reglasContrato2"];

$fechaPublicacionDof = str_replace("/", "-",  $_POST["fechaPublicacionDof"]);
$fechaPublicacionDof = date("d-m-Y", strtotime($fechaPublicacionDof));
$fechaPublicacionDofSQL = $_POST["fechaPublicacionDof"];

$vigencia1 = str_replace("/", "-", $_POST["vigencia1"]);
$vigencia1SQL = $_POST["vigencia1"];
$vigencia1 = date("d-m-Y", strtotime($vigencia1));
$vigencia2 = str_replace("/", "-",  $_POST["vigencia2"]);
$vigencia2 = date("d-m-Y", strtotime($vigencia2));
$vigencia2SQL = $_POST["vigencia2"];

$montoFianza = $_POST["montoFianza"];
$montoFianzaCentavos = substr($montoFianza, strpos($montoFianza, ".") + 1);
$montoFianzaNombre = $formatter->toWords($montoFianza);

$numeroCedulaIdentificacionFiscal = $_POST["idFiscal"];

$fechaFormalizacion = str_replace("/", "-", $_POST["fechaFormalizacion"]);
$fechaFormalizacion = date("d-m-Y", strtotime($fechaFormalizacion));
$fechaFormalizacionSQL = $_POST["fechaFormalizacion"];

$divisible = $_POST["obligacionGarant"];
$checkAnexo = $_POST["checkAnexoDeduc"];
$nombreAnexo = $_POST["numeralIncisoDeductivas"];
$mismoSubDir = $_POST["mismoSubDir"];
$nombreSubdirAreaRequiriente = utf8_decode($_POST["nombreSubdirectorArea"]);
$subdireccionRequiriente = utf8_decode($_POST["subdireccionRequiriente"]);
$penaConvencional = $_POST["penaCon"];
$penaConvencionalNombre = $formatter->toWords($penaConvencional);

$acumulacionPena = $_POST["acumulacionPena"];
$acumulacionPenaNombre = $formatter->toWords($acumulacionPena);

$checkAnexoPenaConvencional = $_POST["checkAnexoPena"];
$AnexoPenaConvencional = $_POST["numeralIncisoA"];

$checkDeduccionPago = $_POST["checkDeducPago"];
$deduccionPago = $_POST["deduccionPago"];
$deduccionPagoNombre = $formatter->toWords($deduccionPago);
$sumaDeductiva = $_POST["porcentajeSumaDe"];
$sumaDeductivaNombre = $formatter->toWords($sumaDeductiva);
$checkAnexoDeductivas = $_POST["checkAnexoDeduc"];
$anexoDeductivas = $_POST["numeralIncisoDeductivas"];

$declaracion1 = $_POST["numeroDeclaraciones"];
$declaracion2 = $_POST["numeroDeclaraciones2"];
$porcentajePenasC = $_POST["porcentajePenasConvencionales"];
$fechaFirmaContrato = $_POST["fechaFirmaContrato"];

$checkJefesMateriales = $_POST["jefesmateriales"];
$jefeServiciosMateriales = utf8_decode($_POST["nombreJefeRecursosMat"]);
$checkJefesRecursos = $_POST["jefesRecursos"];
$nombreJefeDepartamentoRecursos = utf8_decode($_POST["nombreJefeDepartamentoRecursos"]);
$numeroResponsables = $_POST["numResponsables"];
$checkAdministrador = $_POST["administra"];
$checkEncargado = $_POST["encargados"];
$responsable1 = utf8_decode($_POST["responsable1"]);
$cargoResponsable1 = utf8_decode($_POST["cargoResponsable1"]);
$responsable2 = utf8_decode($_POST["responsable2"]);
$cargoResponsable2 = utf8_decode($_POST["cargoResponsable2"]);


$aplica32D = $_POST["aplica"];

switch ($tipoPersona) {
    case '2':
        $template = "7000pm";
        break;

    default:
        $template = "3000PM";
        break;
}


$documento = "";

switch ($mismoSubDir) {
    case "true":

        if ($aplica32D == "true") {
            $documento = "templates/templatemismoSub" . $template . ".docx";
        } else {
            $documento = "templates/templatemismoSub" . $template . "Noaplica.docx";
        }

        break;

    default:


        if ($aplica32D == "true") {
            if ($numeroResponsables == "responsables2") {

                $documento = "templates/template" . $template . ".docx";
            } else {
                $documento = "templates/template1responsable" . $template . ".docx";
            }
        } else {

            if ($numeroResponsables == "responsables2") {
                $documento = "templates/template" . $template . ".docx";
            } else {
                $documento = "templates/template1responsable" . $template . "Noaplica.docx";
            }
        }


        break;
}

$phpWord = new \PhpOffice\PhpWord\PhpWord();
$templateProcessor = new \PhpOffice\PhpWord\TemplateProcessor($documento);


$templateProcessor->setValue('contrato', $numeroContrato);
$templateProcessor->setValue('decomopara', $decomopara);
$templateProcessor->setValue('serviciopro', $nombreServicio);
$templateProcessor->setValue('nSubAdmin', $nombreSubdirectorAdmin);
$templateProcessor->setValue('subAdmin', $subAdmin);
$templateProcessor->setValue('nEmpresa', $nombreEmpresa);
$templateProcessor->setValue('cRepresentante', $checkRepresentante);
$templateProcessor->setValue('nRepresentante', $nombreRepresentante);
$templateProcessor->setValue('caracterRepresentante', $caracterRepresentante);
$templateProcessor->setValue('cArticulo', $checkArticuloReglamentoOrganico);
$templateProcessor->setValue('articulos', $articuloReglamentoOrganico);
$templateProcessor->setValue('partida', $partida);
$templateProcessor->setValue('subpartida', $subpartida);
$templateProcessor->setValue('nombreSubP', $subpartidaNombre);
$templateProcessor->setValue('numOficio', $numeroOficioSuficienciaP);
$templateProcessor->setValue('diaSP', strftime("%d", strtotime($fechaOficioSuficienciaP)));
$templateProcessor->setValue('mesSP', strtoupper(strftime("%B", strtotime($fechaOficioSuficienciaP))));
$templateProcessor->setValue('anoSP', strftime("%Y", strtotime($fechaOficioSuficienciaP)));
$templateProcessor->setValue('cJCP', $checkJefeCP);
$templateProcessor->setValue('nCP', $nombreJefeCP);
$templateProcessor->setValue('epub', $numEscrituraPublicaFov);
$templateProcessor->setValue('diaEP', strftime("%d", strtotime($fechaEscrituraPublicaFov)));
$templateProcessor->setValue('mesEP', strtoupper(strftime("%B", strtotime($fechaEscrituraPublicaFov))));
$templateProcessor->setValue('anoEP', strftime("%Y", strtotime($fechaEscrituraPublicaFov)));
$templateProcessor->setValue('np', $nombreNotario);
$templateProcessor->setValue('npn', $numNotario);
$templateProcessor->setValue('npl', $lugarNotario);
$templateProcessor->setValue('tipoS', $tipoSociedad);
$templateProcessor->setValue('epProv', $numeroEscrituraPublicaProveedor);
$templateProcessor->setValue('fechaepProv', strtoupper(strftime("%d DE %B DE %Y", strtotime($fechaEscrituraPublicaProv))));
$templateProcessor->setValue('rpP', $registroPropiedad);
$templateProcessor->setValue('folioM', $folioMercantil);
$templateProcessor->setValue('fmFecha', strtoupper(strftime("%d DE %B DE %Y", strtotime($fechaFolioMercantil))));
$templateProcessor->setValue('tRep', $tipoRepresentante);
$templateProcessor->setValue('epRep', $numeroEscrituraRepresentante);
$templateProcessor->setValue('fechaRep', strtoupper(strftime("%d DE %B DE %Y", strtotime($fechaEscrituraRepresentante))));
$templateProcessor->setValue('rfc', $rfc);
$templateProcessor->setValue('iniOpF', strtoupper(strftime("%d DE %B DE %Y", strtotime($fechaInicioOperaciones))));


//32D----------------------------------------
if ($aplica32D == "true") {
    $templateProcessor->setValue('fecha32D', strtoupper(strftime("%d DE %B DE %Y", strtotime($fecha32D))));
}

//Fin 32D----------------------------------

$templateProcessor->setValue('anoEjer', $anoEjercicio);
$templateProcessor->setValue('escritoFecha', strtoupper(strftime("%d DE %B DE %Y", strtotime($fechaEscritoImss))));
$templateProcessor->setValue('fechaInf', strtoupper(strftime("%d DE %B DE %Y", strtotime($fechaEscritoInf))));
$templateProcessor->setValue('objetoS', $actividadObjetoSocial);
$templateProcessor->setValue('domicilioFiscal', $nombreDomicilioFiscal);
$templateProcessor->setValue('numOficio', $numeroOficioEmision);
$templateProcessor->setValue('fechaOficio', strtoupper(strftime("%d DE %B DE %Y", strtotime($fechaOficioEmision))));

//Iva y montos ------------------------

$templateProcessor->setValue('montoSIva', $montoSinIva);
$templateProcessor->setValue('mIvaC', $montoSinIvaCentavos);
$templateProcessor->setValue('montoSIvaN', $montoSinIvaNombre);
$templateProcessor->setValue('montoIva', $iva);
$templateProcessor->setValue('ivaC', $ivaCentavos);
$templateProcessor->setValue('montoIvaN', $ivaNombre);
$templateProcessor->setValue('montoT', $montoTotal);
$templateProcessor->setValue('montoTN', $montoTotalNombre);
$templateProcessor->setValue('mTC', $montoTotalCentavos);


//fin iva montos -------------------------

$templateProcessor->setValue('nPagos', $montoTotal);
$templateProcessor->setValue('detallePagos', $detalleDePagos);
$templateProcessor->setValue('nDiash', $numeroDiasHabiles);
$templateProcessor->setValue('reglas1', $reglasContrato1);
$templateProcessor->setValue('reglas2', $reglasContrato2);
$templateProcessor->setValue('resDOF', strtoupper(strftime("%d DE %B DE %Y", strtotime($fechaPublicacionDof))));
$templateProcessor->setValue('vigencia1', strtoupper(strftime("%d DE %B", strtotime($vigencia1))));
$templateProcessor->setValue('vigencia2', strtoupper(strftime("%d DE %B DE %Y", strtotime($vigencia2))));
$templateProcessor->setValue('fianza', $montoFianza);
$templateProcessor->setValue('fianzaN', $montoFianzaNombre);
$templateProcessor->setValue('mFC', $montoFianzaCentavos);

$templateProcessor->setValue('cedulaIF', $numeroCedulaIdentificacionFiscal);
$templateProcessor->setValue('fechaForma', strtoupper(strftime("%d DE %B DE %Y", strtotime($fechaFormalizacion))));
$templateProcessor->setValue('divisible', $divisible);

$templateProcessor->setValue('anexo', $nombreAnexo);
$templateProcessor->setValue('subDirR', $subdireccionRequiriente);
$templateProcessor->setValue('subDirRn', $nombreSubdirAreaRequiriente);

//Pena Convencional-----------------------------


$templateProcessor->setValue('penaC', $penaConvencional);
$templateProcessor->setValue('penaCn', $penaConvencionalNombre);
$templateProcessor->setValue('acumP', $acumulacionPena);
$templateProcessor->setValue('acumPn', $acumulacionPenaNombre);

//FinPena--------------------------
$templateProcessor->setValue('cNumeral', $checkAnexo);
$templateProcessor->setValue('nombreA', $nombreAnexo);

//Deductivas al pago=====================
$templateProcessor->setValue('cDeduc', $checkDeduccionPago);
$templateProcessor->setValue('deducP', $deduccionPago);
$templateProcessor->setValue('deducPn', $deduccionPagoNombre);
$templateProcessor->setValue('sumaDeduc', $sumaDeductiva);
$templateProcessor->setValue('sumaDeducn', $sumaDeductivaNombre);
$templateProcessor->setValue('nPenasC', $checkAnexoDeductivas);
$templateProcessor->setValue('nPenasCN', $anexoDeductivas);


//fin Deductivas al pago=====================

$templateProcessor->setValue('declaracion1', $declaracion1);
$templateProcessor->setValue('declaracion2', $declaracion2);
$templateProcessor->setValue('porcentajePenaC', $porcentajePenasC);
$templateProcessor->setValue('nporcentajePenaC', $formatter->toWords($porcentajePenasC));

$templateProcessor->setValue('fechaFirmaC', strtoupper(strftime("%d DE %B DE %Y", strtotime($fechaFirmaContrato))));
$templateProcessor->setValue('nSR', $jefeServiciosMateriales);
$templateProcessor->setValue('cnSR', $checkJefesMateriales);
$templateProcessor->setValue('nRM', $nombreJefeDepartamentoRecursos);
$templateProcessor->setValue('cnRM', $checkJefesRecursos);
$templateProcessor->setValue('res1', $responsable1);
$templateProcessor->setValue('cres1', $cargoResponsable1);
$templateProcessor->setValue('res2', $responsable2);
$templateProcessor->setValue('cres2', $cargoResponsable2);


$elLa = "";
$facultado = "";
$laelP = "";
$cpGenero = "";
$subdirectorGenero = "";
$administrador = "";


//SubElecciones de genero

switch ($subAdmin) {
    case 'SUBDIRECTOR ':
        $elLa = "EL";
        $facultado = "FACULTADO";
        $subdirectorGenero = "SUBDIRECTOR";
        break;

    case 'SUBDIRECTORA':
        $elLa = "LA";
        $subdirectorGenero = "SUBDIRECTORA";
        $facultado = "FACULTADA";
        break;
}


switch ($checkJefeCP) {
    case 'LA JEFA':
        $cpGenero = "LA";
        break;

    case 'EL JEFE':
        $cpGenero = "EL";
        break;
};


switch ($checkAdministrador) {
    case 'DEL ADMINISTRADOR':
        $administrador = "EL ADMINISTRADOR";
        $administrador2 = "DEL ADMINISTRADOR";
        $encargado = "ENCARGADO";

        break;

    default:
        $administrador = "LA ADMINISTRADORA";
        $administrador2 = "DE LA ADMINISTRADORA";
        $encargado = "ENCARGADA";

        break;
}

$templateProcessor->setValue('ella', $elLa);
$templateProcessor->setValue('elaRep', $checkRepresentante . " REPRESENTANTE");

$templateProcessor->setValue('subDirGen', $subdirectorGenero);
$templateProcessor->setValue('gpGen', $cpGenero);
$templateProcessor->setValue('facultado', $facultado);
$templateProcessor->setValue('cadmin', $checkAdministrador);
$templateProcessor->setValue('adGen', $administrador);
$templateProcessor->setValue('adGen2', $administrador2);
$templateProcessor->setValue('enc', $encargado);




ob_clean();
header("Content-Disposition: attachment; filename=Contrato.docx; charset=iso-8859-1");
header('Content-Type: application/vnd.ms-word');
header('Cache-Control: max-age=0');




$revision = "SELECT * from impresion_contratopm where id_cont='$iddeContrato'";
$checkConexion = mysqli_query($conexion, $revision);

if (mysqli_num_rows($checkConexion) == 0) {
    $guardar = "INSERT INTO `impresion_contratopm`(`id`, `id_cont`,`de_check`, `check_representante`, `representante`, `carac_representante`, `check_subdir`, `check_articuloOrg`, `articulo_org`, `suf_presupuestal`, `fecha_suf_pre`, `check_jefe_cp`, `nombre_jefe_cp`, `escr_pub_fov`, `fecha_esc_pub_fov`, `nombre_lic`, `num_notario`, `lugar_notario`, `tipo_sociedad`, `num_esc_pub`, `fecha_esc_pub`, `registro_propiedad`, `folio_mercantil`, `fecha_folio_mercantil`, `tipo_representante`, `num_esc_rep`, `fecha_escritura_rep`, `rfc`, `fecha_inicio_op`, `check_32`, `fecha_32`, `ano_ejercicio`, `fecha_escrito_imss`, `fecha_inscrito_inf`, `objeto_social`, `check_fiscal`, `fiscal`, `num_oficio_contrato`, `fecha_oficio`, `numero_pagos`, `detalle_pagos`, `num_dias_habiles`, `regla1`, `regla2`, `fecha_dof`, `vig1`, `vig2`, `fianza`, `num_cedula`, `fecha_formalizacion`, `divisible`, `numeral`, `anexo`, `subdir_area`, `subdir_req`, `pena_conv`, `acum_pena`, `check_numeral`, `anexo_pena_con`, `check_deduc`, `deductivas`, `suma_deductivas`, `check_inciso_anexo`, `anexo_deductivas`, `declaraciones1`, `declaraciones2`, `porc_penas_conv`, `fecha_firma_cont`, `check_servicios_rec`, `check_depart_rec`, `responsable`, `administrador`, `encargado`, `responsable1`, `cargo_responsable1`, `responsable2`, `cargo_responsable2`) VALUES ('','$iddeContrato','$decomopara','$checkRepresentante','$nombreRepresentante','$caracterRepresentante','$subAdmin ','$checkArticuloReglamentoOrganico','$articuloReglamentoOrganico','$numeroOficioSuficienciaP','fechaOficioSuficienciaPSQL','checkJefeCP','nombreJefeCP','$numEscrituraPublicaFov','$fechaEscrituraPublicaFovSQL','$nombreNotario','$numNotario','$lugarNotario','$tipoSociedad','$numeroEscrituraPublicaProveedor','$fechaEscrituraPublicaProvSQL','$registroPropiedad','$folioMercantil','$fechaFolioMercantilSQL','$tipoRepresentante','$numeroEscrituraRepresentante','$fechaEscrituraRepresentanteSQL','$rfc','$fechaInicioOperacionesSQL','$check32D','$fecha32DSQL','$anoEjercicio','$fechaEscritoImssSQL','$fechaEscritoInfSQL','$actividadObjetoSocial','$tipoDomicilioFiscal','$nombreDomicilioFiscal','$numeroOficioEmision','$fechaOficioEmisionSQL','$numPagos','$detalleDePagos','$numeroDiasHabiles','$reglasContrato1','$reglasContrato2','$fechaPublicacionDofSQL ','$vigencia1SQL' ,'$vigencia2SQL','$montoFianza','$numeroCedulaIdentificacionFiscal','$fechaFormalizacionSQL','$divisible','$checkAnexo','$nombreAnexo','$nombreSubdirAreaRequiriente','$subdireccionRequiriente','$penaConvencional','$acumulacionPena','$checkAnexoPenaConvencional','$AnexoPenaConvencional','$checkDeduccionPago','$deduccionPago','$sumaDeductiva','$checkAnexoDeductivas','$anexoDeductivas','$declaracion1','$declaracion2','$porcentajePenasC','$fechaFirmaContrato','$checkJefesMateriales','$checkJefesRecursos','$numeroResponsables','$checkAdministrador','$checkEncargado','$responsable1','$cargoResponsable1',' $responsable2','$cargoResponsable2')";
    mysqli_query($conexion, $guardar);
}
if (mysqli_num_rows($checkConexion) > 0) {

    echo $update = "UPDATE `impresion_contratopm` SET `de_check`='$decomopara',`check_representante`='$checkRepresentante',`representante`='$nombreRepresentante',`carac_representante`='$caracterRepresentante',`check_subdir`='$subAdmin',`check_articuloOrg`='$checkArticuloReglamentoOrganico',`articulo_org`='$articuloReglamentoOrganico',`suf_presupuestal`='$numeroOficioSuficienciaP',`fecha_suf_pre`='$fechaOficioSuficienciaPSQL',`check_jefe_cp`='$checkJefeCP',`nombre_jefe_cp`='$nombreJefeCP',`escr_pub_fov`='$numEscrituraPublicaFov',`fecha_esc_pub_fov`='$fechaEscrituraPublicaFovSQL',`nombre_lic`='$nombreNotario',`num_notario`='$numNotario',`lugar_notario`='$lugarNotario',`tipo_sociedad`='$tipoSociedad',`num_esc_pub`='$numeroEscrituraPublicaProveedor',`fecha_esc_pub`='$fechaEscrituraPublicaProvSQL',`registro_propiedad`='$registroPropiedad',`folio_mercantil`='$folioMercantil',`fecha_folio_mercantil`='$fechaFolioMercantilSQL',`tipo_representante`='$tipoRepresentante',`num_esc_rep`='$numeroEscrituraRepresentante',`fecha_escritura_rep`='$fechaEscrituraRepresentanteSQL',`rfc`='$rfc',`fecha_inicio_op`='$fechaInicioOperacionesSQL',`check_32`='$check32D',`fecha_32`='$fecha32DSQL',`ano_ejercicio`='$anoEjercicio',`fecha_escrito_imss`='$fechaEscritoImssSQL',`fecha_inscrito_inf`='$fechaEscritoInfSQL',`objeto_social`='$actividadObjetoSocial',`check_fiscal`='$tipoDomicilioFiscal',`fiscal`='$nombreDomicilioFiscal ',`num_oficio_contrato`='$numeroOficioEmision',`fecha_oficio`='$fechaOficioEmisionSQL',`numero_pagos`='$numPagos',`detalle_pagos`='$detalleDePagos',`num_dias_habiles`='$numeroDiasHabiles',`regla1`='$reglasContrato1',`regla2`='$reglasContrato2',`fecha_dof`='$fechaPublicacionDofSQL',`vig1`='$vigencia1SQL',`vig2`='$vigencia2SQL',`fianza`='$montoFianza',`num_cedula`='$numeroCedulaIdentificacionFiscal',`fecha_formalizacion`='$fechaFormalizacionSQL',`divisible`='$divisible',`numeral`='$checkAnexo',`anexo`='$nombreAnexo',`subdir_area`='$nombreSubdirAreaRequiriente',`subdir_req`='$subdireccionRequiriente',`pena_conv`='$penaConvencional',`acum_pena`='$acumulacionPena',`check_numeral`='$checkAnexoPenaConvencional',`anexo_pena_con`='$AnexoPenaConvencional',`check_deduc`='$checkDeduccionPago',`deductivas`='$deduccionPago',`suma_deductivas`='$sumaDeductiva',`check_inciso_anexo`='$checkAnexoDeductivas',`anexo_deductivas`='$anexoDeductivas',`declaraciones1`='$declaracion1',`declaraciones2`='$declaracion2',`porc_penas_conv`='$porcentajePenasC',`fecha_firma_cont`='$fechaFirmaContrato',`check_servicios_rec`='$checkJefesMateriales',`check_depart_rec`='$checkJefesRecursos',`responsable`='$numeroResponsables',`administrador`='$checkAdministrador',`encargado`='$checkEncargado',`responsable1`='$responsable1',`cargo_responsable1`='$cargoResponsable1',`responsable2`='$responsable2',`cargo_responsable2`='$cargoResponsable2' WHERE id_cont='$iddeContrato' ";
    mysqli_query($conexion, $update);
}


ob_clean();
$templateProcessor->saveAs("Contrato.docx");


ob_clean();
echo file_get_contents('Contrato.docx');
exit;
