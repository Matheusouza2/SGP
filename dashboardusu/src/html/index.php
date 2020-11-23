<?php session_start();
if (!isset($_SESSION['usuarioLogado'])) {
    header('location: ../../../index.php ');
}
date_default_timezone_set('America/Sao_Paulo');
?>
<!DOCTYPE html>
<html dir="ltr" lang="pt-BR">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="../assets/images/favicon.png">
    <title>SGP - Sistema de Gerenciamento de Permutas</title>

    <script src="https://unpkg.com/feather-icons"></script>
    <!-- Custom CSS -->
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <link href="../assets/extra-libs/c3/c3.min.css" rel="stylesheet">
    <link href="../assets/libs/chartist/dist/chartist.min.css" rel="stylesheet">
    <link href="../assets/extra-libs/jvector/jquery-jvectormap-2.0.2.css" rel="stylesheet" />
    <!-- Custom CSS -->
    <link href="../dist/css/style.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body>
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper" data-theme="light" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full" data-sidebar-position="fixed" data-header-position="fixed" data-boxed-layout="full">

        <?php include 'Menus.php'; ?>


        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-7 align-self-center">
                        <h3 class="page-title text-truncate text-dark font-weight-medium mb-1">Bem vindo! Usuário</h3>
                        <div class="d-flex align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb m-0 p-0">
                                    <li class="breadcrumb-item"><a href="index.html">Início</a>
                                    </li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                    <div class="col-5 align-self-center">
                        <div class="customize-input float-right">
                            <span><a>Cadastrar Permuta</a></span>
                            <button type="button" class="btn btn-success btn-circle" data-toggle="modal" data-target="#login-modal"> <i class="fas fa-plus-circle"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <div id="login-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-body">
                            <div class="text-center mt-2 mb-4">
                                <a href="index.html" class="text-success">
                                    <span><img class="mr-0" src="../assets/images/logomodal.svg" alt="" height="55"></span>
                                </a>
                            </div>

                            <form action="../../../control/controlPermuta.php" method="POST" class="pl-3 pr-3">
                                <input type="hidden" name="command" value="put">
                                <input name="professorSedente" type="hidden" value="<?= $_SESSION['usuarioLogado']['id'] ?>">

                                <div class="form-group">
                                    <label class="mr-sm-2" for="inlineFormCustomSelect">Curso:</label>
                                    <select class="custom-select mr-sm-2" id="selectCurso" name="curso">
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label class="mr-sm-2" for="inlineFormCustomSelect">Turma:</label>
                                    <select class="custom-select mr-sm-2" id="selectTurma" name="turma">
                                        <option>Turma</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label class="mr-sm-2" for="inlineFormCustomSelect">Disciplina</label>
                                    <select class="custom-select mr-sm-2" id="selectDisciplina" name="disciplina">
                                        <option> Disciplina </option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label class="mr-sm-2" for="inlineFormCustomSelect">Quantidade de Aulas</label>
                                    <select class="custom-select mr-sm-2" id="selectQtd" name="qtd">
                                        <option value="1"> 1 </option>
                                        <option value="2"> 2 </option>
                                        <option value="3"> 3 </option>
                                        <option value="4"> 4 </option>
                                        <option value="5"> 5 </option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label class="mr-sm-2" for="inlineFormCustomSelect">Descrição</label>
                                    <input type='text' name='descricao' placeholder='Porque não pode ministrar esta aula ?' class='form-control'>
                                </div>

                              

                                <div class="form-group">
                                    <label for="nome">Data de criação:</label>
                                    <input type="text" class="form-control" id="data-criacao" name="dataCriacao" readonly>

                                </div>

                                <div class="form-group">
                                    <label for="nome">Horário disponivel:</label>
                                    <input type="datetime-local" min="<?= date('Y-m-d\TH:i'); ?>" class="form-control" id="data-disponivel" name="dataDisponivel">
                                </div>


                                <div class="form-group text-center">
                                    <button class="btn btn-rounded btn-primary" id="btnCadastrar" type="submit">Cadastrar
                                    </button>
                                </div>

                            </form>

                        </div>
                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->


            <div id="permuta-feita" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-body">
                            <div class="text-center mt-2 mb-4">
                                <a href="index.html" class="text-success">
                                    <span><img class="mr-0" src="../assets/images/logomodal.svg" alt="" height="55"></span>
                                </a>
                            </div>

                            <form action="../../../control/controlPermuta.php" method="POST" class="pl-3 pr-3">
                                <input type="hidden" name="command" value="put">
                                <input name="professorSedente" type="hidden" value="<?= $_SESSION['usuarioLogado']['id'] ?>">

                                <div class="form-group">
                                    <label class="mr-sm-2" for="inlineFormCustomSelect">Curso:</label>
                                    <select class="custom-select mr-sm-2" id="selectCurso" name="curso">
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label class="mr-sm-2" for="inlineFormCustomSelect">Turma:</label>
                                    <select class="custom-select mr-sm-2" id="selectTurma" name="turma">
                                        <option>Turma</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label class="mr-sm-2" for="inlineFormCustomSelect">Disciplina</label>
                                    <select class="custom-select mr-sm-2" id="selectDisciplina" name="disciplina">
                                        <option> Disciplina </option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label class="mr-sm-2" for="inlineFormCustomSelect">Descrição</label>
                                    <input type='text' name='descricao' placeholder='Porque não pode ministrar esta aula ?' class='form-control'>
                                </div>

                                <div class="form-group">
                                    <label for="nome">Data de criação:</label>
                                    <input type="text" class="form-control" id="data-criacao" name="dataCriacao" readonly>

                                </div>

                                <div class="form-group">
                                    <label for="nome">Horário disponivel:</label>
                                    <input type="datetime-local" min="<?= date('Y-m-d\TH:i'); ?>" class="form-control" id="data-disponivel" name="dataDisponivel">
                                </div>


                                <div class="form-group text-center">
                                    <button class="btn btn-rounded btn-primary" id="btnCadastrar" type="submit">Cadastrar
                                    </button>
                                </div>

                            </form>

                        </div>
                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
            </div>
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- *************************************************************** -->
                <!-- Start First Cards -->
                <!-- *************************************************************** -->
                <div class="card-group">
                    
                <div class="card border-right">
                        <div class="card-body">
                            <div class="d-flex d-lg-flex d-md-block align-items-center">
                                <div>
                                    <div class="d-inline-flex align-items-center">
                                        <h2 class="text-dark mb-1 font-weight-medium" id="allPermutas">0</h2>
                                        <a href="permutas.php" class="badge bg-primary font-12 text-white font-weight-medium badge-pill ml-2 d-lg-block d-md-none"style="background-color: green !important;">Visualizar</a>
                                    </div>
                                    <h5 class="text-muted font-weight-normal mb-0 w-100 text-truncate">Todas as Permutas</h5>
                                </div>

                                <div  class="ml-auto mt-md-3 mt-lg-0">
                                    <span class="opacity-7 text-muted"><i data-feather="check-square"></i></span>
                                </div>
                                
                            </div>
                        </div>
                    </div>


                    <hr style="border:none; border-left:none;width: 1%;">


                    
                    <div class="card border-right">
                        <div class="card-body">
                            <div class="d-flex d-lg-flex d-md-block align-items-center">
                                <div>
                                    <div class="d-inline-flex align-items-center">
                                        <h2 class="text-dark mb-1 font-weight-medium" id="abertas">0</h2>
                                        <a href="permutas.php" class="badge bg-primary font-12 text-white font-weight-medium badge-pill ml-2 d-lg-block d-md-none" style="background-color: rgb(255, 208, 0) !important;">Visualizar</a>
                                    </div>
                                    <h5 class="text-muted font-weight-normal mb-0 w-100 text-truncate">Permutas Abertas</h5>
                                </div>
                                <div class="ml-auto mt-md-3 mt-lg-0">
                                    <span class="opacity-7 text-muted"><i data-feather="clipboard"></i></span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <hr style="border:none; border-left:none;width: 1%;">



                    <div class="card border-right">
                        <div class="card-body">
                            <div class="d-flex d-lg-flex d-md-block align-items-center">
                                <div>
                                    <div class="d-inline-flex align-items-center">
                                        <h2 class="text-dark mb-1 font-weight-medium" id="pegas">0</h2>
                                        <a href="permutas.php"class="badge bg-primary font-12 text-white font-weight-medium badge-pill ml-2 d-lg-block d-md-none" style="background-color: rgb(0, 47, 255) !important;">Visualizar</a>
                                    </div>
                                    <h5 class="text-muted font-weight-normal mb-0 w-100 text-truncate">Permutas Pega</h5>
                                </div>
                                <div class="ml-auto mt-md-3 mt-lg-0">
                                    <span class="opacity-7 text-muted"><i data-feather="thumbs-up"></i></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <hr style="border:none; border-left:none;width: 1%;">

                    <div class="card border-right">
                        <div class="card-body">
                            <div class="d-flex d-lg-flex d-md-block align-items-center">
                                <div>
                                    <div class="d-inline-flex align-items-center" >
                                        <h2 class="text-dark mb-1 font-weight-medium" id="expiradas">0</h2>
                                        <a href="permutas.php"class="badge bg-primary font-12 text-white font-weight-medium badge-pill ml-2 d-lg-block d-md-none" style="background-color: red !important;">Visualizar</a>
                                    </div>
                                    <h5 class="text-muted font-weight-normal mb-0 w-100 text-truncate">Permutas Expiradas</h5>
                                </div>
                                <div class="ml-auto mt-md-3 mt-lg-0">
                                    <span class="opacity-7 text-muted"><i data-feather="thumbs-down"></i></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- *************************************************************** -->
                <!-- End First Cards -->
                <!-- *************************************************************** -->

                <!-- *************************************************************** -->
                <!-- Start Top Leader Table -->
                <!-- *************************************************************** -->
                <div style="margin: 0.5rem;" class="progress" id="progress">
                	<div id="dynamic" class="progress-bar bg-success" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%">
                    	<span id="current-progress"></span>
                    </div>
				</div>
                
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="align-items-center mb-4">
                                    <h4 class="card-title">Permutas Disponíveis</h4>

                                </div>
                                <div class="table-responsive">
                                    <table class="table no-wrap v-middle mb-0">
                                        <thead>
                                            <tr class="border-0">
                                                <th class="border-0 font-14 font-weight-medium text-muted">Professor</th>
                                                <th class="border-0 font-14 font-weight-medium text-muted px-2">Curso</th>
                                                <th class="border-0 font-14 font-weight-medium text-muted">Disciplina</th>
                                                <th class="border-0 font-14 font-weight-medium text-muted text-center">Status</th>
                                                <th class="border-0 font-14 font-weight-medium text-muted text-center">Turma</th>
                                                <th class="border-0 font-14 font-weight-medium text-muted">Data Disponivel</th>
                                                <th class="border-0 font-14 font-weight-medium text-muted">Qtds.Aulas</th>
                                                <th class="border-0 font-14 font-weight-medium text-muted">Operação</th>
                                            </tr>
                                        </thead>
                                        <tbody id="tablePermutasDp">
                                        
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <script>



                </script>



                <!-- *************************************************************** -->
                <!-- Start Sales Charts Section -->
                <!-- *************************************************************** -->

                <!-- *************************************************************** -->
                <!-- End Location and Earnings Charts Section -->
                <!-- *************************************************************** -->

                <!-- *************************************************************** -->
                <!-- End Top Leader Table -->
                <!-- *************************************************************** -->
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            <footer class="footer text-center text-muted">
                <a href="https://www.ifsertao-pe.edu.br">IF-Sertão Pernambucano</a>.
            </footer>
            <!-- ============================================================== -->
            <!-- End footer -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->

    <script src="../assets/libs/popper.js/dist/umd/popper.min.js"></script>
    <script src="../assets/libs/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- apps -->
    <!-- apps -->
    <script src="../dist/js/app-style-switcher.js"></script>
    <script src="../dist/js/feather.min.js"></script>
    <script src="../assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js"></script>
    <script src="../dist/js/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
    <script src="../dist/js/custom.min.js"></script>
    <!--This page JavaScript -->
    <script src="../assets/extra-libs/c3/d3.min.js"></script>
    <script src="../assets/extra-libs/c3/c3.min.js"></script>
    <script src="../assets/libs/chartist/dist/chartist.min.js"></script>
    <script src="../assets/libs/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.min.js"></script>
    <script src="../assets/extra-libs/jvector/jquery-jvectormap-2.0.2.min.js"></script>
    <script src="../assets/extra-libs/jvector/jquery-jvectormap-world-mill-en.js"></script>
    <script src="../dist/js/pages/dashboards/dashboard1.min.js"></script>
    <script src="../dist/js/consultasIndex.js"></script>

    <?php
    if (isset($_SESSION['msg']['permutaCadSuccess'])) {
        echo $_SESSION['msg']['permutaCadSuccess'];
        unset($_SESSION['msg']['permutaCadSuccess']);
    }
    ?>

<script>
      feather.replace()
    </script>

</body>

</html>