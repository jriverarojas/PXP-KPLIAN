<?php
/**
*@package pXP
*@file gen-MODActivoFijoUltimoRegistro.php
*@author  (herman)
*@date 02-02-2012 02:57:40
*@description Clase que envia los parametros requeridos a la Base de datos para la ejecucion de las funciones, y que recibe la respuesta del resultado de la ejecucion de las mismas
*/

class MODActivoFijoUltimoRegistro extends MODbase{
	
	function __construct(CTParametro $pParam){
		parent::__construct($pParam);
	}
			
	function listarActivoFijoUltimoRegistro(){
		//Definicion de variables para ejecucion del procedimientp
		$this->procedimiento='gev.f_tgv_activo_fijo_ultimo_registro_sel';
		$this->transaccion='tgv_urg_SEL';
		$this->tipo_procedimiento='SEL';//tipo de transaccion
				
		//Definicion de la lista del resultado del query
		$this->captura('id_ultimo_registro','int4');
		$this->captura('id_empleado','int4');
		$this->captura('estado_reg','varchar');
		$this->captura('aux2','varchar');
		$this->captura('curso','int4');
		$this->captura('chofer','varchar');
		$this->captura('latitud','int4');
		$this->captura('aux1','varchar');
		$this->captura('fecha_satelite','timestamp');
		$this->captura('id_activo_fijo','int4');
		$this->captura('aux3','varchar');
		$this->captura('aux4','varchar');
		$this->captura('velocidad','int4');
		$this->captura('longitud','int4');
		$this->captura('id_usuario_reg','int4');
		$this->captura('fecha_reg','timestamp');
		$this->captura('id_usuario_mod','int4');
		$this->captura('fecha_mod','timestamp');
		$this->captura('usr_reg','varchar');
		$this->captura('usr_mod','varchar');
		
		//Ejecuta la instruccion
		$this->armarConsulta();
		$this->ejecutarConsulta();
		
		//Devuelve la respuesta
		return $this->respuesta;
	}

    function listarActivoFijoRastreoDetUltimo(){
		//Definicion de variables para ejecucion del procedimientp
		$this->procedimiento='gev.f_tgv_activo_fijo_ultimo_registro_sel';
		$this->transaccion='TGV_AFRDETULT_SEL';
		$this->tipo_procedimiento='SEL';//tipo de transaccion
		
		$this-> setCount(false);
		
		$this->setParametro('id_activo_fijo','id_activo_fijo','varchar');
		
		//Definicion de la lista del resultado del query
		$this->captura('id_ultimo_registro','int4');
		$this->captura('id_funcionario','int4');
		$this->captura('fecha_satelite','TIMESTAMP');
		$this->captura('curso','int4');
		$this->captura('velocidad','numeric');
		$this->captura('longitud','numeric');
		$this->captura('id_activo_fijo','INTEGER');
		$this->captura('latitud','numeric');
		$this->captura('desc_funcionario1','TEXT');
		$this->captura('punto_cercano','varchar');
		
		
		

			
		//Ejecuta la instruccion
		$this->armarConsulta();
		//echo $this->getConsulta();
		//exit;
		$this->ejecutarConsulta();
		
		
		
		//Devuelve la respuesta
		return $this->respuesta;
	}


			
	function insertarActivoFijoUltimoRegistro(){
		//Definicion de variables para ejecucion del procedimiento
		$this->procedimiento='gev.f_tgv_activo_fijo_ultimo_registro_ime';
		$this->transaccion='tgv_urg_INS';
		$this->tipo_procedimiento='IME';
				
		//Define los parametros para la funcion
		$this->setParametro('id_empleado','id_empleado','int4');
		$this->setParametro('estado_reg','estado_reg','varchar');
		$this->setParametro('aux2','aux2','varchar');
		$this->setParametro('curso','curso','int4');
		$this->setParametro('chofer','chofer','varchar');
		$this->setParametro('latitud','latitud','int4');
		$this->setParametro('aux1','aux1','varchar');
		$this->setParametro('fecha_satelite','fecha_satelite','timestamp');
		$this->setParametro('id_activo_fijo','id_activo_fijo','int4');
		$this->setParametro('aux3','aux3','varchar');
		$this->setParametro('aux4','aux4','varchar');
		$this->setParametro('velocidad','velocidad','int4');
		$this->setParametro('longitud','longitud','int4');

		//Ejecuta la instruccion
		$this->armarConsulta();
		$this->ejecutarConsulta();

		//Devuelve la respuesta
		return $this->respuesta;
	}
			
	function modificarActivoFijoUltimoRegistro(){
		//Definicion de variables para ejecucion del procedimiento
		$this->procedimiento='gev.f_tgv_activo_fijo_ultimo_registro_ime';
		$this->transaccion='tgv_urg_MOD';
		$this->tipo_procedimiento='IME';
				
		//Define los parametros para la funcion
		$this->setParametro('id_ultimo_registro','id_ultimo_registro','int4');
		$this->setParametro('id_empleado','id_empleado','int4');
		$this->setParametro('estado_reg','estado_reg','varchar');
		$this->setParametro('aux2','aux2','varchar');
		$this->setParametro('curso','curso','int4');
		$this->setParametro('chofer','chofer','varchar');
		$this->setParametro('latitud','latitud','int4');
		$this->setParametro('aux1','aux1','varchar');
		$this->setParametro('fecha_satelite','fecha_satelite','timestamp');
		$this->setParametro('id_activo_fijo','id_activo_fijo','int4');
		$this->setParametro('aux3','aux3','varchar');
		$this->setParametro('aux4','aux4','varchar');
		$this->setParametro('velocidad','velocidad','int4');
		$this->setParametro('longitud','longitud','int4');

		//Ejecuta la instruccion
		$this->armarConsulta();
		$this->ejecutarConsulta();

		//Devuelve la respuesta
		return $this->respuesta;
	}
			
	function eliminarActivoFijoUltimoRegistro(){
		//Definicion de variables para ejecucion del procedimiento
		$this->procedimiento='gev.f_tgv_activo_fijo_ultimo_registro_ime';
		$this->transaccion='tgv_urg_ELI';
		$this->tipo_procedimiento='IME';
				
		//Define los parametros para la funcion
		$this->setParametro('id_ultimo_registro','id_ultimo_registro','int4');

		//Ejecuta la instruccion
		$this->armarConsulta();
		$this->ejecutarConsulta();

		//Devuelve la respuesta
		return $this->respuesta;
	}
			
}
?>