<?php

include("../conexion.php");
setlocale(LC_TIME, "spanish");
require_once '../compon/word/vendor/autoload.php';
require '../compon/numAletra/vendor/autoload.php';

use Luecano\NumeroALetras\NumeroALetras;

$formatter = new NumeroALetras();






setlocale(LC_ALL, "es_ES");
$iddeContrato = utf8_decode($_POST["iddecontrato"]);
$iniAbo = utf8_decode($_POST["iniAbo"]);
$mismoSubDir = "";

$nombreDetalleIvaPagos = "";
$aplica32D = $_POST["aplica"];
$nombrePrestador = utf8_decode($_POST["nombrePrestador"]);
$checkPrestadores = $_POST["Prestadores"];
$nombrePrestadores = utf8_decode($_POST["nombrePrestador"]);
$nombreServicio = utf8_decode($_POST["nombreServicio"]);
$decomopara = $_POST["servicios"];
$numeroContrato = $_POST["numContrato"];
$subAdmin = $_POST["subdirectores"];
$nombreSubAdmin = utf8_decode($_POST["nombreSubdirectorAdmin"]);
$checkArticulo = $_POST["articulos"];
$articuloNombre = utf8_decode($_POST["articuloInput"]);
$partida = $_POST["partida"];
$subpartida = $_POST["subpartida"];
$subpartidaNombre = utf8_decode($_POST["subpartidaNombre"]);
$numeroOficioSuficienciaP = $_POST["numeroOficioSufPre"];
$fechaOficioSuficienciaP = str_replace("/", "-", $_POST["fechaOficioSufPre"]);
$fechaOficioSuficienciaP = date("d-M-Y", strtotime($fechaOficioSuficienciaP));

$articuloCons = utf8_decode($_POST["artiConsNombre"]);
$articuloAdqui = utf8_decode($_POST["articulosAdNombre"]);
$checkArticuloCons = $_POST["artiCons"];
$checkArticuloAdqui = $_POST["articulosAd"];

$responsable2 = "";
$cargoResponsable2 = "";

$checkControlP = $_POST["jefes"];
$nombreControlP = utf8_decode($_POST["nombreControlP"]);
$numEscrituraPublica = $_POST["numeroEscrituraPub"];

$fechaEscrituraPublica = str_replace("/", "-", $_POST["fechaEscrituraPublica"]);
$fechaEscrituraPublica = date("d-m-Y", strtotime($fechaEscrituraPublica));
$nombreNotario = utf8_decode($_POST["nombreLicenciado"]);
$numNotario = $_POST["numNotario"];
$numActaNacimiento = $_POST["numActaNac"];
$fechaActaNac = str_replace("/", "-", $_POST["fechaRegistroActaNac"]);
$fechaActaNac = date("d-m-Y", strtotime($fechaActaNac));


$actaNacExpedida = utf8_decode($_POST["actaNacExp"]);
$cargoCP = utf8_decode($_POST["cargoCP"]);

$fechaExpActaNac = str_replace("/", "-", $_POST["fechaExpedicionActaNac"]);
$fechaExpActaNac = date("d-m-Y", strtotime($fechaExpActaNac));
$fechaNacimiento = str_replace("/", "-", $_POST["fechaNacimiento"]);
$fechaNacimiento = date("d-m-Y", strtotime($fechaNacimiento));

$nombreIdentificacionExp = utf8_decode($_POST["nombreId"]);
$numeroIdentificacion = $_POST["numIdentificacion"];
$rfc = $_POST["rfc"];
$fechaInicioOperaciones = str_replace("/", "-",  $_POST["fechaInicioOp"]);
$fechaInicioOperaciones = date("d-m-Y", strtotime($fechaInicioOperaciones));
$fecha32D = "";


$anoEjercicio = $_POST["anoEjercicio"];

$domicilioFiscal = utf8_decode($_POST["domicilioFiscal"]);
$numeroOficioEmision = $_POST["numOficioEmision"];
$fechaOficioEmision = str_replace("/", "-",  $_POST["fechaOficioEmision"]);
$fechaOficioEmision = date("d-m-Y", strtotime($fechaOficioEmision));

