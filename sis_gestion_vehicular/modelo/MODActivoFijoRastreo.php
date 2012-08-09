<?php
/**
*@package pXP
*@file gen-MODActivoFijoRastreo.php
*@author  (herman)
*@date 02-02-2012 15:47:13
*@description Clase que envia los parametros requeridos a la Base de datos para la ejecucion de las funciones, y que recibe la respuesta del resultado de la ejecucion de las mismas
*/

class MODActivoFijoRastreo extends MODbase{
	
	function __construct(CTParametro $pParam){
		parent::__construct($pParam);
	}
			
	function listarActivoFijoRastreo(){
		//Definicion de variables para ejecucion del procedimientp
		$this->procedimiento='gev.f_tgv_activo_fijo_rastreo_sel';
		$this->transaccion='tgv_AFR_SEL';
		$this->tipo_procedimiento='SEL';//tipo de transaccion
				
		//Definicion de la lista del resultado del query
		$this->captura('id_activo_fijo_rastreo','int4');
		$this->captura('id_empleado','int4');
		$this->captura('estado_reg','varchar');
		$this->captura('fecha_servidor','date');
		$this->captura('aux2','varchar');
		$this->captura('fecha_satelite','timestamp');
		$this->captura('curso','int4');
		$this->captura('fecha_hora','int4');
		$this->captura('aux1','varchar');
		$this->captura('odometro','numeric');
		$this->captura('mensaje','varchar');
		$this->captura('hora_gps','numeric');
		$this->captura('velocidad','numeric');
		$this->captura('advisories','varchar');
		$this->captura('longitud','numeric');
		$this->captura('id_activo_fijo','int4');
		$this->captura('dia','int4');
		$this->captura('aux3','varchar');
		$this->captura('punto_cercano','varchar');
		$this->captura('altitud','numeric');
		$this->captura('ciudad','varchar');
		$this->captura('numero_actualizado','int4');
		$this->captura('estado','varchar');
		$this->captura('aux4','varchar');
		$this->captura('latitud','numeric');
		$this->captura('events','int4');
		$this->captura('mes','int4');
		$this->captura('anio','int4');
		$this->captura('calle','varchar');
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

function listarActivoFijoRastreoDet(){
		//Definicion de variables para ejecucion del procedimientp
		$this->procedimiento='gev.f_tgv_activo_fijo_rastreo_sel';
		$this->transaccion='TGV_AFRDET_SEL';
		$this->tipo_procedimiento='SEL';//tipo de transaccion
		
		$this-> setCount(false);
		$this->setParametro('id_activo_fijo','id_activo_fijo','int4');
		$this->setParametro('fecha_ini','fecha_ini','DATE');
		$this->setParametro('fecha_fin','fecha_fin','DATE');
		//Definicion de la lista del resultado del query
		$this->captura('id_activo_fijo_rastreo','int4');
		$this->captura('id_funcionario','int4');
		$this->captura('fecha_satelite','TIMESTAMP');
		$this->captura('curso','int4');
		$this->captura('velocidad','numeric');
		$this->captura('longitud','numeric');
		$this->captura('id_activo_fijo','INTEGER');
		$this->captura('punto_cercano','varchar');
		$this->captura('altitud','numeric');
		$this->captura('latitud','numeric');
		$this->captura('desc_funcionario1','TEXT');
			
		//Ejecuta la instruccion
		$this->armarConsulta();
		//echo $this->getConsulta();
		//exit;
		$this->ejecutarConsulta();
		
		
		
		//Devuelve la respuesta
		return $this->respuesta;
	}
			
		
			
			
	function insertarActivoFijoRastreo(){
		//Definicion de variables para ejecucion del procedimiento
		$this->procedimiento='gev.f_tgv_activo_fijo_rastreo_ime';
		$this->transaccion='tgv_AFR_INS';
		$this->tipo_procedimiento='IME';
				
		//Define los parametros para la funcion
		$this->setParametro('id_empleado','id_empleado','int4');
		$this->setParametro('estado_reg','estado_reg','varchar');
		$this->setParametro('fecha_servidor','fecha_servidor','date');
		$this->setParametro('aux2','aux2','varchar');
		$this->setParametro('fecha_satelite','fecha_satelite','date');
		$this->setParametro('curso','curso','int4');
		$this->setParametro('fecha_hora','fecha_hora','int4');
		$this->setParametro('aux1','aux1','varchar');
		$this->setParametro('odometro','odometro','numeric');
		$this->setParametro('mensaje','mensaje','varchar');
		$this->setParametro('hora_gps','hora_gps','numeric');
		$this->setParametro('velocidad','velocidad','numeric');
		$this->setParametro('advisories','advisories','varchar');
		$this->setParametro('longitud','longitud','numeric');
		$this->setParametro('id_activo_fijo','id_activo_fijo','int4');
		$this->setParametro('dia','dia','int4');
		$this->setParametro('aux3','aux3','varchar');
		$this->setParametro('punto_cercano','punto_cercano','varchar');
		$this->setParametro('altitud','altitud','numeric');
		$this->setParametro('ciudad','ciudad','varchar');
		$this->setParametro('numero_actualizado','numero_actualizado','int4');
		$this->setParametro('estado','estado','varchar');
		$this->setParametro('aux4','aux4','varchar');
		$this->setParametro('latitud','latitud','numeric');
		$this->setParametro('events','events','int4');
		$this->setParametro('mes','mes','int4');
		$this->setParametro('anio','anio','int4');
		$this->setParametro('calle','calle','varchar');

		//Ejecuta la instruccion
		$this->armarConsulta();
		$this->ejecutarConsulta();

		//Devuelve la respuesta
		return $this->respuesta;
	}
			
	function modificarActivoFijoRastreo(){
		//Definicion de variables para ejecucion del procedimiento
		$this->procedimiento='gev.f_tgv_activo_fijo_rastreo_ime';
		$this->transaccion='tgv_AFR_MOD';
		$this->tipo_procedimiento='IME';
				
		//Define los parametros para la funcion
		$this->setParametro('id_activo_fijo_rastreo','id_activo_fijo_rastreo','int4');
		$this->setParametro('id_empleado','id_empleado','int4');
		$this->setParametro('estado_reg','estado_reg','varchar');
		$this->setParametro('fecha_servidor','fecha_servidor','date');
		$this->setParametro('aux2','aux2','varchar');
		$this->setParametro('fecha_satelite','fecha_satelite','date');
		$this->setParametro('curso','curso','int4');
		$this->setParametro('fecha_hora','fecha_hora','int4');
		$this->setParametro('aux1','aux1','varchar');
		$this->setParametro('odometro','odometro','numeric');
		$this->setParametro('mensaje','mensaje','varchar');
		$this->setParametro('hora_gps','hora_gps','numeric');
		$this->setParametro('velocidad','velocidad','numeric');
		$this->setParametro('advisories','advisories','varchar');
		$this->setParametro('longitud','longitud','numeric');
		$this->setParametro('id_activo_fijo','id_activo_fijo','int4');
		$this->setParametro('dia','dia','int4');
		$this->setParametro('aux3','aux3','varchar');
		$this->setParametro('punto_cercano','punto_cercano','varchar');
		$this->setParametro('altitud','altitud','numeric');
		$this->setParametro('ciudad','ciudad','varchar');
		$this->setParametro('numero_actualizado','numero_actualizado','int4');
		$this->setParametro('estado','estado','varchar');
		$this->setParametro('aux4','aux4','varchar');
		$this->setParametro('latitud','latitud','numeric');
		$this->setParametro('events','events','int4');
		$this->setParametro('mes','mes','int4');
		$this->setParametro('anio','anio','int4');
		$this->setParametro('calle','calle','varchar');

		//Ejecuta la instruccion
		$this->armarConsulta();
		$this->ejecutarConsulta();

		//Devuelve la respuesta
		return $this->respuesta;
	}
			
	function eliminarActivoFijoRastreo(){
		//Definicion de variables para ejecucion del procedimiento
		$this->procedimiento='gev.f_tgv_activo_fijo_rastreo_ime';
		$this->transaccion='tgv_AFR_ELI';
		$this->tipo_procedimiento='IME';
				
		//Define los parametros para la funcion
		$this->setParametro('id_activo_fijo_rastreo','id_activo_fijo_rastreo','int4');

		//Ejecuta la instruccion
		$this->armarConsulta();
		$this->ejecutarConsulta();

		//Devuelve la respuesta
		return $this->respuesta;
	}
			
}
?>