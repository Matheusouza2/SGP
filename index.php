<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />


    <title>SGP - Sistema de Gerenciamento de Permutas</title>
    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/index.css" />
    <link id="favicon" rel="shortcut icon" type="image/png" href="assets/img/Programar Software - 2019.png">

  
  </head>
  <body>
    <section class="form-section">
      <img src="assets/img/logosvgbranco.svg" width="160">
     

      <form action=".php" method="POST" class="needs-validation" novalidate>
        <div class="form">
          <div class="col-lg-15 mb-10">
            <label for="validationCustom01">Email</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="Email"required>
            <div class="valid-feedback">
              Tudo certo!
            </div>
            <div class="invalid-feedback">
              Email Invalido!
            </div>
          </div>

          <div class="col-lg-15 mb-10">
            <label for="validationCustom02">Senha</label>
            <input type="password" class="form-control" id="validationCustom02" name="senha" placeholder="Senha" required>
    
            <div class="invalid-feedback">
              Inserir Senha!
            </div>
          </div>         
        </div>
        <div style="text-align: center; padding-top: 8%;">
        <button class="btn btn-success" onclick="validar()" name="login" type="submit">Login</button>
      </div>

      <div style="text-align: center;">
      <a>Ainda não tem conta? <a href="cadusu.html" style="color: green;">Cadastre-se</a></a>
    </div>
      </form>
    </section>

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
    <script type="text/javascript"
        src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
    <script src="assets/telefone.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="assets/js/script.js"></script>
  </body>
</html>