$montoIva = $_POST["montoIva"];
$iva = $_POST["iva"];
$totalIva = $_POST["totalIva"];
$numPagos = $_POST["numPagos"];
$numDiasHabiles = $_POST["numDiasHabiles"];
$checkAnexoPena = $_POST["checkAnexoPena"];
$checkAnexoDeduc = $_POST["checkAnexoDeduc"];

$anoEjercicio = $_POST["anoEjercicio"];
$fechaPublicacionDof = str_replace("/", "-",  $_POST["fechaPublicacionDof"]);
$fechaPublicacionDof = date("d-m-Y", strtotime($fechaPublicacionDof));


$vigencia1 = str_replace("/", "-", $_POST["vigencia1"]);
$vigencia1 = date("d-m-Y", strtotime($vigencia1));
$vigencia2 = str_replace("/", "-",  $_POST["vigencia2"]);
$vigencia2 = date("d-m-Y", strtotime($vigencia2));

$numeralAnexo = $_POST["numeralAnexo"];
$nombreSubdirectorArea = utf8_decode($_POST["nombreSubdirectorArea"]);
$subdireccionRequiriente = utf8_decode($_POST["subdireccionRequiriente"]);
$penaConvencional = $_POST["penaCon"];
$acumulacionPena = $_POST["acumulacionPena"];
$numeralIncisoA = $_POST["numeralIncisoA"];
$porcentajeDeductiva = $_POST["porcentajeDeductiva"];
$porcentajeSumaDeductiva = $_POST["porcentajeSumaDe"];
$numeralIncisoDeductivas = $_POST["numeralIncisoDeductivas"];
$numeroDeclaraciones = $_POST["numeroDeclaraciones"];
$numeroDeclaraciones2 = $_POST["numeroDeclaraciones2"];

$porcentajePenasConvencionales = $_POST["porcentajePenasCon"];
$fechaFirmaContrato = str_replace("/", "-",  $_POST["fechaFirmaContrato"]);
$fechaFirmaContrato = date("d-m-Y", strtotime($fechaFirmaContrato));


$checkjefesRecursosMat = $_POST["jefesmateriales"];
$nombreJefeRecursosMat = utf8_decode($_POST["nombreJefeRecursosMat"]);
$checkjefesRecursos = $_POST["jefesRecursos"];
$nombreJefeDepartamentosRecursos = utf8_decode($_POST["departamentoRecursos"]);
$responsable1 = utf8_decode($_POST["responsable1"]);
$cargoResponsable1 = utf8_decode($_POST["cargoResponsable1"]);

$montoSinIvaNombre = $_POST["montoIvaNombre"];
$ivaNombre = $_POST["IvaNombre"];
$totalIvaNombre = $_POST["montoTotalIvaNombre"];
$porPenaNombre =  $formatter->toWords($_POST["penaCon"]);
$porPenaAcumNombre =  $formatter->toWords($_POST["acumulacionPena"]);
$porDeducNombre =  $formatter->toWords($_POST["porcentajeDeductiva"]);
$porDeducSumNombre =  $formatter->toWords($_POST["porcentajeSumaDe"]);
$porPenasConvencionalesNom = $formatter->toWords($_POST["porcentajePenasCon"]);
$tipodomicilioFiscal = $_POST["tipoDom"];
$checkIdFolio = $_POST["idfo"];
$mesDiciembre = $_POST["mesDiciembre"];
$reglasContrato1 = utf8_decode($_POST["reglasContrato1"]);
$reglasContrato2 = utf8_decode($_POST["reglasContrato2"]);
$detalleDePagos2 = utf8_decode($_POST["detalleDePagos2"]);
$numeroResponsables = $_POST["numResponsables"];
$checkDeducPago = utf8_decode($_POST["checkDeducPago"]);

$administrador = $_POST["administra"];;
$encargado = $_POST["encargados"];

$template = $_POST["tipoContrato"];

