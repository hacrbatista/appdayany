$(function(){

	$(".calcular").bind('mouseup', function(){
		var id = $(this).attr('id');
		id = id.split('c').join('');
		var valor = $("#v"+id).val();
		var porcentagem = $("#p"+id).val();
		var resultado = (porcentagem / 100) * valor;
		alert(resultado);
	});

});