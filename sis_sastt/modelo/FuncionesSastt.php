<?php
/**
*@package pXP
*@file gen-FuncionesSastt.php
*@author  (rortiz)
*@date 17-11-2011 16:31:33
*@description Clase que centraliza todos los metodos de todas las clases del Sistema de Sistema de atención en servicio técnico
*/

class FuncionesSastt{
		
	function __construct(){
		foreach (glob('../../sis_sastt/modelo/MOD*.php') as $archivo){
			include_once($archivo);
		}
	}

	/*Clase: MODEstadoRequerimiento
	* Fecha: 22-11-2011 09:25:13
	* Autor: rortiz*/
	
	function dibujaGrafico(CTParametro $parametro){
		$obj=new MODEstadoRequerimiento($parametro);
		$res=$obj->dibujaGrafico();
		return $res;
	}
	/*FinClase: MODEstadoRequerimiento*/

	/*Clase: MODTipoRequerimiento
	* Fecha: 17-11-2011 16:31:33
	* Autor: rortiz*/
	function listarTipoRequerimiento(CTParametro $parametro){
		$obj=new MODTipoRequerimiento($parametro);
		$res=$obj->listarTipoRequerimiento();
		return $res;
	}
	
	function insertarTipoRequerimiento(CTParametro $parametro){
		$obj=new MODTipoRequerimiento($parametro);
		$res=$obj->insertarTipoRequerimiento();
		return $res;
	}
		function eliminarTipoRequerimiento(CTParametro $parametro){
		$obj=new MODTipoRequerimiento($parametro);
		$res=$obj->eliminarTipoRequerimiento();
		return $res;
	}
	
		function modificarTipoRequerimiento(CTParametro $parametro){
		$obj=new MODTipoRequerimiento($parametro);
		$res=$obj->modificarTipoRequerimiento();
		return $res;
	}
			
	/*Clase: MODRequerimientos
	* Fecha: 22-11-2011 15:09:03
	* Autor: rortiz*/
	function listarCaptura(CTParametro $parametro){
		$obj=new  MODRequerimientos($parametro);
		$res=$obj->listarCaptura();
		return $res;
	}
			
	function insertarRequerimientos(CTParametro $parametro){
		$obj=new MODRequerimientos($parametro);
		$res=$obj->insertarRequerimientos();
		return $res;
	}
			
	function modificarRequerimientos(CTParametro $parametro){
		$obj=new MODRequerimientos($parametro);
		$res=$obj->modificarRequerimientos();
		return $res;
	}
	
	function subirCaptura(CTParametro $parametro){
		$obj=new  MODRequerimientos($parametro);
		$res=$obj->subirCaptura();
		return $res;
	}
			
	function eliminarRequerimientos(CTParametro $parametro){
		$obj=new MODRequerimientos($parametro);
		$res=$obj->eliminarRequerimientos();
		return $res;
	}
	
	/*FinClase: MODRequerimientos*/
	/*Clase: MODEstado
	* Fecha: 22-11-2011 15:48:00
	* Autor: rortiz*/
	function listarEstado(CTParametro $parametro){
		$obj=new MODEstado($parametro);
		$res=$obj->listarEstado();
		return $res;
	}
			
	function insertarEstado(CTParametro $parametro){
		$obj=new MODEstado($parametro);
		$res=$obj->insertarEstado();
		return $res;
	}
			
	function modificarEstado(CTParametro $parametro){
		$obj=new MODEstado($parametro);
		$res=$obj->modificarEstado();
		return $res;
	}
			
	function eliminarEstado(CTParametro $parametro){
		$obj=new MODEstado($parametro);
		$res=$obj->eliminarEstado();
		return $res;
	}
	
}//marca_generador
?>