$documento = "";

switch ($mismoSubDir) {
    case "true":

        $mismoSubDir = utf8_decode($_POST["mismoSubDir"]);
        if ($aplica32D == "true") {
            $documento = "templates/" . $template . "MismoSub.docx";
        } else {
            $documento = "templates/" . $template . "MismoSubNoAplica.docx";
        }

        break;

    default:


        if ($aplica32D == "true") {
            $fecha32D =  str_replace("/", "-",  $_POST["fecha32D"]);
            $fecha32D =  date("d-m-Y", strtotime($fecha32D));

            if ($numeroResponsables == "responsables2") {
                $responsable2 = utf8_decode($_POST["responsable2"]);
                $cargoResponsable2 = utf8_decode($_POST["cargoResponsable2"]);
                $documento = "templates/" . $template . ".docx";
            } else {
                $documento = "templates/" . $template . "1sub.docx";
            }
        } else {

            if ($numeroResponsables == "responsables2") {
                $responsable2 = utf8_decode($_POST["responsable2"]);
                $cargoResponsable2 = utf8_decode($_POST["cargoResponsable2"]);
                $documento = "templates/" . $template . "NoAplica.docx";
            } else {
                $documento = "templates/" . $template . "NoAplica1sub.docx";
            }
        }


        break;
}

$phpWord = new \PhpOffice\PhpWord\PhpWord();
$templateProcessor = new \PhpOffice\PhpWord\TemplateProcessor($documento);

$templateProcessor->setValue('decomopara', $decomopara);
$templateProcessor->setValue('decomoparaInput', $nombreServicio);
$templateProcessor->setValue('subdirector', $nombreSubAdmin);
$templateProcessor->setValue('subdirectorM2', $subAdmin);
$templateProcessor->setValue('laelprestadorInput', $nombrePrestador);
$templateProcessor->setValue('laelprestador', $checkPrestadores);
$templateProcessor->setValue('articulo', $checkArticulo);
$templateProcessor->setValue('articuloInput', $articuloNombre);
$templateProcessor->setValue('serviciopro', $nombreServicio);
$templateProcessor->setValue('partidaNum', $partida);
$templateProcessor->setValue('subpartidaNum', $subpartida);
$templateProcessor->setValue('subpartida', strtoupper($subpartidaNombre));
$templateProcessor->setValue('numOficioSuficienciaP', $numeroOficioSuficienciaP);
$templateProcessor->setValue('fechaOficioSuficienciaP', strtoupper(strftime("%d DE %B DE %Y", strtotime($fechaOficioSuficienciaP))));
$templateProcessor->setValue('laelJefaCP', $checkControlP);
$templateProcessor->setValue('laelJefaCPInput', $nombreControlP);
$templateProcessor->setValue('escritruraP', $numEscrituraPublica);
$templateProcessor->setValue('diaEP', strftime("%d", strtotime($fechaEscrituraPublica)));
$templateProcessor->setValue('mesEP', strtoupper(strftime("%B", strtotime($fechaEscrituraPublica))));
$templateProcessor->setValue('anoEP', strftime("%Y", strtotime($fechaEscrituraPublica)));
$templateProcessor->setValue('nomNotario', $nombreNotario);
$templateProcessor->setValue('numNotario', $numNotario);
$templateProcessor->setValue('nomNotario', $nombreNotario);
$templateProcessor->setValue('numActa', $numActaNacimiento);
$templateProcessor->setValue('diaActa', strftime("%d", strtotime($fechaActaNac)));
$templateProcessor->setValue('mesActa', strtoupper(strftime("%B", strtotime($fechaActaNac))));
$templateProcessor->setValue('anoActa', strftime("%Y", strtotime($fechaActaNac)));
$templateProcessor->setValue('actaExp', $actaNacExpedida);
$templateProcessor->setValue('expDia', strftime("%d", strtotime($fechaExpActaNac)));
$templateProcessor->setValue('expMes', strtoupper(strftime("%B", strtotime($fechaExpActaNac))));
$templateProcessor->setValue('expAno', strftime("%Y", strtotime($fechaExpActaNac)));
$templateProcessor->setValue('diaFnac', strftime("%d", strtotime($fechaNacimiento)));
$templateProcessor->setValue('mesFnac', strtoupper(strftime("%B", strtotime($fechaNacimiento))));
$templateProcessor->setValue('anoFnac', strftime("%Y", strtotime($fechaNacimiento)));
$templateProcessor->setValue('actaNexp', $nombreIdentificacionExp);
$templateProcessor->setValue('idNumero', $numeroIdentificacion);
$templateProcessor->setValue('rfc', $rfc);
$templateProcessor->setValue('fecInidia', strftime("%d", strtotime($fechaInicioOperaciones)));
$templateProcessor->setValue('fecIniMes', strtoupper(strftime("%B", strtotime($fechaInicioOperaciones))));
$templateProcessor->setValue('fecIniAno', strftime("%Y", strtotime($fechaInicioOperaciones)));
$templateProcessor->setValue('ejercicioano', $anoEjercicio);
$templateProcessor->setValue('domFiscal', $domicilioFiscal);
$templateProcessor->setValue('numOficio', $numeroOficioEmision);
$templateProcessor->setValue('ofidia', strftime("%d", strtotime($fechaOficioEmision)));
$templateProcessor->setValue('ofimes', strtoupper(strftime("%B", strtotime($fechaOficioEmision))));
$templateProcessor->setValue('ofiano', strftime("%Y", strtotime($fechaOficioEmision)));
$templateProcessor->setValue('montoSinIva', $montoIva);
$templateProcessor->setValue('iva', $iva);
$templateProcessor->setValue('mTotal', $totalIva);
$templateProcessor->setValue('numPagos', $numPagos);
$templateProcessor->setValue('antesDel', $numDiasHabiles);
$templateProcessor->setValue('anoEjercicio', $anoEjercicio);
$templateProcessor->setValue('antesDel', $numDiasHabiles);
$templateProcessor->setValue('resDia', strftime("%d", strtotime($fechaPublicacionDof)));
$templateProcessor->setValue('resMes', strtoupper(strftime("%B", strtotime($fechaPublicacionDof))));
$templateProcessor->setValue('resAno', strftime("%Y", strtotime($fechaPublicacionDof)));

