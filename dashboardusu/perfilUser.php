<?php
session_start();
if (!isset($_SESSION['email'])) 
{
header("location: ../view/telaLogin.php");
exit();
  }
    
    include_once '../dao/UsuarioDao.php';


    $usuario = new UsuarioDao();
    // sessao tem q ta ativa 
    $consulta = $usuario->buscar($_SESSION['email']);
    

    

 
    
?>


<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<script>
    $(document).ready(function() {


        var readURL = function(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    $('.avatar').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }


        $(".file-upload").on('change', function() {
            readURL(this);
        });
    });
</script>



<head>
<title>SGP - Sistema de Gerenciamento de Permutas</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link id="favicon" rel="shortcut icon" type="image/png" href="../assets/img/Programar Software - 2019.png">

</head>


<hr>
<div class="container bootstrap snippet">
    <div class="row">
        <div class="col-sm-10">
            <h1>User name</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-3">
            <!--left col-->


            <div class="text-center">
                <img src="http://ssl.gstatic.com/accounts/ui/avatar_2x.png" width="120" class="avatar img-circle img-thumbnail" alt="avatar">
                <h6>Carregar outra foto...</h6>
                <input type="file" class="text-center center-block file-upload">
            </div>
            </hr><br>


            <div class="panel panel-default">
                <div class="panel-heading">Email Institucional <i class="fa fa-link fa-1x"></i></div>
                <div class="panel-body"><a href="http://bootnipets.com">lucas@gmail.com</a></div>
            </div>


            <ul class="list-group">
                <li class="list-group-item text-muted">Permutas <i class="fa fa-dashboard fa-1x"></i></li>
                <li class="list-group-item text-right"><span class="pull-left"><strong>Criadas</strong></span> 0</li>
                <li class="list-group-item text-right"><span class="pull-left"><strong>Pegas</strong></span> 0</li>
            </ul>

            <div class="panel panel-default">
                <div class="panel-heading">Redes Sociais</div>
                <div class="panel-body">
                    <i class="fa fa-facebook fa-2x"></i> <i class="fa fa-github fa-2x"></i> <i class="fa fa-twitter fa-2x"></i> <i class="fa fa-pinterest fa-2x"></i> <i class="fa fa-google-plus fa-2x"></i>
                </div>
            </div>

        </div>
        <!--/col-3-->
        <div class="col-sm-9">
            <ul class="nav nav-tabs">
                <li class="active"><a data-toggle="tab" href="#home">Dados</a></li>
                <li><a data-toggle="tab" href="#endereco">Endereço</a></li>
                <li><a data-toggle="tab" href="#disciplinas">Disciplinas</a></li>
            </ul>


            <div class="tab-content">
                <div class="tab-pane active" id="home">
                   
                    <form class="form" action="##" method="post" id="registrationForm">
                        <div class="form-group">

                            <div class="col-xs-6">
                                <label for="nome">
                                    <h4>Nome</h4>
                                </label>
                                <input type="text" class="form-control" name="nome" id="nome" value="<?php echo $consulta['nome'] ?>">
                            </div>
                        </div>
                        <div class="form-group">

                            <div class="col-xs-6">
                                <label for="telefone">
                                    <h4>Telefone</h4>
                                </label>
                                <input type="text" class="form-control" name="telefone" id="telefone" value="<?php echo $consulta['telefone'] ?>">
                            </div>
                        </div>

                        <div class="form-group">

                            <div class="col-xs-6">
                                <label for="cpf">
                                    <h4>CPF</h4>
                                </label>
                                <input type="text" class="form-control" name="cpf" id="cpf" value="<?php echo $consulta['cpf'] ?>" disabled="disabled">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-xs-6">
                                <label for="rg">
                                    <h4>RG</h4>
                                </label>
                                <input type="text" class="form-control" name="rg" id="rg" value="<?php echo $consulta['rg'] ?>">
                            </div>
                        </div>
                        <div class="form-group">

                            <div class="col-xs-6">
                                <label for="email">
                                    <h4>Email</h4>
                                </label>
                                <input type="email" class="form-control" name="email" id="email" value="<?php echo $consulta['email'] ?>">
                            </div>
                        </div>
                        <div class="form-group">
                        </div>
                        <div class="form-group">

                            <div class="col-xs-6">
                                <label for="senha">
                                    <h4>Senha</h4>
                                </label>
                                <input type="password" class="form-control" name="senha" id="senha" value="<?php echo $consulta['senha'] ?>">
                            </div>
                        </div>
                        <div class="form-group">

                        </div>
                        <div class="form-group">
                            <div class="col-xs-12">
                                <br>
                                <button class="btn btn-lg btn-success" type="submit"><i class="glyphicon glyphicon-ok-sign"></i>Atualizar</button>
                            </div>
                        </div>
                    </form>

                    <hr>

                </div>
                <!--/tab-pane-->
                <div class="tab-pane" id="endereco">

                    <h2></h2>

                  
                    <form class="form" action="##" method="post" id="registrationForm">
                        <div class="form-group">

                            <div class="col-xs-6">
                                <label for="rua">
                                    <h4>Rua</h4>
                                </label>
                                <input type="text" class="form-control" name="rua" id="rua" placeholder="Rua" value='<?php echo $consulta['']?>' >
                            </div>
                        </div>
                        <div class="form-group">

                            <div class="col-xs-4">
                                <label for="bairro">
                                    <h4>Bairro</h4>
                                </label>
                                <input type="text" class="form-control" name="bairro" id="bairro" placeholder="Bairro">
                            </div>
                        </div>

                        <div class="form-group">

                            <div class="col-xs-2">
                                <label for="numero">
                                    <h4>Número</h4>
                                </label>
                                <input type="number" class="form-control" name="numero" id="numero" placeholder="numero">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-xs-4">
                                <label for="cidad">
                                    <h4>Cidade</h4>
                                </label>
                                <input type="text" class="form-control" name="cidade" id="cidad" placeholder="Cidade">
                            </div>
                        </div>
                        <div class="form-group">

                            <div class="col-xs-4">
                                <label for="estado">
                                    <h4>Estado</h4>
                                </label>
                                <input type="text" class="form-control" name="estado" id="estado" placeholder="Estado">
                            </div>
                        </div>
                        <div class="form-group">

                            <div class="col-xs-4">
                                <label for="cep">
                                    <h4>CEP</h4>
                                </label>
                                <input type="text" class="form-control" name="cep" id="cep" placeholder="CEP">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-xs-12">
                                <br>
                                <button class="btn btn-lg btn-success" type="submit"><i class="glyphicon glyphicon-ok-sign"></i>Atualizar</button>
                            </div>
                        </div>
                    </form>

                </div>
                <!--/tab-pane-->
                <div class="tab-pane" id="disciplinas">

                 
                    <form class="form" action="##" method="post" id="registrationForm">
                        <div style="margin-top: 5%;" class="form-group">
                            
                        <ul class="list-group">
                                <li class="list-group-item ">Sistemas p/ Internet</li>
                                <li class="list-group-item">Fisica</li>
                                <li class="list-group-item">Alimentos</li>
                                <li class="list-group-item">Edificações</li>
                                <li class="list-group-item">Agropecuária</li>
                                <li class="list-group-item">Informática</li>
                            </ul>

                        </div>


                        <div class="form-group">
                            <div class="col-xs-12">
                                <br>
                                <button class="btn btn-lg btn-success" type="submit"><i class="glyphicon glyphicon-ok-sign"></i>Atualizar</button>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
            <!--/tab-pane-->
        </div>
        <!--/tab-content-->

    </div>
    <!--/col-9-->
</div>
<!--/row-->