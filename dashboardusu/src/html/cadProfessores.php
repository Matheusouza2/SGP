<?php session_start();
if (!isset($_SESSION['usuarioLogado'])) {
    header('location: ../../../index.php');
}

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

    <link href="../assets/extra-libs/c3/c3.min.css" rel="stylesheet">
    <link href="../assets/libs/chartist/dist/chartist.min.css" rel="stylesheet">
    <link href="../assets/extra-libs/jvector/jquery-jvectormap-2.0.2.css" rel="stylesheet" />
    <!-- Custom CSS -->
    <link href="../dist/css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/bootstrapselect/dist/css/bootstrap-select.css">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
    <!--CDN import JQueryMask -->
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>

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
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->

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
                        <h3 class="page-title text-truncate text-dark font-weight-medium mb-1">Cadastro de Professores:</h3>
                        <div class="d-flex align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb m-0 p-0">
                                    <li class="breadcrumb-item"><a href="index.html">Início</a>
                                    <li class="breadcrumb-item"><a href="instituicao.html">Cadastro de Professores</a>

                                    </li>
                                </ol>
                            </nav>
                        </div>
                    </div>

                    <div class="col-5 align-self-center">
                        <div class="customize-input float-right">
                            <span><a>Cadastrar Professor(a)</a></span>
                            <button type="button" class="btn btn-success btn-circle" data-toggle="modal"
                                data-target="#login-modal"><i class="fa fa-user-plus" aria-hidden="true"></i>

                            </button>
                            </select>
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
                                    <span><img class="mr-0" src="../assets/images/logomodal.svg" alt="" height="55">
                                </a>
                            </div>

                            <form action="" method="POST" class="pl-3 pr-3">
                                <input name="usuCad" type="hidden" value="<?=$_SESSION['usuarioLogado']['cpf']?>">
                               
                                <div class="form-group">
                                    <label for="instituicao">Instituição</label>
                                    
                                    <div class="input-group">
                                                
                                                <select class="custom-select" id="inputGroupSelect01">
                                                    <option selected>Escolher...</option>
                                                    <option value="1">One</option>
                                                </select>
                                            </div>
                                </div>

                                <div class="form-group">
                                    <label for="professor">Professor(a)</label>
                                    
                                    <div class="input-group">
                                                
                                                <select class="custom-select" id="inputGroupSelect01">
                                                    <option selected>Escolher...</option>
                                                    <option value="1">One</option>
                                                    <option value="2">Two</option>
                                                    <option value="3">Three</option>
                                                </select>
                                            </div>
                                </div>

                                <div class="form-group">
                                    <label for="curso">Curso</label>

                                    <div class="input-group">
                                
                                                <select class="custom-select" id="inputGroupSelect01">
                                                    <option selected>Escolher...</option>
                                                    <option value="1">One</option>
                                                    <option value="2">Two</option>
                                                    <option value="3">Three</option>
                                                </select>
                                            </div>
                                </div>

                                <div class="form-group">
                                    
                                    <label for="disciplina">Disciplinas</label>
                                    
                                    <div class="input-group">
                

                                                <select class="selectpicker" multiple title="Escolher..." data-style="btn-lucas" data-width="450px" data-live-search="true" data-selected-text-format="values">
                                              
                                                    <optgroup label="Sistemas para internet" data-max-options="">
                                                        <option data-tokens="1">Comércio Eletrônico</option>
                                                        <option  data-tokens="2">Sistemas Distribuidos</option>
                                                        <option  data-tokens="3">Gerência de Projetos</option>
                                                    </optgroup>
                                                    <optgroup label="informática" data-max-options="">
                                                        <option>1</option>
                                                        <option>2</option>
                                                        <option>3</option>
                                                    </optgroup>
                                                </select>
                                               
                                            </div>
                                </div>

                                <div class="form-group">
                                    <label for="turma">Turmas</label>

                                    <div class="input-group">
                                
                                                <select class="custom-select" id="inputGroupSelect01">
                                                    <option selected>Escolher...</option>
                                                    <option value="1">One</option>
                                                    <option value="2">Two</option>
                                                    <option value="3">Three</option>
                                                </select>
                                            </div>
                                </div>

                            

                                <div class="form-group text-center">
                                    <button class="btn btn-rounded btn-primary" id="btnCadastrarProfessor" type="submit">Cadastrar
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

                <div class="col-xl">
                    <div class="card">
                        <div class="card-body">

                            <ul class="nav nav-tabs mb-3">
                                <li class="nav-item">
                                    <a href="#sistemaparainternet" data-toggle="tab" aria-expanded="true" class="nav-link active">
                                        <i class="mdi mdi-home-variant d-lg-none d-block mr-1"></i>
                                        <span class="d-none d-lg-block">Sistema para Internet</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#curso2" data-toggle="tab" aria-expanded="false" class="nav-link ">
                                        <i class="mdi mdi-account-circle d-lg-none d-block mr-1"></i>
                                        <span class="d-none d-lg-block">Curso 2</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#curso3" data-toggle="tab" aria-expanded="false" class="nav-link">
                                        <i class="mdi mdi-settings-outline d-lg-none d-block mr-1"></i>
                                        <span class="d-none d-lg-block">Curso 3</span>
                                    </a>
                                </li>
                            </ul>

                            <div class="tab-content">
                                <div class="tab-pane show active" id="sistemaparainternet">

                                    <div style="margin-top: 3%;" class="table-responsive">
                                        <table class="table no-wrap v-middle mb-0">
                                            <thead>
                                                <tr class="border-0">
                                                    <th class="border-0 font-14 font-weight-medium text-muted">Professor(a)
                                                    <th class="border-0 font-14 font-weight-medium text-muted px-2">Curso
                                                    </th>
                                                    <th class="border-0 font-14 font-weight-medium text-muted">Disciplinas</th>

                                                    <th class="border-0 font-14 font-weight-medium text-muted text-center">
                                                        Turma
                                                    </th>

                                                    <th class="border-0 font-14 font-weight-medium text-muted text-center">
                                                        Operação:
                                                    </th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td class="border-top px-2 py-4">
                                                        <div class="d-flex no-block align-items-center">
                                                            <div class="mr-3"><img src="../assets/images/users/widget-table-pic1.jpg" alt="user" class="rounded-circle" width="45" height="45" /></div>
                                                            <div class="">
                                                                <h5 class="text-dark mb-0 font-16 font-weight-medium">Hanna
                                                                    Gover</h5>
                                                                <span class="text-muted font-14">hgover@gmail.com</span>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td class="border-top text-muted px-2 py-4 font-14">Sistemas para Internet</td>
                                                    <td class="border-top px-2 py-4">
                                                        <div class="popover-icon">
                                                            <a class="btn btn-primary rounded-circle btn-circle font-12" href="javascript:void(0)">CE</a>

                                                        </div>
                                                    </td>

                                                    <td class="border-top text-center font-weight-medium text-muted px-2 py-4">
                                                        5º Período Noturno
                                                    </td>

                                                    <td class="border-top text-center font-weight-medium text-muted px-2 py-4">
                                                        <button type="button" class="btn btn-danger btn-circle"><i class="ti-trash"></i>
                                                        </button>
                                                    </td>

                                                </tr>

                                            </tbody>
                                        </table>
                                    </div>

                                </div>
                                <div class="tab-pane" id="curso2">

                                </div>
                                <div class="tab-pane" id="curso3">

                                </div>
                            </div>

                        </div> <!-- end card-body-->
                    </div> <!-- end card-->
                </div>






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
    <script src="../dist/js/validaEconsultaCnpj.js"></script>
    <script src="../dist/js/buscarcep.js"></script>

    <!-- Seta as mascaras dos campos -->
    <script>
        $(document).ready(function() {
            $.get("../../../control/listarInstituicoes.php");
            $('#cnpj').mask('00.000.000/0000-00');
            $('#cep').mask('00000-000');
            $('#estado').mask('AA');
        });
    </script>
    <script src="../assets/bootstrapselect/dist/js/bootstrap-select.js"></script>



    <?php
    if (isset($_SESSION['msg']['erroLogin'])) {
        echo $_SESSION['msg']['erroLogin'];
        unset($_SESSION['msg']['erroLogin']);
    } else if (isset($_SESSION['msg']['usuCadSuccess'])) {
        echo $_SESSION['msg']['usuCadSuccess'];
        unset($_SESSION['msg']['usuCadSuccess']);
    }
    ?>

</body>

</html>