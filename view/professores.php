<!doctype html>
<html lang="en">

<head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">
    <link rel="stylesheet" href="../adminProf/DataTables-1.10.20\css\dataTables.bootstrap4.css">
    <link rel="stylesheet" href="../adminProf/Buttons-1.6.1\css\buttons.bootstrap4.css">
    <link rel="stylesheet" href="../adminProf/css\index.css" />
    <link rel="stylesheet" href="../adminProf/seletorCursos\css\bootstrap4\tail.select-default.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>

</head>

<body>

    <script>
        (function validar() {
            'use strict';
            window.addEventListener('load', function () {
                var forms = document.getElementsByClassName('needs-validation');
                var validation = Array.prototype.filter.call(forms, function (form) {
                    form.addEventListener('submit', function (event) {
                        if (form.checkValidity() === false) {
                            event.preventDefault();
                            event.stopPropagation();
                        }
                        form.classList.add('was-validated');
                    }, false);
                });
            }, false);
        })();
    </script>

    <script>
        $(document).ready(function () {
            $('#tabela').DataTable();
        });</script>

    <div class="container-fluid">
        <!-- Modal pequeno -->
        <button style="margin-left: 148vh; margin-top: 5vh;" type="button" class="btn btn-success" data-toggle="modal"
            data-target=".bd-example-modal-md">Cadastrar</button>

        <div class="modal fade bd-example-modal-md" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-md">
                <div class="modal-content">

                    <div class="container-fluid">
                        <form class="needs-validation" novalidate>
                            <div class="form-row">
                                <div class="col-md-4 mb-3">
                                    <label for="validationCustom01">Primeiro nome</label>
                                    <input type="text" class="form-control" id="validationCustom01" placeholder="Nome"
                                     required>
                                    <div class="valid-feedback">
                                        Tudo certo!
                                    </div>

                                    <div class="invalid-feedback">
                                        Inserir Nome!
                                    </div>
                                </div>

                                <div class="col-md-8 mb-3">
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


                            </div>

                            <div class="form-row">
                                <div class="col-md-4 mb-3">
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
                            
                                <div class="col-md-4 mb-3">
                                    <label for="validationCustom01">de</label>
                                    <input style="text-align: center;" type="time" class="form-control" id="validationCustom01"
                                        required>
                            
                                    <div class="valid-feedback">
                                        Tudo certo!
                                    </div>

                                    <div class="invalid-feedback">
                                        Inserir Hora!
                                    </div>
                                </div>
                            
                                <div class="col-md-4 mb-3">
                                    <label for="validationCustom01">até</label>
                                    <input style="text-align: center;" type="time" class="form-control" id="validationCustom01"
                                        required>
                            
                                    <div class="valid-feedback">
                                        Tudo certo!
                                    </div>

                                    <div class="invalid-feedback">
                                        Inserir Hora!
                                    </div>
                            
                                </div>
                            </div>

                            
                            <div class="form-row">
                                <div class="col-md-12 mb-3">
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
                            </div>

                            <div style="text-align: center">
                                <button class="btn btn-success" onclick="validar()"
                                    type="submit">Salvar</button>
                            </div>                            
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <table id="tabela" class="table table-striped table-bordered" style="width:60%; margin-left: auto; margin-right: auto; margin-top: 5vh;" >
        <thead style="text-align: center;">
            <tr>
                <th>Nome</th>
                <th>Disciplinas</th>
                <th>Turnos</th>
                <th>Horários</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Lucas</td>
                <td>Sistemas para Internet</td>
                <td>Manhã e Tarde</td>
                <td>8:00 ás 10:00 e 14:00 ás 16:00</td>
            </tr>
           
        </tbody>
    </table>
</div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="../adminProf/DataTables-1.10.20\js\dataTables.bootstrap4.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="../adminProf/seletorCursos\js\tail.select-full.js"></script>
    <script>
      tail.select("#select2", {
  
  
  
      });
    </script>
  

</body>
</html>