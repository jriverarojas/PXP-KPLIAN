<?php
/**
*@package pXP
*@file gen-MODSistemaDist.php
*@author  (fprudencio)
*@date 20-09-2011 10:22:05
*@description Clase que envia los parametros requeridos a la Base de datos para la ejecucion de las funciones, y que recibe la respuesta del resultado de la ejecucion de las mismas
*/

class MODSistemaDist extends MODbase{
	
	function __construct(CTParametro $pParam){
		parent::__construct($pParam);
	}
			
	function listarSistemaDist(){
		//Definicion de variables para ejecucion del procedimientp
		$this->procedimiento='cobra.f_tcb_sistema_dist_sel';
		$this->transaccion='CB_SISDIS_SEL';
		$this->tipo_procedimiento='SEL';//tipo de transaccion
				
		//Definicion de la lista del resultado del query
		$this->captura('id_sistema_dist','int4');
		$this->captura('codigo','varchar');
		$this->captura('conexion','varchar');
		$this->captura('nombre','varchar');
		$this->captura('estado_reg','varchar');
		$this->captura('id_usuario_reg','int4');
		//$this->captura('fecha_reg','date');
		$this->captura('fecha_reg','timestamp');
		$this->captura('id_usuario_mod','int4');
		$this->captura('fecha_mod','timestamp');
		//$this->captura('fecha_mod','varchar');
		$this->captura('usr_reg','varchar');
		$this->captura('usr_mod','varchar');
		
		//Ejecuta la instruccion
		$this->armarConsulta();
		//echo "LLLLLL".$this->consulta_armada; exit;
		$this->ejecutarConsulta();
		
		//Devuelve la respuesta
		return $this->respuesta;
	}
			
	function insertarSistemaDist(){
		//Definicion de variables para ejecucion del procedimiento
		$this->procedimiento='cobra.f_tcb_sistema_dist_ime';
		$this->transaccion='CB_SISDIS_INS';
		$this->tipo_procedimiento='IME';
				
		//Define los parametros para la funcion
		$this->setParametro('codigo','codigo','varchar');
		$this->setParametro('conexion','conexion','varchar');
		$this->setParametro('nombre','nombre','varchar');
		$this->setParametro('estado_reg','estado_reg','varchar');

		//Ejecuta la instruccion
		$this->armarConsulta();
		$this->ejecutarConsulta();

		//Devuelve la respuesta
		return $this->respuesta;
	}
			
	function modificarSistemaDist(){
		//Definicion de variables para ejecucion del procedimiento
		$this->procedimiento='cobra.f_tcb_sistema_dist_ime';
		$this->transaccion='CB_SISDIS_MOD';
		$this->tipo_procedimiento='IME';
				
		//Define los parametros para la funcion
		$this->setParametro('id_sistema_dist','id_sistema_dist','int4');
		$this->setParametro('codigo','codigo','varchar');
		$this->setParametro('conexion','conexion','varchar');
		$this->setParametro('nombre','nombre','varchar');
		$this->setParametro('estado_reg','estado_reg','varchar');

		//Ejecuta la instruccion
		$this->armarConsulta();
		$this->ejecutarConsulta();

		//Devuelve la respuesta
		return $this->respuesta;
	}
			
	function eliminarSistemaDist(){
		//Definicion de variables para ejecucion del procedimiento
		$this->procedimiento='cobra.f_tcb_sistema_dist_ime';
		$this->transaccion='CB_SISDIS_ELI';
		$this->tipo_procedimiento='IME';
				
		//Define los parametros para la funcion
		$this->setParametro('id_sistema_dist','id_sistema_dist','int4');

		//Ejecuta la instruccion
		$this->armarConsulta();
		$this->ejecutarConsulta();

		//Devuelve la respuesta
		return $this->respuesta;
	}
	function importarClientes(){
		//Definicion de variables para ejecucion del procedimiento
		$this->procedimiento='cobra.f_tcb_sistema_dist_ime';
		$this->transaccion='CB_IMPOR_CLIENTE';
		$this->tipo_procedimiento='IME';
				
		//Define los parametros para la funcion
		$this->setParametro('id_sistema_dist','id_sistema_dist','int4');
		$this->setParametro('conexion','conexion','varchar');
		
		//Ejecuta la instruccion
		$this->armarConsulta();
		/*echo "armando..".$this->armarConsulta(); 
		
		echo  $this->getConsulta();
		exit;*/
		
		$this->ejecutarConsulta();
		
	  //echo "despues ejecutar";exit;
		//Devuelve la respuesta
		return $this->respuesta;
	}
	function importarFacturacion(){
		//Definicion de variables para ejecucion del procedimiento
		$this->procedimiento='cobra.f_tcb_sistema_dist_ime';
		$this->transaccion='CB_IMPOR_FACTUR';
		$this->tipo_procedimiento='IME';
				
		//Define los parametros para la funcion
		$this->setParametro('id_sistema_dist','id_sistema_dist','int4');
		$this->setParametro('conexion','conexion','varchar');
		$this->setParametro('importe_total','importe_total','numeric');
		$this->setParametro('id_cliente','id_cliente','int4');
		//Ejecuta la instruccion
		$this->armarConsulta();
		$this->ejecutarConsulta();

		//Devuelve la respuesta
		return $this->respuesta;
	}		
}
?>