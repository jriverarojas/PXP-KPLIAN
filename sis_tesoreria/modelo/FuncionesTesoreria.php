<?php
/**
*@package pXP
*@file gen-FuncionesTesoreria.php
*@author  (fprudencio)
*@date 29-09-2011 10:47:42
*@description Clase que centraliza todos los metodos de todas las clases del Sistema de Sistema de Tesoreria
*/

class FuncionesTesoreria{
		
	function __construct(){
		foreach (glob('../../sis_tesoreria/modelo/MOD*.php') as $archivo){
			include_once($archivo);
		}
	}

	/*Clase: MODCorteMoneda
	* Fecha: 29-09-2011 10:47:42
	* Autor: fprudencio*/
	function listarCorteMoneda(CTParametro $parametro){
		$obj=new MODCorteMoneda($parametro);
		$res=$obj->listarCorteMoneda();
		return $res;
	}
			
	function insertarCorteMoneda(CTParametro $parametro){
		$obj=new MODCorteMoneda($parametro);
		$res=$obj->insertarCorteMoneda();
		return $res;
	}
			
	function modificarCorteMoneda(CTParametro $parametro){
		$obj=new MODCorteMoneda($parametro);
		$res=$obj->modificarCorteMoneda();
		return $res;
	}
			
	function eliminarCorteMoneda(CTParametro $parametro){
		$obj=new MODCorteMoneda($parametro);
		$res=$obj->eliminarCorteMoneda();
		return $res;
	}
	/*FinClase: MODCorteMoneda*/

			
}//marca_generador
?>