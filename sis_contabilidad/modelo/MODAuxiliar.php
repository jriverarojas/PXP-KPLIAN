<?php
class MODAuxiliar extends MODbase{
	
	function __construct(CTParametro $pParam){
		parent::__construct($pParam);
		
	}
	
	function listarAuxiliar(){
		//Definicion de variables para ejecucion del procedimiento
		$this->procedimiento='conta.ft_auxiliar_sel';// nombre procedimiento almacenado
		$this->transaccion='CT_AUXILI_SEL';//nombre de la transaccion
		$this->tipo_procedimiento='SEL';//tipo de transaccion
		
	
		//Definicion de la lista del resultado del query
	
		//defino varialbes que se captran como retornod e la funcion
		$this->captura('id_auxiliar','integer');
		$this->captura('codigo','varchar');
	    $this->captura('nombre','varchar');
    	$this->captura('estado_reg','varchar');
		$this->captura('fecha_reg','date');
		//Ejecuta la funcion
		$this->armarConsulta();
		
		$this->ejecutarConsulta();
		return $this->respuesta;

	}
	
	function insertarAuxiliar(){
		
		//Definicion de variables para ejecucion del procedimiento
		$this->procedimiento='conta.ft_auxiliar_ime';// nombre procedimiento almacenado
		$this->transaccion='CT_AUXILI_INS';//nombre de la transaccion
		$this->tipo_procedimiento='IME';//tipo de transaccion
		
		//Define los parametros para la funcion	
		$this->setParametro('codigo','codigo','varchar');
		$this->setParametro('nombre','nombre','varchar');

		//Ejecuta la instruccion
		$this->armarConsulta();
		
		$this->ejecutarConsulta();
		//echo $this->getConsulta();
		return $this->respuesta;
	}
	
	function modificarAuxiliar(){
	
		//Definicion de variables para ejecucion del procedimiento
		$this->procedimiento='conta.ft_auxiliar_ime';// nombre procedimiento almacenado
		$this->transaccion='CT_AUXILI_MOD';//nombre de la transaccion
		$this->tipo_procedimiento='IME';//tipo de transaccion
		
		//Define los parametros para la funcion	
		$this->setParametro('id_auxiliar','id_auxiliar','integer');	
		$this->setParametro('codigo','codigo','varchar');
		$this->setParametro('nombre','nombre','varchar');
		//$this->setParametro('estado_reg','estado_reg','varchar');
		//$this->setParametro('fecha_reg','fecha_reg','date');
		
		//Ejecuta la instruccion
		$this->armarConsulta();
				
		$this->ejecutarConsulta();
		return $this->respuesta;
	}
	
	function eliminarAuxiliar(){
		//Definicion de variables para ejecucion del procedimientp
		$this->procedimiento='conta.ft_auxiliar_ime';
		$this->transaccion='CT_AUXILI_ELI';
		$this->tipo_procedimiento='IME';
			
		//Define los parametros para la funcion
		$this->setParametro('id_auxiliar','id_auxiliar','integer');
		//Ejecuta la instruccion
		$this->armarConsulta();
				
		$this->ejecutarConsulta();
		return $this->respuesta;
	}
	
}
?>