<?php
/***
 Nombre: 	MODSubsistema.php
 Proposito: Clase de Modelo, que contiene la definicion y llamada a funciones especificas relacionadas 
 a la tabla tsubsistema del esquema SEGU
 Autor:		Kplian
 Fecha:		04/06/2011
 */ 
class MODSubsistema extends MODbase{
	
	function __construct(CTParametro $pParam){
		parent::__construct($pParam);
		
	}
	
	function listarSubsistema(){
		//Definicion de variables para ejecucion del procedimiento
		$this->procedimiento='segu.ft_subsistema_sel';// nombre procedimiento almacenado
		$this->transaccion='SEG_SUBSIS_SEL';//nombre de la transaccion
		$this->tipo_procedimiento='SEL';//tipo de transaccion
		//Definicion de la lista del resultado del query
		//defino varialbes que se captran como retornod e la funcion
		$this->captura('id_subsistema','integer');
		$this->captura('codigo','varchar');
		$this->captura('prefijo','varchar');
		$this->captura('nombre','varchar');
		$this->captura('fecha_reg','date');
		$this->captura('estado_reg','estado_reg');
		$this->captura('nombre_carpeta','varchar');
		//Ejecuta la funcion
		$this->armarConsulta();
		$this->ejecutarConsulta();
    	return $this->respuesta;

	}
	
	function insertarSubsistema(){
		//Definicion de variables para ejecucion del procedimiento
		$this->procedimiento='segu.ft_subsistema_ime';// nombre procedimiento almacenado
		$this->transaccion='SEG_SUBSIS_INS';//nombre de la transaccion
		$this->tipo_procedimiento='IME';//tipo de transaccion
		//Define los parametros para la funcion	
		$this->setParametro('codigo','codigo','varchar');
		$this->setParametro('prefijo','prefijo','varchar');
		$this->setParametro('nombre','nombre','varchar');
		$this->setParametro('nombre_carpeta','nombre_carpeta','varchar');
	
    	//Ejecuta la instruccion
		$this->armarConsulta();
		$this->ejecutarConsulta();
		return $this->respuesta;
	}
	
	function modificarSubsistema(){
	
		//Definicion de variables para ejecucion del procedimiento
		$this->procedimiento='segu.ft_subsistema_ime';// nombre procedimiento almacenado
		$this->transaccion='SEG_SUBSIS_MOD';//nombre de la transaccion
		$this->tipo_procedimiento='IME';//tipo de transaccion
		
		//Define los parametros para la funcion	
		$this->setParametro('id_subsistema','id_subsistema','integer');
		$this->setParametro('codigo','codigo','varchar');
		$this->setParametro('prefijo','prefijo','varchar');
		$this->setParametro('nombre','nombre','varchar');
		$this->setParametro('nombre_carpeta','nombre_carpeta','varchar');
		
		//Ejecuta la instruccion
		$this->armarConsulta();
				
		$this->ejecutarConsulta();
		return $this->respuesta;
	}
	
	function eliminarSubsistema(){
		//Definicion de variables para ejecucion del procedimientp
		$this->procedimiento='segu.ft_subsistema_ime';
		$this->transaccion='SEG_SUBSIS_ELI';
		$this->tipo_procedimiento='IME';
			
		//Define los parametros para la funcion
		$this->setParametro('id_subsistema','id_subsistema','integer');
		//Ejecuta la instruccion
		$this->armarConsulta();
				
		$this->ejecutarConsulta();
		return $this->respuesta;
	}
	
}
?>