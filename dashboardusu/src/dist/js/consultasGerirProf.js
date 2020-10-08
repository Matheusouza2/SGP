$(document).ready(function(){


	$.each(<?=$_SESS?>, function(i, obj){curso += '<option value="'+obj.id_curso+'">'+obj.nome_curso+'</option>';});

	$.getJSON('../../../control/consultasExtras.php?opc=cursoSelect', function (dados){
		if(dados.length > 0){
			

		}//Fim IF
	});//Fim getJson
});//Fim Document