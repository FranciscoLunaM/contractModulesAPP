$(document).ready(function() {       
	$('#languages').multiselect({		
	nonSelectedText: 'Seleccionar la observación'				
	});
		$('.cerrar').removeClass("cerrar").addClass("cerrar0");

		

		
	//1
	$("#radioSuccess1").click(function(evento){ 
		$(".cerrar1").css("display", "none");
		$('#ob1').multiselect('deselectAll', true);
		// si se presiona el boton SI se oculta @todo se debe borrar el contenido 
		document.getElementById('text1').style.display = "none";
		document.getElementById('text1').value = "";

		});

		$("#radioSuccess2").click(function(evento){
		$(".cerrar1").css("display", "block");
		});

		$('#ob1').multiselect({onChange: function(option, checked, select) {
		document.getElementById("radioSuccess2").checked = true;  
		
			// se agrega en una variable todas las opciones seleccionadas (Solamente el texto) para luego buscar la palabra Otros
			var text = $('#ob1 option:selected').toArray().map(item => item.text).join();
			//En la variable textoOtros, se busca que incluya la palabra "Otros" y si lo hace, envia un TRUE
				var textoOtros=text.includes('Otros');
		if (textoOtros) {
			//Si es verdadero, el text area con el nombre de text1 aparecera 
			document.getElementById('text1').style.display = "block";
			}else{
				document.getElementById('text1').style.display = "none";
			}
		},
		});

		$('.cerrar').removeClass("cerrar").addClass("cerrar1");

		//2
		$("#radioSuccess3").click(function(evento){   
		$(".cerrar2").css("display", "none");
		$('#ob2').multiselect('deselectAll', true);
		// si se presiona el boton SI se oculta @todo: se debe borrar el contenido 
		document.getElementById('text2').style.display = "none";
		document.getElementById('text2').value = "";

		});

		$("#radioSuccess4").click(function(evento){
		$(".cerrar2").css("display", "block");
		});

		$('#ob2').multiselect({onChange: function(option, checked, select) {
		document.getElementById("radioSuccess4").checked = true; 
		
			// se agrega en una variable todas las opciones seleccionadas (Solamente el texto) para luego buscar la palabra Otros
			var text = $('#ob2 option:selected').toArray().map(item => item.text).join();
			//En la variable textoOtros, se busca que incluya la palabra "Otros" y si lo hace, envia un TRUE
				var textoOtros=text.includes('Otros');
		if (textoOtros) {
			//Si es verdadero, el text area con el nombre de text1 aparecera 
			document.getElementById('text2').style.display = "block";
			}else{
				document.getElementById('text2').style.display = "none";
			}
		},
		});

		$('.cerrar').removeClass("cerrar").addClass("cerrar2");


		//3
		$("#radioSuccess5").click(function(evento){   
		$(".cerrar3").css("display", "none");
		$('#ob3').multiselect('deselectAll', true);
		// si se presiona el boton SI se oculta @todo se debe borrar el contenido 
		document.getElementById('text3').style.display = "none";
		document.getElementById('text3').value = "";

		});

		$("#radioSuccess6").click(function(evento){
		$(".cerrar3").css("display", "block");
		});

		$('#ob3').multiselect({onChange: function(option, checked, select) {
		document.getElementById("radioSuccess6").checked = true;  
		
			// se agrega en una variable todas las opciones seleccionadas (Solamente el texto) para luego buscar la palabra Otros
			var text = $('#ob3 option:selected').toArray().map(item => item.text).join();
			//En la variable textoOtros, se busca que incluya la palabra "Otros" y si lo hace, envia un TRUE
				var textoOtros=text.includes('Otros');
		if (textoOtros) {
			//Si es verdadero, el text area con el nombre de text1 aparecera 
			document.getElementById('text3').style.display = "block";
			}else{
				document.getElementById('text3').style.display = "none";
			}
		},
		});

		$('.cerrar').removeClass("cerrar").addClass("cerrar3");
	
		//4
		$("#radioSuccess7").click(function(evento){   
		$(".cerrar4").css("display", "none");
		$('#ob4').multiselect('deselectAll', true);
		// si se presiona el boton SI se oculta @todo se debe borrar el contenido 
		document.getElementById('text4').style.display = "none";
		document.getElementById('text4').value = "";

		});

		$("#radioSuccess8").click(function(evento){
		$(".cerrar4").css("display", "block");
		});

		$('#ob4').multiselect({onChange: function(option, checked, select) {
		document.getElementById("radioSuccess8").checked = true; 
		
			// se agrega en una variable todas las opciones seleccionadas (Solamente el texto) para luego buscar la palabra Otros
			var text = $('#ob4 option:selected').toArray().map(item => item.text).join();
			//En la variable textoOtros, se busca que incluya la palabra "Otros" y si lo hace, envia un TRUE
				var textoOtros=text.includes('Otros');
		if (textoOtros) {
			//Si es verdadero, el text area con el nombre de text1 aparecera 
			document.getElementById('text4').style.display = "block";
			}else{
				document.getElementById('text4').style.display = "none";
			}
		},
		});

		$('.cerrar').removeClass("cerrar").addClass("cerrar4");

		//5
		
		
		$("#radioSuccess9").click(function(evento){   
		$(".cerrar5").css("display", "none");
		$('#ob5').multiselect('deselectAll', true);
		// si se presiona el boton SI se oculta @todo se debe borrar el contenido 
		document.getElementById('text5').style.display = "none";
		document.getElementById('text5').value = "";

		});

		$("#radioSuccess10").click(function(evento){
		$(".cerrar5").css("display", "block");
		});

		$('#ob5').multiselect({onChange: function(option, checked, select) {
		document.getElementById("radioSuccess10").checked = true;  
		
			// se agrega en una variable todas las opciones seleccionadas (Solamente el texto) para luego buscar la palabra Otros
			var text = $('#ob5 option:selected').toArray().map(item => item.text).join();
			//En la variable textoOtros, se busca que incluya la palabra "Otros" y si lo hace, envia un TRUE
				var textoOtros=text.includes('Otros');
		if (textoOtros) {
			//Si es verdadero, el text area con el nombre de text1 aparecera 
			document.getElementById('text5').style.display = "block";
			}else{
				document.getElementById('text5').style.display = "none";
			}
		},
		});

		$('.cerrar').removeClass("cerrar").addClass("cerrar5");
	
	
		//6
		$("#radioSuccess11").click(function(evento){   
		$(".cerrar6").css("display", "none");
		$('#ob6').multiselect('deselectAll', true);
		// si se presiona el boton SI se oculta @todo se debe borrar el contenido 
		document.getElementById('text6').style.display = "none";
		document.getElementById('text6').value = "";

		});

		$("#radioSuccess12").click(function(evento){
		$(".cerrar6").css("display", "block");
		});

		$('#ob6').multiselect({onChange: function(option, checked, select) {
		document.getElementById("radioSuccess12").checked = true;  
		
			// se agrega en una variable todas las opciones seleccionadas (Solamente el texto) para luego buscar la palabra Otros
			var text = $('#ob6 option:selected').toArray().map(item => item.text).join();
			//En la variable textoOtros, se busca que incluya la palabra "Otros" y si lo hace, envia un TRUE
				var textoOtros=text.includes('Otros');
		if (textoOtros) {
			//Si es verdadero, el text area con el nombre de text1 aparecera 
			document.getElementById('text6').style.display = "block";
			}else{
				document.getElementById('text6').style.display = "none";
			}
		},
		});

		$('.cerrar').removeClass("cerrar").addClass("cerrar6");
	
	
		//7
		$("#radioSuccess13").click(function(evento){   
		$(".cerrar7").css("display", "none");
		$('#ob7').multiselect('deselectAll', true);
		// si se presiona el boton SI se oculta @todo se debe borrar el contenido 
		document.getElementById('text7').style.display = "none";
		document.getElementById('text7').value = "";

		});

		$("#radioSuccess14").click(function(evento){
		$(".cerrar7").css("display", "block");
		});

		$('#ob7').multiselect({onChange: function(option, checked, select) {
		document.getElementById("radioSuccess14").checked = true;  
		
			// se agrega en una variable todas las opciones seleccionadas (Solamente el texto) para luego buscar la palabra Otros
			var text = $('#ob7 option:selected').toArray().map(item => item.text).join();
			//En la variable textoOtros, se busca que incluya la palabra "Otros" y si lo hace, envia un TRUE
				var textoOtros=text.includes('Otros');
		if (textoOtros) {
			//Si es verdadero, el text area con el nombre de text1 aparecera 
			document.getElementById('text7').style.display = "block";
			}else{
				document.getElementById('text7').style.display = "none";
			}
		},
		});

		$('.cerrar').removeClass("cerrar").addClass("cerrar7");
	
	
		//8
		$("#radioSuccess15").click(function(evento){   
		$(".cerrar8").css("display", "none");
		$('#ob8').multiselect('deselectAll', true);
		// si se presiona el boton SI se oculta @todo se debe borrar el contenido 
		document.getElementById('text8').style.display = "none";
		document.getElementById('text8').value = "";

		});

		$("#radioSuccess16").click(function(evento){
		$(".cerrar8").css("display", "block");
		});

		$('#ob8').multiselect({onChange: function(option, checked, select) {
		document.getElementById("radioSuccess16").checked = true;  
		
			// se agrega en una variable todas las opciones seleccionadas (Solamente el texto) para luego buscar la palabra Otros
			var text = $('#ob8 option:selected').toArray().map(item => item.text).join();
			//En la variable textoOtros, se busca que incluya la palabra "Otros" y si lo hace, envia un TRUE
				var textoOtros=text.includes('Otros');
		if (textoOtros) {
			//Si es verdadero, el text area con el nombre de text1 aparecera 
			document.getElementById('text8').style.display = "block";
			}else{
				document.getElementById('text8').style.display = "none";
			}
		},
		});

		$('.cerrar').removeClass("cerrar").addClass("cerrar8");
	
	
		//9
		$("#radioSuccess17").click(function(evento){   
		$(".cerrar9").css("display", "none");
		$('#ob9').multiselect('deselectAll', true);
		// si se presiona el boton SI se oculta @todo se debe borrar el contenido 
		document.getElementById('text9').style.display = "none";
		document.getElementById('text9').value = "";

		});

		$("#radioSuccess18").click(function(evento){
		$(".cerrar9").css("display", "block");
		});

		$('#ob9').multiselect({onChange: function(option, checked, select) {
		document.getElementById("radioSuccess18").checked = true;  
		
			// se agrega en una variable todas las opciones seleccionadas (Solamente el texto) para luego buscar la palabra Otros
			var text = $('#ob9 option:selected').toArray().map(item => item.text).join();
			//En la variable textoOtros, se busca que incluya la palabra "Otros" y si lo hace, envia un TRUE
				var textoOtros=text.includes('Otros');
		if (textoOtros) {
			//Si es verdadero, el text area con el nombre de text1 aparecera 
			document.getElementById('text9').style.display = "block";
			}else{
				document.getElementById('text9').style.display = "none";
			}
		},
		});

		$('.cerrar').removeClass("cerrar").addClass("cerrar9");
	
		//10
		$("#radioSuccess19").click(function(evento){   
		$(".cerrar10").css("display", "none");
		$('#ob10').multiselect('deselectAll', true);
		// si se presiona el boton SI se oculta @todo se debe borrar el contenido 
		document.getElementById('text10').style.display = "none";
		document.getElementById('text10').value = "";

		});

		$("#radioSuccess20").click(function(evento){
		$(".cerrar10").css("display", "block");
		});

		$('#ob10').multiselect({onChange: function(option, checked, select) {
		document.getElementById("radioSuccess20").checked = true;  
		
			// se agrega en una variable todas las opciones seleccionadas (Solamente el texto) para luego buscar la palabra Otros
			var text = $('#ob10 option:selected').toArray().map(item => item.text).join();
			//En la variable textoOtros, se busca que incluya la palabra "Otros" y si lo hace, envia un TRUE
				var textoOtros=text.includes('Otros');
		if (textoOtros) {
			//Si es verdadero, el text area con el nombre de text1 aparecera 
			document.getElementById('text10').style.display = "block";
			}else{
				document.getElementById('text10').style.display = "none";
			}
		},
		});

		$('.cerrar').removeClass("cerrar").addClass("cerrar10");
	
	
	
		//11
		$("#radioSuccess21").click(function(evento){   
		$(".cerrar11").css("display", "none");
		$('#ob11').multiselect('deselectAll', true);
		// si se presiona el boton SI se oculta @todo se debe borrar el contenido 
		document.getElementById('text11').style.display = "none";
		document.getElementById('text11').value = "";

		});

		$("#radioSuccess22").click(function(evento){
		$(".cerrar11").css("display", "block");
		});

		$('#ob11').multiselect({onChange: function(option, checked, select) {
		document.getElementById("radioSuccess22").checked = true; 
	
			// se agrega en una variable todas las opciones seleccionadas (Solamente el texto) para luego buscar la palabra Otros
			var text = $('#ob11 option:selected').toArray().map(item => item.text).join();
			//En la variable textoOtros, se busca que incluya la palabra "Otros" y si lo hace, envia un TRUE
				var textoOtros=text.includes('Otros');
		if (textoOtros) {
			//Si es verdadero, el text area con el nombre de text1 aparecera 
			document.getElementById('text11').style.display = "block";
			}else{
				document.getElementById('text11').style.display = "none";
			}
		},
		});

		$('.cerrar').removeClass("cerrar").addClass("cerrar11");
	
	
	
		//12
		$("#radioSuccess23").click(function(evento){   
		$(".cerrar12").css("display", "none");
		$('#ob12').multiselect('deselectAll', true);
		// si se presiona el boton SI se oculta @todo se debe borrar el contenido 
		document.getElementById('text12').style.display = "none";
		document.getElementById('text12').value = "";

		});

		$("#radioSuccess24").click(function(evento){
		$(".cerrar12").css("display", "block");
		});

		$('#ob12').multiselect({onChange: function(option, checked, select) {
		document.getElementById("radioSuccess24").checked = true;  
	
			// se agrega en una variable todas las opciones seleccionadas (Solamente el texto) para luego buscar la palabra Otros
			var text = $('#ob12 option:selected').toArray().map(item => item.text).join();
			//En la variable textoOtros, se busca que incluya la palabra "Otros" y si lo hace, envia un TRUE
				var textoOtros=text.includes('Otros');
		if (textoOtros) {
			//Si es verdadero, el text area con el nombre de text1 aparecera 
			document.getElementById('text12').style.display = "block";
			}else{
				document.getElementById('text12').style.display = "none";
			}
		},
		});

		$('.cerrar').removeClass("cerrar").addClass("cerrar12");
	
		//13
		$("#radioSuccess25").click(function(evento){   
		$(".cerrar13").css("display", "none");
		$('#ob13').multiselect('deselectAll', true);
		// si se presiona el boton SI se oculta @todo se debe borrar el contenido 
		document.getElementById('text13').style.display = "none";
		document.getElementById('text13').value = "";

		});

		$("#radioSuccess26").click(function(evento){
		$(".cerrar13").css("display", "block");
		});

		$('#ob13').multiselect({onChange: function(option, checked, select) {
		document.getElementById("radioSuccess26").checked = true;  
	
			// se agrega en una variable todas las opciones seleccionadas (Solamente el texto) para luego buscar la palabra Otros
			var text = $('#ob13 option:selected').toArray().map(item => item.text).join();
			//En la variable textoOtros, se busca que incluya la palabra "Otros" y si lo hace, envia un TRUE
				var textoOtros=text.includes('Otros');
		if (textoOtros) {
			//Si es verdadero, el text area con el nombre de text1 aparecera 
			document.getElementById('text13').style.display = "block";
			}else{
				document.getElementById('text13').style.display = "none";
			}
		},
		});

		$('.cerrar').removeClass("cerrar").addClass("cerrar13");
	
		//14
		$("#radioSuccess27").click(function(evento){   
		$(".cerrar14").css("display", "none");
		$('#ob14').multiselect('deselectAll', true);
		// si se presiona el boton SI se oculta @todo se debe borrar el contenido 
		document.getElementById('text14').style.display = "none";
		document.getElementById('text14').value = "";

		});

		$("#radioSuccess28").click(function(evento){
		$(".cerrar14").css("display", "block");
		});

		$('#ob14').multiselect({onChange: function(option, checked, select) {
		document.getElementById("radioSuccess28").checked = true;  
	
			// se agrega en una variable todas las opciones seleccionadas (Solamente el texto) para luego buscar la palabra Otros
			var text = $('#ob14 option:selected').toArray().map(item => item.text).join();
			//En la variable textoOtros, se busca que incluya la palabra "Otros" y si lo hace, envia un TRUE
				var textoOtros=text.includes('Otros');
		if (textoOtros) {
			//Si es verdadero, el text area con el nombre de text1 aparecera 
			document.getElementById('text14').style.display = "block";
			}else{
				document.getElementById('text14').style.display = "none";
			}
		},
		});

		$('.cerrar').removeClass("cerrar").addClass("cerrar14");
	
		//15
		$("#radioSuccess29").click(function(evento){   
		$(".cerrar15").css("display", "none");
		$('#ob15').multiselect('deselectAll', true);
		// si se presiona el boton SI se oculta @todo se debe borrar el contenido 
		document.getElementById('text15').style.display = "none";
		document.getElementById('text15').value = "";

		});

		$("#radioSuccess30").click(function(evento){
		$(".cerrar15").css("display", "block");
		});

		$('#ob15').multiselect({onChange: function(option, checked, select) {
		document.getElementById("radioSuccess30").checked = true;  
	
			// se agrega en una variable todas las opciones seleccionadas (Solamente el texto) para luego buscar la palabra Otros
			var text = $('#ob15 option:selected').toArray().map(item => item.text).join();
			//En la variable textoOtros, se busca que incluya la palabra "Otros" y si lo hace, envia un TRUE
				var textoOtros=text.includes('Otros');
		if (textoOtros) {
			//Si es verdadero, el text area con el nombre de text1 aparecera 
			document.getElementById('text15').style.display = "block";
			}else{
				document.getElementById('text15').style.display = "none";
			}
		},
		});

		$('.cerrar').removeClass("cerrar").addClass("cerrar15");
	
		//16
		$("#radioSuccess31").click(function(evento){   
		$(".cerrar16").css("display", "none");
		$('#ob16').multiselect('deselectAll', true);
		// si se presiona el boton SI se oculta @todo se debe borrar el contenido 
		document.getElementById('text16').style.display = "none";
		document.getElementById('text16').value = "";

		});

		$("#radioSuccess32").click(function(evento){
		$(".cerrar16").css("display", "block");
		});

		$('#ob16').multiselect({onChange: function(option, checked, select) {
		document.getElementById("radioSuccess32").checked = true;  
	
			// se agrega en una variable todas las opciones seleccionadas (Solamente el texto) para luego buscar la palabra Otros
			var text = $('#ob16 option:selected').toArray().map(item => item.text).join();
			//En la variable textoOtros, se busca que incluya la palabra "Otros" y si lo hace, envia un TRUE
				var textoOtros=text.includes('Otros');
		if (textoOtros) {
			//Si es verdadero, el text area con el nombre de text1 aparecera 
			document.getElementById('text16').style.display = "block";
			}else{
				document.getElementById('text16').style.display = "none";
			}
		},
		});

		$('.cerrar').removeClass("cerrar").addClass("cerrar16");
	
		//17
		$("#radioSuccess33").click(function(evento){   
		$(".cerrar17").css("display", "none");
		$('#ob17').multiselect('deselectAll', true);
		// si se presiona el boton SI se oculta @todo se debe borrar el contenido 
		document.getElementById('text17').style.display = "none";
		document.getElementById('text17').value = "";

		});

		$("#radioSuccess34").click(function(evento){
		$(".cerrar17").css("display", "block");
		});

		$('#ob17').multiselect({onChange: function(option, checked, select) {
		document.getElementById("radioSuccess34").checked = true;  
	
			// se agrega en una variable todas las opciones seleccionadas (Solamente el texto) para luego buscar la palabra Otros
			var text = $('#ob17 option:selected').toArray().map(item => item.text).join();
			//En la variable textoOtros, se busca que incluya la palabra "Otros" y si lo hace, envia un TRUE
				var textoOtros=text.includes('Otros');
		if (textoOtros) {
			//Si es verdadero, el text area con el nombre de text1 aparecera 
			document.getElementById('text17').style.display = "block";
			}else{
				document.getElementById('text17').style.display = "none";
			}
		},
		});

		$('.cerrar').removeClass("cerrar").addClass("cerrar17");
	
		//18
		$("#radioSuccess35").click(function(evento){   
		$(".cerrar18").css("display", "none");
		$('#ob18').multiselect('deselectAll', true);
		// si se presiona el boton SI se oculta @todo se debe borrar el contenido 
		document.getElementById('text18').style.display = "none";
		document.getElementById('text18').value = "";

		});

		$("#radioSuccess36").click(function(evento){
		$(".cerrar18").css("display", "block");
		});

		$('#ob18').multiselect({onChange: function(option, checked, select) {
		document.getElementById("radioSuccess36").checked = true;  
	
			// se agrega en una variable todas las opciones seleccionadas (Solamente el texto) para luego buscar la palabra Otros
			var text = $('#ob18 option:selected').toArray().map(item => item.text).join();
			//En la variable textoOtros, se busca que incluya la palabra "Otros" y si lo hace, envia un TRUE
				var textoOtros=text.includes('Otros');
		if (textoOtros) {
			//Si es verdadero, el text area con el nombre de text1 aparecera 
			document.getElementById('text18').style.display = "block";
			}else{
				document.getElementById('text18').style.display = "none";
			}
		},
		});

		$('.cerrar').removeClass("cerrar").addClass("cerrar18");

		
	//19
	$("#radioSuccess37").click(function(evento){   
		$(".cerrar19").css("display", "none");
		$('#ob19').multiselect('deselectAll', true);
		// si se presiona el boton SI se oculta @todo se debe borrar el contenido 
		document.getElementById('text19').style.display = "none";
		document.getElementById('text19').value = "";

		});

		$("#radioSuccess38").click(function(evento){
		$(".cerrar19").css("display", "block");
		});

		$('#ob19').multiselect({onChange: function(option, checked, select) {
		document.getElementById("radioSuccess38").checked = true;  
	
			// se agrega en una variable todas las opciones seleccionadas (Solamente el texto) para luego buscar la palabra Otros
			var text = $('#ob19 option:selected').toArray().map(item => item.text).join();
			//En la variable textoOtros, se busca que incluya la palabra "Otros" y si lo hace, envia un TRUE
				var textoOtros=text.includes('Otros');
		if (textoOtros) {
			//Si es verdadero, el text area con el nombre de text1 aparecera 
			document.getElementById('text19').style.display = "block";
			}else{
				document.getElementById('text19').style.display = "none";
			}
		},
		});

		$('.cerrar').removeClass("cerrar").addClass("cerrar19");

			
	//20
	$("#radioSuccess39").click(function(evento){   
		$(".cerrar20").css("display", "none");
		$('#ob20').multiselect('deselectAll', true);
		// si se presiona el boton SI se oculta @todo se debe borrar el contenido 
		document.getElementById('text20').style.display = "none";
		document.getElementById('text20').value = "";

		});

		$("#radioSuccess40").click(function(evento){
		$(".cerrar20").css("display", "block");
		});

		$('#ob20').multiselect({onChange: function(option, checked, select) {
		document.getElementById("radioSuccess40").checked = true;  
	
			// se agrega en una variable todas las opciones seleccionadas (Solamente el texto) para luego buscar la palabra Otros
			var text = $('#ob20 option:selected').toArray().map(item => item.text).join();
			//En la variable textoOtros, se busca que incluya la palabra "Otros" y si lo hace, envia un TRUE
				var textoOtros=text.includes('Otros');
		if (textoOtros) {
			//Si es verdadero, el text area con el nombre de text1 aparecera 
			document.getElementById('text20').style.display = "block";
			}else{
				document.getElementById('text20').style.display = "none";
			}
		},
		});

		$('.cerrar').removeClass("cerrar").addClass("cerrar20");

		//21
	$("#radioSuccess41").click(function(evento){   
		$(".cerrar21").css("display", "none");
		$('#ob21').multiselect('deselectAll', true);
		// si se presiona el boton SI se oculta @todo se debe borrar el contenido 
		document.getElementById('text21').style.display = "none";
		document.getElementById('text21').value = "";
		});

		$("#radioSuccess42").click(function(evento){
		$(".cerrar21").css("display", "block");
		});

		$('#ob21').multiselect({onChange: function(option, checked, select) {
		document.getElementById("radioSuccess42").checked = true;  
		// se agrega en una variable todas las opciones seleccionadas (Solamente el texto) para luego buscar la palabra Otros
		var text = $('#ob21 option:selected').toArray().map(item => item.text).join();
		//En la variable textoOtros, se busca que incluya la palabra "Otros" y si lo hace, envia un TRUE
			var textoOtros=text.includes('Otros');
	if (textoOtros) {
		//Si es verdadero, el text area con el nombre de text1 aparecera 
		document.getElementById('text21').style.display = "block";
		}else{
			document.getElementById('text21').style.display = "none";
		}
		},
		});

		$('.cerrar').removeClass("cerrar").addClass("cerrar21");

//22
$("#radioSuccess43").click(function(evento){   
	$(".cerrar22").css("display", "none");
	$('#ob22').multiselect('deselectAll', true);
	// si se presiona el boton SI se oculta @todo se debe borrar el contenido 
	document.getElementById('text22').style.display = "none";
	document.getElementById('text22').value = "";
	});

	$("#radioSuccess44").click(function(evento){
	$(".cerrar22").css("display", "block");
	});

	$('#ob22').multiselect({onChange: function(option, checked, select) {
	document.getElementById("radioSuccess44").checked = true; 
	// se agrega en una variable todas las opciones seleccionadas (Solamente el texto) para luego buscar la palabra Otros
	var text = $('#ob22 option:selected').toArray().map(item => item.text).join();
	//En la variable textoOtros, se busca que incluya la palabra "Otros" y si lo hace, envia un TRUE
		var textoOtros=text.includes('Otros');
if (textoOtros) {
	//Si es verdadero, el text area con el nombre de text1 aparecera 
	document.getElementById('text22').style.display = "block";
	}else{
		document.getElementById('text22').style.display = "none";
	}
	},
	});

	$('.cerrar').removeClass("cerrar").addClass("cerrar22");

	//23
$("#radioSuccess45").click(function(evento){   
	$(".cerrar23").css("display", "none");
	$('#ob23').multiselect('deselectAll', true);
	// si se presiona el boton SI se oculta @todo se debe borrar el contenido 
	document.getElementById('text23').style.display = "none";
	document.getElementById('text23').value = "";
	});

	$("#radioSuccess46").click(function(evento){
	$(".cerrar23").css("display", "block");
	});

	$('#ob23').multiselect({onChange: function(option, checked, select) {
	document.getElementById("radioSuccess46").checked = true;  
	// se agrega en una variable todas las opciones seleccionadas (Solamente el texto) para luego buscar la palabra Otros
	var text = $('#ob23 option:selected').toArray().map(item => item.text).join();
	//En la variable textoOtros, se busca que incluya la palabra "Otros" y si lo hace, envia un TRUE
		var textoOtros=text.includes('Otros');
if (textoOtros) {
	//Si es verdadero, el text area con el nombre de text1 aparecera 
	document.getElementById('text23').style.display = "block";
	}else{
		document.getElementById('text23').style.display = "none";
	}
	},
	});

	$('.cerrar').removeClass("cerrar").addClass("cerrar23");

	//24
$("#radioSuccess47").click(function(evento){   
	$(".cerrar24").css("display", "none");
	$('#ob24').multiselect('deselectAll', true);
	// si se presiona el boton SI se oculta @todo se debe borrar el contenido 
	document.getElementById('text24').style.display = "none";
	document.getElementById('text24').value = "";
	});

	$("#radioSuccess48").click(function(evento){
	$(".cerrar24").css("display", "block");
	});

	$('#ob24').multiselect({onChange: function(option, checked, select) {
	document.getElementById("radioSuccess48").checked = true;  
	// se agrega en una variable todas las opciones seleccionadas (Solamente el texto) para luego buscar la palabra Otros
	var text = $('#ob24 option:selected').toArray().map(item => item.text).join();
	//En la variable textoOtros, se busca que incluya la palabra "Otros" y si lo hace, envia un TRUE
		var textoOtros=text.includes('Otros');
if (textoOtros) {
	//Si es verdadero, el text area con el nombre de text1 aparecera 
	document.getElementById('text24').style.display = "block";
	}else{
		document.getElementById('text24').style.display = "none";
	}
	},
	});

	$('.cerrar').removeClass("cerrar").addClass("cerrar24");


	

	
	
	
});
