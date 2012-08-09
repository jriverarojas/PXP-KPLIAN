<?php
class FuncionesHidrologia
{
	function __construct()
	{
		
		foreach(glob('../../sis_hidrologia/modelo/MOD*.php') as $archivo)
		{
			include_once($archivo);
		}
	}
	
	/*Clase: MODCuenca
	* Fecha: 30-08-2011
	* Autor: MFLORES*/
		
	function listarCuencaCombo(CTParametro $parametro)
	{
		$obj=new MODCuenca($parametro);
		$res=$obj->listarCuencaCombo();
		return $res;
	}
	
	function listarCuencaArb(CTParametro $parametro)
	{
		$obj=new MODCuenca($parametro);
		$res=$obj->listarCuencaArb();
		return $res;
	}
	
	function insertarCuenca(CTParametro $parametro)
	{
		$obj=new MODCuenca($parametro);
		$res=$obj->insertarCuenca();
		return $res;
	}
	
	function modificarCuenca(CTParametro $parametro)
	{
		$obj=new MODCuenca($parametro);
		$res=$obj->modificarCuenca();
		return $res;
	}
	
	function eliminarCuenca(CTParametro $parametro)
	{
		$obj=new MODCuenca($parametro);
		$res=$obj->eliminarCuenca();
		return $res;
	}
	/*FinClase: MODCuenca*/
	
	/*Clase: MODRio
	* Fecha: 31-08-2011 15:32:32
	* Autor: rac*/
	function listarRio(CTParametro $parametro){
		$obj=new MODRio($parametro);
		$res=$obj->listarRio();
		return $res;
	}
			
	function insertarRio(CTParametro $parametro){
		$obj=new MODRio($parametro);
		$res=$obj->insertarRio();
		return $res;
	}
			
	function modificarRio(CTParametro $parametro){
		$obj=new MODRio($parametro);
		$res=$obj->modificarRio();
		return $res;
	}
			
	function eliminarRio(CTParametro $parametro){
		$obj=new MODRio($parametro);
		$res=$obj->eliminarRio();
		return $res;
	}
	/*FinClase: MODRio*/
	
	/*Clase: MODTipoMedida
	* Fecha: 02-09-2011 15:44:04
	* Autor: rac*/
	
	function listarTipoMedida(CTParametro $parametro){
		
		
		$obj=new MODTipoMedida($parametro);
		$res=$obj->listarTipoMedida();
		return $res;
	}
			
	function insertarTipoMedida(CTParametro $parametro){
		$obj=new MODTipoMedida($parametro);
		$res=$obj->insertarTipoMedida();
		return $res;
	}
			
	function modificarTipoMedida(CTParametro $parametro){
		$obj=new MODTipoMedida($parametro);
		$res=$obj->modificarTipoMedida();
		return $res;
	}
			
	function eliminarTipoMedida(CTParametro $parametro){
		$obj=new MODTipoMedida($parametro);
		$res=$obj->eliminarTipoMedida();
		return $res;
	}
	/*FinClase: MODTipoMedida*/
	
	
	/*Clase: MODAdministradorHidro
	* Fecha: 01-09-2011 16:24
	* Autor: mflores*/
	function listarAdministradorHidro(CTParametro $parametro){
		$obj=new MODAdministradorHidro($parametro);
		$res=$obj->listarAdministradorHidro();
		return $res;
	}
			
	function insertarAdministradorHidro(CTParametro $parametro){
		$obj=new MODAdministradorHidro($parametro);
		$res=$obj->insertarAdministradorHidro();
		return $res;
	}
			
	function modificarAdministradorHidro(CTParametro $parametro){
		$obj=new MODAdministradorHidro($parametro);
		$res=$obj->modificarAdministradorHidro();
		return $res;
	}
			
	function eliminarAdministradorHidro(CTParametro $parametro){
		$obj=new MODAdministradorHidro($parametro);
		$res=$obj->eliminarAdministradorHidro();
		return $res;
	}
	/*FinClase: MODAdministradorHidro*/
	
	
	/*Clase: MODOperador
	* Fecha: 02-09-2011 12:20
	* Autor: mflores*/
	function listarOperador(CTParametro $parametro){
		$obj=new MODOperador($parametro);
		$res=$obj->listarOperador();
		return $res;
	}
			
	function insertarOperador(CTParametro $parametro){
		$obj=new MODOperador($parametro);
		$res=$obj->insertarOperador();
		return $res;
	}
			
