<?php
class MODCuenta extends MODbase{
	
	function __construct(CTParametro $pParam){
		parent::__construct($pParam);
		
	}
	
	function listarCuenta(){
		//Definicion de variables para ejecucion del procedimiento
		$this->procedimiento='conta.ft_cuenta_sel';// nombre procedimiento almacenado
		$this->transaccion='CT_CUENTA_SEL';//nombre de la transaccion
		$this->tipo_procedimiento='SEL';//tipo de transaccion
		
	
		//Definicion de la lista del resultado del query
	
		//defino varialbes que se captran como retornod e la funcion
		$this->captura('id_cuenta','integer');
		$this->captura('codigo','varchar');
		$this->captura('nombre','varchar');
		$this->captura('estado_reg','varchar');
		$this->captura('fecha_reg','date');
		
		$this->armarConsulta();
		$this->ejecutarConsulta();

		return $this->respuesta;

	}
	
	function insertarCuenta(){
		
		//Definicion de variables para ejecucion del procedimiento
		$this->procedimiento='conta.ft_cuenta_ime';// nombre procedimiento almacenado
		$this->transaccion='CT_CUENTA_INS';//nombre de la transaccion
		$this->tipo_procedimiento='IME';//tipo de transaccion
		
		//Define los parametros para la funcion	
		$this->setParametro('codigo','codigo','varchar');
		$this->setParametro('nombre','nombre','varchar');
	
		//Ejecuta la instruccion
		$this->armarConsulta();
		
		$this->ejecutarConsulta();
		
		return $this->respuesta;
	}
	
	function modificarCuenta(){
	
		//Definicion de variables para ejecucion del procedimiento
		$this->procedimiento='conta.ft_cuenta_ime';// nombre procedimiento almacenado
		$this->transaccion='CT_CUENTA_MOD';//nombre de la transaccion
		$this->tipo_procedimiento='IME';//tipo de transaccion
		
		//Define los parametros para la funcion	
		$this->setParametro('id_cuenta','id_cuenta','integer');	
		$this->setParametro('codigo','codigo','varchar');
		$this->setParametro('nombre','nombre','varchar');
		
		//Ejecuta la instruccion
		$this->armarConsulta();
				
		$this->ejecutarConsulta();
		return $this->respuesta;
	}
	
	function eliminarCuenta(){
		//Definicion de variables para ejecucion del procedimientp
		$this->procedimiento='conta.ft_cuenta_ime';
		$this->transaccion='CT_CUENTA_ELI';
		$this->tipo_procedimiento='IME';
			
		//Define los parametros para la funcion
		$this->setParametro('id_cuenta','id_cuenta','integer');
		//Ejecuta la instruccion
		$this->armarConsulta();
				
		$this->ejecutarConsulta();
		return $this->respuesta;
	}
	
}
?>