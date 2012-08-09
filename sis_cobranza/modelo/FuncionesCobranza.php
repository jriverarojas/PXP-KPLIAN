<?php
/**
*@package pXP
*@file gen-FuncionesCobranza.php
*@author  (admin)
*@date 18-08-2011 09:57:13
*@description Clase que centraliza todos los metodos de todas las clases del Sistema de Cobranza Online
*/

class FuncionesCobranza{
		
	function __construct(){
		foreach (glob('../../sis_cobranza/modelo/MOD*.php') as $archivo){
			include_once($archivo);
		}
	}

	/*Clase: MODCliente
	* Fecha: 19-08-2011 08:50:51
	* Autor: admin*/
	function listarCliente(CTParametro $parametro){
		$obj=new MODCliente($parametro);
		$res=$obj->listarCliente();
		return $res;
	}
			
	function insertarCliente(CTParametro $parametro){
		$obj=new MODCliente($parametro);
		$res=$obj->insertarCliente();
		return $res;
	}
			
	function modificarCliente(CTParametro $parametro){
		$obj=new MODCliente($parametro);
		$res=$obj->modificarCliente();
		return $res;
	}
			
	function eliminarCliente(CTParametro $parametro){
		$obj=new MODCliente($parametro);
		$res=$obj->eliminarCliente();
		return $res;
	}
	/*FinClase: MODCliente*/


	/*Clase: MODPrueba
	* Fecha: 19-08-2011 10:03:11
	* Autor: admin*/
	function listarPrueba(CTParametro $parametro){
		$obj=new MODPrueba($parametro);
		$res=$obj->listarPrueba();
		return $res;
	}
			
	function insertarPrueba(CTParametro $parametro){
		$obj=new MODPrueba($parametro);
		$res=$obj->insertarPrueba();
		return $res;
	}
			
	function modificarPrueba(CTParametro $parametro){
		$obj=new MODPrueba($parametro);
		$res=$obj->modificarPrueba();
		return $res;
	}
			
	function eliminarPrueba(CTParametro $parametro){
		$obj=new MODPrueba($parametro);
		$res=$obj->eliminarPrueba();
		return $res;
	}
	/*FinClase: MODPrueba*/


	/*Clase: MODSistemaDist
	* Fecha: 20-09-2011 10:22:05
	* Autor: fprudencio*/
	function listarSistemaDist(CTParametro $parametro){
		$obj=new MODSistemaDist($parametro);
		$res=$obj->listarSistemaDist();
		return $res;
	}
			
	function insertarSistemaDist(CTParametro $parametro){
		$obj=new MODSistemaDist($parametro);
		$res=$obj->insertarSistemaDist();
		return $res;
	}
			
	function modificarSistemaDist(CTParametro $parametro){
		$obj=new MODSistemaDist($parametro);
		$res=$obj->modificarSistemaDist();
		return $res;
	}
			
	function eliminarSistemaDist(CTParametro $parametro){
		$obj=new MODSistemaDist($parametro);
		$res=$obj->eliminarSistemaDist();
		return $res;
	}
	function importarClientes(CTParametro $parametro){
		$obj=new MODSistemaDist($parametro);
		$res=$obj->importarClientes();
		return $res;
	}
	function importarfacturacion(CTParametro $parametro){
		$obj=new MODSistemaDist($parametro);
		$res=$obj->importarFacturacion();
		return $res;
	}
	/*FinClase: MODSistemaDist*/


	/*Clase: MODSistemaDistAgencia
	* Fecha: 20-09-2011 16:24:24
	* Autor: fprudencio*/
	function listarSistemaDistAgencia(CTParametro $parametro){
		$obj=new MODSistemaDistAgencia($parametro);
		$res=$obj->listarSistemaDistAgencia();
		return $res;
	}
			
	function insertarSistemaDistAgencia(CTParametro $parametro){
		$obj=new MODSistemaDistAgencia($parametro);
		$res=$obj->insertarSistemaDistAgencia();
		return $res;
	}
			
