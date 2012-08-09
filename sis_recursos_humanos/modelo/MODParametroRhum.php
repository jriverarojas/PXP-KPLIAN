<?php
class MODParametroRhum extends MODbase{
	
	function __construct(CTParametro $pParam){
		parent::__construct($pParam);
		
	}
	
	function listarParametroRhum(){
		//Definicion de variables para ejecucion del procedimiento
		$this->procedimiento='rhum.ft_parametro_rhum_sel';// nombre procedimiento almacenado
		$this->transaccion='RH_PARRHH_SEL';//nombre de la transaccion
		$this->tipo_procedimiento='SEL';//tipo de transaccion
		
	
		//Definicion de la lista del resultado del query
	
		//defino varialbes que se captran como retornod e la funcion
		$this->captura('id_parametro_rhum','integer');
		$this->captura('salario_min_nal','numeric');
		$this->captura('id_gestion','integer');
		$this->captura('id_moneda_sal_min_nal','integer');
		$this->captura('estado_reg','varchar');
		$this->captura('id_usuario_reg','integer');
		$this->captura('fecha_reg','date');
		$this->captura('id_usuario_mod','integer');
		$this->captura('fecha_mod','date');
		$this->captura('gestion','integer');
		$this->captura('moneda','varchar');
		
		//Ejecuta la funcion
		$this->armarConsulta();
		
		
		$this->ejecutarConsulta();

		return $this->respuesta;

	}
	
	function insertarParametroRhum(){
		
		//Definicion de variables para ejecucion del procedimiento
		$this->procedimiento='rhum.ft_parametro_rhum_ime';// nombre procedimiento almacenado
		$this->transaccion='RH_PARRHH_INS';//nombre de la transaccion
		$this->tipo_procedimiento='IME';//tipo de transaccion
		
	
		
		//Define los parametros para la funcion	
			
		$this->setParametro('salario_min_nal','salario_min_nal','numeric');
		$this->setParametro('id_gestion','id_gestion','integer');
		$this->setParametro('id_moneda_sal_min_nal','id_moneda','integer');
		//$this->setParametro('estado_reg','estado_reg','varchar');
		//$this->setParametro('id_usuario_reg','id_usuario_reg','integer');
		//$this->setParametro('fecha_reg','fecha_reg','date');
		//$this->setParametro('id_usuario_mod','id_usuario_mod','integer');
		//$this->setParametro('fecha_mod','fecha_mod','date');
		//$this->setParametro('gestion','gestion','integer');
		//$this->setParametro('moneda','moneda','varchar');
		
		//Ejecuta la instruccion
		$this->armarConsulta();
		//echo $this->getConsulta(); exit;
		$this->ejecutarConsulta();
		return $this->respuesta;
	}
	
	function modificarParametroRhum(){
	
		//Definicion de variables para ejecucion del procedimiento
		$this->procedimiento='rhum.ft_parametro_rhum_ime';// nombre procedimiento almacenado
		$this->transaccion='RH_PARRHH_MOD';//nombre de la transaccion
		$this->tipo_procedimiento='IME';//tipo de transaccion
		
		//Define los parametros para la funcion	
		$this->setParametro('id_parametro_rhum','id_parametro_rhum','integer');	
		$this->setParametro('salario_min_nal','salario_min_nal','varchar');
		$this->setParametro('id_gestion','id_gestion','integer');
		$this->setParametro('id_moneda_sal_min_nal','id_moneda_sal_min_nal','integer');
		$this->setParametro('estado_reg','estado_reg','varchar');
		$this->setParametro('id_usuario_reg','id_usuario_reg','integer');
		$this->setParametro('fecha_reg','fecha_reg','date');
		$this->setParametro('id_usuario_mod','id_usuario_mod','integer');
		$this->setParametro('fecha_mod','fecha_mod','date');
		$this->setParametro('gestion','gestion','integer');
		$this->setParametro('moneda','moneda','varchar');
		//Ejecuta la instruccion
		$this->armarConsulta();
				
		$this->ejecutarConsulta();
		return $this->respuesta;
	}
	
	function eliminarParametroRhum(){
		//Definicion de variables para ejecucion del procedimientp
		$this->procedimiento='rhum.ft_parametro_rhum_ime';
		$this->transaccion='Rh_PARRHH_ELI';
		$this->tipo_procedimiento='IME';
			
		//Define los parametros para la funcion
		$this->setParametro('id_parametro_rhum','id_parametro_rhum','integer');
		//Ejecuta la instruccion
		$this->armarConsulta();
				
		$this->ejecutarConsulta();
		return $this->respuesta;
	}
	
}
?>