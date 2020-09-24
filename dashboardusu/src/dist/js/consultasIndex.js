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
			
			
			});		



			//Consulta e preenchimento dos selects
			function consultaSelects(){

				$.getJSON('../../../control/consultasExtras.php?opc=cursoSelect', function (dados){
					console.log('oal1');
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

			//Preenche a table do index cliente
			function consultaTable(){
				$.getJSON('../../../control/controlPermuta.php?command=listPp', function (dados){
					if(dados.length > 0){
						var tabela = '';
						$.each(dados, function(i, obj){tabela += 
							'<tr>'+
                                '<td class="border-top-0 px-2 py-4">'+
                                '<div class="d-flex no-block align-items-center">'+
                                	'<div class="mr-3"><img src="../assets/images/users/widget-table-pic1.jpg" alt="user" class="rounded-circle" width="45" height="45" /></div>'+
                                		'<div class="">'+
                                			'<h5 class="text-dark mb-0 font-16 font-weight-medium">'+obj.professor_nome+'</h5>'+
                                			'<span class="text-muted font-14">'+obj.email+'</span>'+
                                		'</div>'+
                                '</div>'+
                                '</td>'+
                                '<td class="border-top-0 text-muted px-2 py-4 font-14">'+obj.curso_nome+'</td>'+
                                '<td class="border-top-0 px-2 py-4">'+
                                '<div class="popover-icon">'+
                                '<a class="btn btn-primary rounded-circle btn-circle font-12" href="javascript:void(0)" title="'+obj.disciplina_nome+'">'+obj.sigla+'</a>'+
                                '</div>'+
                                '</td>'+
                                '<td class="border-top-0 text-center px-2 py-4"><i class="fa fa-circle text-success font-12" data-toggle="tooltip" data-placement="top" title="'+obj.status+'"></i></td>'+
                                '<td class="border-top-0 text-center font-weight-medium text-muted px-2 py-4">'+obj.turma_nome+'</td>'+
                                '<td class="font-weight-medium text-dark border-top-0 px-2 py-4">'+obj.dataDisponivel+'</td>'+
                                '</tr>'
						});
						$('#tablePermutas').html(tabela).show();

					}
				});
			}