<?php
require ("./headers.php");

session_start();

if(!$_SESSION['user']){
  header('Location: login.php');
}


?>
<div class="container">
<nav class="mt-1 bg-dark p-2">
  <div class="row">
  	<div class="col-0 col-md-10"></div>
  	<div class="col-12 col-md-2">
  		 <button class="btn btn-danger text-right" type="button" onclick="destroySessionC()">
       	cerrar session
       </button> 

  	</div>
  </div>

</nav>
	<div class="row mt-3">
		<div class="col-6">
			<h5 class="lead-5">Datos de la aseguradora</h5>
			<ul class="list-group">
				<li class="list-group-item">Nombre : <?php echo  $_SESSION['user']  ?> </li>
				
			</ul>
		</div>
		<div class="col-6">
			<h5 class="lead-5">Mis Pólizas</h5>
		</div>
	</div>
	<hr>
	<div class="row">
		<div class="col-6">
			<button class="btn btn-info" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
			<i class="fas fa-plus-circle"></i>
			siniestro
			</button>
		</div>
		<div class="col-6">
			<button class="btn btn-secondary" onclick="viewTable()">Historial de siniestros</button>
		</div>
	</div>


	<div class="row mt-5" style="display:none" id="dtable">
		<div class="table-responsive scroll" >
			<table class="table" id="table">
				<thead>
					<tr>
						<th scope="col">#</th>
						<th scope="col">Cliente</th>
						<th scope="col">Fecha</th>
						<th scope="col">Hora</th>
						<th scope="col">Lugar</th>
						<th scope="col">Daño</th>

					</tr>
				</thead>
				<tbody id="tbody">
					
				</tbody>
			</table>
		</div>
	</div>
</div>
<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="staticBackdropLabel">Nuevo siniestro</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<form id="formsini">
					<div class="col-12">
						<textarea class="form-control" id="cliente" placeholder="datos del cliente"></textarea>
					</div>
					<div class="col-12 mt-2">
						<input type="date" class="form-control" name="" id="date">
					</div>
					<div class="col-12 mt-2">
						<input type="time" class="form-control" name="" id="hour">
					</div>
					<div class="col-12 mt-2">
						<input type="text" class="form-control" name="" id="place" placeholder="lugar">
					</div>
					<div class="col-12 mt-2">
						<textarea class="form-control" id="damage" placeholder="daños"></textarea>
					</div>
					<button type="button" class="btn btn-primary mt-2" onclick="registerSiniestro()">Registrar</button>
				</form>
			</div>
			
		</div>
	</div>
</div>
<script type="text/javascript" src="./assets/js/siniestro.js"></script>