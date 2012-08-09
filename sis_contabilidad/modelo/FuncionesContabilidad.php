<?php
class FuncionesContabilidad
{
	function __construct()
	{
		
		
		include_once('MODCuenta.php');
		include_once('MODAuxiliar.php');
		
		
	}
	
	/**	CUENTA **/
	function ValidaCuenta(CTParametro $parametro){
		$cuenta=new MODCuenta($parametro);
		$res=$cuenta->ValidaCuenta();
		return $res;
	}
	
	
	function listarCuenta(CTParametro $parametro){
		$cuenta=new  MODCuenta($parametro);
		$res=$cuenta->listarCuenta();
		return $res;
	}
	
	function insertarCuenta(CTParametro $parametro){
		$cuenta=new  MODCuenta($parametro);
		$res=$cuenta->insertarCuenta();
		return $res;
	}
	
	function modificarCuenta(CTParametro $parametro){
		$cuenta=new  MODCuenta($parametro);
		$res=$cuenta->modificarCuenta();
		return $res;
	}
	
	function eliminarCuenta(CTParametro $parametro){
		$cuenta=new  MODCuenta($parametro);
		$res=$cuenta->eliminarCuenta();
		return $res;
	}
	
	
	/**	AUXILIAR **/
	function ValidaAuxiliar(CTParametro $parametro){
		$auxiliar=new MODAuxiliar($parametro);
		$res=$auxiliar->ValidaAuxiliar();
		return $res;
	}
	
	
	function listarAuxiliar(CTParametro $parametro){
		$auxiliar=new  MODAuxiliar($parametro);
		$res=$auxiliar->listarAuxiliar();
		return $res;
	}
	
	function insertarAuxiliar(CTParametro $parametro){
		$auxiliar=new  MODAuxiliar($parametro);
		$res=$auxiliar->insertarAuxiliar();
		return $res;
	}
	
	function modificarAuxiliar(CTParametro $parametro){
		$auxiliar=new  MODAuxiliar($parametro);
		$res=$auxiliar->modificarAuxiliar();
		return $res;
	}
	
	function eliminarAuxiliar(CTParametro $parametro){
		$auxiliar=new  MODAuxiliar($parametro);
		$res=$auxiliar->eliminarAuxiliar();
		return $res;
	}
	
	
	
}

?>