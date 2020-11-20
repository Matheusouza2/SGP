

const options = {
        		timeZone: 'America/Sao_Paulo',
        		day: 'numeric',
        		month: 'numeric',
        		year: 'numeric',
        		hour: 'numeric',
        		minute: 'numeric'
        	};
        	const date = new Intl.DateTimeFormat([], options);
			$('#data-criacao').val(date.format(new Date()));
			
      		
        	//Consultas ao abrir a pagina index
        	$(document).ready(function(){

				consultaSelects();
				consultaTable();
			
				consultaTableDiponivel();
			
			
			});		



			//Consulta e preenchimento dos selects
			function consultaSelects(){

				$.getJSON('../../../control/consultasExtras.php?opc=cursoSelect', function (dados){
					if(dados.length > 0){

						var curso = '<option>Curso</option>';
						$.each(dados, function(i, obj){curso += '<option value="'+obj.id_curso+'">'+obj.nome_curso+'</option>';});
						$('#selectCurso').html(curso).show();

						$('#selectCurso').on('change', function(){

							$.getJSON('../../../control/consultasExtras.php?opc=turmaSelect&curso='+$(this).val(), function (dados){
							
								var turma = '<option>Turma</option>';
								$.each(dados, function(i, obj){turma += '<option value="'+obj.turma_id+'">'+obj.turma_nome+'</option>';})
								$('#selectTurma').html(turma).show();

								
								$('#selectTurma').on('change', function(){
									$.getJSON('../../../control/consultasExtras.php?opc=disciplinaSelect&turma='+$(this).val(), function (dados){
										var disciplina = '<option>Disciplina</option>';
										$.each(dados, function(i, obj){disciplina += '<option value="'+obj.disciplina_id+'">'+obj.disciplina_nome+'</option>';});
										$('#selectDisciplina').html(disciplina).show();		
									});
								});			 
							});
						
						});
					}			
				});

			}
			
			function del($id){
				Swal.fire({
					title: 'Deseja realmente excluir a permuta ?',
					showDenyButton: true,
					showCancelButton: true,
					confirmButtonText: `Sim`,
					denyButtonText: `Não`,
				}).then((result) => {
					if (result.isConfirmed) {
						Swal.fire('Permuta deletada com sucesso!!', '', 'success')
						$.getJSON('../../../control/controlPermuta.php?command=delete&id='+$id, function (dados){});
					    consultaTable();
					} else if (result.isDenied) {
						Swal.fire('Deleção de permuta cancelada!!', '', 'info')
					}
				})
			}
			function pegar($id){
				Swal.fire({
					title: 'Deseja realmente pegar a permuta ?',
					showDenyButton: true,
					showCancelButton: true,
					confirmButtonText: `Sim`,
					denyButtonText: `Não`,
				}).then((result) => {
					if (result.isConfirmed) {
						Swal.fire('Permuta pega com sucesso!!', '', 'success')
						$.getJSON('../../../control/controlPermuta.php?command=pegar&id='+$id, function (dados){});
					    consultaTableDiponivel();
					} else if (result.isDenied) {
						Swal.fire('Pegar permuta cancelado!!', '', 'info')
					}
				})
			}

			//Preenche a table do index cliente permutas dele, ta passando .
			function consultaTable(){
				progress();
				$.getJSON('../../../control/controlPermuta.php?command=listPp', function (dados){
					if(dados.length > 0){
						var tabela = '';
						$.each(dados, function(i, obj){tabela += 
							'<tr>'+
                                '<td class="border-top px-2 py-4">'+
                                '<div class="d-flex no-block align-items-center">'+
                                	'<div class="mr-3"><img src="../assets/images/users/widget-table-pic1.jpg" alt="user" class="rounded-circle" width="45" height="45" /></div>'+
                                		'<div class="">'+
                                			'<h5 class="text-dark mb-0 font-16 font-weight-medium">'+obj.professor_nome+'</h5>'+
                                			'<span class="text-muted font-14">'+obj.email+'</span>'+
                                		'</div>'+
                                '</div>'+
                                '</td>'+
                                '<td class="border-top text-muted px-2 py-4 font-14">'+obj.curso_nome+'</td>'+
                                '<td class="border-top px-2 py-4">'+
                                '<div class="popover-icon">'+
                                '<a class="btn btn-primary rounded-circle btn-circle font-12" href="javascript:void(0)" title="'+obj.disciplina_nome+'">'+obj.sigla+'</a>'+
                                '</div>'+
                                '</td>'+
                                '<td class="border-top text-center px-2 py-4"><i class="fa fa-circle text-success font-12" data-toggle="tooltip" data-placement="top" title="'+obj.status+'"></i></td>'+
                                '<td class="border-top text-center font-weight-medium text-muted px-2 py-4">'+obj.turma_nome+'</td>'+
								'<td class="font-weight-medium text-dark border-top px-2 py-4">'+obj.dataDisponivel+'</td>'+

								
								'<span> <td class="border-top px-2 py-4">'+
                                '<button type="button" class="btn btn-warning btn-circle" data-toggle="modal" data-target="#permuta-feita">'+
                                '<i class="far fa-edit"></i>'+
								'</button> </span> '+
								
								
								
                                '</tr>'
						});
						$('#tablePermutas').html(tabela).show();

					}else {
						var tabelavazia = 'Você não criou permutas ainda!';
						$('#tablePermutas').html(tabelavazia).show();
					}
				});
			}
