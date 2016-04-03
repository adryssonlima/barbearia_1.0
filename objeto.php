<?php
include_once 'classes/Barbearia.class.php';
session_start();

	if(isset($_POST['reiniciar'])){
		unset($_SESSION['bar']);
	}
		
	if(isset($_SESSION['bar'])){
		$_SESSION['bar'];
	}else{

		#https://www.oficinadanet.com.br/artigo/php/ajax_envio_de_formulario_sem_refresh_com_jqueryphp
		#http://www.arquivodecodigos.net/dicas/php-como-colocar-e-recuperar-objetos-em-sessoes-php-2217.html
		
		#imagens
		$cadeiraVazia = "<img src='imagens/cadeiraVazia.jpg'>";
		$cadeiraOcupada = "<img src='imagens/cadeiraOcupada.jpg'>";
		$barbeiroCortando = "<img src='imagens/barbeiroCortando.png'>";
		$barbeiroDormindo = "<img src='imagens/barbeiroDormindo.png'>";

		$cadeira = 0;
		$fila = array(0, 0, 0, 0, 0);
		

		$_SESSION['bar'] = new Barbearia(0, 1, $cadeira, $fila, false, "Barbeiro Dormindo!");
	
	}
	
	if(isset($_POST['addCliente'])){
		$_SESSION['bar']->addCliente($_SESSION['bar']->stackOverflow());
		$_SESSION['bar']->semaforo($_SESSION['bar']->verificarFilaVazia());
	}

	if(isset($_POST['atenderCliente'])){
		$_SESSION['bar']->atenderCliente($_SESSION['bar']->stackUnderflow());
		$_SESSION['bar']->semaforo($_SESSION['bar']->verificarFilaVazia());
	}

?>