@@ -1,210 +0,0 @@
<!doctype html>
<html lang="pt-br">
<head>
<title>Title</title>
<!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport"
	content="width=device-width, initial-scale=1, shrink-to-fit=no">

<!-- Bootstrap CSS -->
<link rel="stylesheet"
	href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="../assets/css/bootstrap.css">
</head>
<body>

	<nav class="navbar navbar-expand-sm navbar-light bg-transparent fixe">
		<nav class="navbar navbar-light bg-faded">
			<a class="navbar-brand" href="#"> <img
				src="imgs/logooriginal.svg" width="140" alt="">
			</a>
		</nav>

		<!-- botao menor resolução

      <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="collapsibleNavId"
          aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
      </button> -->

		<div class="collapse navbar-collapse " id="collapsibleNavId">
			<ul class="navbar-nav mr-auto  mt-2 mt-lg-0">
				<li class="nav-item active"><a class="nav-link" href="#">Inicio
						<span class="sr-only">(current)</span>
				</a></li>
				<li class="nav-item"><a class="nav-link" href="#">Resumo</a></li>
				<li class="nav-item dropdown"><a
					class="nav-link dropdown-toggle" href="#" id="dropdownId"
					data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Opções</a>
					<div class="dropdown-menu" aria-labelledby="dropdownId">
						<a class="dropdown-item" href="#">Ação 1</a> <a
							class="dropdown-item" href="#">Ação 2</a>
					</div></li>
			</ul>

			<span> <i style="margin-right: 15%;" class="material-icons">
					account_circle</i>
			</span>

		</div>
	</nav>

	<!-- Button trigger modal -->
	<button style="float: right; margin-right: 2%;" type="button"
		class="btn btn-outline-success" data-toggle="modal"
		data-target="#modelId">Criar permuta +</button>

	<!-- Modal -->
	<div class="modal fade" id="modelId" tabindex="-1" role="dialog"
		aria-labelledby="modelTitleId" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Criar Permuta</h5>
					<button type="button" class="close" data-dismiss="modal"
						aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="container-fluid">
						<div class="form-group">
							<label for=""> <strong>Título</strong></label> <input type="text"
								name="" id="cabecalho" class="form-control" placeholder=""
								aria-describedby="helpId">


							<textarea style="margin-top: 5%;" name="" id="descricao"
								cols="59" rows="5" placeholder="Descrição..."></textarea>


							<div class="container">
								<div class="row">
									<div class="col-sm-6">
										<div class="form-group">
											<label for=""></label> <input type="date"
												class="form-control" name="" id="DataInicio"
												aria-describedby="helpId"> <small id="helpId"
												class="form-text text-muted">Data de Inicio</small>
										</div>
									</div>
									<div class="col-sm-6">
										<div class="form-group">
											<label for=""></label> <input type="date"
												class="form-control" name="" id="DataFinal"
												aria-describedby="helpId"> <small id="helpId"
												class="form-text text-muted">Data Final</small>
										</div>
									</div>

								</div>
							</div>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
							<button id="buttonModal" type="button" class="btn btn-success"
								data-dismiss="modal">Criar</button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div style="margin-top: 5%;" class="container">


		<div class="row">

			<div id="gridlateral" style="padding: 3%;"
				class="col-2 text-center border  black">

				<label>Permutas Criadas:</label>
				<h1 id="permutCriada" style="color: green;">0</h1>

				<label>Permutas Canceladas:</label>
				<h1 style="color: red;">0</h1>

			</div>

			<div id="gridcentral" style="padding: 3%"
				class="col-7 ml-4 align-content-center text-center border black">
				<div id="card"></div>
			</div>


			<div id="gridlateral" style="padding: 3%;"
				class="col-2 ml-4 text-center border  black">

				<label>Permutas Desejadas:</label>
				<h1 style="color: blue;">0</h1>

				<label>Permutas Solicitadas:</label>
				<h1 style="color: orange;">0</h1>
			</div>


		</div>

	</div>


	<script type="text/javascript">
		document.getElementById("buttonModal").onclick = function clone() {
			
			var cabecalho = document.getElementById("cabecalho").value;
			var descricao = document.getElementById("descricao").value;
			var dataInicio = document.getElementById("DataInicio").value;
			var dataFinal = document.getElementById("DataFinal").value;

			var permuta = document.getElementById("permutCriada");
			
			var container = document.getElementById("card");
			container.className = "row";
			
			// conta quantos elementos com classe linha existem
			// isso vai servir para montar o label e o id dos novos elementos
			var i = document.querySelectorAll(".linha").length;
			
			permuta.textContent = i+1;
			
			var divCard = document.createElement("div");
			var div1 = document.createElement("div");
			var label = document.createElement("label");
			var label1 = document.createElement("label");
			var label2 = document.createElement("label");
			var label3 = document.createElement("label");
			
			divCard.className = "col-sm-4";
			div1.className = "linha card border-success";
			label.textContent = "Titulo: "+cabecalho;
			label1.textContent = "Descrição: "+descricao;
			label2.textContent = "Data Inicial: "+dataInicio;
			label3.textContent = "Data Final: "+dataFinal;
			container.appendChild(divCard);
			divCard.appendChild(div1);
			div1.appendChild(label);
			div1.appendChild(label1);
			div1.appendChild(label2);
			div1.appendChild(label3);
		}
	</script>



	<!-- Optional JavaScript -->
	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
		integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
		crossorigin="anonymous"></script>
	<script
		src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
		integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
		crossorigin="anonymous"></script>
	<script
		src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
		integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
		crossorigin="anonymous"></script>
</body>
</html>