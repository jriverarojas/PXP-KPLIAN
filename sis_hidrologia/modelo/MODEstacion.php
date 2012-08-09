<?php
/**
*@package pXP
*@file gen-MODEstacion.php
*@author  (rac)
*@date 05-09-2011 10:30:01
*@description Clase que envia los parametros requeridos a la Base de datos para la ejecucion de las funciones, y que recibe la respuesta del resultado de la ejecucion de las mismas
*/

class MODEstacion extends MODbase{
	
	function __construct(CTParametro $pParam){
		parent::__construct($pParam);
	}
			
	function listarEstacion(){
		//Definicion de variables para ejecucion del procedimientp
		$this->procedimiento='hidro.f_thd_estacion_sel';
		$this->transaccion='HD_EST_SEL';
		$this->tipo_procedimiento='SEL';//tipo de transaccion
							
		//Definicion de la lista del resultado del query
		$this->captura('id_estacion','int4');
		$this->captura('altitud','numeric');
		$this->captura('codigo','varchar');
		$this->captura('comentario','varchar');
		$this->captura('direccion','varchar');
		$this->captura('estado','varchar');
		$this->captura('estado_reg','varchar');
		$this->captura('fecha_fin','timestamp');
		$this->captura('fecha_ini','timestamp');
		$this->captura('id_administrador','int4');
		$this->captura('id_cuenca','int4');
		$this->captura('id_lugar','int4');
		$this->captura('id_rio','int4');
		$this->captura('latitud','numeric');
		$this->captura('longitud','numeric');
		$this->captura('latitud_carto','text');
		$this->captura('longitud_carto','text');
		$this->captura('observador','varchar');
		$this->captura('superficie_cuenca','int4');
		$this->captura('teletransmision','boolean');
		$this->captura('tipo','varchar');
		$this->captura('fecha_reg','timestamp');
		$this->captura('id_usuario_reg','int4');
		$this->captura('fecha_mod','timestamp');
		$this->captura('id_usuario_mod','int4');
		$this->captura('usr_reg','varchar');
		$this->captura('usr_mod','varchar');
		$this->captura('admin','varchar');
		$this->captura('cuenca','varchar');
		$this->captura('lugar','varchar');
		$this->captura('rio','varchar');		
		$this->captura('id_proyectos','text');
		$this->captura('proyectos','text');
		
		//Ejecuta la instruccion
		$this->armarConsulta();
		$this->ejecutarConsulta();
		
		//Devuelve la respuesta
		return $this->respuesta;
	}
	
	function listarEstacionProyectos()
	{
		//Definicion de variables para ejecucion del procedimientp
		$this->procedimiento='hidro.f_thd_estacion_sel';
		$this->transaccion='HD_ESTPRO_SEL';
		$this->tipo_procedimiento='SEL';//tipo de transaccion
		
		$this->setParametro('id_proyectos','id_proyectos','varchar');
				
		//Definicion de la lista del resultado del query
		$this->captura('id_estacion','int4');
		$this->captura('altitud','numeric');
		$this->captura('codigo','varchar');
		$this->captura('comentario','varchar');
		$this->captura('direccion','varchar');
		$this->captura('estado','varchar');
		$this->captura('estado_reg','varchar');
		$this->captura('fecha_fin','timestamp');
		$this->captura('fecha_ini','timestamp');
		$this->captura('id_administrador','int4');
		$this->captura('id_cuenca','int4');
		$this->captura('id_lugar','int4');
		$this->captura('id_rio','int4');
		$this->captura('latitud','numeric');
		$this->captura('longitud','numeric');
		$this->captura('latitud_carto','text');
		$this->captura('longitud_carto','text');
		$this->captura('observador','varchar');
		$this->captura('superficie_cuenca','int4');
		$this->captura('teletransmision','boolean');
		$this->captura('tipo','varchar');
		$this->captura('fecha_reg','timestamp');
		$this->captura('id_usuario_reg','int4');
		$this->captura('fecha_mod','timestamp');
		$this->captura('id_usuario_mod','int4');
		$this->captura('usr_reg','varchar');
		$this->captura('usr_mod','varchar');
		$this->captura('admin','varchar');
		$this->captura('cuenca','varchar');
		$this->captura('lugar','varchar');
		$this->captura('rio','varchar');
		$this->captura('id_proyectos','text');
		$this->captura('proyectos','text');
		
		//Ejecuta la instruccion
		$this->armarConsulta();
		$this->ejecutarConsulta();
		
		//echo $this->getConsulta(); exit;
		
		//Devuelve la respuesta
		return $this->respuesta;
	}

