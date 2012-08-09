<?php
/**
*@package pXP
*@file gen-MODMedicion.php
*@author  (mflores)
*@date 07-09-2011 15:50:29
*@description Clase que envia los parametros requeridos a la Base de datos para la ejecucion de las funciones, y que recibe la respuesta del resultado de la ejecucion de las mismas
*/

class MODMedicionDatoMedida extends MODbase{
	
	function __construct(CTParametro $pParam){
		parent::__construct($pParam);
	}
			
	function listarMedicionDatoMedida(){
		//Definicion de variables para ejecucion del procedimientp
		$this->procedimiento='hidro.f_thd_medame_sel';
		$this->transaccion='HD_MEDAME_SEL';
		$this->tipo_procedimiento='SEL';//tipo de transaccion
				
		//Definicion de la lista del resultado del query
		$this->captura('id_medicion','int4');
		//$this->captura('id_tipo_medicion','int4');
		$this->captura('id_sensor','int4');		
		$this->captura('id_operador','int4');		
		$this->captura('fecha_medida','date');
		//$this->captura('fecha_fin','date');
		$this->captura('hora_medida','time');		
		/*$this->captura('h','int4');
		$this->captura('h_fin','numeric');
		$this->captura('h_ini','numeric');
		$this->captura('h_maxi','numeric');
		$this->captura('h_mini','numeric');
		$this->captura('h_original','numeric');		
		$this->captura('q','int4');
		$this->captura('q_original','numeric');*/
		$this->captura('valor_numeric','numeric');
		/*$this->captura('valor_varchar','varchar');*/
		$this->captura('estado_reg','varchar');
		$this->captura('fecha_reg','timestamp');
		$this->captura('id_usuario_reg','int4');
		$this->captura('fecha_mod','timestamp');
		$this->captura('id_usuario_mod','int4');
		$this->captura('usr_reg','varchar');
		$this->captura('usr_mod','varchar');
		$this->captura('nombre_completo1','text');		
		
		//Ejecuta la instruccion
		$this->armarConsulta();				
		$this->ejecutarConsulta();
		
		//echo $this->getConsulta(); exit;
		
		//Devuelve la respuesta
		return $this->respuesta;
	}
			
	function insertarMedicionDatoMedida(){
		//Definicion de variables para ejecucion del procedimiento
		$this->procedimiento='hidro.f_thd_medame_ime';
		$this->transaccion='HD_MEDAME_INS';
		$this->tipo_procedimiento='IME';
				
		//Define los parametros para la funcion
		$this->setParametro('id_medicion','id_medicion','int4');				//medicion
		//$this->setParametro('id_tipo_medicion','id_tipo_medicion','int4');		//medicion
		$this->setParametro('id_sensor','id_sensor','int4');					//medicion		
		$this->setParametro('id_operador','id_operador','int4');				//medicion
		$this->setParametro('hora_medida','hora_medida','time');				//medicion
		$this->setParametro('fecha_medida','fecha_medida','date');					//medicion
		//$this->setParametro('fecha_fin','fecha_fin','date');					//medicion		
		$this->setParametro('valor_numeric','valor_numeric','numeric');			//medicion
		
		//Ejecuta la instruccion
		$this->armarConsulta();
		$this->ejecutarConsulta();

		//Devuelve la respuesta
		return $this->respuesta;
	}
			
	function modificarMedicionDatoMedida(){
		//Definicion de variables para ejecucion del procedimiento
		$this->procedimiento='hidro.f_thd_medame_ime';
		$this->transaccion='HD_MEDAME_MOD';
		$this->tipo_procedimiento='IME';
				
		//Define los parametros para la funcion
		$this->setParametro('id_medicion','id_medicion','int4');
		//$this->setParametro('id_tipo_medicion','id_tipo_medicion','int4');
		$this->setParametro('id_sensor','id_sensor','int4');		
		$this->setParametro('id_operador','id_operador','int4');
		$this->setParametro('fecha_medida','fecha_medida','date');
		$this->setParametro('hora_medida','hora_medida','time');				
		//$this->setParametro('fecha_fin','fecha_fin','date');		
		$this->setParametro('valor_numeric','valor_numeric','numeric');

		//Ejecuta la instruccion
		$this->armarConsulta();
		$this->ejecutarConsulta();

		//Devuelve la respuesta
		return $this->respuesta;
	}
			
