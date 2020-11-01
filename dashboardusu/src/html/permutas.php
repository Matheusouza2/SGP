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
                        <h3 class="page-title text-truncate text-dark font-weight-medium mb-1">Permutas:</h3>
                        <div class="d-flex align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb m-0 p-0">
                                    <li class="breadcrumb-item"><a href="index.html">Início</a>
                                    <li class="breadcrumb-item"><a href="instituicao.html">Permutas</a>

                                    </li>
                                </ol>
                            </nav>
                        </div>
    </div>

                </div>
            </div>

            


            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->

            <script>
                function del($id){
				Swal.fire({
					title: 'Deseja confirmar Permuta?',
					showDenyButton: true,
					showCancelButton: true,
					confirmButtonText: `Sim`,
					denyButtonText: `Não`,
				}).then((result) => {
					if (result.isConfirmed) {
						Swal.fire('Tudo certo, permuta pega com sucesso :)', '', 'success')
						$.getJSON('../../../control/controlPermuta.php?command=delete&id='+$id, function (dados){});
					    consultaTable();
					} else if (result.isDenied) {
						Swal.fire('', '', 'info')
					}
				})
			}
            </script>

            
            <div class="container-fluid">

                <div class="col-xl">
                    <div class="card">
                        <div class="card-body">

                            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">

                                <li class="nav-item">
                                    <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#permutas-todas" role="tab" aria-controls="pills-home" aria-selected="true">Todas as Permutas (0)</a>
                                </li>
                                <li class="nav-item">
                                    <a  class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#permutas-abertas" role="tab" aria-controls="pills-profile" aria-selected="false">Permutas Abertas (0)</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#permutas-pegas" role="tab" aria-controls="pills-contact" aria-selected="false">Permutas Pegas (0)</a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#permutas-canceladas" role="tab" aria-controls="pills-contact" aria-selected="false">Permutas Canceladas (0)</a>
                                </li>
                                
                            </ul>

                            <div class="tab-content" id="pills-tabContent">

                                <div class="tab-pane fade show active" id="permutas-todas" role="tabpanel" aria-labelledby="pills-home-tab">
                                
                           
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
                                                <th class="border-0 font-14 font-weight-medium text-muted">Operação</th>
                                            </tr>
                                        </thead>

                                        <tbody>

                                        <tr>
                                <td class="border-top px-2 py-4">
                                <div class="d-flex no-block align-items-center">
                                	<div class="mr-3"><img src="../assets/images/users/widget-table-pic1.jpg" alt="user" class="rounded-circle" width="45" height="45" /></div>
                                		<div class="">
                                			<h5 class="text-dark mb-0 font-16 font-weight-medium">User</h5>
                                			<span class="text-muted font-14"><i data-feather="message-circle"></i> <a href="https://api.whatsapp.com/send?phone=5587998211561&text=Ol%C3%A1%2C%20Desejo%20pegar%20sua%20permuta%20%3A)">Enviar Mensagem</a></span>
                                		</div>
                                </div>
                                </td>

                                <td class="border-top text-muted px-2 py-4 font-14">Sistemas para Internet</td>
                                <td class="border-top px-2 py-4">
                                <div class="popover-icon">
                                <a class="btn btn-primary rounded-circle btn-circle font-12" href="javascript:void(0)" title="">CE</a>
                                </div>
                                </td>
                                <td class="border-top text-center px-2 py-4"><i class="fa fa-circle text-success font-12" data-toggle="tooltip" data-placement="top" title="Disponivel"></i></td>
                                <td class="border-top text-center font-weight-medium text-muted px-2 py-4">5º Período</td>
								<td class="font-weight-medium text-dark border-top px-2 py-4">30/11/2020</td>

								
								
                                <td class="border-top px-2 py-4">
								<span>
                                    <button type="button" onclick="del('+obj.permuta_id+')" class="btn btn-success btn-circle">
                                <i data-feather="plus-square"></i>
                                </button> <span><a>Pegar Permuta</a></span> </span>
								</td>
								
								
                                </tr>


                                    
                                        </tbody>
                                    </table>
                                </div>


                            </div>
                      
                  
                                
                                
                                
                              

                                <div class="tab-pane fade" id="permutas-abertas" role="tabpanel" aria-labelledby="pills-profile-tab">


                                </div>

                                <div class="tab-pane fade" id="permutas-pegas" role="tabpanel" aria-labelledby="pills-contact-tab">


                                </div>

                                <div class="tab-pane fade" id="permutas-canceladas" role="tabpanel" aria-labelledby="pills-contact-tab">

                                </div>

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