$templateProcessor->setValue('diaVig1', strftime("%d", strtotime($vigencia1)));
$templateProcessor->setValue('mesVig1', strtoupper(strftime("%B", strtotime($vigencia1))));


$templateProcessor->setValue('diaVig2', strftime("%d", strtotime($vigencia2)));
$templateProcessor->setValue('mesVig2', strtoupper(strftime("%B", strtotime($vigencia2))));
$templateProcessor->setValue('anoVig2', strftime("%Y", strtotime($vigencia2)));

$templateProcessor->setValue('numAnexo', $numeralAnexo);
$templateProcessor->setValue('subDirReq', $nombreSubdirectorArea);
$templateProcessor->setValue('subdireccionReq', $subdireccionRequiriente);

$templateProcessor->setValue('nomAdministrador', $responsable1);

$templateProcessor->setValue('cargoAdministrador', $cargoResponsable1);
$templateProcessor->setValue('porPena', $penaConvencional);
$templateProcessor->setValue('porPenaAcum', $acumulacionPena);
$templateProcessor->setValue('numAnexoPena', $numeralIncisoA);
$templateProcessor->setValue('porDeductivas', $porcentajeDeductiva);
$templateProcessor->setValue('porSumaDeduc', $porcentajeSumaDeductiva);
$templateProcessor->setValue('numIncisoDeduc', $numeralIncisoDeductivas);
$templateProcessor->setValue('numDec1', $numeroDeclaraciones);
$templateProcessor->setValue('numDec2', $numeroDeclaraciones2);
$templateProcessor->setValue('pConvecionales', $porcentajePenasConvencionales);

