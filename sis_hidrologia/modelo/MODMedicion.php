<?php
/**
*@package pXP
*@file gen-MODMedicion.php
*@author  (mflores)
*@date 07-09-2011 15:50:29
*@description Clase que envia los parametros requeridos a la Base de datos para la ejecucion de las funciones, y que recibe la respuesta del resultado de la ejecucion de las mismas
*/

class MODMedicion extends MODbase{
	
	function __construct(CTParametro $pParam){
		parent::__construct($pParam);
	}
			
	function listarMedicion(){
		//Definicion de variables para ejecucion del procedimientp
		$this->procedimiento='hidro.f_thd_medicion_sel';
		$this->transaccion='HD_MED_SEL';
		$this->tipo_procedimiento='SEL';//tipo de transaccion
				
		//Definicion de la lista del resultado del query
		$this->captura('id_medicion','int4');
		$this->captura('estado_reg','varchar');
		$this->captura('fecha_fin','timestamp');
		$this->captura('hora_medida','time');
		$this->captura('fecha_ini','timestamp');
		$this->captura('h','int4');
		$this->captura('h_fin','numeric');
		$this->captura('h_ini','numeric');
		$this->captura('h_maxi','numeric');
		$this->captura('h_mini','numeric');
		$this->captura('h_original','numeric');
		$this->captura('id_operador','int4');
		$this->captura('id_sensor','int4');
		$this->captura('q','int4');
		$this->captura('q_original','numeric');
		$this->captura('fecha_reg','timestamp');
		$this->captura('id_usuario_reg','int4');
		$this->captura('fecha_mod','timestamp');
		$this->captura('id_usuario_mod','int4');
		$this->captura('usr_reg','varchar');
		$this->captura('usr_mod','varchar');
		$this->captura('nombre_completo1','text');
		$this->captura('id_tipo_medicion','int4');
		$this->captura('valor_numeric','numeric');
		$this->captura('valor_varchar','varchar');
		
		//Ejecuta la instruccion
		$this->armarConsulta();				
		$this->ejecutarConsulta();
		
		//echo $this->getConsulta(); exit;
		
		//Devuelve la respuesta
		return $this->respuesta;
	}
			
	function insertarMedicion(){
		//Definicion de variables para ejecucion del procedimiento
		$this->procedimiento='hidro.f_thd_medicion_ime';
		$this->transaccion='HD_MED_INS';
		$this->tipo_procedimiento='IME';
				
		//Define los parametros para la funcion
		$this->setParametro('estado_reg','estado_reg','varchar');
		$this->setParametro('fecha_fin','fecha_fin','timestamp');
		$this->setParametro('hora_medida','hora_medida','time');
		$this->setParametro('fecha_ini','fecha_ini','timestamp');
		$this->setParametro('h','h','int4');
		$this->setParametro('h_fin','h_fin','numeric');
		$this->setParametro('h_ini','h_ini','numeric');
		$this->setParametro('h_maxi','h_maxi','numeric');
		$this->setParametro('h_mini','h_mini','numeric');
		$this->setParametro('h_original','h_original','numeric');
		$this->setParametro('id_operador','id_operador','int4');
		$this->setParametro('id_sensor','id_sensor','int4');
		$this->setParametro('q','q','int4');
		$this->setParametro('q_original','q_original','numeric');
		$this->setParametro('id_tipo_medicion','id_tipo_medicion','int4');
		$this->setParametro('valor_numeric','valor_numeric','numeric');
		$this->setParametro('valor_varchar','valor_varchar','varchar');

		//Ejecuta la instruccion
		$this->armarConsulta();
		$this->ejecutarConsulta();

		//Devuelve la respuesta
		return $this->respuesta;
	}
			
	function modificarMedicion(){
		//Definicion de variables para ejecucion del procedimiento
		$this->procedimiento='hidro.f_thd_medicion_ime';
		$this->transaccion='HD_MED_MOD';
		$this->tipo_procedimiento='IME';
				
		//Define los parametros para la funcion
		$this->setParametro('id_medicion','id_medicion','int4');
		$this->setParametro('estado_reg','estado_reg','varchar');
		$this->setParametro('fecha_fin','fecha_fin','timestamp');
		$this->setParametro('hora_medida','hora_medida','time');
		$this->setParametro('fecha_ini','fecha_ini','timestamp');
		$this->setParametro('h','h','int4');
		$this->setParametro('h_fin','h_fin','numeric');
		$this->setParametro('h_ini','h_ini','numeric');
		$this->setParametro('h_maxi','h_maxi','numeric');
		$this->setParametro('h_mini','h_mini','numeric');
		$this->setParametro('h_original','h_original','numeric');
		$this->setParametro('id_operador','id_operador','int4');
		$this->setParametro('id_sensor','id_sensor','int4');
		$this->setParametro('q','q','int4');
		$this->setParametro('q_original','q_original','numeric');
		$this->setParametro('id_tipo_medicion','id_tipo_medicion','int4');
		$this->setParametro('valor_numeric','valor_numeric','numeric');
		$this->setParametro('valor_varchar','valor_varchar','varchar');

		//Ejecuta la instruccion
		$this->armarConsulta();
		$this->ejecutarConsulta();

		//Devuelve la respuesta
		return $this->respuesta;
	}
			
	function eliminarMedicion(){
		//Definicion de variables para ejecucion del procedimiento
		$this->procedimiento='hidro.f_thd_medicion_ime';
		$this->transaccion='HD_MED_ELI';
		$this->tipo_procedimiento='IME';
				
		//Define los parametros para la funcion
		$this->setParametro('id_medicion','id_medicion','int4');

		//Ejecuta la instruccion
		$this->armarConsulta();
		$this->ejecutarConsulta();

		//Devuelve la respuesta
		return $this->respuesta;
	}
			
}
?>