	function listarProyEstacion()
	{
		//Definicion de variables para ejecucion del procedimientp
		$this->procedimiento='hidro.f_thd_estacion_sel';
		$this->transaccion='HD_PROEST_SEL';
		$this->tipo_procedimiento='SEL';//tipo de transaccion
		
		$this->setParametro('id_proyectos','id_proyectos','varchar');
				
		//Definicion de la lista del resultado del query
		$this->captura('id_estacion','int4');
		$this->captura('altitud','numeric');
		$this->captura('codigo','varchar');
		$this->captura('comentario','varchar');
		$this->captura('direccion','varchar');
		$this->captura('estado','varchar');
		$this->captura('estado_reg','varchar');
		$this->captura('fecha_fin','timestamp');
		$this->captura('fecha_ini','timestamp');
		$this->captura('id_administrador','int4');
		$this->captura('id_cuenca','int4');
		$this->captura('id_lugar','int4');
		$this->captura('id_rio','int4');
		$this->captura('latitud','numeric');
		$this->captura('longitud','numeric');
		$this->captura('latitud_carto','text');
		$this->captura('longitud_carto','text');
		$this->captura('observador','varchar');
		$this->captura('superficie_cuenca','int4');
		$this->captura('teletransmision','boolean');
		$this->captura('tipo','varchar');
		$this->captura('fecha_reg','timestamp');
		$this->captura('id_usuario_reg','int4');
		$this->captura('fecha_mod','timestamp');
		$this->captura('id_usuario_mod','int4');
		$this->captura('usr_reg','varchar');
		$this->captura('usr_mod','varchar');
		$this->captura('admin','varchar');
		$this->captura('cuenca','varchar');
		$this->captura('lugar','varchar');
		$this->captura('rio','varchar');
		$this->captura('id_proyectos','text');
		$this->captura('proyectos','text');
		
		//Ejecuta la instruccion
		$this->armarConsulta();
		$this->ejecutarConsulta();
		
		//echo $this->getConsulta(); exit;
		
		//Devuelve la respuesta
		return $this->respuesta;
	}
			
	function insertarEstacion(){
		//Definicion de variables para ejecucion del procedimiento
		$this->procedimiento='hidro.f_thd_estacion_ime';
		$this->transaccion='HD_EST_INS';
		$this->tipo_procedimiento='IME';
				
		//Define los parametros para la funcion
		$this->setParametro('altitud','altitud','numeric');
		$this->setParametro('codigo','codigo','varchar');
		$this->setParametro('comentario','comentario','varchar');
		$this->setParametro('direccion','direccion','varchar');
		$this->setParametro('estado','estado','varchar');
		$this->setParametro('estado_reg','estado_reg','varchar');
		$this->setParametro('fecha_fin','fecha_fin','timestamp');
		$this->setParametro('fecha_ini','fecha_ini','timestamp');
		$this->setParametro('id_administrador','id_administrador','int4');
		$this->setParametro('id_cuenca','id_cuenca','int4');
		$this->setParametro('id_lugar','id_lugar','int4');
		$this->setParametro('id_rio','id_rio','int4');
		$this->setParametro('latitud_carto','latitud_carto','text');
		$this->setParametro('longitud_carto','longitud_carto','text');
		$this->setParametro('observador','observador','varchar');
		$this->setParametro('superficie_cuenca','superficie_cuenca','int4');
		$this->setParametro('teletransmision','teletransmision','boolean');
		$this->setParametro('tipo','tipo','varchar');
		$this->setParametro('id_proyectos','id_proyectos','varchar');

		//Ejecuta la instruccion
		$this->armarConsulta();
		$this->ejecutarConsulta();			
		
		//Devuelve la respuesta
		return $this->respuesta;
	}
			