$templateProcessor->setValue('conDia', strftime("%d", strtotime($fechaFirmaContrato)));
$templateProcessor->setValue('conMes', strtoupper(strftime("%B", strtotime($fechaFirmaContrato))));
$templateProcessor->setValue('conAno', strftime("%Y", strtotime($fechaFirmaContrato)));

$templateProcessor->setValue('serPro', $nombreJefeRecursosMat);
$templateProcessor->setValue('reMat', $nombreJefeDepartamentosRecursos);
$templateProcessor->setValue('jefeSM', $checkjefesRecursosMat);
$templateProcessor->setValue('jefeRM', $checkjefesRecursos);
$templateProcessor->setValue('res1', $responsable1);
$templateProcessor->setValue('res2', $responsable2);
$templateProcessor->setValue('cargores1', $cargoResponsable1);
$templateProcessor->setValue('cargores2', $cargoResponsable2);
$templateProcessor->setValue('numContrato', $numeroContrato);

$templateProcessor->setValue('fisOCon', $tipodomicilioFiscal);
$templateProcessor->setValue('idfo', $checkIdFolio);
$templateProcessor->setValue('cargoCP', $cargoCP);


$templateProcessor->setValue('32dia', strftime("%d", strtotime($fecha32D)));
$templateProcessor->setValue('32mes', strtoupper(strftime("%B", strtotime($fecha32D))));
$templateProcessor->setValue('32ano', strftime("%Y", strtotime($fecha32D)));




//num a letras
$numPagosLetra =  $formatter->toWords($_POST["numPagos"]);

$montoIva = substr($montoIva, strpos($montoIva, ".") + 1);
$montoSinIvaNombre = substr($montoSinIvaNombre, 0, strpos($montoSinIvaNombre, "PESOS"));
$ivaNombre = substr($ivaNombre, 0, strpos($ivaNombre, "PESOS"));
$iva = substr($iva, strpos($iva, ".") + 1);
$totalIvaNombre = substr($totalIvaNombre, 0, strpos($totalIvaNombre, "PESOS"));
$totalIva = substr($totalIva, strpos($totalIva, ".") + 1);
$templateProcessor->setValue('monSinom', $montoSinIvaNombre);
$templateProcessor->setValue('cSinI', $montoIva);
$templateProcessor->setValue('cI', $iva);
$templateProcessor->setValue('tI', $totalIva);
$templateProcessor->setValue('monIvaN', $ivaNombre);








$templateProcessor->setValue('totalIvaN', $totalIvaNombre);
$templateProcessor->setValue('porPenaNom', $porPenaNombre);
$templateProcessor->setValue('porpenaAcumNom', $porPenaAcumNombre);
$templateProcessor->setValue('porDeductivasNom', $porDeducNombre);
$templateProcessor->setValue('porSumaDeducNom', $porDeducSumNombre);
$templateProcessor->setValue('pConvencionalesNom', $porPenasConvencionalesNom);

$templateProcessor->setValue('numPagosLetra', $numPagosLetra);

$templateProcessor->setValue('detalledePagos2', $detalleDePagos2);
$templateProcessor->setValue('iniAbog', $iniAbo);

// aca
$templateProcessor->setValue('numPenaCon', $checkAnexoPena);
$templateProcessor->setValue('numDeduc', $checkAnexoDeduc);

$templateProcessor->setValue('cArC', $checkArticuloCons);
$templateProcessor->setValue('ArC', $articuloCons);
$templateProcessor->setValue('cArAd', $checkArticuloAdqui);
$templateProcessor->setValue('ArAd', $articuloAdqui);
$templateProcessor->setValue('deducpcada', $checkDeducPago);


$elLa = "";
$facultado = "";
$inscrito = "";
$obligado = "";
$trabajador = "";
$acreedor = "";
$inhabilitado = "";
$laelP = "";
$cpGenero = "";
$subdirectorGenero = "";
$prestadorGen = "";

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

