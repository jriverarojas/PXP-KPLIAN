<?php
class MODTipoObligacion extends MODbase{
	
	function __construct(CTParametro $pParam){
		parent::__construct($pParam);
		
	}
	
	function listarTipoObligacion(){
		//Definicion de variables para ejecucion del procedimiento
		$this->procedimiento='rhum.ft_tipo_obligacion_sel';// nombre procedimiento almacenado
		$this->transaccion='RH_TIPOBL_SEL';//nombre de la transaccion
		$this->tipo_procedimiento='SEL';//tipo de transaccion
		
	
		//Definicion de la lista del resultado del query
	
		//defino varialbes que se captran como retornod e la funcion
		$this->captura('id_tipo_obligacion','integer');
		$this->captura('codigo','varchar');
		$this->captura('nombre','varchar');
		$this->captura('estado_reg','varchar');
		$this->captura('id_usuario_reg','integer');
		$this->captura('fecha_reg','date');
		
		//Ejecuta la funcion
		$this->armarConsulta();
		//echo $this->getConsulta(); exit;
		$this->ejecutarConsulta();
		return $this->respuesta;

	}
	
	function insertarTipoObligacion(){
		
		//Definicion de variables para ejecucion del procedimiento
		$this->procedimiento='rhum.ft_tipo_obligacion_ime';// nombre procedimiento almacenado
		$this->transaccion='RH_TIPOBL_INS';//nombre de la transaccion
		$this->tipo_procedimiento='IME';//tipo de transaccion
		
	
		
		//Define los parametros para la funcion	
			
		$this->setParametro('codigo','codigo','varchar');
        $this->setParametro('nombre','nombre','varchar');
        
		//Ejecuta la instruccion
		$this->armarConsulta();
		
		$this->ejecutarConsulta();
		return $this->respuesta;
	}
	
	function modificarTipoObligacion(){
	
		//Definicion de variables para ejecucion del procedimiento
		$this->procedimiento='rhum.ft_tipo_obligacion_ime';// nombre procedimiento almacenado
		$this->transaccion='RH_TIPOBL_MOD';//nombre de la transaccion
		$this->tipo_procedimiento='IME';//tipo de transaccion
		
		//Define los parametros para la funcion	
		$this->setParametro('id_tipo_obligacion','id_tipo_obligacion','integer');	
		$this->setParametro('codigo','codigo','varchar');
        $this->setParametro('nombre','nombre','varchar');
        
		//Ejecuta la instruccion
		$this->armarConsulta();
				
		$this->ejecutarConsulta();
		return $this->respuesta;
	}
	
	function eliminarTipoObligacion(){
		//Definicion de variables para ejecucion del procedimientp
		$this->procedimiento='rhum.ft_tipo_obligacion_ime';
		$this->transaccion='RH_TIPOBL_ELI';
		$this->tipo_procedimiento='IME';
			
		//Define los parametros para la funcion
		$this->setParametro('id_tipo_obligacion','id_tipo_obligacion','integer');
		//Ejecuta la instruccion
		$this->armarConsulta();
				
		$this->ejecutarConsulta();
		return $this->respuesta;
	}
	
}
?>