	function modificarOperador(CTParametro $parametro){
		$obj=new MODOperador($parametro);
		$res=$obj->modificarOperador();
		return $res;
	}
			
	function eliminarOperador(CTParametro $parametro){
		$obj=new MODOperador($parametro);
		$res=$obj->eliminarOperador();
		return $res;
	}
	/*FinClase: MODOperador*/
	
	/*Clase: MODTipoMedicion
	* Fecha: 02-09-2011 15:43:21
	* Autor: rac*/
	function listarTipoMedicion(CTParametro $parametro){
		$obj=new MODTipoMedicion($parametro);
		$res=$obj->listarTipoMedicion();
		return $res;
	}
			
	function insertarTipoMedicion(CTParametro $parametro){
		$obj=new MODTipoMedicion($parametro);
		$res=$obj->insertarTipoMedicion();
		return $res;
	}
			
	function modificarTipoMedicion(CTParametro $parametro){
		$obj=new MODTipoMedicion($parametro);
		$res=$obj->modificarTipoMedicion();
		return $res;
	}
			
	function eliminarTipoMedicion(CTParametro $parametro){
		$obj=new MODTipoMedicion($parametro);
		$res=$obj->eliminarTipoMedicion();
		return $res;
	}
	/*FinClase: MODTipoMedicion*/
	
	/*Clase: MODEstacion
	* Fecha: 05-09-2011 10:30:01
	* Autor: rac*/
	function listarEstacion(CTParametro $parametro){
		$obj=new MODEstacion($parametro);
		$res=$obj->listarEstacion();
		return $res;
	}
	
	function listarEstacionProyectos(CTParametro $parametro){
		$obj=new MODEstacion($parametro);
		$res=$obj->listarEstacionProyectos();
		return $res;
	}
	
	function listarProyEstacion(CTParametro $parametro){
		$obj=new MODEstacion($parametro);
		$res=$obj->listarProyEstacion();
		return $res;
	}	
			
	function insertarEstacion(CTParametro $parametro){
		$obj=new MODEstacion($parametro);
		$res=$obj->insertarEstacion();
		return $res;
	}
			
	function modificarEstacion(CTParametro $parametro){
		$obj=new MODEstacion($parametro);
		$res=$obj->modificarEstacion();
		return $res;
	}
			
	function eliminarEstacion(CTParametro $parametro){
		$obj=new MODEstacion($parametro);
		$res=$obj->eliminarEstacion();
		return $res;
	}
	
	function subirFotoEstacion(CTParametro $parametro){
		$obj=new MODEstacion($parametro);
		$res=$obj->subirFotoEstacion();
		return $res;
	}
	
	function obtenerFotoEstacion(CTParametro $parametro){
		$obj=new MODEstacion($parametro);
		$res=$obj->obtenerFotoEstacion();
		return $res;
	}
	/*FinClase: MODEstacion*/
	
	/*Clase: MODSensor
	* Fecha: 06-09-2011 11:45:42
	* Autor: mflores*/
	function listarSensor(CTParametro $parametro){
		$obj=new MODSensor($parametro);
		$res=$obj->listarSensor();
		return $res;
	}
	
	function listarSensorCombo(CTParametro $parametro){
		$obj=new MODSensor($parametro);
		$res=$obj->listarSensorCombo();
		return $res;
	}
	
	function listarSensorFicticio(CTParametro $parametro){
		$obj=new MODSensor($parametro);
		$res=$obj->listarSensorFicticio();
		return $res;
	}
			
	function insertarSensor(CTParametro $parametro){
		$obj=new MODSensor($parametro);
		$res=$obj->insertarSensor();
		return $res;
	}
			
	function modificarSensor(CTParametro $parametro){
		$obj=new MODSensor($parametro);
		$res=$obj->modificarSensor();
		return $res;
	}
			
	function eliminarSensor(CTParametro $parametro){
		$obj=new MODSensor($parametro);
		$res=$obj->eliminarSensor();
		return $res;
	}
		
	/*FinClase: MODSensor*/

	/*Clase: MODMedicion
	* Fecha: 07-09-2011 15:50:29
	* Autor: mflores*/
	function listarMedicion(CTParametro $parametro){
		$obj=new MODMedicion($parametro);
		$res=$obj->listarMedicion();
		return $res;
	}
			
	function insertarMedicion(CTParametro $parametro){
		$obj=new MODMedicion($parametro);
		$res=$obj->insertarMedicion();
		return $res;
	}
			
	function modificarMedicion(CTParametro $parametro){
		$obj=new MODMedicion($parametro);
		$res=$obj->modificarMedicion();
		return $res;
	}
			
