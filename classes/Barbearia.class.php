<?php 
class Barbearia {

	#atributos
	private $indice;
	private $cliente;
	private $cadeira;
	private $fila;
	private $aviso;
	private $log;
	private $indlog=1;
	private $statusbarb;

	#imagens
	private $cadeiraVazia = "<img src='imagens/cadeiraVazia.jpg'>";
	private $cadeiraOcupada = "<img src='imagens/cadeiraOcupada.jpg'>";
	private $barbeiroCortando = "<img src='imagens/barbeiroCortando.png'>";
	private $barbeiroDormindo = "<img src='imagens/barbeiroDormindo.png'>";
	

	public function __construct($indice, $cliente, $cadeira, $fila, $statusbarb, $log){
		$this->indice = $indice;
		$this->cliente = $cliente;
		$this->cadeira = $cadeira;
		$this->fila = $fila;
		$this->statusbarb = $statusbarb;
		$this->log[0]=$log;
	}
	
	public function getAviso(){
		return $this->aviso;
	}
	
	public function getLog(){
		return $this->log;
	}
	
	public function setIndice($indice){
		$this->indice = $indice;
	}

	public function getIndice(){
		return $this->indice;
	}

	public function setCliente($cliente){
		$this->cliente = $cliente;
	}

	public function getCliente(){
		return $this->cliente;
	}

	public function setCadeira($cadeira){
		$this->cadeira = $cadeira;
	}

	public function getCadeira(){
		return $this->cadeira;
	}

	public function setFila($fila){
		$this->fila = $fila;
	}

	public function getFila($id){
		return $this->fila[$id];
	}

	public function verificarFilaVazia(){
		if ($this->indice == 0)
			return true;
		else
			return false;
	}

	public function stackOverflow(){
		if($this->indice == 5){
			$this->aviso = "Fila Cheia!!!";
			$this->log[$this->indlog] = "Não há espaço na fila para novo cliente!";
			return true;
		}else{
			$this->aviso = "";
			return false;
		}
	}

	public function stackUnderflow(){
		if($this->verificarFilaVazia()){
			return true;
		}else
			$this->aviso = "";
			return false;
	}

	public function statusBarbeiro($status){
		if(!$status || $this->cadeira!=0){
			return true;
		}else{
			return false;
		}
	}

	public function addCliente($over){
		if(!$over){
			$this->fila[$this->indice]=$this->cliente;
			$this->log[$this->indlog] = "Cliente ".$this->cliente." entrou na fila.";
			$this->indlog++;
			$this->indice++;
			$this->cliente++;
		}
	}

	public function atenderCliente($under){
		if($this->cadeira!=0){
			$this->log[$this->indlog] = "Cliente ".$this->cadeira." foi atendido.";
			$this->indlog++;
			$this->cadeira=0;
		}else if($under){
			$this->aviso = "Fila Vazia!!!";
			$this->log[$this->indlog] = "Não há clientes para serem atendidos!";
			$this->indlog++;
		}		
	}
	
	public function filaCadeira($id){
		echo $this->fila[$id];
	}
	
	public function exibirBarb(){
		if($this->statusbarb != $this->statusBarbeiro($this->verificarFilaVazia())){
			if($this->statusBarbeiro($this->verificarFilaVazia())==true){
				$this->log[$this->indlog]="Barbeiro Acordado!";
				$this->statusbarb = true;
				$this->indlog++;
			}
			else{
				$this->log[$this->indlog]="Barbeiro Dormindo!";
				$this->statusbarb=false;
				$this->indlog++;
			}
		} 	
		
	}

	public function semaforo($filavazia){
		if(!$filavazia && $this->cadeira==0){
			$this->cadeira=$this->fila[0];
			$this->indice--;
			for($i=0; $i<$this->indice; $i++){
				$this->fila[$i]=$this->fila[$i+1];
			}
			$this->fila[$this->indice]=0;
		}
	}	
}
?>