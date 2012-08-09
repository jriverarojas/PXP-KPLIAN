<?php
/**
*@package pXP
*@file gen-FuncionesSisGestionVehicular.php
*@author  (prueba1)
*@date 13-10-2011 10:19:55
*@description Clase que centraliza todos los metodos de todas las clases del Sistema de SISTEMA DE GESTION VEHICULAR
*/

class FuncionesGestionVehicular{
		
	function __construct(){
		foreach (glob('../../sis_gestion_vehicular/modelo/MOD*.php') as $archivo){
			include_once($archivo);
		}
	}
	
	/*Clase: MODServicio
	* Fecha: 14-10-2011 09:24:08
	* Autor: prueba1*/
	function listarServicio(CTParametro $parametro){
		$obj=new MODServicio($parametro);
		$res=$obj->listarServicio();
		return $res;
	}
			
	function insertarServicio(CTParametro $parametro){
		$obj=new MODServicio($parametro);
		$res=$obj->insertarServicio();
		return $res;
	}
			
	function modificarServicio(CTParametro $parametro){
		$obj=new MODServicio($parametro);
		$res=$obj->modificarServicio();
		return $res;
	}
			
	function eliminarServicio(CTParametro $parametro){
		$obj=new MODServicio($parametro);
		$res=$obj->eliminarServicio();
		return $res;
	}
	/*FinClase: MODServicio*/
	
	
	/*Clase: MODEvento
	* Fecha: 13-10-2011 15:41:39
	* Autor: prueba1*/
	function listarEvento(CTParametro $parametro){
		$obj=new MODEvento($parametro);
		$res=$obj->listarEvento();
		return $res;
	}
			
	function insertarEvento(CTParametro $parametro){
		$obj=new MODEvento($parametro);
		$res=$obj->insertarEvento();
		return $res;
	}
			
	function modificarEvento(CTParametro $parametro){
		$obj=new MODEvento($parametro);
		$res=$obj->modificarEvento();
		return $res;
	}
			
	function eliminarEvento(CTParametro $parametro){
		$obj=new MODEvento($parametro);
		$res=$obj->eliminarEvento();
		return $res;
	}
	/*FinClase: MODEvento*/
	
	/*Clase: MODTipoEvento
	* Fecha: 13-10-2011 12:33:44
	* Autor: prueba1*/
	function listarTipoEvento(CTParametro $parametro){
		$obj=new MODTipoEvento($parametro);
		$res=$obj->listarTipoEvento();
		return $res;
	}
			
	function insertarTipoEvento(CTParametro $parametro){
		$obj=new MODTipoEvento($parametro);
		$res=$obj->insertarTipoEvento();
		return $res;
	}
			
	function modificarTipoEvento(CTParametro $parametro){
		$obj=new MODTipoEvento($parametro);
		$res=$obj->modificarTipoEvento();
		return $res;
	}
			
	function eliminarTipoEvento(CTParametro $parametro){
		$obj=new MODTipoEvento($parametro);
		$res=$obj->eliminarTipoEvento();
		return $res;
	}
	/*FinClase: MODTipoEvento*/

	
	/*Clase: MODMarca
	* Fecha: 13-10-2011 10:44:18
	* Autor: prueba1*/
	function listarMarca(CTParametro $parametro){
		$obj=new MODMarca($parametro);
		$res=$obj->listarMarca();
		return $res;
	}
			
	function insertarMarca(CTParametro $parametro){
		$obj=new MODMarca($parametro);
		$res=$obj->insertarMarca();
		return $res;
	}
			
	function modificarMarca(CTParametro $parametro){
		$obj=new MODMarca($parametro);
		$res=$obj->modificarMarca();
		return $res;
	}
			
	function eliminarMarca(CTParametro $parametro){
		$obj=new MODMarca($parametro);
		$res=$obj->eliminarMarca();
		return $res;
	}
	/*FinClase: MODMarca*/

	/*Clase: MODModelo
	* Fecha: 13-10-2011 12:09:29
	* Autor: prueba*/
	function listarModelo(CTParametro $parametro){
		$obj=new MODModelo($parametro);
		$res=$obj->listarModelo();
		return $res;
	}
			
	function insertarModelo(CTParametro $parametro){
		$obj=new MODModelo($parametro);
		$res=$obj->insertarModelo();
		return $res;
	}
			
	function modificarModelo(CTParametro $parametro){
		$obj=new MODModelo($parametro);
		$res=$obj->modificarModelo();
		return $res;
	}
			
	function eliminarModelo(CTParametro $parametro){
		$obj=new MODModelo($parametro);
		$res=$obj->eliminarModelo();
		return $res;
	}
	/*FinClase: MODModelo*/

	
	/*Clase: MODActivoFijoRastreo
	* Fecha: 14-10-2011 09:34:13
	* Autor: prueba*/
	function listarActivoFijoRastreo(CTParametro $parametro){
		$obj=new MODActivoFijoRastreo($parametro);
		$res=$obj->listarActivoFijoRastreo();
		return $res;
	}
			
	function insertarActivoFijoRastreo(CTParametro $parametro){
		$obj=new MODActivoFijoRastreo($parametro);
		$res=$obj->insertarActivoFijoRastreo();
		return $res;
	}
			
	function modificarActivoFijoRastreo(CTParametro $parametro){
		$obj=new MODActivoFijoRastreo($parametro);
		$res=$obj->modificarActivoFijoRastreo();
		return $res;
	}
			