	function modificarSistemaDistAgencia(CTParametro $parametro){
		$obj=new MODSistemaDistAgencia($parametro);
		$res=$obj->modificarSistemaDistAgencia();
		return $res;
	}
			
	function eliminarSistemaDistAgencia(CTParametro $parametro){
		$obj=new MODSistemaDistAgencia($parametro);
		$res=$obj->eliminarSistemaDistAgencia();
		return $res;
	}
	/*FinClase: MODSistemaDistAgencia*/


	/*Clase: MODEntiFin
	* Fecha: 20-09-2011 16:58:53
	* Autor: gvelasquez*/
	function listarEntiFin(CTParametro $parametro){
		$obj=new MODEntiFin($parametro);
		$res=$obj->listarEntiFin();
		return $res;
	}
			
	function insertarEntiFin(CTParametro $parametro){
		$obj=new MODEntiFin($parametro);
		$res=$obj->insertarEntiFin();
		return $res;
	}
			
	function modificarEntiFin(CTParametro $parametro){
		$obj=new MODEntiFin($parametro);
		$res=$obj->modificarEntiFin();
		return $res;
	}
			
	function eliminarEntiFin(CTParametro $parametro){
		$obj=new MODEntiFin($parametro);
		$res=$obj->eliminarEntiFin();
		return $res;
	}
	/*FinClase: MODEntiFin*/


	/*Clase: MODAgencia
	* Fecha: 20-09-2011 19:15:41
	* Autor: fprudencio*/
	function listarAgencia(CTParametro $parametro){
		$obj=new MODAgencia($parametro);
		$res=$obj->listarAgencia();
		return $res;
	}
			
	function insertarAgencia(CTParametro $parametro){
		$obj=new MODAgencia($parametro);
		$res=$obj->insertarAgencia();
		return $res;
	}
			
	function modificarAgencia(CTParametro $parametro){
		$obj=new MODAgencia($parametro);
		$res=$obj->modificarAgencia();
		return $res;
	}
			
	function eliminarAgencia(CTParametro $parametro){
		$obj=new MODAgencia($parametro);
		$res=$obj->eliminarAgencia();
		return $res;
	}
	/*FinClase: MODAgencia*/


	/*Clase: MODSistemaDistUsuario
	* Fecha: 21-09-2011 10:41:58
	* Autor: fprudencio*/
	function listarSistemaDistUsuario(CTParametro $parametro){
		$obj=new MODSistemaDistUsuario($parametro);
		$res=$obj->listarSistemaDistUsuario();
		return $res;
	}
			
	function insertarSistemaDistUsuario(CTParametro $parametro){
		$obj=new MODSistemaDistUsuario($parametro);
		$res=$obj->insertarSistemaDistUsuario();
		return $res;
	}
			
	function modificarSistemaDistUsuario(CTParametro $parametro){
		$obj=new MODSistemaDistUsuario($parametro);
		$res=$obj->modificarSistemaDistUsuario();
		return $res;
	}
			
	function eliminarSistemaDistUsuario(CTParametro $parametro){
		$obj=new MODSistemaDistUsuario($parametro);
		$res=$obj->eliminarSistemaDistUsuario();
		return $res;
	}
	/*FinClase: MODSistemaDistUsuario*/


	/*Clase: MODFacturaCobDet
	* Fecha: 23-09-2011 16:47:28
	* Autor: gvelasquez*/
	function listarFacturaCobDet(CTParametro $parametro){
		$obj=new MODFacturaCobDet($parametro);
		$res=$obj->listarFacturaCobDet();
		return $res;
	}
			
	function insertarFacturaCobDet(CTParametro $parametro){
		$obj=new MODFacturaCobDet($parametro);
		$res=$obj->insertarFacturaCobDet();
		return $res;
	}
			
	function modificarFacturaCobDet(CTParametro $parametro){
		$obj=new MODFacturaCobDet($parametro);
		$res=$obj->modificarFacturaCobDet();
		return $res;
	}
			
