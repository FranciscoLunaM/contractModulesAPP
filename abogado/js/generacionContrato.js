function siAplica() {
  document.getElementById("fecha32d").removeAttribute("disabled", true);

  document.getElementById("fecha32d").required = true;

}

function noAplica() {
  document.getElementById("fecha32d").disabled = true;

  document.getElementById("fecha32d").required = false;

}

function subMismo() {
  var valor = document.getElementById("submismo").value;


  if (valor == "false") {
    document.getElementById("submismo").value = "true";

    document.getElementById("responsable1").disabled = true;
    document.getElementById("cargoResponsable1").disabled = true;
    document.getElementById("responsable2").disabled = true;
    document.getElementById("cargoResponsable2").disabled = true;
    document.getElementById("responsables1").disabled = true;
    document.getElementById("responsables2").disabled = true;
    document.getElementById("responsables1").required = false;
    document.getElementById("responsables2").required = false;





  } else if (valor == "true") {
    document.getElementById("submismo").value = "false";
    document.getElementById("responsable1").disabled = false;
    document.getElementById("cargoResponsable1").disabled = false;
    document.getElementById("responsable2").disabled = false;
    document.getElementById("cargoResponsable2").disabled = false;
    document.getElementById("responsables1").disabled = false;
    document.getElementById("responsables2").disabled = false;
    document.getElementById("responsasble1").required = true;
    document.getElementById("responsables2").required = true;
  }


}


function mesdeDiciembre() {
  var valor = document.getElementById("mesDiciembre").value;


  if (valor == "false") {
    document.getElementById("mesDiciembre").value = "true";





  } else if (valor == "true") {
    document.getElementById("mesDiciembre").value = "false";
  }


}

function respon1() {
  document.getElementById("responsable2").disabled = true;
  document.getElementById("cargoResponsable2").disabled = true;
}

function respon2() {
  document.getElementById("responsable2").disabled = false;
  document.getElementById("cargoResponsable2").disabled = false;
}

function c7000(){

document.getElementById("artiConsNombre").disabled=true;
document.getElementById("artiConsNombre").required=false;
document.getElementById("ELARTICULOCONS").disabled=true;
document.getElementById("ELARTICULOCONS").required=false;
document.getElementById("LOSARTICULOSCONS").disabled=true;
document.getElementById("LOSARTICULOSCONS").required=false;
document.getElementById("articulosAdNombre").disabled=true;
document.getElementById("articulosAdNombre").required=false;
document.getElementById("ELARTICULOAD").disabled=true;
document.getElementById("ELARTICULOAD").required=false;
document.getElementById("LOSARTICULOSAD").disabled=true;
document.getElementById("LOSARTICULOSAD").required=false;
}

function c3000(){
  document.getElementById("artiConsNombre").disabled=false;
  document.getElementById("artiConsNombre").required=true;
  document.getElementById("ELARTICULOCONS").disabled=false;
  document.getElementById("ELARTICULOCONS").required=true;
  document.getElementById("LOSARTICULOSCONS").disabled=false;
  document.getElementById("LOSARTICULOSCONS").required=true;
  document.getElementById("articulosAdNombre").disabled=false;
  document.getElementById("articulosAdNombre").required=true;
  document.getElementById("ELARTICULOAD").disabled=false;
document.getElementById("ELARTICULOAD").required=true;
document.getElementById("LOSARTICULOSAD").disabled=false;
document.getElementById("LOSARTICULOSAD").required=true;
}