<?php include_once "objeto.php"; ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Barbearia</title>
	<link href="bootstrap-3.3.6/css/bootstrap.min.css" rel="stylesheet">
	<link href="css/style.css" rel="stylesheet">
	<script href="bootstrap-3.3.6/js/bootstrap.min.js"></script>
</head>

<body>
	
	<div class="container" style="margin-top: 20px">
		<div class="row">
			<div class="col-md-12">
				<?php if($bar->statusBarbeiro($bar->verificarFilaVazia())){ ?>
					<div class="col-md-2">
						<img align="center" class="statusb" src='imagens/barbOcupado.png'>
					</div>
				<?php }else{ ?>
					<div class="col-md-2">
						<img align="center" class="statusb" src='imagens/barbLivre.png'>
					</div>
				<?php } ?>
				
				<?php if($bar->getIndice()==0){ ?>
					<div class="col-md-10">
						<img align="center" class="statusf" src='imagens/filaVazia.png'>
					</div>
				<?php }elseif($bar->getIndice()==5){ ?>
					<div class="col-md-10">
						<img align="center" class="statusf" src='imagens/filacheia.png'>
					</div>
				<?php }else{ ?>
					<div class="col-md-10">
						<img align="center" class="statusf" src='imagens/havagas.png'>
					</div>
				<?php } ?>	
			</div>
		</div>
		
		<div class="row">
			<div class="col-md-12">
				<?php if($bar->statusBarbeiro($bar->verificarFilaVazia())){ ?>
					<div class="col-md-2">
						<img class="barb" src='imagens/barbeiroCortando.png'>
					</div>
				<?php }else{ ?>
					<div class="col-md-2">
						<img class="barb" src='imagens/barbeiroDormindo.png'>
					</div>
				<?php } ?>
				<?php for($i=0; $i<5; $i++){ ?>
					<div class="col-md-2">
						<?php 
							if($bar->getFila($i) == 0)
								echo "<img class='cliente' src='imagens/cadeiraVazia.jpg'>";
							else
								echo "<img class='cliente' src='imagens/cadeiraOcupada.jpg'>";
						?>
					</div>
				<?php } ?>
			</div>
		</div>
		
		<div class="row">
			<div class="col-md-12">
					<?php 
						if($bar->getCadeira() != 0){
							echo "<div class='col-md-2' style='text-align: center; margin-bottom: 37px'>";
							$cad = $bar->getCadeira();
							echo "<button class='btn btn-info' type='button'>
									Cliente <span class='badge'>$cad</span>
								  </button>";						
						}else{
							echo "<div style='margin-bottom: 70px'>";
						}
					?>
				</div>
				<?php for($i=0; $i<5; $i++){ ?>
					<div class="col-md-2" style="text-align: center">
						<?php 
							if($bar->getFila($i) != 0){
								$fila = $bar->getFila($i);
								echo "<button class='btn btn-info' type='button'>
										Cliente <span class='badge'>$fila</span>
									  </button>";
							}
						?>
					</div>
				<?php } ?>
				
			</div>
		</div>
		
		<div class="row" >
			<div class="col-md-12">
				<div class="col-md-2" style="text-align: center">
					<form method="post">
						<div class="btn-group-vertical" role="group" aria-label="...">
	  						<button type="submit" name="addCliente" class="btn btn-success">Add Cliente</button>
	  						<button type="submit" name="atenderCliente" class="btn btn-danger">Finalizar Atendimento</button>
	  						<button type="submit" name="reiniciar" class="btn btn-warning">Reiniciar</button>
						</div>
					</form>
					<span class="direitos">&copy; Copyright 2016<br>Adrysson & Joshua</span><br>
					<a href="http://github.com/adryssonlima/barbearia">GitHub</a>
				</div>	
				<div class="col-md-4">
					<div class="panel panel-success"> 
						<div class="panel-heading"> 
							<h3 class="panel-title">Aviso</h3> 
						</div> 
						<div class="panel-body" style="text-align: center; color: red"> 
							<?php
								$aviso = $bar->getAviso();
								echo "<font size='12px'>$aviso</font>";
							?>
						</div> 
					</div>
				</div>
				<div class="col-md-6">
					<div class="panel panel-primary"> 
						<div class="panel-heading"> 
							<h3 class="panel-title">Log</h3> 
						</div> 
						<div class="panel-body"> 
							<table class="table">
								<?php 
									$bar->exibirBarb();
									$log = $bar->getLog();
									$log = array_reverse($log);	
										foreach($log as $indice)
											 echo "<tr><td>$indice</td></tr>";
								?>
						  	</table>
						</div> 
					</div>
				</div>
			</div>
		</div>
	</div> <!-- fecha conteiner -->

</body>

</html>