switch ($checkPrestadores) {
    case 'EL PRESTADOR':
        $inscrito = "INSCRITO";
        $obligado = "OBLIGADO";
        $trabajador = "TRABAJADOR";
        $acreedor = "ACREEDOR";
        $inhabilitado = "INHABILITADO";
        $laelP = "EL";
        break;

    case 'LA PRESTADORA':
        $inscrito = "INSCRITA";
        $obligado = "OBLIGADA";
        $trabajador = "TRABAJADORA";
        $acreedor = "ACREEDORA";
        $inhabilitado = "INHABILITADA";
        $laelP = "LA";


        break;
}

switch ($checkControlP) {
    case 'LA JEFA':
        $cpGenero = "LA";
        break;

    case 'EL JEFE':
        $cpGenero = "EL";
        break;
};


switch ($checkPrestadores) {
    case 'LA PRESTADORA':
        $prestadorGen = "PRESTADORA";
        break;

    case 'EL PRESTADOR':
        $prestadorGen = "PRESTADOR";
        break;
};
$administrador2 = "";
switch ($administrador) {
    case 'DEL ADMINISTRADOR':
        $administrador2 = "EL ADMINISTRADOR";
        break;

    case 'DE LA ADMINISTRADORA':
        $administrador2 = "LA ADMINISTRADORA";
        break;
}
$templateProcessor->setValue('ela', $elLa);
$templateProcessor->setValue('laelp', $laelP);
$templateProcessor->setValue('inscrito', $inscrito);
$templateProcessor->setValue('adminGen', $administrador);
$templateProcessor->setValue('encarGen', $encargado);
$templateProcessor->setValue('trabaj', $trabajador);
$templateProcessor->setValue('obligado', $obligado);
$templateProcessor->setValue('acreedor', $acreedor);
$templateProcessor->setValue('subdirectorFacultadoA', $facultado);
$templateProcessor->setValue('inhabilitadoA', $inhabilitado);
$templateProcessor->setValue('jefeCPG', $cpGenero);
$templateProcessor->setValue('subdirGen', $subdirectorGenero);
$templateProcessor->setValue('presGen', $prestadorGen);
$templateProcessor->setValue('delAdmin', $administrador);

$templateProcessor->setValue('laelAdmin', $administrador2);
$mesDeDiciembre = "";

switch ($mesDiciembre) {
    case 'true':
        $mesDeDiciembre = "EL PAGO CORRESPONDIENTE AL MES DE DICIEMBRE SE REALIZARÁ ANTES DE QUE TERMINE EL EJERCICIO PRESUPUESTAL " . $anoEjercicio . ".";
        break;

    default:
        $mesDeDiciembre = "";
        break;
}

$templateProcessor->setValue('mesDiciembre', $mesDeDiciembre);
$templateProcessor->setValue('reglasC1', $reglasContrato1);
$templateProcessor->setValue('reglasC2', $reglasContrato1);

ob_clean();
header("Content-Disposition: attachment; filename=Contrato.docx; charset=iso-8859-1");
header('Content-Type: application/vnd.ms-word');
header('Cache-Control: max-age=0');





$revision = "SELECT * from impresion_contrato where id_cont='$iddeContrato'";
$checkConexion = mysqli_query($conexion, $revision);

