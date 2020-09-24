<!doctype html>
<html lang="en">

<head>
  <title>SGP - Sistema de Gerenciamento de Permutas</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->

  <link rel="stylesheet" href="../assets/css/bootstrap.css" />

  <link rel="stylesheet" href="../seletorCursos\css\bootstrap4\tail.select-default.css">

  <link rel="stylesheet" href="../assets/css/cadusu.css" />

  <script src="https://use.fontawesome.com/0147a96ddf.js"></script>
  <link id="favicon" rel="shortcut icon" type="image/png" href="../assets/img/Programar Software - 2019.png">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
</head>

<body>

<div class="container-fluid">
  <section class="form-section">

    <form action="../control/controlUser.php" method="POST" class="needs-validation" novalidate>
    <input type="hidden" value="put" name="command" >
    <nav class="navbar navbar-light bg-light">
  <a class="navbar-brand" href="telaLogin.php">
    <img src='../assets/img/logocadastro.svg' width="20" height="30" class="d-inline-block align-top" alt="">
   <label>Voltar</label>
  </a>
</nav>

<hr>

      <div class="form-group">
        <label for="validationCustom01">Nome</label>
        <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome" required>

        <div class="invalid-feedback">
          Insira o nome!
        </div>
      </div>


      <div class="form-group">

        <div class="form-row">
          <div class="col-md-6 mb-3">
            <label for="validationCustom02">Endereço</label>
            <input type="text" class="form-control" id="endereco" name="endereco" placeholder="Endereço" required>
            <div class="invalid-feedback">
              Por favor, informe um Endereço.
            </div>
          </div>
          <div class="col-md-6 mb-6">
            <label for="validationCustom03">Bairro</label>
            <input type="text" class="form-control" id="bairro" name="bairro" placeholder="Bairro" required>
            <div class="invalid-feedback">
              Por favor, informe um bairro válido.
            </div>
          </div>
        </div>

        <div class="form-row">

          <div class="col-md-3 mb-3">
            <label for="validationCustom04">Número</label>
            <input type="number" class="form-control" id="numero" name="numero" placeholder="Nº" required>
            <div class="invalid-feedback">
              Por favor, informe um numero válido.
            </div>
          </div>

          <div class="col-md-3 mb-3">
            <label for="validationCustom05">Cidade</label>
            <input type="text" class="form-control" id="cidade" name="cidade" placeholder="Cidade" required>
            <div class="invalid-feedback">
              Por favor, informe uma cidade.
            </div>
          </div>


          <div class="col-md-3 mb-3">
            <label for="validationCustom05">Estado</label>
            <input type="text" class="form-control" id="estado" name="estado" placeholder="Estado" required>
            <div class="invalid-feedback">
              Por favor, informe um estado válido.
            </div>
          </div>
          <div class="col-md-3 mb-3">
            <label for="validationCustom06">CEP</label>
            <input type="text" class="form-control" id="cep" name="cep" placeholder="CEP" required>
            <div class="invalid-feedback">
              Por favor, informe um CEP válido.
            </div>
          </div>
        </div>
      </div>

      <div class="form-group">

        <div class="form-row">
          <div class="col-md-4 mb-4">
            <label for="validationCustom07">Telefone</label>
            <input type="text" class="form-control" id="telefone" name="telefone" placeholder="Telefone" required>
            <div class="valid-feedback">
              Tudo certo!
            </div>

            <div class="invalid-feedback">
              Por favor, informe um Telefone válido.
            </div>
          </div>
          <div class="col-md-8 mb-6">
            <label for="validationCustom08">Email</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="Email" required>
            <div class="valid-feedback">
              Tudo certo!
            </div>

            <div class="invalid-feedback">
              Por favor, informe um email válido.
            </div>
          </div>
        </div>

        <div class="form-row">
          <div class="col-md-4 mb-4">
            <label for="validationCustom09">CPF</label>
            <input type="text" class="form-control" id="cpf" name="cpf" placeholder="CPF" required>
            <div class="valid-feedback">
              Tudo certo!
            </div>

            <div class="invalid-feedback">
              Por favor, informe um CPF válido.
            </div>
          </div>
          <div class="col-md-8 mb-6">
            <label for="validationCustom10">RG</label>
            <input type="text" class="form-control" id="rg" name="rg" placeholder="RG" required>
            <div class="valid-feedback">
              Tudo certo!
            </div>

            <div class="invalid-feedback">
              Por favor, informe um RG válido.
            </div>
          </div>
        </div>

      </div>

      <!-- <div class="form-group">

      
        <label>Cursos Superiores:</label>
            <div class="row">
              <div class="col-md-12 mb-6">
                <select multiple id="select2" required>
                  <optgroup label="Sistemas para Internet">
                    <option selected>5º Periodo Noturno</option>
                    <option>3º Periodo Tarde</option>

                  </optgroup>
                  <optgroup label="Tecnologia em Alimentos">
                    <option selected>5º Periodo Noturno</option>
                    <option>3º Periodo Tarde</option>

                  </optgroup>

                </select>
              </div>
            </div>

         

       

      </div> -->




      <!-- <div class="custom-control custom-checkbox">
          <input type="checkbox" class="custom-control-input" id="customControlValidation1" name="cursoLeciona" value="sistemas para internet">
          <label class="custom-control-label" for="customControlValidation1" >Sistemas p/ Internet</label>
        </div>

        <div class="custom-control custom-checkbox">
          <input type="checkbox" class="custom-control-input form-control" id="customCheck2" name="cursoLeciona" value="fisica">
          <label class="custom-control-label" for="customCheck2">Fisica</label>
        </div>


        <div class="custom-control custom-checkbox">
          <input type="checkbox" class="custom-control-input form-control" id="customCheck3" name="cursoLeciona" value="alimentos">
          <label class="custom-control-label" for="customCheck3">Alimentos</label>
        </div>


        <div class="custom-control custom-checkbox">
          <input type="checkbox" class="custom-control-input form-control" id="customCheck4" name="cursoLeciona" value="edificaçoes">
          <label class="custom-control-label" for="customCheck4">Edificações</label>
        </div>


        <div class="custom-control custom-checkbox">
          <input type="checkbox" class="custom-control-input form-control" id="customCheck5" name="cursoLeciona" value=" agropecuaria">
          <label class="custom-control-label" for="customCheck5">Agropecuária</label>
        </div>

        <div class="custom-control custom-checkbox">
          <input type="checkbox" class="custom-control-input form-control" id="customCheck6" name="cursoLeciona" value="informatica">
          <label class="custom-control-label" for="customCheck6">Informática</label>
        </div> -->






      <div class="form-group">

        <label for="validationCustom11">Senha</label>
        <input type="password" class="form-control" id="senha" name="senha" placeholder="Senha" required>

        <div class="invalid-feedback">
          Por favor, informe a Senha.
        </div>
      </div>


      <div class="form-group">
        <label for="validationCustom11">Confirmar Senha</label>
        <input type="password" class="form-control" id="confirmarsenha" name="confirmarsenha" placeholder="Senha" required>

        <div class="invalid-feedback">
          Por favor, informe a Senha.
        </div>

      </div>
      <div style="text-align: center;">
        <button type="submit" onclick="validar()" class="btn btn-success">Cadastrar</button>
      </div>
     
    </form>
  </section>
  </div>

  

  <script>
    (function validar() {
      'use strict';
      window.addEventListener('load', function() {
        var forms = document.getElementsByClassName('needs-validation');
        var validation = Array.prototype.filter.call(forms, function(form) {
          form.addEventListener('submit', function(event) {
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



  <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <script src="../seletorCursos\js\tail.select-full.js"></script>
  <script>
    tail.select("#select2", {



    });
  </script>

</body>

</html>