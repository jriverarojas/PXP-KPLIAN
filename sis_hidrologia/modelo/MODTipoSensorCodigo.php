<?php
/**
*@package pXP
*@file gen-MODTipoColumnaSensor.php
*@author  (rac)
*@date 16-03-2012 17:06:17
*@description Clase que envia los parametros requeridos a la Base de datos para la ejecucion de las funciones, y que recibe la respuesta del resultado de la ejecucion de las mismas
*/
class MODTipoSensorCodigo extends MODbase{	
	function __construct(CTParametro $pParam){
		parent::__construct($pParam);
	}
	function listarTipoSensorCodigo(){
		//Definicion de variables para ejecucion del procedimientp
		$this->procedimiento='hidro.f_thd_tipo_sensor_codigo_sel';
		$this->transaccion='HD_TISENCOD_SEL';
		$this->tipo_procedimiento='SEL';//tipo de transaccion
		//$this->objParam->defecto('ordenacion','id_tipo_sensor_columna');
        //$this->objParam->defecto('dir_ordenacion','asc');
        
		$datos = $this->objParam->getParametro('datos');
		//$this->setParametro('id_tipo_sensor','id_tipo_sensor','integer');
		//$this->setParametro('id_sensor','id_sensor','integer');	
		$this->setParametro('datos','datos','varchar');	
		$this->setParametro('tipo_sensor_codigo','tipo_sensor_codigo','varchar');
		$this->setParametro('id_sensor','id_sensor','integer');
		
		$parametros= explode('@',$datos);
		
		$tamaño = sizeof($parametros);
		
		for($i=0;$i<$tamaño;$i++){
				
			
			
			$parametros_tipo=explode('#',$parametros[$i]);
			
			$this->captura($parametros_tipo[0],$parametros_tipo[1]);
			
		}
		//Definicion de la lista del resultado del query
		$this->captura('estado_reg','varchar');
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

     function listarTipoSensorCodigoReporte(){
		//Definicion de variables para ejecucion del procedimientp
		$this->procedimiento='hidro.f_thd_tipo_sensor_codigo_sel';
		$this->transaccion='HD_TISENCODREP_SEL';
		$this->tipo_procedimiento='SEL';//tipo de transaccion
		
		$this->setCount(FALSE);
		
		$this->setParametro('tipo_sensor_codigo','tipo_sensor_codigo','varchar');
	    $this->setParametro('id_sensor','id_sensor','integer');
		$this->setParametro('tipo_columna_sensor_fecha','tipo_columna_sensor_fecha','varchar');
		$this->setParametro('tipo_columna_sensor_valor','tipo_columna_sensor_valor','varchar');
		$this->setParametro('fecha_fin','fecha_fin','date');
		$this->setParametro('fecha_ini','fecha_ini','date');
		
		
		$this->captura('valor','numeric');
		$this->captura('fecha','timestamp');

		//Ejecuta la instruccion
		$this->armarConsulta();
		$this->ejecutarConsulta();
		
		
		
		//Devuelve la respuesta
		return $this->respuesta;
	}
			
	
	function promedioTipoSensorCodigoReporte(){
		//Definicion de variables para ejecucion del procedimientp
		$this->procedimiento='hidro.f_thd_tipo_sensor_codigo_sel';
		$this->transaccion='HD_PROM_HIDRO';
		$this->tipo_procedimiento='SEL';//tipo de transaccion
		
		$this->setCount(FALSE);
		
		$this->setParametro('tipo_sensor_codigo','tipo_sensor_codigo','varchar');
	    $this->setParametro('id_sensor','id_sensor','integer');
		$this->setParametro('tipo_columna_sensor_fecha','tipo_columna_sensor_fecha','varchar');
		$this->setParametro('tipo_columna_sensor_valor','tipo_columna_sensor_valor','varchar');
		$this->setParametro('fecha_fin','fecha_fin','date');
		$this->setParametro('fecha_ini','fecha_ini','date');
		$this->setParametro('opciones','opciones','varchar');
		$this->setParametro('promedio','promedio','varchar');
		$this->setParametro('hora','hora','varchar');
				
		$this->captura('valor','numeric');
		$this->captura('fecha','timestamp');

		//Ejecuta la instruccion
		$this->armarConsulta();
		$this->ejecutarConsulta();
				
		echo $this->getConsulta(); exit;
		
		//Devuelve la respuesta
		return $this->respuesta;
	}

			
	function modificarTipoSensorCodigo(){
		//Definicion de variables para ejecucion del procedimiento
	    $this->procedimiento='hidro.f_thd_tipo_sensor_codigo_ime';
		$this->transaccion='HD_TISENCO_MOD';
		
		$this->tipo_procedimiento='IME';
		//Define los parametros para la funcion
		
		
		//$this->setParametro('id_tipo_sensor','id_tipo_sensor','integer');
		
		//$this->setParametro('id_sensor','id_sensor','integer');	
		
		 $id33 = $this->objParam->getParametro('id_tipo_sensor_'+$codigo);
		$datos =$id33['datos'];
		if (!isset($datos )){
			
			$datos = $this->objParam->getParametro('datos');
		}
        
		
		
		$this->setParametro('datos','datos','varchar');	
		$this->setParametro('tipo_sensor_codigo','tipo_sensor_codigo','varchar');
		
		$parametros= explode('@',$datos);
		
		$tamaño = sizeof($parametros);
		
		for($i=0;$i<$tamaño;$i++){
			
			$parametros_tipo=explode('#',$parametros[$i]);
			
			$this->setParametro($parametros_tipo[0],$parametros_tipo[0],$parametros_tipo[1]);
		
			
		}
		
		
		
        //Ejecuta la instruccion
		$this->armarConsulta();
		$this->ejecutarConsulta();

		//Devuelve la respuesta
		return $this->respuesta;
	}
			
	function eliminarTipoSensorCodigo(){
		//Definicion de variables para ejecucion del procedimiento
		$this->procedimiento='hidro.f_thd_tipo_sensor_codigo_ime';
		$this->transaccion='HD_TISECO_ELI';
		$this->tipo_procedimiento='IME';
		//$codigo = $this->objParam->getParametro('tipo_sensor_codigo');
		$id33 = $this->objParam->getParametro('id_tipo_sensor_'+$codigo);
		$codigo=$id33['tipo_sensor_codigo'];
	     //Define los parametros para la funcion
		$this->setParametro('id_tipo_sensor_codigo', trim('id_tipo_sensor_'.$codigo),'int4');
		$this->setParametro('tipo_sensor_codigo','tipo_sensor_codigo','varchar');
		//Ejecuta la instruccion
		$this->armarConsulta();
		$this->ejecutarConsulta();
        //Devuelve la respuesta
		return $this->respuesta;
	}

	function insertarTipoSensorCodigo(){
		
		
		//Definicion de variables para ejecucion del procedimiento
		$this->procedimiento='hidro.f_thd_tipo_sensor_codigo_ime';
		$this->transaccion='HD_TISENCO_INS';
		$this->tipo_procedimiento='IME';
		
		
		$datos = $this->objParam->getParametro('datos');
		
		//$this->setParametro('id_tipo_sensor','id_tipo_sensor','integer');
		//$this->setParametro('id_sensor','id_sensor','integer');	
		
		$this->setParametro('datos','datos','varchar');	
		$this->setParametro('tipo_sensor_codigo','tipo_sensor_codigo','varchar');
		
		$parametros= explode('@',$datos);
		
		$tamaño = sizeof($parametros);
		
		for($i=0;$i<$tamaño;$i++){
			
			$parametros_tipo=explode('#',$parametros[$i]);
			
			$this->setParametro($parametros_tipo[0],$parametros_tipo[0],$parametros_tipo[1]);
		
			
		}
		//Ejecuta la instruccion
		$this->armarConsulta();
		$this->ejecutarConsulta();
		

		//Devuelve la respuesta
		return $this->respuesta;
	}

	function subirExcelDinamico()
	{
		//Definicion de variables para ejecucion del procedimiento
		$this->procedimiento='hidro.f_thd_tipo_sensor_codigo_ime';
		$this->transaccion='HD_TISECOFI_IME';
		$this->tipo_procedimiento='IME';
				
		//Define los parametros para la funcion
		
		$this->setParametro('id_tipo_sensor','id_tipo_sensor','int4');		//medicion
		$this->setParametro('id_sensor','id_sensor','int4');					//medicion
		$this->setParametro('tipo_sensor_codigo','tipo_sensor_codigo','varchar');		
		$this->setParametro('excel','excel','bytea',false,1024,false,array("csv"));

		//Ejecuta la instruccion
		$this->armarConsulta();
		$this->ejecutarConsulta();


		//echo $this->getConsulta(); exit;
		
		//Devuelve la respuesta
		return $this->respuesta;
	}



			
}
?>