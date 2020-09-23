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
			
       
        	//Preencher os Selects
        	$(document).ready(function(){
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
			});		