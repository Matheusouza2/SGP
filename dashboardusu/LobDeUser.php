<?php
session_start();
if (!isset($_SESSION['nome'])) {

  //verificar isso
  include_once '../control/logout.php';
}

?>


<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>SGP - Sistema de Gerenciamento de Permuatas</title>

  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="dist/css/skins/skin-green-light.css">
  <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.css">
  <link id="favicon" rel="shortcut icon" type="image/png" href="../assets/img/Programar Software - 2019.png">
  <link rel="stylesheet" href="../seletorCursos\css\bootstrap4\tail.select-default.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.0.1/css/tempusdominus-bootstrap-4.min.css" />
  <link rel="stylesheet" href="../assets\css\bootstrap.css" />

  <script>
    function mudarTelapermutas() {

      var tela1 = document.querySelector('#permutas').style.display = "flex";
      var tela2 = document.querySelector('#professores').style.display = "none";



    }


    function mudarTelaprofessores() {

      var tela1 = document.querySelector('#permutas').style.display = "none";
      var tela2 = document.querySelector('#professores').style.display = "flex";



    }
  </script>

</head>

<body style="overflow: hidden" class="hold-transition skin-green-light sidebar-mini">
  <div class="wrapper">

    <!-- Main Header -->
    <header class="main-header">

      <!-- Logo -->
      <a href="index2.html" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><img src="dist/img/logosvgbranco.svg" sizes="50x50"></span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><img style="margin-top: 7%;" src="dist/img/logosvgbranco.svg" width="130"></span>
      </a>

      <!-- Header Navbar -->
      <nav class="navbar navbar-static-top" role="navigation">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
          <span class="sr-only">Toggle navigation</span>
        </a>
        <!-- Navbar Right Menu -->
        <div class="navbar-custom-menu">
          <ul class="nav navbar-nav">
            <!-- User Account Menu -->
            <li class="dropdown user user-menu">
              <!-- Menu Toggle Button -->
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <!-- The user image in the navbar-->
                <img src="dist/img/avatar5.png" class="user-image" alt="User Image">
                <!-- hidden-xs hides the username on small devices so only the image appears. -->
                <span class="hidden-xs">
                  <?= $_SESSION['email']; ?>

                </span>
              </a>
              <ul class="dropdown-menu">
                <!-- The user image in the menu -->
                <li class="user-header">
                  <img src="dist/img/avatar5.png" class="img-circle" alt="User Image">

                  <p>
                    <?= $_SESSION['nome'] ?> - Web Developer
                    <small>Membro desde Abr. 2018</small>
                  </p>
                </li>
                <!-- Menu Body -->
                <li class="user-body">
                  <div class="row">
                    <div class="col-xs-4 text-center">
                      <a href="#">Followers</a>
                    </div>
                    <div class="col-xs-4 text-center">
                      <a href="#">Sales</a>
                    </div>
                    <div class="col-xs-4 text-center">
                      <a href="#">Friends</a>
                    </div>
                  </div>
                  <!-- /.row -->
                </li>
                <!-- Menu Footer-->
                <li class="user-footer">
                  <div class="pull-left">
                    <a href="../control/listar.php" class="btn btn-default btn-flat">Perfil</a>
                  </div>
                  <div class="pull-right">
                    <a href="../control/logout.php" class="btn btn-default btn-flat">Sair</a>
                  </div>
                </li>
              </ul>
            </li>
          </ul>
        </div>
      </nav>
    </header>
    <!-- Left side column. contains the logo and sidebar -->
    <aside class="main-sidebar">

      <!-- sidebar: style can be found in sidebar.less -->
      <section class="sidebar">

        <!-- Sidebar user panel (optional) -->
        <div class="user-panel">
          <div class="pull-left image">
            <img src="dist/img/avatar5.png" class="img-circle" alt="User Image">
          </div>
          <div class="pull-left info">
            <p><?php echo $_SESSION['nome'];  ?></p>
            <!-- Status -->
            <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
          </div>
        </div>

        <!-- Sidebar Menu -->
        <ul class="sidebar-menu" data-widget="tree">
          <li class="header">MENU</li>
          <!-- Optionally, you can add icons to the links -->
          <li onclick="mudarTelapermutas()" class="active"><a href="#"><i class="fa fa-users"></i> <span>Permutas</span></a></li>
          <li onclick="mudarTelaprofessores()" class="active"><a href="#"><i class="fa fa-paste"></i> <span>Professores</span></a></li>

        </ul>
        <!-- /.sidebar-menu -->
      </section>
      <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>
          Permutas
          <small>Gerenciamento de permutas no sistema</small>
        </h1>
        <ol class="breadcrumb">
          <li><a href="/"><i class="fa fa-home"></i> Home</a></li>
          <li class="active">Permutas</li>
          <li class="desactive">Professores</li>
        </ol>


      </section>

      <!-- Main content -->
      <section class="content container-fluid">

        <div style="display: flex" class="row" id="permutas">
          <div class="col-md-8">

            <div class="box">
              <div class="box-header">
                <h3 class="box-title">Lista de Permutas</h3>
              </div>
              <!-- /.box-header -->
              <div class="box-body no-padding">
                <table class="table table-striped">
                  <thead style="text-align: center">
                    <tr>
                      <th style="width: 10px">Foto</th>
                      <th>Nome</th>
                      <th>Whastapp</th>
                      <th>Disciplinas</th>
                      <th>Criado em</th>
                      <th>Ações</th>
                    </tr>
                  </thead>
                  <tbody>

                    <tr>
                      <td><img src="dist/img/user1-128x128.jpg" alt="User Image" class="img-circle img-sm"></td>
                      <td>Fulano</td>
                      <td>fulano@hcode.com.br</td>
                      <td>Sim</td>
                      <td>02/04/2018</td>
                      <td>
                        <button type="button" class="btn btn-primary btn-xs btn-flat">Editar</button>
                        <button type="button" class="btn btn-danger btn-xs btn-flat">Excluir</button>
                      </td>
                    </tr>


                  </tbody>
                </table>
              </div>
              <!-- /.box-body -->
            </div>

          </div>
          <div class="col-md-4">

            <div class="row">

              <!-- ./col -->
              <div class="col-md-6">
                <!-- small box -->
                <div class="small-box bg-green">
                  <div class="inner">
                    <h3>1</h3>

                    <p>Permutas Criadas</p>
                  </div>
                  <div class="icon">
                    <i class="ion ion-person-add"></i>
                  </div>
                </div>
              </div>
              <!-- ./col -->
              <div class="col-md-6">
                <!-- small box -->
                <div class="small-box bg-yellow">
                  <div class="inner">
                    <h3>1</h3>

                    <p>Permutas Pegas</p>
                  </div>
                  <div class="icon">
                    <i class="ion ion-pie-graph"></i>
                  </div>
                </div>
              </div>
              <!-- ./col -->
            </div>

            <div class="box box-success">
              <div style="text-align: center;" class="box-header with-border">
                <h3 class="box-title">Nova Permuta</h3>
              </div>
              <!-- /.box-header -->
              <!-- form start -->
              <form role="form" id="form-user-create" action="../control/permuta/criaPermuta.php" method="post">
                <div class="box-body">
                  <div class="form-group">
                    <label for="exampleInputName">Título</label>
                    <input type="text" class="form-control" id="exampleInputName" placeholder="Titulo" name="titulo">
                  </div>


                  <div class="form-group">
                    <label for="inputCursos">Disciplinas:</label>
                    <select class="form-control" id="inputCurso" name="disciplinas">



                      </optgroup>
                    </select>
                  </div>


                  <div class="row">
                    <div class="col-sm-12 mb-6">
                      <div class="form-group">
                        <label>Data da Permuta</label>
                        <div class="input-group date" id="datetimepicker3" data-target-input="nearest">
                          <input type="text" class="form-control datetimepicker-input" data-target="#datetimepicker3" placeholder="" />
                          <div class="input-group-append" data-target="#datetimepicker3" data-toggle="datetimepicker">
                            <div class="input-group-text"><i class="fa fa-clock-o"></i></div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <script type="text/javascript">
                      $(function() {
                        $('#datetimepicker3').datetimepicker({
                          format: 'LT'
                        });
                      });
                    </script>
                  </div>


                  <div class="form-group">
                    <label for="qtdaulas">Quantidades de Aulas</label>
                    <input type="number" class="form-control" id="qtdaulas" name="qtdaulas">
                  </div>


                  <div class="form-group">
                    <label for="exampleInputEmail1">Telefone / Whastapp:</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Digite o número" name="numero">
                  </div>
                </div>
                <!-- /.box-body -->
                <div style="text-align: center;" class="box-footer">
                  <button type="submit" class="btn btn-success">Criar Permuta</button>
                </div>
              </form>

            </div>

          </div>
        </div>

        <div style="display: none" class="row" id="professores">
          <div class="col-md-8">

            <div class="box">
              <div class="box-header">
                <h3 class="box-title">Professores Cadastrados</h3>
              </div>
              <!-- /.box-header -->
              <div class="box-body no-padding">
                <table class="table table-striped">
                  <thead style="text-align: center">
                    <tr>
                      <th style="width: 5px">Foto</th>
                      <th>Nome</th>
                      <th>Disciplinas</th>
                      <th>Turnos</th>
                      <th>Hoarios</th>
                      <th>Ações</th>
                    </tr>
                  </thead>
                  <tbody>

                    <tr>
                      <td><img src="dist/img/user1-128x128.jpg" alt="User Image" class="img-circle img-sm"></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td style="text-align: center">
                        <button type="button" class="btn btn-primary btn-xs btn-flat">Editar</button>
                        <button type="button" class="btn btn-danger btn-xs btn-flat">Excluir</button>
                      </td>
                    </tr>

                  </tbody>
                </table>
              </div>
              <!-- /.box-body -->
            </div>

          </div>
          <div class="col-md-4">

            <div class="row">

              <!-- ./col -->
              <div class="col-md-12">
                <!-- small box -->
                <div class="small-box bg-green">
                  <div class="inner">
                    <h3>1</h3>

                    <p>Professores Cadastrados</p>
                  </div>
                  <div class="icon">
                    <i class="ion ion-person-add"></i>
                  </div>
                </div>
              </div>
              <!-- ./col -->

              <!-- ./col -->
            </div>

            <div class="box box-success">
              <div style="text-align: center;" class="box-header with-border">
                <h3 class="box-title">Cadastrar Professor(a)</h3>
              </div>
              <!-- /.box-header -->
              <!-- form start -->
              <form role="form" id="form-user-create" action="../control/permuta/criaPermuta.php" method="post">
                <div class="box-body">
                  <div class="form-group">
                    <label for="validationCustom01">Nome</label>
                    <input type="text" class="form-control" id="validationCustom01" placeholder="Nome" required>
                    <div class="valid-feedback">
                      Tudo certo!
                    </div>

                    <div class="invalid-feedback">
                      Inserir Nome!
                    </div>
                  </div>


                  <div class="form-group">
                    <label for="validationCustom01">Curso</label>
                    <select class="custom-select" required>
                      <option value="">Escolher...</option>
                      <option value="1">Sistemas para Internet</option>
                    </select>
                    <div class="invalid-feedback">Selecione um curso!</div>
                    <div class="valid-feedback">
                      Tudo certo!
                    </div>
                  </div>


                  <div class="row">
                    <div class="col-sm-12 mb-6">
                      <div class="form-group">
                        <label for="validationCustom01">Turnos</label>
                        <select class="custom-select" required>
                          <option value="">Escolher...</option>
                          <option value="1">Manhã</option>
                          <option value="2">Tarde</option>
                          <option value="3">Noite</option>
                        </select>
                        <div class="invalid-feedback">Selecione um Turno!</div>
                        <div class="valid-feedback">
                          Tudo certo!
                        </div>
                      </div>
                    </div>
                    <script type="text/javascript">
                      $(function() {
                        $('#datetimepicker3').datetimepicker({
                          format: 'LT'
                        });
                      });
                    </script>
                  </div>


                  <div class="form-group">
                    <div class="form-row">

                      <div class="col-md-6 mb-3">
                        <label for="validationCustom01">de</label>
                        <input style="text-align: center;" type="time" class="form-control" id="validationCustom01" required>

                        <div class="valid-feedback">
                          Tudo certo!
                        </div>

                        <div class="invalid-feedback">
                          Inserir Hora!
                        </div>
                      </div>

                      <div class="col-md-6 mb-3">
                        <label for="validationCustom01">até</label>
                        <input style="text-align: center;" type="time" class="form-control" id="validationCustom01" required>

                        <div class="valid-feedback">
                          Tudo certo!
                        </div>

                        <div class="invalid-feedback">
                          Inserir Hora!
                        </div>

                      </div>
                    </div>
                  </div>


                  <div class="form-group">
                    <label for="validationCustom01">Disciplina</label>
                    <select class="custom-select" required>
                      <option value="">Escolher...</option>
                      <option value="1">Disciplina 1</option>
                      <option value="2">Disciplina 2</option>
                      <option value="3">Disciplina 3</option>
                    </select>
                    <div class="invalid-feedback">Selecione uma disciplina</div>
                    <div class="valid-feedback">
                      Tudo certo!
                    </div>
                  </div>

                  <div class="form-group">
                  <div class="custom-file">
                    <input id="my-input" class="custom-file-input" type="file" name="img" content="Buscar">
                    <label for="my-input" class="custom-file-label">Adiconar Imagem</label>
                  </div>
                  </div>

                </div>
                <!-- /.box-body -->
                <div style="text-align: center;" class="box-footer">
                  <button type="submit" class="btn btn-success">Cadastrar</button>
                </div>
              </form>

            </div>

          </div>
        </div>

      </section>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
  </div>
  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="pull-right hidden-xs">
      <a target="_blank" href="https://www.ifsertao-pe.edu.br/index.php/campus/salgueiro">IF-Sertão Pernambucano / Campus Salgueiro</a>
    </div>
    <!-- Default to the left -->
    Projeto desenvolvido no curso de Sistemas para Internet.
  </footer>

  </div>

  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <script src="../seletorCursos\js\tail.select-full.js"></script>
  <script>
    tail.select("#select2", {



    });
  </script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/moment.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.0.1/js/tempusdominus-bootstrap-4.min.js"></script>
</body>

</html>