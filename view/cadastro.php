<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> SGP - Sistema de Gerenciamento de Permutas </title>
    
    <link rel="stylesheet" href="../assets/css/bodycomimagem.css"/>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="../assets/css/material-kit2.css?v=2.0.6" rel="stylesheet" />
    <link href="../assets/demo/demo.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">

</head>



<body id="site" style="overflow: hidden;">

    <script>
        
        function MudarestadoUsuario(el,el2) {
        var display = document.getElementById(el).style.display;
        var display2 = document.getElementById(el2).style.display = "none";
        
        if(display == "none")
            document.getElementById(el).style.display = 'block';
        else
            document.getElementById(el).style.display = 'none';
    }
        </script>

<script>
        
    function MudarestadoInstituicao(el,el2) {
    var display = document.getElementById(el).style.display;
    var display2 = document.getElementById(el2).style.display = "none";
    
    if(display == "none")
        document.getElementById(el).style.display = 'block';
    else
        document.getElementById(el).style.display = 'none';
}
    </script>


<div id="conteudo1" class="container-fluid">

    <img src="imgs/logosvgbranco.svg" width="170" alt="logomarca" style="margin-top: 50px; margin-left: 35%; margin-right: 35%;">
    
    <div style="margin-top: 5%; margin-left:20%; margin-right: 20%;" class="btn-group" data-toggle="buttons">
        <label class="btn btn-secondary" onclick="MudarestadoUsuario('CadastroUsuario','CadastroInstituição')"> Usuário Padrão
            <input type="radio" name="botao" id="" autocomplete="off">
        </label>
        <label class="btn btn-secondary" onclick="MudarestadoInstituicao('CadastroInstituição','CadastroUsuario')"> Instituição
            <input type="radio" name="botao" id="" autocomplete="off">
        </label>
        
    </div>

   

    <div  style="margin-left: 10%; margin-top: 3%; display: none;"  id="CadastroUsuario">  
        
        <form class="form" method="POST" action="control/cadUser.php" >
            

                <div class="row">
                
                    <div class="input-group">
                
                        <div class="input-group-prepend">
                            <span  style="margin-right: 2%;"  class="input-group-text-white">
                                <i class="fa fa-user"></i>
                            </span>
                
                            <input name="nome" style="color: white; place-content: white; margin-right: 8%;" class="form-control col-sm-4" type="text" class="form-control" placeholder="Nome">
            
                                <span  style="margin-right: 2%;"  class="input-group-text-white">
                                    <i class="fa fa-envelope"></i>
                                </span>
                           
                            <input name="email" style="color: white;" class="form-control col-sm-8" type="email" class="form-control" placeholder="Email">
                        </div>

                    </div>

                    <div style="margin-top: 5%;" class="input-group">
                
                            <div class="input-group-prepend">
                                <span  style="margin-right: 2%;"  class="input-group-text-white">
                                        <i class="fa fa-address-card"></i>
                                </span>
                    
                                <input name="cpf" style="color: white; place-content: white; margin-right: 8%;" class="form-control col-sm-4" type="text" class="form-control" placeholder="CPF">
                
                                    <span  style="margin-right: 2%;"  class="input-group-text-white">
                                            <i class="fa fa-lock"></i>
                                    </span>
                               
                                <input name="senha" style="color: white;" class="form-control col-sm-8" type="password" class="form-control" placeholder="Senha">
                            </div>
    
                        </div>

                        <div style="margin-top: 5%;" class="input-group">
                
                                <div class="input-group-prepend">
                                    <span  style="margin-right: 2%;"  class="input-group-text-white">
                                            <i class="fa fa-map-marker"></i>
                                    </span>
                        
                                    <input name="endereco" style="color: white; place-content: white; margin-right: 3%;" class="form-control col-sm-4" type="text" class="form-control" placeholder="Endereço">
                    
                                    <span  style="margin-right: 2%;"  class="input-group-text-white">
                                            <i class="fa fa-flag"></i>
                                    </span>
                        
                                    <input name="uf" style="color: white; place-content: white; margin-right: 3%;" class="form-control col-sm-1" type="text" class="form-control" placeholder="UF">


                                        <span  style="margin-right: 2%;"  class="input-group-text-white">
                                                <i class="fa fa-building"></i>
                                        </span>
                                   
                                    <input name="cidade" style="color: white;" class="form-control col-sm-3" type="text" class="form-control" placeholder="Cidade">
                                </div>
        
                            </div>

                            <div style="margin-top: 5%;" class="input-group">
                
                                    <div class="input-group-prepend">
                                
                                            <span  style="margin-right: 2%;"  class="input-group-text-white">
                                                    <i class="fa fa-calendar"></i>
                                            </span>
                                       
                                        <input name="dataN" style="color: white; margin-right: 5%;" class="form-control col-sm-15" type="text" class="form-control" placeholder="Data de Nascimento">
                                   
                                        <span  style="margin-right: 2%;"  class="input-group-text-white">
                                            <i class="fa fa-briefcase"></i>
                                        </span>
                                   
                                    <input name="prof" style="color: white;" class="form-control col-sm-8" type="text" class="form-control" placeholder="Profissão">
                                   
                                    </div>
            
                                </div>

                        
                        <div style="padding-top: 5%; margin-left: 30%;" class="text-center">
                                <button class="btn btn-primary btn-link btn-wd btn-light"  style="color: white; background: rgb(0, 92, 0);">Cadastrar</button>
                        </div>
                
                </div>
                
                </form>

                </div>

                <div  style="margin-left: 10%; margin-top: 3%; display: none;"  id="CadastroInstituição">  
        
                    <form class="form" method="POST" action="controllerCadInstituiçao.php">
                        
            
                            <div class="row">
                            
                                <div class="input-group">
                            
                                    <div class="input-group-prepend">
                                        <span  style="margin-right: 2%;"  class="input-group-text-white">
                                            <i class="fa fa-user"></i>
                                        </span>
                            
                                        <input name="nome" style="color: white; place-content: white; margin-right: 8%;" class="form-control col-sm-4" type="text" class="form-control" placeholder="Nome">
                        
                                            <span  style="margin-right: 2%;"  class="input-group-text-white">
                                                <i class="fa fa-envelope"></i>
                                            </span>
                                       
                                        <input name="email" style="color: white;" class="form-control col-sm-8" type="email" class="form-control" placeholder="Email">
                                    </div>
            
                                </div>
            
                                <div style="margin-top: 5%;" class="input-group">
                            
                                        <div class="input-group-prepend">
                                            <span  style="margin-right: 2%;"  class="input-group-text-white">
                                                    <i class="fa fa-address-card"></i>
                                            </span>
                                
                                            <input name="cpf" style="color: white; place-content: white; margin-right: 8%;" class="form-control col-sm-4" type="text" class="form-control" placeholder="CNPJ">
                            
                                                <span  style="margin-right: 2%;"  class="input-group-text-white">
                                                        <i class="fa fa-lock"></i>
                                                </span>
                                           
                                            <input name="senha" style="color: white;" class="form-control col-sm-8" type="password" class="form-control" placeholder="Senha">
                                        </div>
                
                                    </div>
            
                                    <div style="margin-top: 5%;" class="input-group">
                            
                                            <div class="input-group-prepend">
                                                <span  style="margin-right: 2%;"  class="input-group-text-white">
                                                        <i class="fa fa-map-marker"></i>
                                                </span>
                                    
                                                <input name="endereco" style="color: white; place-content: white; margin-right: 3%;" class="form-control col-sm-4" type="text" class="form-control" placeholder="Endereço">
                                
                                                <span  style="margin-right: 2%;"  class="input-group-text-white">
                                                        <i class="fa fa-flag"></i>
                                                </span>
                                    
                                                <input name="uf" style="color: white; place-content: white; margin-right: 3%;" class="form-control col-sm-1" type="text" class="form-control" placeholder="UF">
            
            
                                                    <span  style="margin-right: 2%;"  class="input-group-text-white">
                                                            <i class="fa fa-building"></i>
                                                    </span>
                                               
                                                <input name="cidade" style="color: white;" class="form-control col-sm-3" type="combo-box" class="form-control" placeholder="Cidade">
                                            </div>
                    
                                        </div>
            
                                        <div style="margin-top: 5%;" class="input-group">
                            
                                                <div class="input-group-prepend">
                                            
                                                        <span  style="margin-right: 2%;"  class="input-group-text-white">
                                                                <i class="fa fa-calendar"></i>
                                                        </span>
                                                   
                                                    <input name="dataF" style="color: white; margin-right: 5%;" class="form-control col-sm-5" type="date" class="form-control" placeholder="Data de Fundação">
                                               
                                                    <span style="margin-right: 2%;" class="input-group-text-white">
                                                        <i class="fa fa-users"></i>  
                                                    </span>                       
                                                <input name="nempregado" style="color: white;" class="form-control col-sm-8" type="number" class="form-control" placeholder="Numero de Empregados">
                                               
                                                </div>
                        
                                            </div>
            
                                    
                                    <div style="padding-top: 5%; margin-left: 30%;" class="text-center">
                                            <a  class="btn btn-primary btn-link btn-wd btn-light"   style="color: white; background: rgb(0, 92, 0);">Cadastrar</a>
                                    </div>
                            
                            </div>
                            
                            </form>
            
                            </div>
    </div>

</div>



<div id="conteudo2">

        <img src="imgs/vetorlogin.png" alt="Trulli" width="600" height="510" style="margin-top: 75px; margin-left: 23%; margin-right: 30%;">

</div>





    <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script type="text/javascript"
        src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
    <script src="assets/telefone.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body>

</html>