//permuta aberta
			function consultaTableAberta(){
				
				$.getJSON('../../../control/controlPermuta.php?command=listPA', function (dados){
					if(dados.length > 0){
						var tabela = '';
						$.each(dados, function(i, obj){tabela += 
							'<tr>'+
                                '<td class="border-top px-2 py-4">'+
                                '<div class="d-flex no-block align-items-center">'+
                                	'<div class="mr-3"><img src="../assets/images/users/widget-table-pic1.jpg" alt="user" class="rounded-circle" width="45" height="45" /></div>'+
                                		'<div class="">'+
                                			'<h5 class="text-dark mb-0 font-16 font-weight-medium">'+obj.professor_nome+'</h5>'+
                                			'<span class="text-muted font-14">'+obj.email+'</span>'+
                                		'</div>'+
                                '</div>'+
                                '</td>'+
                                '<td class="border-top text-muted px-2 py-4 font-14">'+obj.curso_nome+'</td>'+
                                '<td class="border-top px-2 py-4">'+
                                '<div class="popover-icon">'+
                                '<a class="btn btn-primary rounded-circle btn-circle font-12" href="javascript:void(0)" title="'+obj.disciplina_nome+'">'+obj.sigla+'</a>'+
                                '</div>'+
                                '</td>'+
                                '<td class="border-top text-center px-2 py-4"><i class="fa fa-circle text-success font-12" data-toggle="tooltip" data-placement="top" title="'+obj.status+'"></i></td>'+
                                '<td class="border-top text-center font-weight-medium text-muted px-2 py-4">'+obj.turma_nome+'</td>'+
								'<td class="font-weight-medium text-dark border-top px-2 py-4">'+obj.dataDisponivel+'</td>'+

								
								'<span> <td class="border-top px-2 py-4">'+
                                '<button type="button" class="btn btn-warning btn-circle" data-toggle="modal" data-target="#permuta-feita">'+
                                '<i class="far fa-edit"></i>'+
								'</button> </span> '+
								
								'<span> <button type="button" onclick="del('+obj.permuta_id+')" class="btn btn-danger btn-circle">'+
                                '<i class="far fa-trash-alt"></i>'+
                                '</button> </span>'+
								'</td>'+
								
								
                                '</tr>'
						});
						$('#tablePermutas').html(tabela).show();

					}else {
						var tabelavazia = 'Não há permutas abertas';
						$('#tablePermutas').html(tabelavazia).show();
					}
				});
			}