	function eliminarMedicion(CTParametro $parametro){
		$obj=new MODMedicion($parametro);
		$res=$obj->eliminarMedicion();
		return $res;
	}
	/*FinClase: MODMedicion*/
	
	/*Clase: MODDatoMedida
	* Fecha: 08-09-2011 10:23:30
	* Autor: mflores*/
	function listarDatoMedida(CTParametro $parametro){
		$obj=new MODDatoMedida($parametro);
		$res=$obj->listarDatoMedida();
		return $res;
	}
			
	function insertarDatoMedida(CTParametro $parametro){
		$obj=new MODDatoMedida($parametro);
		$res=$obj->insertarDatoMedida();
		return $res;
	}
			
	function modificarDatoMedida(CTParametro $parametro){
		$obj=new MODDatoMedida($parametro);
		$res=$obj->modificarDatoMedida();
		return $res;
	}
			
	function eliminarDatoMedida(CTParametro $parametro){
		$obj=new MODDatoMedida($parametro);
		$res=$obj->eliminarDatoMedida();
		return $res;
	}
	/*FinClase: MODDatoMedida*/
	
	/*Clase: MODMedicionDatoMedida
	* Fecha: 07-09-2011 15:50:29
	* Autor: mflores*/
	function listarMedicionDatoMedida(CTParametro $parametro){
		$obj=new MODMedicionDatoMedida($parametro);
		$res=$obj->listarMedicionDatoMedida();
		return $res;
	}
			
	function insertarMedicionDatoMedida(CTParametro $parametro){
		$obj=new MODMedicionDatoMedida($parametro);
		$res=$obj->insertarMedicionDatoMedida();
		return $res;
	}
			
	function modificarMedicionDatoMedida(CTParametro $parametro){
		$obj=new MODMedicionDatoMedida($parametro);
		$res=$obj->modificarMedicionDatoMedida();
		return $res;
	}
			
	function eliminarMedicionDatoMedida(CTParametro $parametro){
		$obj=new MODMedicionDatoMedida($parametro);
		$res=$obj->eliminarMedicionDatoMedida();
		return $res;
	}
	
	function subir_excel(CTParametro $parametro){
		$obj=new MODMedicionDatoMedida($parametro);
		$res=$obj->subir_excel();
		return $res;
	}
	
	function reporte_med_Hidro(CTParametro $parametro)
	{
		$obj=new MODMedicionDatoMedida($parametro);
		$res=$obj->reporte_med_Hidro();
		return $res;
	}
	
	function obtener_fechas(CTParametro $parametro)
	{
		$obj = new MODMedicionDatoMedida($parametro);
		$res = $obj->obtener_fechas();
		return $res;
	}
	
	function obtener_promedio(CTParametro $parametro)
	{
		$obj = new MODMedicionDatoMedida($parametro);
		$res = $obj->obtener_promedio();
		return $res;
	}
	/*FinClase: MODMedicionDatoMedida*/
	
	/*Clase: MODSubir_archivo
	* Fecha: 04-10-2011 10:39:45
	* Autor: mflores*/
	function subir_archivo(CTParametro $parametro){
		$obj=new MODSubir_archivo($parametro);
		$res=$obj->subir_archivo();
		return $res;
	}
	/*FinClase: MODSubir_archivo*/
	
	/*Clase: MODArchivoSensor
	* Fecha: 23-11-2011 10:48:34
	* Autor: mflores*/
	function listarArchivo(CTParametro $parametro){
		$obj=new MODArchivo($parametro);
		$res=$obj->listarArchivo();
		return $res;
	}
			
	function insertarArchivo(CTParametro $parametro){
		$obj=new MODArchivo($parametro);
		$res=$obj->insertarArchivo();
		return $res;
	}
			
	function modificarArchivo(CTParametro $parametro){
		$obj=new MODArchivo($parametro);
		$res=$obj->modificarArchivo();
		return $res;
	}
			
	function eliminarArchivo(CTParametro $parametro){
		$obj=new MODArchivo($parametro);
		$res=$obj->eliminarArchivo();
		return $res;
	}
	/*FinClase: MODArchivoSensor*/
	
	/*Clase: MODTipoArchivo
	* Fecha: 23-11-2011 10:48:34
	* Autor: mflores*/
	function listarTipoArchivo(CTParametro $parametro){
		$obj=new MODTipoArchivo($parametro);
		$res=$obj->listarTipoArchivo();
		return $res;
	}
			
