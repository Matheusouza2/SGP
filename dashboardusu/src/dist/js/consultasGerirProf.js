$(document).ready(function(){
	
	$.ajax({
		url: "../../../control/listarInstituicoes.php",
		type: "POST",
		data: "list",
		dataType: "html"
	}).done(function(resposta) {
		var response = $.parseJSON(resposta);
		var option = '<option value='+0+' selected>Selecione uma Instituição</option>';
		$.each(response, function(i, obj){
			option += '<option value='+obj.id+'>'+obj.nome_fantasia+'</option>';
		});	
		$('#selectInst').append(option);
		$('#listInst').html(option).show();	    
		
		$('#listInst').on('change', function(){
			$.ajax({
				url: "../../../control/controlCurso.php",
				type: "POST",
				data: "list=1&inst="+$(this).val(),
				dataType: "html"
			}).done(function(resposta) {
				var response = $.parseJSON(resposta);
				if(response == 'Nenhum curso cadastrado'){
					$('#listCurso').html('<option>'+response+'</option>').show();
				}else{
					var option = '<option>Selecione um Curso</option>';
					$.each(response, function(i, obj){
						option += '<option value='+obj.id+'>'+obj.nome+'</option>';
					});
					$('#listCurso').html(option).show();	
				}
			});		   
		});
	});	
	
	$('#listCurso').on('change', function(){ 
		$.ajax({
		url: "../../../control/controlUser.php",
		type: "POST",
		data: "command=list&curso="+$(this).val(),
		dataType: "html"
		}).done(function(resposta) {
			var table = '';
			var response = $.parseJSON(resposta);
			$.each(response, function(i, obj){
				table += '<tr>'+
                            '<td class="border-top px-2 py-4">'+
                                '<div class="d-flex no-block align-items-center">'+
                                    '<div class="mr-3"><img src="../../../assets/img/users/'+obj.foto+'" alt="user" class="rounded-circle" width="45" height="45" /></div>'+
                                    '<div class="">'+
                                        '<h5 class="text-dark mb-0 font-16 font-weight-medium">'+obj.professor+'</h5>'+
                                        '<span class="text-muted font-14">'+obj.email+'</span>'+
                                    '</div>'+
                                '</div>'+
                            '</td>'+
                            '<td class="border-top text-muted px-2 py-4 font-14">'+obj.curso+'</td>'+
                            '<td class="border-top px-2 py-4">'+
                                '<div class="popover-icon">'+
                                    '<a class="btn btn-primary rounded-circle btn-circle font-12" title="'+obj.disciplina+'" href="javascript:void(0)">'+obj.sigla+'</a>'+
                                '</div>'+
                            '</td>'+
                            '<td class="border-top text-center font-weight-medium text-muted px-2 py-4">'+obj.turma+'</td>'+
                            '<td class="border-top text-center font-weight-medium text-muted px-2 py-4">'+
                                '<button type="button" class="btn btn-danger btn-circle"><i class="ti-trash"></i></button>'+
                            '</td>'+
                        '</tr>';
			});
			$('#listProf').html(table).show();	
		});	
	});
	
});//Fim Document

function buscarProfessor(){
	var cpf = $('#cpf').val().replace(/[^\d]+/g,'');
	
	$.ajax({
		url: "../../../control/controlUser.php",
		type: "POST",
		data: "command=search&cpf="+cpf,
		dataType: "html"
	}).done(function(resposta) {
		var response = $.parseJSON(resposta);
		if(response.id > 0){
		
			$('#id_prof').val(response.id);
			var infos = '<label>Nome: '+response.nome+'</label><br>'+
						'<label>E-mail: '+response.email+'</label><br>'+
	                    '<label>Contato: '+response.contato+'</label><br>'+
	                    '<label>Localidade: '+response.cidade+' - '+response.uf+'</label>';
			$('#infos').html(infos).show();
		}else{
			Swal.fire('CPF não encontrado', 'Verifique com o professor se ele já está cadastrado no sistema', 'info');
		}			
	});	
}

function vincularProfessor(){
	if($('#selectInst').val() == 0){
		Swal.fire('Selecione uma instituição para vincular o professor', '', 'info');
	}else if($('#id_prof').val() == ''){
		Swal.fire('Insira um CPF', 'Insira um CPF valido e verifique os dados do professor antes de prosseguir', 'info');
	}else{
		$.ajax({
		url: "../../../control/controlUser.php",
		type: "POST",
		data: "command=setInst&inst="+$('#selectInst').val()+"&id="+$('#id_prof').val(),
		dataType: "html"
		}).done(function(resposta) {
			var response = $.parseJSON(resposta);
			Swal.fire(response, '', 'info');
			$('#infos').html("").show();
	});	
		
	}
}