//permuta pega
function consultaTablePega(){
				
	$.getJSON('../../../control/controlPermuta.php?command=listPG', function (dados){
		if(dados.length > 0){
			var tabela = '';
			$.each(dados, function(i, obj){tabela += 
				'<tr>'+
					'<td class="border-top px-2 py-4">'+
					'<div class="d-flex no-block align-items-center">'+
						'<div class="mr-3"><img src="../assets/images/users/widget-table-pic1.jpg" alt="user" class="rounded-circle" width="45" height="45" /></div>'+
							'<div class="">'+
								'<h5 class="text-dark mb-0 font-16 font-weight-medium">'+obj.professor_nome+'</h5>'+
								'<span class="text-muted font-14">'+obj.email+'</span>'+
							'</div>'+
					'</div>'+
					'</td>'+
					'<td class="border-top text-muted px-2 py-4 font-14">'+obj.curso_nome+'</td>'+
					'<td class="border-top px-2 py-4">'+
					'<div class="popover-icon">'+
					'<a class="btn btn-primary rounded-circle btn-circle font-12" href="javascript:void(0)" title="'+obj.disciplina_nome+'">'+obj.sigla+'</a>'+
					'</div>'+
					'</td>'+
					'<td class="border-top text-center px-2 py-4"><i class="fa fa-circle text-success font-12" data-toggle="tooltip" data-placement="top" title="'+obj.status+'"></i></td>'+
					'<td class="border-top text-center font-weight-medium text-muted px-2 py-4">'+obj.turma_nome+'</td>'+
					'<td class="font-weight-medium text-dark border-top px-2 py-4">'+obj.dataDisponivel+'</td>'+

					
					'<span> <td class="border-top px-2 py-4">'+
					'<button type="button" class="btn btn-warning btn-circle" data-toggle="modal" data-target="#permuta-feita">'+
					'<i class="far fa-edit"></i>'+
					'</button> </span> '+
					
					
					
					'</tr>'
			});
			$('#tablePermutas').html(tabela).show();

		} else {
			var tabelavazia = 'Você não pegou nenhuma permuta ainda!';
			$('#tablePermutas').html(tabelavazia).show();
		}
	});
}




			//consulta permuta disponiveis para pegar

			function consultaTableDiponivel(){
				progress();
				$.getJSON('../../../control/controlPermuta.php?command=listPd', function (dados){
					if(dados.length > 0){
						var tabela = '';
						var status = '';
						var icone = '';
						$.each(dados, function(i, obj){
						
							if(obj.status == "disponivel"){
								status = obj.status;
								icone = "success"; 
							}else{
								status = obj.status;
								icone = "warning"; 
							}
						
							tabela +=
							'<tr>'+
                                '<td class="border-top px-2 py-4">'+
                                '<div class="d-flex no-block align-items-center">'+
                                	'<div class="mr-3"><img src="../assets/images/users/widget-table-pic1.jpg" alt="user" class="rounded-circle" width="45" height="45" /></div>'+
                                		'<div class="">'+
                                			'<h5 class="text-dark mb-0 font-16 font-weight-medium">'+obj.professor_nome+'</h5>'+
											'<span class="text-muted font-14">'+obj.email+'</span>'+
											'</div>'+
                                '</div>'+
                                '</td>'+
                                '<td class="border-top text-muted px-2 py-4 font-14">'+obj.curso_nome+'</td>'+
                                '<td class="border-top px-2 py-4">'+
                                '<div class="popover-icon">'+
                                '<a class="btn btn-primary rounded-circle btn-circle font-12" href="javascript:void(0)" title="'+obj.disciplina_nome+'">'+obj.sigla+'</a>'+
                                '</div>'+
                                '</td>'+
                                '<td class="border-top text-center px-2 py-4"><i class="fa fa-circle text-'+icone+' font-12" data-toggle="tooltip" data-placement="top" title="'+status+'"></i></td>'+
                                '<td class="border-top text-center font-weight-medium text-muted px-2 py-4">'+obj.turma_nome+'</td>'+
								'<td class="font-weight-medium text-dark border-top px-2 py-4">'+obj.dataDisponivel+'</td>'+

													
								'<td class="border-top px-2 py-4">'+
								'<span> <button type="button" onclick="pegar('+obj.permuta_id+')" class="btn btn-success btn-circle">'+
                                '<i class="fas fa-share-square">'+'title="Pegar"'+
								'</button>'+

								'<span> <button type="button" class="btn btn-success btn-circle" <a href="https://api.whatsapp.com/send?phone=5587998211561&text=Ol%C3%A1%2C%20Desejo%20pegar%20sua%20permuta%20%3A)"></a>'+
                                '<i class="fab fa-whatsapp" aria-hidden="true">'+'title="Falar"'+
								'</button>'+
								

								'</td>'+

								'</tr>'


								// '<span> <button type="button" onclick="del('+obj.permuta_id+')" class="btn btn-danger btn-circle">'+
                                // '<i class="far fa-trash-alt"></i>'+
                                // '</button> </span>'+
								// '</td>'+
																
						});
						$('#tablePermutasDp').html(tabela).show();

					}else {
						var tabelavazia = 'Não há permuta disponivel!';
						$('#tablePermutasDp').html(tabelavazia).show();
					}
				});
			}

			
			

			function progress(){
				
					var current_progress = 0;
					var interval = setInterval(function() {
						current_progress += 10;
						$("#dynamic")
						.css("width", current_progress + "%")
						.attr("aria-valuenow", current_progress)
						.text("Carregando suas Permutas...");
						if (current_progress >= 100)
							clearInterval(interval);
					}, 20);
	

				$(document).ajaxStop(function(){
					$("#progress").hide(); 
				});
			}


		