	function insertarTipoArchivo(CTParametro $parametro){
		$obj=new MODTipoArchivo($parametro);
		$res=$obj->insertarTipoArchivo();
		return $res;
	}
			
	function modificarTipoArchivo(CTParametro $parametro){
		$obj=new MODTipoArchivo($parametro);
		$res=$obj->modificarTipoArchivo();
		return $res;
	}
			
	function eliminarTipoArchivo(CTParametro $parametro){
		$obj=new MODTipoArchivo($parametro);
		$res=$obj->eliminarTipoArchivo();
		return $res;
	}
	/*FinClase: MODTipoArchivo*/
	
	/*Clase: MODTipoMuestra
	* Fecha: 23-11-2011 10:48:34
	* Autor: mflores*/
	function listarTipoMuestra(CTParametro $parametro){
		$obj=new MODTipoMuestra($parametro);
		$res=$obj->listarTipoMuestra();
		return $res;
	}
			
	function insertarTipoMuestra(CTParametro $parametro){
		$obj=new MODTipoMuestra($parametro);
		$res=$obj->insertarTipoMuestra();
		return $res;
	}
			
	function modificarTipoMuestra(CTParametro $parametro){
		$obj=new MODTipoMuestra($parametro);
		$res=$obj->modificarTipoMuestra();
		return $res;
	}
			
	function eliminarTipoMuestra(CTParametro $parametro){
		$obj=new MODTipoMuestra($parametro);
		$res=$obj->eliminarTipoMuestra();
		return $res;
	}
	/*FinClase: MODTipoMuestra*/
	
	/*Clase: MODArchivoSensor
	* Fecha: 23-11-2011 10:48:34
	* Autor: mflores*/
	function listarArchivoSensor(CTParametro $parametro){
		$obj=new MODArchivoSensor($parametro);
		$res=$obj->listarArchivoSensor();
		return $res;
	}
			
	function insertarArchivoSensor(CTParametro $parametro){
		$obj=new MODArchivoSensor($parametro);
		$res=$obj->insertarArchivoSensor();
		return $res;
	}
			
	function modificarArchivoSensor(CTParametro $parametro){
		$obj=new MODArchivoSensor($parametro);
		$res=$obj->modificarArchivoSensor();
		return $res;
	}
			
	function eliminarArchivoSensor(CTParametro $parametro){
		$obj=new MODArchivoSensor($parametro);
		$res=$obj->eliminarArchivoSensor();
		return $res;
	}
	/*FinClase: MODArchivoSensor*/
	
	/*Clase: MODTipoSensor
	* Fecha: 15-03-2012 11:00
	* Autor: mflores*/
	function listarTipoSensor(CTParametro $parametro){
		$obj=new MODTipoSensor($parametro);
		$res=$obj->listarTipoSensor();
		return $res;
	}
			
	function insertarTipoSensor(CTParametro $parametro){
		$obj=new MODTipoSensor($parametro);
		$res=$obj->insertarTipoSensor();
		return $res;
	}
			
	function modificarTipoSensor(CTParametro $parametro){
		$obj=new MODTipoSensor($parametro);
		$res=$obj->modificarTipoSensor();
		return $res;
	}
			
	function eliminarTipoSensor(CTParametro $parametro){
		$obj=new MODTipoSensor($parametro);
		$res=$obj->eliminarTipoSensor();
		return $res;
	}
	
	function genTable(CTParametro $parametro){
		$obj=new MODTipoSensor($parametro);
		$res=$obj->genTable();
		return $res;
	}
	
	
	/*FinClase: MODTipoSensor*/
	
	/*Clase: MODTipoColumna
	* Fecha: 15-03-2012 11:00
	* Autor: mflores*/
	function listarTipoColumna(CTParametro $parametro){
		$obj=new MODTipoColumna($parametro);
		$res=$obj->listarTipoColumna();
		return $res;
	}
			
	function insertarTipoColumna(CTParametro $parametro){
		$obj=new MODTipoColumna($parametro);
		$res=$obj->insertarTipoColumna();
		return $res;
	}
			
	function modificarTipoColumna(CTParametro $parametro){
		$obj=new MODTipoColumna($parametro);
		$res=$obj->modificarTipoColumna();
		return $res;
	}
			
	function eliminarTipoColumna(CTParametro $parametro){
		$obj=new MODTipoColumna($parametro);
		$res=$obj->eliminarTipoColumna();
		return $res;
	}
	/*FinClase: MODTipoColumna*/
	