	function eliminarActivoFijoRastreo(CTParametro $parametro){
		$obj=new MODActivoFijoRastreo($parametro);
		$res=$obj->eliminarActivoFijoRastreo();
		return $res;
	}
	
	function obtenerCoordenadas(CTParametro $parametro){
		//echo "XXXXXXXXXXXXXXXXXXXXX";
		//exit;
		$obj=new MODActivoFijoRastreo($parametro);
		$res=$obj->obtenerCoordenadas();
		return $res;
	}
	
	/*FinClase: MODActivoFijoRastreo*/
	
	function listarIboton(CTParametro $parametro){
		$obj=new MODIboton($parametro);
		$res=$obj->listarIboton();
		return $res;
	}
			
	function insertarIboton(CTParametro $parametro){
		$obj=new MODIboton($parametro);
		$res=$obj->insertarIboton();
		return $res;
	}
			
	function modificarIboton(CTParametro $parametro){
		$obj=new MODIboton($parametro);
		$res=$obj->modificarIboton();
		return $res;
	}
			
	function eliminarIboton(CTParametro $parametro){
		$obj=new MODIboton($parametro);
		$res=$obj->eliminarIboton();
		return $res;
	}
	/*FinClase: MODIboton*/
	
	
	/*Clase: MODActivoFijoUltimoRegistro
	* Fecha: 02-02-2012 15:52:33
	* Autor: herman*/
	function listarActivoFijoUltimoRegistro(CTParametro $parametro){
		$obj=new MODActivoFijoUltimoRegistro($parametro);
		$res=$obj->listarActivoFijoUltimoRegistro();
		return $res;
	}
			
	function insertarActivoFijoUltimoRegistro(CTParametro $parametro){
		$obj=new MODActivoFijoUltimoRegistro($parametro);
		$res=$obj->insertarActivoFijoUltimoRegistro();
		return $res;
	}
			
	function modificarActivoFijoUltimoRegistro(CTParametro $parametro){
		$obj=new MODActivoFijoUltimoRegistro($parametro);
		$res=$obj->modificarActivoFijoUltimoRegistro();
		return $res;
	}
			
	function eliminarActivoFijoUltimoRegistro(CTParametro $parametro){
		$obj=new MODActivoFijoUltimoRegistro($parametro);
		$res=$obj->eliminarActivoFijoUltimoRegistro();
		return $res;
	}
	/*FinClase: MODActivoFijoUltimoRegistro*/
	
	
		/*Clase: MODAgrupacion
	* Fecha: 02-02-2012 16:12:10
	* Autor: herman*/
	function listarAgrupacion(CTParametro $parametro){
		$obj=new MODAgrupacion($parametro);
		$res=$obj->listarAgrupacion();
		return $res;
	}
			
	function insertarAgrupacion(CTParametro $parametro){
		$obj=new MODAgrupacion($parametro);
		$res=$obj->insertarAgrupacion();
		return $res;
	}
			
	function modificarAgrupacion(CTParametro $parametro){
		$obj=new MODAgrupacion($parametro);
		$res=$obj->modificarAgrupacion();
		return $res;
	}
			
	function eliminarAgrupacion(CTParametro $parametro){
		$obj=new MODAgrupacion($parametro);
		$res=$obj->eliminarAgrupacion();
		return $res;
	}
	/*FinClase: MODAgrupacion*/
	
	
/*Clase: MODAgrupacionEvento
	* Fecha: 02-02-2012 19:07:27
	* Autor: herman*/
	function listarAgrupacionEvento(CTParametro $parametro){
		$obj=new MODAgrupacionEvento($parametro);
		$res=$obj->listarAgrupacionEvento();
		return $res;
	}
			
	function insertarAgrupacionEvento(CTParametro $parametro){
		$obj=new MODAgrupacionEvento($parametro);
		$res=$obj->insertarAgrupacionEvento();
		return $res;
	}
			
	function modificarAgrupacionEvento(CTParametro $parametro){
		$obj=new MODAgrupacionEvento($parametro);
		$res=$obj->modificarAgrupacionEvento();
		return $res;
	}
			
	function eliminarAgrupacionEvento(CTParametro $parametro){
		$obj=new MODAgrupacionEvento($parametro);
		$res=$obj->eliminarAgrupacionEvento();
		return $res;
	}
	/*FinClase: MODAgrupacionEvento*/
	
	
	/*Clase: MODMantenimiento
	* Fecha: 02-02-2012 21:02:51
	* Autor: herman*/
	function listarMantenimiento(CTParametro $parametro){
		$obj=new MODMantenimiento($parametro);
		$res=$obj->listarMantenimiento();
		return $res;
	}
			
	function insertarMantenimiento(CTParametro $parametro){
		$obj=new MODMantenimiento($parametro);
		$res=$obj->insertarMantenimiento();
		return $res;
	}
			
	function modificarMantenimiento(CTParametro $parametro){
		$obj=new MODMantenimiento($parametro);
		$res=$obj->modificarMantenimiento();
		return $res;
	}
			
	function eliminarMantenimiento(CTParametro $parametro){
		$obj=new MODMantenimiento($parametro);
		$res=$obj->eliminarMantenimiento();
		return $res;
	}
	/*FinClase: MODMantenimiento*/
	
	
}//marca_generador
?>