if (mysqli_num_rows($checkConexion) == 0) {
    $guardar = "INSERT INTO `impresion_contrato`(`id`, `id_cont`, `check_prestador`, `check_servicio`, `check_subDir_admin`, `nom_subDir_admin`, `check_articulo`, `nom_articulo`, `num_Oficio_SP`, `fecha_Oficio_SP`, `check_jefe_CP`, `nom_jefe_CP`, `num_escritura_P`, `fecha_escritura_p`, `nombre_notario`, `num_notario`, `num_acta_nac`, `fecha_reg_acta_nac`, `acta_exp`, `check_folio`, `num_folio`, `rfc`, `fecha_ini_op`, `check_32d`, `fecha_32d`, `an_ejercicio`, `check_fiscal`, `nom_fiscal`, `num_oficio_emision`, `fecha_oficio_emision`, `num_pagos`, `inicial_abogado`, `detalle_pagos`, `num_dias_habiles`, `check_administrador`, `check_encargado`, `fecha_dof`, `fecha_vigencia1`, `fecha_vigencia2`, `numeral_anexo`, `check_pago_correspondiente`, `regla1`, `regla2`, `check_subidirector_mismo`, `nom_subDirector`, `nom_subDireccion`, `nom_administrador`, `cargo_CP`, `porc_pena_convencional`, `porc_acumulacion_pena`, `num_inciso_anexo`, `deduccion_pago`, `porc_deductivas`, `porc_suma_deductivas`, `numeral_anexo_deductivas`, `num_declaraciones1`, `num_declaraciones2`, `porc_penas_convencionales`, `fecha_firma_contratos`, `check_jefeSM`, `nom_jefeSM`, `check_departRM`, `nom_departRM`, `responsable1`, `cargo_responsable1`, `responsable2`, `cargo_responsable2`, `fecha_exp_acta_nac`, `fecha_nac`, `id_exp_por`, `check_anexo_pena` , `check_anexo_deduc`,`num_responsables`,`check_art_cons`,`nom_art_cons`,`check_art_ad`,`nom_art_ad`,`check_deduc_pago`) VALUES ('', '$iddeContrato', '$checkPrestadores','$decomopara', '$subAdmin', '$nombreSubAdmin', '$checkArticulo','$articuloNombre','$numeroOficioSuficienciaP','" . $_POST["fechaOficioSufPre"] . "', '$checkControlP', '$nombreControlP' ,'$numEscrituraPublica','" . $_POST["fechaEscrituraPublica"] . "' , '$nombreNotario ', '$numNotario','$numActaNacimiento ','" . $_POST["fechaRegistroActaNac"] . "' , '$actaNacExpedida ','$checkIdFolio' ,'$numeroIdentificacion','$rfc','" . $_POST["fechaInicioOp"] . "','$aplica32D','" . $_POST["fecha32D"] . "' ,'$anoEjercicio','$tipodomicilioFiscal ','$domicilioFiscal','$numeroOficioEmision','" . $_POST["fechaOficioEmision"] . "' , '$numPagos','$iniAbo' ,'$detalleDePagos2', '$numDiasHabiles','$administrador','$encargado',
    '" . $_POST["fechaPublicacionDof"] . "','" . $_POST["vigencia1"] . "','" . $_POST["vigencia2"] . "','$numeralAnexo ','$mesDiciembre','$reglasContrato1 ','$reglasContrato2','$mismoSubDir','$nombreSubdirectorArea','$subdireccionRequiriente ','','$cargoCP','$penaConvencional ','$acumulacionPena ','$numeralIncisoA ','','$porcentajeDeductiva ','$porcentajeSumaDeductiva ','$numeralIncisoDeductivas ','$numeroDeclaraciones ','$numeroDeclaraciones2','$porcentajePenasConvencionales ','" . $_POST["fechaFirmaContrato"] . "','$checkjefesRecursosMat ','$nombreJefeRecursosMat ','$checkjefesRecursos ','$nombreJefeDepartamentosRecursos ','$responsable1 ','$cargoResponsable1 ','$responsable2','$cargoResponsable2' ,'" .  $_POST["fechaExpedicionActaNac"] . "','" . $_POST["fechaNacimiento"] . "','$nombreIdentificacionExp', '$checkAnexoPena' , '$checkAnexoDeduc','$numeroResponsables','$checkArticuloCons','$articuloCons','$checkArticuloAdqui','$articuloAdqui','$checkDeducPago')";
    mysqli_query($conexion, $guardar);
}
if (mysqli_num_rows($checkConexion) > 0) {

    $update = "UPDATE impresion_contrato set `check_prestador`='$checkPrestadores',`check_servicio`='$decomopara',`check_subDir_admin`='$subAdmin',`nom_subDir_admin`='$nombreSubAdmin',`check_articulo`='$checkArticulo',`nom_articulo`='$articuloNombre',`num_Oficio_SP`='$numeroOficioSuficienciaP',`fecha_Oficio_SP`='" . $_POST["fechaOficioSufPre"] . "',`check_jefe_CP`='$checkControlP',`nom_jefe_CP`='$nombreControlP' ,`num_escritura_P`='$numEscrituraPublica',`fecha_escritura_p`='" . $_POST["fechaEscrituraPublica"] . "' ,`nombre_notario`='$nombreNotario',`num_notario`= '$numNotario',`num_acta_nac`='$numActaNacimiento ',`fecha_reg_acta_nac`='" . $_POST["fechaRegistroActaNac"] . "' ,`acta_exp`='$actaNacExpedida ',`check_folio`='$checkIdFolio' ,`num_folio`='$numeroIdentificacion',`rfc`='$rfc',`fecha_ini_op`='" . $_POST["fechaInicioOp"] . "',`check_32d`='$aplica32D',`fecha_32d`='" . $_POST["fecha32D"] . "' ,`an_ejercicio`='$anoEjercicio',`check_fiscal`='$tipodomicilioFiscal ',`nom_fiscal`='$domicilioFiscal',`num_oficio_emision`='$numeroOficioEmision',`fecha_oficio_emision`='" . $_POST["fechaOficioEmision"] . "',`num_pagos`='$numPagos',`inicial_abogado`='$iniAbo' ,`detalle_pagos`='$detalleDePagos2',`num_dias_habiles`='$numDiasHabiles',`check_administrador`='$administrador',`check_encargado`='$encargado',`fecha_dof`= '" . $_POST["fechaPublicacionDof"] . "',`fecha_vigencia1`='" . $_POST["vigencia1"] . "',`fecha_vigencia2`='" . $_POST["vigencia2"] . "',`numeral_anexo`='$numeralAnexo',`check_pago_correspondiente`='$mesDiciembre',`regla1`='$reglasContrato1',`regla2`='$reglasContrato2',`check_subidirector_mismo`='$mismoSubDir',`nom_subDirector`='$nombreSubdirectorArea',`nom_subDireccion`='$subdireccionRequiriente ',`nom_administrador`='',`cargo_CP`='$cargoCP',`porc_pena_convencional`='$penaConvencional',`porc_acumulacion_pena`='$acumulacionPena ',`num_inciso_anexo`='$numeralIncisoA ',`deduccion_pago`='',`porc_deductivas`='$porcentajeDeductiva ',`porc_suma_deductivas`='$porcentajeSumaDeductiva ',`numeral_anexo_deductivas`='$numeralIncisoDeductivas ',`num_declaraciones1`='$numeroDeclaraciones ',`num_declaraciones2`='$numeroDeclaraciones2',`porc_penas_convencionales`='$porcentajePenasConvencionales ',`fecha_firma_contratos`='" . $_POST["fechaFirmaContrato"] . "',`check_jefeSM`='$checkjefesRecursosMat ',`nom_jefeSM`='$nombreJefeRecursosMat ',`check_departRM`='$checkjefesRecursos' ,`nom_departRM`='$nombreJefeDepartamentosRecursos ',`responsable1`='$responsable1 ',`cargo_responsable1`='$cargoResponsable1 ',`responsable2`='$responsable2 ',`cargo_responsable2`='$cargoResponsable2',`fecha_exp_acta_nac`='" .  $_POST["fechaExpedicionActaNac"] . "',`fecha_nac`='" . $_POST["fechaNacimiento"] . "',`id_exp_por`='$nombreIdentificacionExp',`check_anexo_pena`='$checkAnexoPena', `check_anexo_deduc`='$checkAnexoDeduc', `num_responsables`='$numeroResponsables', `check_art_cons`='$checkArticuloCons', `nom_art_cons`='$articuloCons', `check_art_ad`='$checkArticuloAdqui', `nom_art_ad`='$articuloAdqui', `check_deduc_pago`='$checkDeducPago' WHERE id_cont='$iddeContrato' ";
    mysqli_query($conexion, $update);
}


ob_clean();
echo file_get_contents('Contrato.docx');
exit;
