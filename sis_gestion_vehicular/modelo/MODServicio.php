<?php
/**
*@package pXP
*@file gen-MODServicio.php
*@author  (rcm)
*@date 02-02-2012 02:56:44
*@description Clase que envia los parametros requeridos a la Base de datos para la ejecucion de las funciones, y que recibe la respuesta del resultado de la ejecucion de las mismas
*/

class MODServicio extends MODbase{
	
	function __construct(CTParametro $pParam){
		parent::__construct($pParam);
	}
			
	function listarServicio(){
		//Definicion de variables para ejecucion del procedimientp
		$this->procedimiento='gev.f_tgv_servicio_sel';
		$this->transaccion='tgv_SERVIC_SEL';
		$this->tipo_procedimiento='SEL';//tipo de transaccion

		$this->setParametro('tipo_interfaz','tipo_interfaz','varchar');	
		//Definicion de la lista del resultado del query
		$this->captura('id_servicio','int4');
		$this->captura('estado','varchar');
		$this->captura('estado_reg','varchar');
		$this->captura('id_lugar_destino','int4');
		$this->captura('id_ep','int4');
		$this->captura('fecha_asig_fin','date');
		$this->captura('fecha_sol_ini','date');
		$this->captura('descripcion','varchar');
		$this->captura('id_lugar_origen','int4');
		$this->captura('cant_personas','int4');
		$this->captura('fecha_sol_fin','date');
		$this->captura('id_funcionario','int4');
		$this->captura('fecha_asig_ini','date');
		$this->captura('id_usuario_reg','int4');
		$this->captura('fecha_reg','timestamp');
		$this->captura('id_usuario_mod','int4');
		$this->captura('fecha_mod','timestamp');
		$this->captura('usr_reg','varchar');
		$this->captura('usr_mod','varchar');
		$this->captura('desc_funcionario','text');
		$this->captura('desc_lugar_ini','varchar');
		$this->captura('desc_lugar_des','varchar');
		$this->captura('id_funcionario_autoriz','int4');
		$this->captura('observaciones','varchar');
		$this->captura('desc_funcionario_autoriz','text');
		
		//Ejecuta la instruccion
		$this->armarConsulta();
		$this->ejecutarConsulta();
		//echo '--->'.$this->getConsulta(); exit;
		//Devuelve la respuesta
		return $this->respuesta;
	}
			
	function insertarServicio(){
		//Definicion de variables para ejecucion del procedimiento
		$this->procedimiento='gev.f_tgv_servicio_ime';
		$this->transaccion='tgv_SERVIC_INS';
		$this->tipo_procedimiento='IME';
				
		
		//Define los parametros para la funcion
		$this->setParametro('estado','estado','varchar');
		$this->setParametro('estado_reg','estado_reg','varchar');
		$this->setParametro('id_lugar_destino','id_lugar_destino','int4');
		$this->setParametro('id_ep','id_ep','int4');
		$this->setParametro('fecha_asig_fin','fecha_asig_fin','date');
		$this->setParametro('fecha_sol_ini','fecha_sol_ini','date');
		$this->setParametro('descripcion','descripcion','varchar');
		$this->setParametro('id_lugar_origen','id_lugar_origen','int4');
		$this->setParametro('cant_personas','cant_personas','int4');
		$this->setParametro('fecha_sol_fin','fecha_sol_fin','date');
		$this->setParametro('id_funcionario','id_funcionario','int4');
		$this->setParametro('fecha_asig_ini','fecha_asig_ini','date');
		$this->setParametro('id_funcionario_autoriz','id_funcionario_autoriz','int4');
		$this->setParametro('observaciones','observaciones','varchar');

		//Ejecuta la instruccion
		$this->armarConsulta();
		$this->ejecutarConsulta();

		//Devuelve la respuesta
		return $this->respuesta;
	}
			
	function modificarServicio(){ 
		//Definicion de variables para ejecucion del procedimiento
		$this->procedimiento='gev.f_tgv_servicio_ime';
		$this->tipo_procedimiento='IME';
				
		
		$parametros  = $this->aParam->getArregloParametros('asignacion');
		//si esdel tipo matriz  verifica en la primera posicion el tipo de vista
		if($this->esMatriz){
		    $tipo_operacion =$parametros[0]['tipo_operacion'];	
			
		}else{
			$tipo_operacion =$parametros['tipo_operacion'];
			
		}
		
		if($tipo_operacion=='asignacion'){
		   $this->transaccion='tgv_SERVIC_MOD';
          }  
        elseif($tipo_operacion=='cambiar_estado'){ 
		   $this->transaccion='tgv_SERCAMEST_MOD';
		   $this->setParametro('operacion','operacion','varchar');// cuando finaliza los requerimientos, su valor es fin_requerimiento
		   //$this->setParametro('id_abogado','id_abogado','int4');
		}
		elseif ($tipo_operacion=='def_fechas'){ 
		   $this->transaccion='tgv_DEFFECHA_MOD';
		  // $this->setParametro('operacion','operacion','varchar');// cuando finaliza los requerimientos, su valor es fin_requerimiento
		   //$this->setParametro('id_abogado','id_abogado','int4');
		}
		
		//Define los parametros para la funcion
		$this->setParametro('id_servicio','id_servicio','int4');
		$this->setParametro('estado','estado','varchar');
		$this->setParametro('estado_reg','estado_reg','varchar');
		$this->setParametro('id_lugar_destino','id_lugar_destino','int4');
		$this->setParametro('id_ep','id_ep','int4');
		$this->setParametro('fecha_asig_fin','fecha_asig_fin','date');
		$this->setParametro('fecha_sol_ini','fecha_sol_ini','date');
		$this->setParametro('descripcion','descripcion','varchar');
		$this->setParametro('id_lugar_origen','id_lugar_origen','int4');
		$this->setParametro('cant_personas','cant_personas','int4');
		$this->setParametro('fecha_sol_fin','fecha_sol_fin','date');
		$this->setParametro('id_funcionario','id_funcionario','int4');
		$this->setParametro('fecha_asig_ini','fecha_asig_ini','date');
		$this->setParametro('id_funcionario_autoriz','id_funcionario_autoriz','int4');
		$this->setParametro('observaciones','observaciones','varchar');

		//Ejecuta la instruccion
		$this->armarConsulta();
		$this->ejecutarConsulta();

		//Devuelve la respuesta
		return $this->respuesta;
	}
			
	function eliminarServicio(){
		//Definicion de variables para ejecucion del procedimiento
		$this->procedimiento='gev.f_tgv_servicio_ime';
		$this->transaccion='tgv_SERVIC_ELI';
		$this->tipo_procedimiento='IME';
				
		//Define los parametros para la funcion
		$this->setParametro('id_servicio','id_servicio','int4');

		//Ejecuta la instruccion
		$this->armarConsulta();
		$this->ejecutarConsulta();

		//Devuelve la respuesta
		return $this->respuesta;
	}
		

	function finalizarSolicitudServicio(){
		//Definicion de variables para ejecucion del procedimiento
		$this->procedimiento='gev.f_tgv_servicio_ime';
		$this->transaccion='tgv_FINSOLSER_MOD';
		$this->tipo_procedimiento='IME';
				
		//Define los parametros para la funcion
		$this->setParametro('id_servicio','id_servicio','int4');

		//Ejecuta la instruccion
		$this->armarConsulta();
		$this->ejecutarConsulta();

		//Devuelve la respuesta
		return $this->respuesta;
	}
	
}
?>