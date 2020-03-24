<?php
session_start();
if (!isset($_SESSION['nome'])) 
{
header("location: ../view/telaLogin.php");
exit();
  }

?>


<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>SGP - Sistema de Gerenciamento de Permuatas</title>

  <a href="../control/logout.php"> sair</a>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="dist/css/skins/skin-green-light.css">
  <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.css">


</head>

<body class="hold-transition skin-green-light sidebar-mini">
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
                <?php
                
                echo $_SESSION['nome']; 

                 ?>
                  
                </span>
            </a>
            <ul class="dropdown-menu">
              <!-- The user image in the menu -->
              <li class="user-header">
                <img src="dist/img/avatar5.png" class="img-circle" alt="User Image">

                <p>
                  Fulano Junior - Web Developer
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
                  <a href="#" class="btn btn-default btn-flat">Perfil</a>
                </div>
                <div class="pull-right">
                  <a href="#" class="btn btn-default btn-flat">Sair</a>
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
          <p>Fulano Junior</p>
          <!-- Status -->
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MENU</li>
        <!-- Optionally, you can add icons to the links -->
        <li class="active"><a href="#"><i class="fa fa-users"></i> <span>Permutas</span></a></li>
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
      </ol>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">

      <div class="row">
        <div class="col-md-8">

          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Lista de Permutas</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
              <table class="table table-striped">
                <thead>
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

                  <tr>
                    <td>
                      <img src="dist/img/user1-128x128.jpg" alt="User Image" class="img-circle img-sm">
                    </td>
                    <td>Fulano</td>
                    <td>fulano@hcode.com.br</td>
                    <td>Sim</td>
                    <td>02/04/2018</td>
                    <td>
                      <button type="button" class="btn btn-primary btn-xs btn-flat">Editar</button>
                      <button type="button" class="btn btn-danger btn-xs btn-flat">Excluir</button>
                    </td>
                  </tr>

                  <tr>
                    <td>
                      <img src="dist/img/user1-128x128.jpg" alt="User Image" class="img-circle img-sm">
                    </td>
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

          <div style="margin-left: auto;" class="row">
          
            <!-- ./col -->
            <div class="col-xs-6">
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
            <div class="col-xs-6">
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
            <form role="form" id="form-user-create">
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputName">Título</label>
                  <input type="text" class="form-control" id="exampleInputName" placeholder="Titulo" name="titulo">
                </div>

               

                <div class="form-group">
                  <label for="exampleInputBirth">Data da Permuta:</label>
                  <input type="date" class="form-control" id="exampleInputBirth" name="birth">
                </div>

                <div class="form-group">
                  <label for="inputCursos">Curso:</label>
                  <select class="form-control" id="inputCurso" name="cursos">
                    <option value="" selected="selected">Selecione um Curso</option>
                    <option value="Sistemas p/ Internet">Sistemas p/ Internet</option>
                    <option value="Física">Física</option>
                    <option value="Alimentos">Alimentos</option>
                    <option value="Edificações">Edificações</option>
                    <option value="Agropecuária">Agropecuária</option>
                    <option value="Informática">Informática</option>         
                  </select>
                </div>

                <div class="form-group">
                  <label for="inputTurnos">Turnos:</label>
                   <div class="form-check form-check-inline">
                     <label class="form-check-label">
                       <input class="form-check-input" type="checkbox" name="manha" id="manha" value="checkedValue"> Manhã
                     </label>
                   </div>
  
                   <div class="form-check form-check-inline">
                    <label class="form-check-label">
                      <input class="form-check-input" type="checkbox" name="tarde" id="tarde" value="checkedValue"> Tarde
                    </label>
                  </div>
  
                  <div class="form-check form-check-inline">
                    <label class="form-check-label">
                      <input class="form-check-input" type="checkbox" name="noite" id="noite" value="checkedValue"> Noite
                    </label>
                  </div>
                  </div>

                <div class="form-group">
                  <label for="exampleInputEmail1">Telefone / Whastapp:</label>
                  <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Digite o número" name="numero">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Senha</label>
                  <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Crie uma senha" name="password">
                </div>
                <div class="form-group">
                  <label for="exampleInputFile">Foto</label>
                  <input type="file" id="exampleInputFile" name="photo">
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

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

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

</body>
</html>