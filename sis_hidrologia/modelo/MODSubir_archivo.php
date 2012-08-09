<?php
/**
*@package pXP
*@file gen-MODMedicion.php
*@author  (mflores)
*@date 07-09-2011 15:50:29
*@description Clase que envia los parametros requeridos a la Base de datos para la ejecucion de las funciones, y que recibe la respuesta del resultado de la ejecucion de las mismas
*/

class MODSubir_archivo extends MODbase{
	
	function __construct(CTParametro $pParam){
		parent::__construct($pParam);
	}
			
	function subir_archivo()
	{		
		//$ext = pathinfo($this->arregloFiles['excel']['name']);
		
		//Definicion de variables para ejecucion del procedimiento
		$this->procedimiento='hidro.f_thd_subir_archivo';
		$this->transaccion='HD_SUBIR_ARC';
		$this->tipo_procedimiento='IME';
    		
		//$this->arreglo['extension']= $ext['extension'];
				
		//Define los parametros para la funcion
		$this->setParametro('excel','excel','bytea',false,1024,false,array("csv","CSV"));
				
		//Ejecuta la instruccion
		$this->armarConsulta();
		$this->ejecutarConsulta();

		//Devuelve la respuesta
		return $this->respuesta;
	}			
}
?>