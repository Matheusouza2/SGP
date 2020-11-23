

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
				consultaTableRelatorio();
				contador();
			});		



			//Consulta e preenchimento dos selects
			function consultaSelects(){

				$.getJSON('../../../control/consultasExtras.php?opc=cursoSelect', function (dados){
					if(dados.length > 0){

						var curso = '<option value="" selected>Curso</option>';
						$.each(dados, function(i, obj){curso += '<option value="'+obj.id_curso+'">'+obj.nome_curso+'</option>';});
						$('#selectCurso').html(curso).show();

						$('#selectCurso').on('change', function(){

							$.getJSON('../../../control/consultasExtras.php?opc=turmaSelect&curso='+$(this).val(), function (dados){
							
								var turma = '<option value="" selected>Turma</option>';
								$.each(dados, function(i, obj){turma += '<option value="'+obj.turma_id+'">'+obj.turma_nome+'</option>';})
								$('#selectTurma').html(turma).show();

								
								$('#selectTurma').on('change', function(){
									$.getJSON('../../../control/consultasExtras.php?opc=disciplinaSelect&turma='+$(this).val(), function (dados){
										var disciplina = '<option value="" selected>Disciplina</option>';
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
						var status = '';
						var icone = '';
						var dis = 0, peg = 0, exp = 0;
						$.each(dados, function(i, obj){
							$('#all').text(i+1);
							if(obj.status == "Disponivel"){
								dis += 1;
								$('#abe').text(dis);
								status = obj.status;
								icone = "success"; 
							}else if(obj.status == 'Indisponivel'){
								peg += 1;
								$('#peg').text(peg);
								status = obj.status;
								icone = "warning"; 
							}else if(obj.status == 'Expirada'){
								exp += 1;
								$('#exp').text(exp);
								icone = "danger";
								status = obj.status; 
							}
							
							tabela += '<tr>'+
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
                                '<td class="border-top text-center px-2 py-4"><i class="fa fa-circle text-'+icone+' font-12" data-toggle="tooltip" data-placement="top" title="'+obj.status+'"></i></td>'+
                                '<td class="border-top text-center font-weight-medium text-muted px-2 py-4">'+obj.turma_nome+'</td>'+
								'<td class="font-weight-medium text-dark border-top px-2 py-4">'+obj.dataDisponivel+'</td>'+

								'<td class="border-top text-center font-weight-medium text-muted px-2 py-4">'+obj.qtd+'</td>'+

								'<span> <td class="border-top text-center px-2 py-4">'+
								'<button type="button" onclick="del('+obj.permuta_id+')" class="btn btn-danger btn-circle">'+
                                '<i class="far fa-trash-alt"></i>'+
                                '</button>  </td> </span>'+

								// '<span> <td class="border-top px-2 py-4">'+
                                // '<button type="button" class="btn btn-warning btn-circle" data-toggle="modal" data-target="#permuta-feita">'+
                                // '<i class="far fa-edit"></i>'+
								// '</button> </span></td> '+
								
								
								
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
						var status = '';
						var icone = '';
						$.each(dados, function(i, obj){
						
							if(obj.status == "Disponivel"){
								status = obj.status;
								icone = "success"; 
							}else if(obj.status == 'Indisponivel'){
								status = obj.status;
								icone = "warning"; 
							}else if(obj.status == 'Expirada'){
								icone = "danger";
								status = obj.status; 
							}
							tabela += '<tr>'+
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

								'<td class="border-top text-center font-weight-medium text-muted px-2 py-4">'+obj.qtd+'</td>'+


								
								'<span> <td class="border-top text-center px-2 py-4">'+
								'<button type="button" onclick="del('+obj.permuta_id+')" class="btn btn-danger btn-circle">'+
                                '<i class="far fa-trash-alt"></i>'+
                                '</button>  </td> </span>'+
								
								
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
			var status = '';
			var icone = '';
			$.each(dados, function(i, obj){
				if(obj.status == "Disponivel"){
					status = obj.status;
					icone = "success"; 
				}else if(obj.status == 'Indisponivel'){
					status = obj.status;
					icone = "warning"; 
				}else if(obj.status == 'Expirada'){
					icone = "danger";
					status = obj.status; 
				}
				tabela += '<tr>'+
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

					'<td class="border-top text-center font-weight-medium text-muted px-2 py-4">'+obj.qtd+'</td>'+


					'<span> <td class="border-top text-center px-2 py-4">' +
					'<button type="button" onclick="del(' + obj.permuta_id + ')" class="btn btn-danger btn-circle">' +
					'<i class="far fa-trash-alt"></i>' +
					'</button>  </td> </span>' +
					
					
					
					'</tr>'
			});
			$('#tablePermutas').html(tabela).show();

		} else {
			var tabelavazia = 'Você não pegou nenhuma permuta ainda!';
			$('#tablePermutas').html(tabelavazia).show();
		}
	});
}

function consultaTableExpirada(){
	$.getJSON('../../../control/controlPermuta.php?command=listEx', function (dados){
		if(dados.length > 0){
			var tabela = '';
			var status = '';
			var icone = '';
			$.each(dados, function(i, obj){
				
				if(obj.status == "Disponivel"){
					status = obj.status;
					icone = "success"; 
				}else if(obj.status == 'Indisponivel'){
					status = obj.status;
					icone = "warning"; 
				}else if(obj.status == 'Expirada'){
					icone = "danger";
					status = obj.status; 
				}
				
				tabela += '<tr>'+
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
					'<td class="border-top text-center font-weight-medium text-muted px-2 py-4">'+obj.qtd+'</td>'+

					'<span> <td class="border-top text-center px-2 py-4">' +
					'<button type="button" onclick="del(' + obj.permuta_id + ')" class="btn btn-danger btn-circle">' +
					'<i class="far fa-trash-alt"></i>' +
					'</button>  </td> </span>' +
					
					
					
					'</tr>'
			});
			$('#tablePermutas').html(tabela).show();

		} else {
			var tabelavazia = 'Nao ha permutas expiradas!';
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
						
							if(obj.status == "Disponivel"){
								status = obj.status;
								icone = "success"; 
							}else if(obj.status == 'Indisponivel'){
								status = obj.status;
								icone = "warning"; 
							}else if(obj.status == 'Expirada'){
								icone = "danger";
								status = obj.status; 
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
								
								'<td class="border-top text-center font-weight-medium text-muted px-2 py-4">'+obj.qtd+'</td>'+
													
								'<td class="border-top px-2 py-4">'+
								'<a onclick="pegar('+obj.permuta_id+')" class="btn btn-primary rounded-circle btn-circle font-16" href="javascript:void(0)" title="Pegar">'+ '<i class="fas fa-share-square"></i></a>'+

								'<span> <a href="https://api.whatsapp.com/send?phone=5587998211561&text=Ol%C3%A1%2C%20Desejo%20pegar%20sua%20permuta%20%3A)" class="btn btn-primary rounded-circle btn-circle font-16" href="javascript:void(0)" title="Conversar">'+ '<i class="fab fa-whatsapp"></i></a></span>'+


								// '<span> <button type="button" class="btn btn-success btn-circle" <a href="https://api.whatsapp.com/send?phone=5587998211561&text=Ol%C3%A1%2C%20Desejo%20pegar%20sua%20permuta%20%3A)"></a>'+
                                // '<i class="fab fa-whatsapp" aria-hidden="true" ></i> '+
								// '</button>'+
								

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
			
			function contador(){
				var request = $.ajax({
				    url: "../../../control/controlPermuta.php",
				    type: "POST",
				    data: "command=cons",
				    dataType: "html"
				}).done(function(resposta) {
					var response = $.parseJSON(resposta); 
				    $('#pegas').text(response.presente);
				    $('#abertas').text(response.abertas);
				    $('#expiradas').text(response.expiradas);
				    $('#allPermutas').text(response.allPermutas);
				    
				});
			}

			function consultaTableRelatorio(){
				progress();
				$.getJSON('../../../control/controlPermuta.php?command=listRc', function (dados){
					if(dados.length > 0){
						var tabela = '';
						var status = '';
						var icone = '';
						$.each(dados, function(i, obj){
						
							if(obj.status == "Disponivel"){
								status = obj.status;
								icone = "success"; 
							}else if(obj.status == 'Indisponivel'){
								status = obj.status;
								icone = "warning"; 
							}else if(obj.status == 'Expirada'){
								icone = "danger";
								status = obj.status; 
							}
							
							if(obj.presente == null){
								obj.presente = "";
								obj.email_presente = "Nenhum professor pegou essa aula ainda ou a mesma expirou";
								obj.foto_presente = "";
							}
						
							tabela +=
							'<tr>'+
                                '<td class="border-top px-2 py-4">'+
                                '<div class="d-flex no-block align-items-center">'+
                                	'<div class="mr-3"><img src="../../../assets/img/users/'+obj.foto+'" alt="user" class="rounded-circle" width="45" height="45" /></div>'+
                                		'<div class="">'+
                                			'<h5 class="text-dark mb-0 font-16 font-weight-medium">'+obj.nome+'</h5>'+
											'<span class="text-muted font-14">'+obj.email+'</span>'+
											'</div>'+
                                '</div>'+
                                '</td>'+
                                 '<td class="border-top text-center px-2 py-4"><i class="fa fa-circle text-'+icone+' font-12" data-toggle="tooltip" data-placement="top" title="'+status+'"></i></td>'+
                               
                                '<td class="border-top px-2 py-4">'+
                                '<div class="d-flex no-block align-items-center">'+
                                	'<div class="mr-3"><img src="../../../assets/img/users/'+obj.foto_presente+'" alt="user" class="rounded-circle" width="45" height="45" /></div>'+
                                		'<div class="">'+
                                			'<h5 class="text-dark mb-0 font-16 font-weight-medium">'+obj.presente+'</h5>'+
											'<span class="text-muted font-14">'+obj.email_presente+'</span>'+
											'</div>'+
                                '</div>'+
                                '</td>'+
								'<td class="font-weight-medium text-dark border-top px-2 py-4">'+obj.qtd+'</td>'+

								'</tr>'

																
						});
						$('#tabelaRelatorio').html(tabela).show();

					}else {
						var tabelavazia = 'Não há permuta!';
						$('#tabelaRelatorio').html(tabelavazia).show();
					}
				});
			}