<?php
include_once 'classes/Barbearia.class.php';
session_start();

	if(isset($_POST['reiniciar'])){
		unset($_SESSION['bar']);
	}
		
	if(isset($_SESSION['bar'])){
		$bar = $_SESSION['bar'];
	}else{
		#imagens
		$cadeiraVazia = "<img src='imagens/cadeiraVazia.jpg'>";
		$cadeiraOcupada = "<img src='imagens/cadeiraOcupada.jpg'>";
		$barbeiroCortando = "<img src='imagens/barbeiroCortando.png'>";
		$barbeiroDormindo = "<img src='imagens/barbeiroDormindo.png'>";

		$cadeira = 0;
		$fila = array(0, 0, 0, 0, 0);
		

		$_SESSION['bar'] = new Barbearia(0, 1, $cadeira, $fila, false, "Barbeiro Dormindo!");
		$bar = $_SESSION['bar'];
	}
	
	if(isset($_POST['addCliente'])){
		$bar->addCliente($bar->stackOverflow());
		$bar->semaforo($bar->verificarFilaVazia());
	}

	if(isset($_POST['atenderCliente'])){
		$bar->atenderCliente($bar->stackUnderflow());
		$bar->semaforo($bar->verificarFilaVazia());
	}

?>