	/*Clase: MODTipoColumnaSensor
	* Fecha: 16-03-2012 17:06:17
	* Autor: rac*/
	function listarTipoColumnaSensor(CTParametro $parametro){
		$obj=new MODTipoColumnaSensor($parametro);
		$res=$obj->listarTipoColumnaSensor();
		return $res;
	}
			
	function insertarTipoColumnaSensor(CTParametro $parametro){
		$obj=new MODTipoColumnaSensor($parametro);
		$res=$obj->insertarTipoColumnaSensor();
		return $res;
	}
			
	function modificarTipoColumnaSensor(CTParametro $parametro){
		$obj=new MODTipoColumnaSensor($parametro);
		$res=$obj->modificarTipoColumnaSensor();
		return $res;
	}
			
	function eliminarTipoColumnaSensor(CTParametro $parametro){
		$obj=new MODTipoColumnaSensor($parametro);
		$res=$obj->eliminarTipoColumnaSensor();
		return $res;
	}
	/*FinClase: MODTipoColumnaSensor*/
	
	/*Clase: MODTipoSensorCodigo
	* Fecha: 16-03-2012 17:06:17
	* Autor: rac*/
	function listarTipoSensorCodigo(CTParametro $parametro){
		$obj=new MODTipoSensorCodigo($parametro);
		$res=$obj->listarTipoSensorCodigo();
		return $res;
	}
	
	function listarTipoSensorCodigoReporte(CTParametro $parametro){
		$obj=new MODTipoSensorCodigo($parametro);
		$res=$obj->listarTipoSensorCodigoReporte();
		return $res;
	}
	
	function promedioTipoSensorCodigoReporte(CTParametro $parametro){
		$obj=new MODTipoSensorCodigo($parametro);
		$res=$obj->promedioTipoSensorCodigoReporte();
		return $res;
	}
	
	function eliminarTipoSensorCodigo(CTParametro $parametro){
		$obj=new MODTipoSensorCodigo($parametro);
		$res=$obj->eliminarTipoSensorCodigo();
		return $res;
	}
	
	function insertarTipoSensorCodigo(CTParametro $parametro){
		$obj=new MODTipoSensorCodigo($parametro);
		$res=$obj->insertarTipoSensorCodigo();
		return $res;
	}
	
	function modificarTipoSensorCodigo(CTParametro $parametro){
		$obj=new MODTipoSensorCodigo($parametro);
		$res=$obj->modificarTipoSensorCodigo();
		return $res;
	}
	
	function subirExcelDinamico(CTParametro $parametro){
		$obj=new MODTipoSensorCodigo($parametro);
		$res=$obj->subirExcelDinamico();
		return $res;
	}			
	/*FinClase: MODTipoSensorCodigo*/
	
	/*Clase: MODUnidadMedida
	* Fecha: 02-04-2012 17:34:59
	* Autor: mflores*/
	function listarUnidadMedida(CTParametro $parametro){
		$obj=new MODUnidadMedida($parametro);
		$res=$obj->listarUnidadMedida();
		return $res;
	}
			
	function insertarUnidadMedida(CTParametro $parametro){
		$obj=new MODUnidadMedida($parametro);
		$res=$obj->insertarUnidadMedida();
		return $res;
	}
			
	function modificarUnidadMedida(CTParametro $parametro){
		$obj=new MODUnidadMedida($parametro);
		$res=$obj->modificarUnidadMedida();
		return $res;
	}
			
	function eliminarUnidadMedida(CTParametro $parametro){
		$obj=new MODUnidadMedida($parametro);
		$res=$obj->eliminarUnidadMedida();
		return $res;
	}
	/*FinClase: MODUnidadMedida*/
	
	/*Clase: MODTipoDato
	* Fecha: 02-04-2012 17:34:59
	* Autor: mflores*/
	function listarTipoDato(CTParametro $parametro){
		$obj=new MODTipoDato($parametro);
		$res=$obj->listarTipoDato();
		return $res;
	}
			
	function insertarTipoDato(CTParametro $parametro){
		$obj=new MODTipoDato($parametro);
		$res=$obj->insertarTipoDato();
		return $res;
	}
			
	function modificarTipoDato(CTParametro $parametro){
		$obj=new MODTipoDato($parametro);
		$res=$obj->modificarTipoDato();
		return $res;
	}
			
	function eliminarTipoDato(CTParametro $parametro){
		$obj=new MODTipoDato($parametro);
		$res=$obj->eliminarTipoDato();
		return $res;
	}
	/*FinClase: MODTipoDato*/
}//marca_generador
?>