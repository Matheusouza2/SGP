<?php session_start();
if (!isset($_SESSION['usuarioLogado'])) {
    header('location: /sgp/index.php ');
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
    <!-- Custom CSS -->
    <script src="//code.jquery.com/jquery-1.10.2.js"></script>

    <link href="../assets/extra-libs/c3/c3.min.css" rel="stylesheet">
    <link href="../assets/libs/chartist/dist/chartist.min.css" rel="stylesheet">
    <link href="../assets/extra-libs/jvector/jquery-jvectormap-2.0.2.css" rel="stylesheet" />
    <!-- Custom CSS -->
    <link href="../dist/css/style.css" rel="stylesheet">
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
    <div id="main-wrapper" data-theme="light" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed" data-boxed-layout="full">
        <div id="Menus"></div><br />
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
                        <h3 class="page-title text-truncate text-dark font-weight-medium mb-1">Instituição:</h3>
                        <div class="d-flex align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb m-0 p-0">
                                    <li class="breadcrumb-item"><a href="index.html">Início</a>
                                    <li class="breadcrumb-item"><a href="instituicao.html">Instituição</a>

                                    </li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                    <div class="col-5 align-self-center">
                        <div class="customize-input float-right">
                            <span><a>Cadastrar</a></span>
                            <button type="button" class="btn btn-success btn-circle" data-toggle="modal"
                                data-target="#login-modal"> <i class="fas fa-plus-circle"></i>

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

                            <form action="/sgp/control/cadInstituicao.php" method="POST" class="pl-3 pr-3">
                                <input name="usuCad" type="hidden" value="<?=$_SESSION['usuarioLogado']['cpf']?>">
                                <div class="form-group">
                                    <label for="cnpj">CNPJ</label>
                                    <input class="form-control" type="text" id="cnpj" name="cnpj" required="true"
                                        placeholder="00.000.000/0000-00" data-mask="00/00/0000">
                                </div>

                                <div class="form-group">
                                    <label for="nome">Razão Social</label>
                                    <input class="form-control" type="text" required="true" name="nome" id="nome"
                                        placeholder="Nome">
                                </div>

                                <div class="form-group">
                                    <label for="nome">Nome Fantasia</label>
                                    <input class="form-control" type="text" required="true" name="fantasia" id="fantasia"
                                        placeholder="Nome Fantasia">
                                </div>

                                <div class="form-group">
                                    <label for="endereco">CEP</label>
                                    <input class="form-control" type="text" required="true" name="cep" id="cep"
                                        placeholder="00000-000">
                                </div>

                                <div class="form-group">
                                    <label for="endereco">Endereço</label>
                                    <input class="form-control" type="text" required="true" name="logradouro" id="logradouro"
                                        placeholder="R. ou Av., nº Ex. Rua A, 123">
                                </div>

                                <div class="form-group">
                                    <label for="endereco">Bairro</label>
                                    <input class="form-control" type="text" required="true" name="bairro" id="bairro"
                                    placeholder="bairro">
                                </div>

                                <div class="form-group">
                                    <label for="endereco">Cidade</label>
                                    <input class="form-control" type="text" required="true" name="cidade" id="cidade"
                                    placeholder="Logradouro">
                                </div>

                                <div class="form-group">
                                    <label for="endereco">Estado</label>
                                    <input class="form-control" type="text" required="true" name="uf" id="estado"
                                    placeholder="Estado">
                                </div>

                                <div class="form-group">
                                    <label for="contato">Contato</label>
                                    <input class="form-control" type="text" required="true" name="contato" id="contato"
                                        placeholder="(xx) xxxx-xxxx">
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
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">

                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Inst. Registradas</h4>
                            <h6 class="card-subtitle">Descrição</h6>
                        </div>
                        <div class="table-responsive">
                            <table class="table">
                                <thead class="thead-light">
                                    <tr>
                                        <th scope="col">CNPJ</th>
                                        <th scope="col">Nome</th>
                                        <th scope="col">Endereço</th>
                                        <th scope="col">Contato</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        foreach($_SESSION['inst'] as $res){
                                    ?>

                                    <tr>
                                        <td><?=$res['cnpj']?></td>
                                        <td><?=$res['nome_fantasia']?></td>
                                        <td><?=$res['endereco']?></td>
                                        <td><?=$res['contato']?></td>

                                    </tr>
                                        <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
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
    <script>
    $("#Menus").load("Menus.php");
    </script>
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
        $(document).ready(function(){
            $.get("/sgp/control/listarInstituicoes.php");
            $('#cnpj').mask('00.000.000/0000-00');
            $('#cep').mask('00000-000');
            $('#estado').mask('AA');
        });
    </script>



<?php
    if(isset($_SESSION['msg']['erroLogin'])){
        echo $_SESSION['msg']['erroLogin'];
        unset($_SESSION['msg']['erroLogin']);

    }else if(isset($_SESSION['msg']['usuCadSuccess'])){
        echo $_SESSION['msg']['usuCadSuccess'];
        unset($_SESSION['msg']['usuCadSuccess']);
}
?>

</body>

</html>
