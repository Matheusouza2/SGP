$(document).ready(function(){
    consultaSelects();
    consultaSelectProfessores();
});
//Consulta e preenchimento dos selects
function consultaSelects(){
   
    $.getJSON('../../../control/consultasExtras.php?opc=cadCursoSelec', function (dados){
        if(dados.length > 0){

            var curso = '<option>--</option>';
            $.each(dados, function(i, obj){curso += '<option value="'+obj.id_curso+'">'+obj.nome_curso+'</option>';});
            $('#selectCurso').html(curso).show();

            $('#selectCurso').on('change', function(){

                $.getJSON('../../../control/consultasExtras.php?opc=cadTurmaSelec&curso='+$(this).val(), function (dados){
                
                    var turma = '<option>Turma</option>';
                    $.each(dados, function(i, obj){turma += '<option value="'+obj.turma_id+'">'+obj.turma_nome+'</option>';})
                    $('#selectTurma').html(turma).show();

                    
                   		 
                });
            
            });
        }			
    });
    

}
function consultaSelectProfessores(){
$.getJSON('../../../control/consultasExtras.php?opc=cadProfessorSelec', function (dados){
    if(dados.length > 0){

        var professor = '<option>--</option>';
        $.each(dados, function(i, obj){professor += '<option value="'+obj.id_professor+'">'+obj.nome_professor+'</option>';});
        $('#selectProfessor').html(professor).show();

        
    }else{
        var vazia = '<option>--</option>';
                    
        $('#selectProfessor').html(vazia).show('');

    }		
});

}