	function modificarEstacion(){
		//Definicion de variables para ejecucion del procedimiento
		$this->procedimiento='hidro.f_thd_estacion_ime';
		$this->transaccion='HD_EST_MOD';
		$this->tipo_procedimiento='IME';
				
		//Define los parametros para la funcion
		$this->setParametro('id_estacion','id_estacion','int4');
		$this->setParametro('altitud','altitud','numeric');
		$this->setParametro('codigo','codigo','varchar');
		$this->setParametro('comentario','comentario','varchar');
		$this->setParametro('direccion','direccion','varchar');
		$this->setParametro('estado','estado','varchar');
		$this->setParametro('estado_reg','estado_reg','varchar');
		$this->setParametro('fecha_fin','fecha_fin','timestamp');
		$this->setParametro('fecha_ini','fecha_ini','timestamp');
		$this->setParametro('id_administrador','id_administrador','int4');
		$this->setParametro('id_cuenca','id_cuenca','int4');
		$this->setParametro('id_lugar','id_lugar','int4');
		$this->setParametro('id_rio','id_rio','int4');
		$this->setParametro('latitud_carto','latitud_carto','text');
		$this->setParametro('longitud_carto','longitud_carto','text');
		$this->setParametro('observador','observador','varchar');
		$this->setParametro('superficie_cuenca','superficie_cuenca','int4');
		$this->setParametro('teletransmision','teletransmision','boolean');
		$this->setParametro('tipo','tipo','varchar');
		$this->setParametro('id_proyectos','id_proyectos','varchar');

		//Ejecuta la instruccion
		$this->armarConsulta();
		$this->ejecutarConsulta();
		
		
		//echo $this->getConsulta(); exit;

		//Devuelve la respuesta
		return $this->respuesta;
	}
			
	function eliminarEstacion(){
		//Definicion de variables para ejecucion del procedimiento
		$this->procedimiento='hidro.f_thd_estacion_ime';
		$this->transaccion='HD_EST_ELI';
		$this->tipo_procedimiento='IME';
				
		//Define los parametros para la funcion
		$this->setParametro('id_estacion','id_estacion','int4');

		//Ejecuta la instruccion
		$this->armarConsulta();
		$this->ejecutarConsulta();

		//Devuelve la respuesta
		return $this->respuesta;
	}

	function subirFotoEstacion(){
	
		//Definicion de variables para ejecucion del procedimiento
		$this->procedimiento='hidro.f_thd_estacion_ime';// nombre procedimiento almacenado
		$this->transaccion='HD_UPFOTOEST_MOD';//nombre de la transaccion
		$this->tipo_procedimiento='IME';//tipo de transaccion
		
		//apartir del tipo  del archivo obtiene la extencion
		$ext = pathinfo($this->arregloFiles['foto']['name']);
 		$this->arreglo['extension']= $ext['extension'];
		
		//Define los parametros para la funcion	
		$this->setParametro('id_estacion','id_estacion','integer');	
		$this->setParametro('extension','extension','varchar');
		$this->setParametro('foto','foto','bytea',false,1024,true);
				
		//Ejecuta la instruccion
		$this->armarConsulta();
				
		$this->ejecutarConsulta();
		return $this->respuesta;
	}
	
	function obtenerFotoEstacion(){
	
		//Definicion de variables para ejecucion del procedimiento
		$this->procedimiento='hidro.f_thd_estacion_sel';
		$this->transaccion='HD_OBTFOTOEST_SEL';
		$this->tipo_procedimiento='SEL';//tipo de transaccion
		
		$this->setCount(false);
		
	
		//Define los parametros para la funcion	
		$this->setParametro('id_estacion','id_estacion','integer');	
		//$this->setParametro('extension','extension','varchar');
		//$this->setParametro('foto','foto','bytea',false,1024,true);
		
		
		//nombre varialbe de envio, tipo dato, columna que serra el nombre foto retorno, ruta para guardar archivo, crear miniatura, almacenar en sesion, nombre variale sesion			
		$this->captura('id_estacion','integer');
		$this->captura('extencion','varchar');
		$this->captura('foto','bytea','id_estacion','extension','sesion','fotoEstacion');
		//$this->captura('foto','bytea','id_persona','extension','archivo','../../sis_seguridad/control/foto_persona/');
		//$this->captura('foto','bytea','id_persona','extension','archivo','./');
		
				
		//Ejecuta la instruccion
		$this->armarConsulta();
				
		$this->ejecutarConsulta();
		return $this->respuesta;
	}
	
}
?>