	function eliminarFacturaCobDet(CTParametro $parametro){
		$obj=new MODFacturaCobDet($parametro);
		$res=$obj->eliminarFacturaCobDet();
		return $res;
	}
	/*FinClase: MODFacturaCobDet*/

	/*Clase: MODImportarFacturResum
	* Fecha: 10-11-2011 17:21:15
	* Autor: jmita*/
	function listarFacturacionPeriodo(CTParametro $parametro){
		$obj=new MODImportarFacturResum($parametro);
		$res=$obj->listarFacturacionPeriodo();
		return $res;
	}
	
	/*FinClase: MODImportarFacturResum*/

	/*Clase: MODFacturaCob
	* Fecha: 23-09-2011 17:21:15
	* Autor: gvelasquez*/
	function listarFacturaCob(CTParametro $parametro){
		$obj=new MODFacturaCob($parametro);
		$res=$obj->listarFacturaCob();
		return $res;
	}
			
	function insertarFacturaCob(CTParametro $parametro){
		$obj=new MODFacturaCob($parametro);
		$res=$obj->insertarFacturaCob();
		return $res;
	}
			
	function modificarFacturaCob(CTParametro $parametro){
		$obj=new MODFacturaCob($parametro);
		$res=$obj->modificarFacturaCob();
		return $res;
	}
			
	function eliminarFacturaCob(CTParametro $parametro){
		$obj=new MODFacturaCob($parametro);
		$res=$obj->eliminarFacturaCob();
		return $res;
	}
	function pagarFacturaCob(CTParametro $parametro){
		$obj=new MODFacturaCob($parametro);
		$res=$obj->pagarFacturaCob();
		return $res;
	}
	function anularFactura(CTParametro $parametro){
		$obj=new MODFacturaCob($parametro);
		$res=$obj->anularFactura();
		return $res;
	}
	function repFacturacionPend(CTParametro $parametro){
		$obj=new MODFacturaCob($parametro);
		$res=$obj->repFacturacionPend();
		return $res;
	}
	function repFacturasAnul(CTParametro $parametro){
		$obj=new MODFacturaCob($parametro);
		$res=$obj->repFacturasAnul();
		return $res;
	}
	function repIngresosPorCajero(CTParametro $parametro){
		$obj=new MODFacturaCob($parametro);
		$res=$obj->repIngresosPorCajero();
		return $res;
	}
	function repResumenFac(CTParametro $parametro){
		$obj=new MODFacturaCob($parametro);
		$res=$obj->repResumenFac();
		return $res;
	}
	function repFacturaDatosGen(CTParametro $parametro){
		$obj=new MODFacturaCob($parametro);
		$res=$obj->repFacturaDatosGen();
		return $res;
	}
	function repFacturaDatosDetalle(CTParametro $parametro){
		$obj=new MODFacturaCob($parametro);
		$res=$obj->repFacturaDatosDetalle();
		return $res;
	}
	function repFacturaHistoricoConsumo(CTParametro $parametro){
		$obj=new MODFacturaCob($parametro);
		$res=$obj->repFacturaHistoricoConsumo();
		return $res;
	}
	/*FinClase: MODFacturaCob*/


	/*Clase: MODCaja
	* Fecha: 26-09-2011 18:19:13
	* Autor: fprudencio*/
	function listarCaja(CTParametro $parametro){
		$obj=new MODCaja($parametro);
		$res=$obj->listarCaja();
		return $res;
	}
			
	function insertarCaja(CTParametro $parametro){
		$obj=new MODCaja($parametro);
		$res=$obj->insertarCaja();
		return $res;
	}
			
	function modificarCaja(CTParametro $parametro){
		$obj=new MODCaja($parametro);
		$res=$obj->modificarCaja();
		return $res;
	}
			
	function eliminarCaja(CTParametro $parametro){
		$obj=new MODCaja($parametro);
		$res=$obj->eliminarCaja();
		return $res;
	}
	function abrirCaja(CTParametro $parametro){
		$obj=new MODCaja($parametro);
		$res=$obj->abrirCaja();
		return $res;
	}
	/*FinClase: MODCaja*/


