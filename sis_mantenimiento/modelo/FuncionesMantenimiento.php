<?php
/**
*@package pXP
*@file gen-FuncionesMantenimiento.php
*@author  (rac)
*@date 14-06-2012 03:46:45
*@description Clase que centraliza todos los metodos de todas las clases del Sistema de SISTEMA DE GESTION DE MANTENIMIENTO
*/

class FuncionesMantenimiento{
		
	function __construct(){
		foreach (glob('../../sis_mantenimiento/modelo/MOD*.php') as $archivo){
			include_once($archivo);
		}
	}

	/*Clase: MODLocalizacion
	* Fecha: 14-06-2012 03:46:45
	* Autor: rac*/
	function listarLocalizacion(CTParametro $parametro){
		$obj=new MODLocalizacion($parametro);
		$res=$obj->listarLocalizacion();
		return $res;
	}
		
	function listarLocalizacionArb(CTParametro $parametro){
		$obj=new MODLocalizacion($parametro);
		$res=$obj->listarLocalizacionArb();
		return $res;
	}

			
	function insertarLocalizacion(CTParametro $parametro){
		$obj=new MODLocalizacion($parametro);
		$res=$obj->insertarLocalizacion();
		return $res;
	}
			
	function modificarLocalizacion(CTParametro $parametro){
		$obj=new MODLocalizacion($parametro);
		$res=$obj->modificarLocalizacion();
		return $res;
	}
			
	function eliminarLocalizacion(CTParametro $parametro){
		$obj=new MODLocalizacion($parametro);
		$res=$obj->eliminarLocalizacion();
		return $res;
	}
	/*FinClase: MODLocalizacion*/

			
}//marca_generador
?>