	function eliminarMedicionDatoMedida(){
		//Definicion de variables para ejecucion del procedimiento
		$this->procedimiento='hidro.f_thd_medame_ime';
		$this->transaccion='HD_MEDAME_ELI';
		$this->tipo_procedimiento='IME';
				
		//Define los parametros para la funcion
		$this->setParametro('id_medicion','id_medicion','int4');

		//Ejecuta la instruccion
		$this->armarConsulta();
		$this->ejecutarConsulta();

		//Devuelve la respuesta
		return $this->respuesta;
	}
	
	function subir_excel()
	{
		//Definicion de variables para ejecucion del procedimiento
		$this->procedimiento='hidro.f_thd_medame_ime';
		$this->transaccion='HD_EXL_INS';
		$this->tipo_procedimiento='IME';
				
		//Define los parametros para la funcion
		$this->setParametro('id_medicion','id_medicion','int4');				//medicion
		$this->setParametro('id_tipo_medicion','id_tipo_medicion','int4');		//medicion
		$this->setParametro('id_sensor','id_sensor','int4');					//medicion		
		$this->setParametro('id_operador','id_operador','int4');				//medicion
		$this->setParametro('fecha_medida','fecha_medida','date');				//medicion
		//$this->setParametro('fecha_fin','fecha_fin','date');					//medicion
		$this->setParametro('hora_medida','hora_medida','time');				//medicion
		$this->setParametro('valor_numeric','valor_numeric','numeric');			//medicion
		$this->setParametro('excel','excel','bytea',false,1024,false,array("csv"));

		//Ejecuta la instruccion
		$this->armarConsulta();
		$this->ejecutarConsulta();


		//echo $this->getConsulta(); exit;
		
		//Devuelve la respuesta
		return $this->respuesta;
	}
	
	function reporte_med_Hidro()
	{
		//Definicion de variables para ejecucion del procedimientp
		$this->procedimiento='hidro.f_thd_medame_sel';
		$this->transaccion='HD_REPORTE';
		$this->tipo_procedimiento='SEL';//tipo de transaccion
		
		$this->setCount(false);
				
		//Definicion de la lista del resultado del query
			
		$this->captura('fecha','date');
		$this->captura('valor','numeric');
				
		//Ejecuta la instruccion
		$this->armarConsulta();	
		//echo $this->getConsulta(); exit;			
		$this->ejecutarConsulta();
		
		//echo $this->getConsulta(); exit;
		
		//Devuelve la respuesta
		return $this->respuesta;
	}

	function obtener_fechas()
	{
		//Definicion de variables para ejecucion del procedimientp
		$this->procedimiento='hidro.f_thd_medame_sel';
		$this->transaccion='HD_OBT_FECHA';
		$this->tipo_procedimiento='SEL';//tipo de transaccion
		
		$this->setParametro('columna_fecha','columna_fecha','varchar');	
		$this->setParametro('tabla','tabla','varchar');	
		
		$this->setCount(false);
				
		//Definicion de la lista del resultado del query
		
		//$this->captura('id_sensor','int4');
		$this->captura('fecha_min','timestamp');
		$this->captura('fecha_max','timestamp');
				
		//Ejecuta la instruccion
		$this->armarConsulta();	
		//echo $this->getConsulta(); exit;			
		$this->ejecutarConsulta();
		
		//echo $this->getConsulta(); exit;
		
		//Devuelve la respuesta
		return $this->respuesta;
	}
	
	function obtener_promedio()
	{
		//Definicion de variables para ejecucion del procedimientp
		$this->procedimiento='hidro.f_thd_medame_sel';
		$this->transaccion='HD_OBT_PROME';
		$this->tipo_procedimiento='SEL';//tipo de transaccion
		
		$this->setParametro('columna_fecha','columna_fecha','varchar');	
		$this->setParametro('tabla','tabla','varchar');	
		
		$this->setCount(false);
				
		//Definicion de la lista del resultado del query
		
		//$this->captura('id_sensor','int4');
		$this->captura('fecha_min','timestamp');
		$this->captura('fecha_max','timestamp');
				
		//Ejecuta la instruccion
		$this->armarConsulta();	
		//echo $this->getConsulta(); exit;			
		$this->ejecutarConsulta();
		
		//echo $this->getConsulta(); exit;
		
		//Devuelve la respuesta
		return $this->respuesta;
	}
			
}
?>