	/*Clase: MODArqueo
	* Fecha: 27-09-2011 11:02:53
	* Autor: fprudencio*/
	function listarArqueo(CTParametro $parametro){
		$obj=new MODArqueo($parametro);
		$res=$obj->listarArqueo();
		return $res;
	}
			
	function insertarArqueo(CTParametro $parametro){
		$obj=new MODArqueo($parametro);
		$res=$obj->insertarArqueo();
		return $res;
	}
			
	function modificarArqueo(CTParametro $parametro){
		$obj=new MODArqueo($parametro);
		$res=$obj->modificarArqueo();
		return $res;
	}
			
	function eliminarArqueo(CTParametro $parametro){
		$obj=new MODArqueo($parametro);
		$res=$obj->eliminarArqueo();
		return $res;
	}
	function revisarArqueo(CTParametro $parametro){
		$obj=new MODArqueo($parametro);
		$res=$obj->revisarArqueo();
		return $res;
	}
	/*FinClase: MODArqueo*/


	/*Clase: MODCobro
	* Fecha: 27-09-2011 14:59:03
	* Autor: gvelasquez*/
	function listarCobro(CTParametro $parametro){
		$obj=new MODCobro($parametro);
		$res=$obj->listarCobro();
		return $res;
	}
			
	function insertarCobro(CTParametro $parametro){
		$obj=new MODCobro($parametro);
		$res=$obj->insertarCobro();
		return $res;
	}
			
	function modificarCobro(CTParametro $parametro){
		$obj=new MODCobro($parametro);
		$res=$obj->modificarCobro();
		return $res;
	}
			
	function eliminarCobro(CTParametro $parametro){
		$obj=new MODCobro($parametro);
		$res=$obj->eliminarCobro();
		return $res;
	}
	/*FinClase: MODCobro*/


	/*Clase: MODCajero
	* Fecha: 28-09-2011 14:13:20
	* Autor: fprudencio*/
	function listarCajero(CTParametro $parametro){
		$obj=new MODCajero($parametro);
		$res=$obj->listarCajero();
		return $res;
	}
			
	function insertarCajero(CTParametro $parametro){
		$obj=new MODCajero($parametro);
		$res=$obj->insertarCajero();
		return $res;
	}
			
	function modificarCajero(CTParametro $parametro){
		$obj=new MODCajero($parametro);
		$res=$obj->modificarCajero();
		return $res;
	}
			
	function eliminarCajero(CTParametro $parametro){
		$obj=new MODCajero($parametro);
		$res=$obj->eliminarCajero();
		return $res;
	}
	function habilitarCajero(CTParametro $parametro){
		$obj=new MODCajero($parametro);
		$res=$obj->habilitarCajero();
		return $res;
	}
	function listarCajeroSistDist(CTParametro $parametro){
		$obj=new MODCajero($parametro);
		$res=$obj->listarCajeroSistDist();
		return $res;
	}
	/*FinClase: MODCajero*/


	/*Clase: MODArqueoDet
	* Fecha: 29-09-2011 17:20:27
	* Autor: fprudencio*/
	function listarArqueoDet(CTParametro $parametro){
		$obj=new MODArqueoDet($parametro);
		$res=$obj->listarArqueoDet();
		return $res;
	}
			
	function insertarArqueoDet(CTParametro $parametro){
		$obj=new MODArqueoDet($parametro);
		$res=$obj->insertarArqueoDet();
		return $res;
	}
			
	function modificarArqueoDet(CTParametro $parametro){
		$obj=new MODArqueoDet($parametro);
		$res=$obj->modificarArqueoDet();
		return $res;
	}
			
	function eliminarArqueoDet(CTParametro $parametro){
		$obj=new MODArqueoDet($parametro);
		$res=$obj->eliminarArqueoDet();
		return $res;
	}
	/*FinClase: MODArqueoDet*/


}//marca_generador
?>