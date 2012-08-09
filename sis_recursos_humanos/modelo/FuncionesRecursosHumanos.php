<?php
class FuncionesRecursosHumanos
{
	function __construct()
	{
		
		
		/*include_once('MODParametroRhum.php');
		include_once('MODFuncionario.php');
		include_once('MODTipoColumna.php');
		include_once('MODTipoObligacion.php');*/
		foreach (glob('../../sis_recursos_humanos/modelo/MOD*.php') as $archivo){
			include_once($archivo);
		}	
		
		
	}
		
	function listarParametroRhum(CTParametro $parametro){
		$parametro_rhum=new  MODParametroRhum($parametro);
		$res=$parametro_rhum->listarParametroRhum();
		return $res;
	}
	
	function insertarParametroRhum(CTParametro $parametro){
		$parametro_rhum=new  MODParametroRhum($parametro);
		$res=$parametro_rhum->insertarParametroRhum();
		return $res;
	}
	
	function modificarParametroRhum(CTParametro $parametro){
		$parametro_rhum=new  MODParametroRhum($parametro);
		$res=$parametro_rhum->modificarParametroRhum();
		return $res;
	}
	
	function eliminarParametroRhum(CTParametro $parametro){
		$parametro_rhum=new  MODParametroRhum($parametro);
		$res=$parametro_rhum->eliminarParametroRhum();
		return $res;
	}
	
	//----------------------FUNCIONARIO----------------//
	
	function listarFuncionario(CTParametro $parametro){
		$funcionario=new  MODFuncionario($parametro);
		$res=$funcionario->listarFuncionario();
		return $res;
	}
	
	function insertarFuncionario(CTParametro $parametro){
		$funcionario=new  MODFuncionario($parametro);
		$res=$funcionario->insertarFuncionario();
		return $res;
	}
	
	function modificarFuncionario(CTParametro $parametro){
		$funcionario=new  MODFuncionario($parametro);
		$res=$funcionario->modificarFuncionario();
		return $res;
	}
	
	function eliminarFuncionario(CTParametro $parametro){
		$funcionario=new  MODFuncionario($parametro);
		$res=$funcionario->eliminarFuncionario();
		return $res;
	}
	
	
	//----------------------TIPO COLUMNA----------------//
	
	function listarTipoColumna(CTParametro $parametro){
		$tipo_columna=new  MODTipoColumna($parametro);
		$res=$tipo_columna->listarTipoColumna();
		return $res;
	}
	
	function insertarTipoColumna(CTParametro $parametro){
		$tipo_columna=new  MODTipoColumna($parametro);
		$res=$tipo_columna->insertarTipoColumna();
		return $res;
	}
	
	function modificarTipoColumna(CTParametro $parametro){
		$tipo_columna=new  MODTipoColumna($parametro);
		$res=$tipo_columna->modificarTipoColumna();
		return $res;
	}
	
	function eliminarTipoColumna(CTParametro $parametro){
		$tipo_columna=new  MODTipoColumna($parametro);
		$res=$tipo_columna->eliminarTipoColumna();
		return $res;
	}
//----------------------TIPO OBLIGACION----------------//
	
	function listarTipoObligacion(CTParametro $parametro){
		$tipo_obligacion=new  MODTipoObligacion($parametro);
		$res=$tipo_obligacion->listarTipoObligacion();
		return $res;
	}
	
	function insertarTipoObligacion(CTParametro $parametro){
		$tipo_obligacion=new  MODTipoObligacion($parametro);
		$res=$tipo_obligacion->insertarTipoObligacion();
		return $res;
	}
	
	function modificarTipoObligacion(CTParametro $parametro){
		$tipo_obligacion=new  MODTipoObligacion($parametro);
		$res=$tipo_obligacion->modificarTipoObligacion();
		return $res;
	}
	
	function eliminarTipoObligacion(CTParametro $parametro){
		$tipo_obligacion=new  MODTipoObligacion($parametro);
		$res=$tipo_obligacion->eliminarTipoObligacion();
		return $res;
	}
	
	/*Clase: MODEstructuraUo
	* Fecha: 2010
	* Autor: admin*/
	function listarEstructuraUo(CTParametro $parametro){
		$estructura_uo=new  MODEstructuraUo($parametro);
		$res=$estructura_uo->listarEstructuraUo();
		return $res;
	}
	
	function insertarEstructuraUo(CTParametro $parametro){
		$estructura_uo=new  MODEstructuraUo($parametro);
		$res=$estructura_uo->insertarEstructuraUo();
		return $res;
	}
	
	function modificarEstructuraUo(CTParametro $parametro){
		$estructura_uo=new  MODEstructuraUo($parametro);
		$res=$estructura_uo->modificarEstructuraUo();
		return $res;
	}
	
	function eliminarEstructuraUo(CTParametro $parametro){
		$estructura_uo=new  MODEstructuraUo($parametro);
		$res=$estructura_uo->eliminarEstructuraUo();
		return $res;
	}
	/*FinClase: MODEstructuraUo*/
	
	/*Clase: MODUoFuncionario
	* Fecha: 2010
	* Autor: admin*/
	function listarUoFuncionario(CTParametro $parametro){ 
		$uo_funcionario=new  MODUoFuncionario($parametro);
		$res=$uo_funcionario->listarUoFuncionario();
		return $res;
	}
	
	function insertarUoFuncionario(CTParametro $parametro){
		$uo_funcionario=new  MODUoFuncionario($parametro);
		$res=$uo_funcionario->insertarUoFuncionario();
		return $res;
	}
	
	function modificarUoFuncionario(CTParametro $parametro){
		$uo_funcionario=new  MODUoFuncionario($parametro);
		$res=$uo_funcionario->modificarUoFuncionario();
		return $res;
	}
	
	function eliminarUoFuncionario(CTParametro $parametro){
		$uo_funcionario=new  MODUoFuncionario($parametro);
		$res=$uo_funcionario->eliminarUoFuncionario();
		return $res;
	}
	/*FinClase: MODUoFuncionario*/
	
	/*Clase: MODUo
	* Fecha: 2010
	* Autor: admin*/
	function listarUo(CTParametro $parametro){ 
		$uo=new MODUo($parametro);
		$res=$uo->listarUo();
		return $res;
	}
	

	function listarUoFiltro(CTParametro $parametro){
		$uo=new MODUo($parametro);
		$res=$uo->listarUoFiltro();
		return $res;
	}
	
	/*FinClase: MODUo*/
	

}

?>