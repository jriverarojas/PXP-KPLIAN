<?php
class FuncionesLegal
{
	function __construct(){ 
    foreach (glob('../../sis_legal/modelo/MOD*.php') as $archivo){
			include_once($archivo);
		}
		/*include_once('MODModalidad.php');
		include_once('MODBoleta.php');
		include_once('MODTipoContrato.php');
		include_once('MODProcesoContrato.php');
		include_once('MODResponsableProceso.php');
		include_once('MODEstado.php');
		include_once('MODDocumentoAnexo.php');*/
	}
	
	/**
	 * ***para estado
	 */
	/*function listarEstado($parametro){
		$estado=new Estado();
		$res=$estado->listarEstado($parametro);
		return $res;
	}
	
	function insertarEstado($parametro){
		$estado=new Estado();
		$res=$estado->insertarEstado($parametro);
		return $res;
	}
	
	function modificarEstado($parametro){
		$estado=new Estado();
		$res=$estado->modificarEstado($parametro);
		return $res;
	}
	
	function eliminarEstado($parametro){
		$estado=new Estado();
		$res=$estado->eliminarEstado($parametro);
		return $res;
	}*/
	
	/**
	 * ***para proyecto
	 */
	/*function listarProyecto(CTParametro $parametro){
		$proyecto=new MODProyecto($parametro);
		$res=$proyecto->listarProyecto();
		return $res;
	}
	
	function insertarProyecto(CTParametro $parametro){
		$proyecto=new MODProyecto($parametro);
		$res=$proyecto->insertarProyecto();
		return $res;
	}
	
	function modificarProyecto(CTParametro $parametro){
		$proyecto=new MODProyecto($parametro);
		$res=$proyecto->modificarProyecto();
		return $res;
	}
	
	function eliminarProyecto(CTParametro $parametro){
		$proyecto=new MODProyecto($parametro);
		$res=$proyecto->eliminarProyecto();
		return $res;
	}*/
	
	/**
	 * ***para unidad
	 */
/*	function listarUnidad($parametro){
		$unidad=new Unidad();
		$res=$unidad->listarUnidad($parametro);
		return $res;
	}
	
	function insertarUnidad($parametro){
		$unidad=new Unidad();
		$res=$unidad->insertarUnidad($parametro);
		return $res;
	}
	
	function modificarUnidad($parametro){
		$unidad=new Unidad();
		$res=$unidad->modificarUnidad($parametro);
		return $res;
	}
	
	function eliminarUnidad($parametro){
		$unidad=new Unidad();
		$res=$unidad->eliminarUnidad($parametro);
		return $res;
	}*/
	
	/**
	 * ***para alarma
	 */
	/*function listarAlarma($parametro){
		$alarma=new Alarma();
		$res=$alarma->listarAlarma($parametro);
		return $res;
	}
	
	function insertarAlarma($parametro){
		$alarma=new Alarma();
		$res=$alarma->insertarAlarma($parametro);
		return $res;
	}
	
	function modificarAlarma($parametro){
		$alarma=new Alarma();
		$res=$alarma->modificarAlarma($parametro);
		return $res;
	}
	
	function eliminarAlarma($parametro){
		$alarma=new Alarma();
		$res=$alarma->eliminarAlarma($parametro);
		return $res;
	}*/
	
	/**
	 * ***para persona_juridica
	 */
/*	function listarPersonaJuridica($parametro){
		$persona_juridica=new PersonaJuridica();
		$res=$persona_juridica->listarPersonaJuridica($parametro);
		return $res;
	}
	
	function insertarPersonaJuridica($parametro){
		$persona_juridica=new PersonaJuridica();
		$res=$persona_juridica->insertarPersonaJuridica($parametro);
		return $res;
	}
	
	function modificarPersonaJuridica($parametro){
		$persona_juridica=new PersonaJuridica();
		$res=$persona_juridica->modificarPersonaJuridica($parametro);
		return $res;
	}
	
	function eliminarPersonaJuridica($parametro){
		$persona_juridica=new PersonaJuridica();
		$res=$persona_juridica->eliminarPersonaJuridica($parametro);
		return $res;
	}*/
		
	
	
	/**
	 * ***para contrato
	 */
/*	function listarContrato($parametro){
		$contrato=new Contrato();
		$res=$contrato->listarContrato($parametro);
		return $res;
	}
	
	function insertarContrato($parametro){
		$contrato=new Contrato();
		$res=$contrato->insertarContrato($parametro);
		return $res;
	}
	
	function modificarContrato($parametro){
		$contrato=new Contrato();
		$res=$contrato->modificarContrato($parametro);
		return $res;
	}
	
	function eliminarContrato($parametro){
		$contrato=new Contrato();
		$res=$contrato->eliminarContrato($parametro);
		return $res;
	}*/
	/**
	 * ***para empleado
	 */
		
/*	function listarEmpleado($parametro){
		$empleado=new Empleado();
		$res=$empleado->listarEmpleado($parametro);
		return $res;
	}
	
	function insertarEmpleado($parametro){
		$empleado=new Empleado();
		$res=$empleado->insertarEmpleado($parametro);
		return $res;
	}
	
	function modificarEmpleado($parametro){
		$empleado=new Empleado();
		$res=$empleado->modificarEmpleado($parametro);
		return $res;
	}
	
	function eliminarEmpleado($parametro){
		$empleado=new Empleado();
		$res=$empleado->eliminarEmpleado($parametro);
		return $res;
	}*/
	
	
	/**
	 * ***para contratista
	 */
		
	/*function listarContratista($parametro){
		$contratista=new Contratista();
		$res=$contratista->listarContratista($parametro);
		return $res;
	}
	
	function insertarContratista($parametro){
		$contratista=new Contratista();
		$res=$contratista->insertarContratista($parametro);
		return $res;
	}
	
	function modificarContratista($parametro){
		$contratista=new Contratista();
		$res=$contratista->modificarContratista($parametro);
		return $res;
	}
	
	function eliminarContratista($parametro){
		$contratista=new Contratista();
		$res=$contratista->eliminarContratista($parametro);
		return $res;
	}*/
	
	/**
	 * ***para representante
	 */
		
	/*function listarRepresentante($parametro){
		$representante=new Representante();
		$res=$representante->listarRepresentante($parametro);
		return $res;
	}
	
	function insertarRepresentante($parametro){
		$representante=new Representante();
		$res=$representante->insertarRepresentante($parametro);
		return $res;
	}
	
	function modificarRepresentante($parametro){
		$representante=new Representante();
		$res=$representante->modificarRepresentante($parametro);
		return $res;
	}
	
	function eliminarRepresentante($parametro){
		$representante=new Representante();
		$res=$representante->eliminarRepresentante($parametro);
		return $res;
	}*/
	
	/**
	 * ***para requerimiento
	 */
	/*
	
		
	function listarRequerimiento($parametro){
		$requerimiento=new Requerimiento();
		$res=$requerimiento->listarRequerimiento($parametro);
		return $res;
	}
	
	function insertarRequerimiento($parametro){
		$requerimiento=new Requerimiento();
		$res=$requerimiento->insertarRequerimiento($parametro);
		return $res;
	}
	
	function modificarRequerimiento($parametro){
		$requerimiento=new Requerimiento();
		$res=$requerimiento->modificarRequerimiento($parametro);
		return $res;
	}
	function estadoRequerimiento($parametro){
		$requerimiento=new Requerimiento();
		$res=$requerimiento->estadoRequerimiento($parametro);
		return $res;
	}
	
	function eliminarRequerimiento($parametro){
		$requerimiento=new Requerimiento();
		$res=$requerimiento->eliminarRequerimiento($parametro);
		return $res;
	}*/
	
	/**
	 * ***para estado_requerimiento
	 */
	
	/*
		
	function listarReporteHistorial($parametro){
		$estado_requerimiento=new EstadoRequerimiento();
		$res=$estado_requerimiento->listarReporteHistorial($parametro);
		return $res;
	}
	*/
	
	/***************************************************************/
	/*Clase: MODModalidad
	* Fecha: 11-11-2011 15:47:51
	* Autor: mzm*/
	function listarModalidad(CTParametro $parametro){
		$obj=new MODModalidad($parametro);
		$res=$obj->listarModalidad();
		return $res;
	}
			
	function insertarModalidad(CTParametro $parametro){
		$obj=new MODModalidad($parametro);
		$res=$obj->insertarModalidad();
		return $res;
	}
			
	function modificarModalidad(CTParametro $parametro){
		$obj=new MODModalidad($parametro);
		$res=$obj->modificarModalidad();
		return $res;
	}
			
	function eliminarModalidad(CTParametro $parametro){
		$obj=new MODModalidad($parametro);
		$res=$obj->eliminarModalidad();
		return $res;
	}
	/*FinClase: MODModalidad*/
	
	
	/*Clase: MODBoleta
	* Fecha: 17-11-2011 11:23:54
	* Autor: fprudencio*/
	function listarBoleta(CTParametro $parametro){
		$obj=new MODBoleta($parametro);
		$res=$obj->listarBoleta();
		return $res;
	}
	function listarBoletaContrato(CTParametro $parametro){
		$obj=new MODBoleta($parametro);
		$res=$obj->listarBoletaContrato();
		return $res;
	}
	
			
	function insertarBoleta(CTParametro $parametro){
		$obj=new MODBoleta($parametro);
		$res=$obj->insertarBoleta();
		return $res;
	}
			
	function modificarBoleta(CTParametro $parametro){
		$obj=new MODBoleta($parametro);
		$res=$obj->modificarBoleta();
		return $res;
	}
			
	function eliminarBoleta(CTParametro $parametro){
		$obj=new MODBoleta($parametro);
		$res=$obj->eliminarBoleta();
		return $res;
	}
	
	function subirBoleta(CTParametro $parametro){
		$obj=new MODBoleta($parametro);
		$res=$obj->subirBoleta();
		return $res;
	}
	
	function cambiarEstado(CTParametro $parametro){
		$obj=new MODBoleta($parametro);
		$res=$obj->cambiarEstado();
		return $res;
	}
	
	/*FinClase: MODBoleta*/
	
	
	/*Clase: MODOcesoContrato
	* Fecha: 16-11-2011 17:25:24
	* Autor: mzm*/
	function listarProcesoContrato(CTParametro $parametro){
		$obj=new MODProcesoContrato($parametro);
		$res=$obj->listarProcesoContrato();
		return $res;
	}
			
	function insertarProcesoContrato(CTParametro $parametro){
		$obj=new MODProcesoContrato($parametro);
		$res=$obj->insertarProcesoContrato();
		return $res;
	}
	
			
	function modificarProcesoContrato(CTParametro $parametro){
		$obj=new MODProcesoContrato($parametro);
		$res=$obj->modificarProcesoContrato();
		return $res;
	}
			
	function eliminarProcesoContrato(CTParametro $parametro){
		$obj=new MODProcesoContrato($parametro);
		$res=$obj->eliminarProcesoContrato();
		return $res;
	}
	
	function subirContrato(CTParametro $parametro){
		$obj=new MODProcesoContrato($parametro);
		$res=$obj->subirContrato();
		return $res;
	}
	/*FinClase: MODOcesoContrato*/
	
	
	/*Clase: MODtipoContrato
	* Fecha: 16-11-2011 17:25:24
	* Autor: mzm*/
	function listarTipoContrato(CTParametro $parametro){
		$obj=new MODTipoContrato($parametro);
		$res=$obj->listarTipoContrato();
		return $res;
	}
			
	function insertarTipoContrato(CTParametro $parametro){
		$obj=new MODTipoContrato($parametro);
		$res=$obj->insertarTipoContrato();
		return $res;
	}
			
	function modificarTipoContrato(CTParametro $parametro){
		$obj=new MODTipoContrato($parametro);
		$res=$obj->modificarTipoContrato();
		return $res;
	}
			
	function eliminarTipoContrato(CTParametro $parametro){
		$obj=new MODTipoContrato($parametro);
		$res=$obj->eliminarTipoContrato();
		return $res;
	}
	/*FinClase: MODOcesoContrato*/
	
	
	/*Clase: MODResponsableProceso
	* Fecha: 16-11-2011 17:25:24
	* Autor: mzm*/
	function listarResponsableProceso(CTParametro $parametro){
		$obj=new MODResponsableProceso($parametro);
		$res=$obj->listarResponsableProceso();
		return $res;
	}
			
	function insertarResponsableProceso(CTParametro $parametro){
		$obj=new MODResponsableProceso($parametro);
		$res=$obj->insertarResponsableProceso();
		return $res;
	}
			
	function modificarResponsableProceso(CTParametro $parametro){
		$obj=new MODResponsableProceso($parametro);
		$res=$obj->modificarResponsableProceso();
		return $res;
	}
			
	function eliminarResponsableProceso(CTParametro $parametro){
		$obj=new MODResponsableProceso($parametro);
		$res=$obj->eliminarResponsableProceso();
		return $res;
	}
	/*FinClase: MODOcesoContrato*/
		/*Clase: MODEstado
	* Fecha: 17-11-2011 09:35:55
	* Autor: fprudencio*/
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
	/*FinClase: MODEstado*/
		/*Clase: MODDocumentoAnexo
	* Fecha: 17-11-2011 10:24:34
	* Autor: fprudencio*/
	function listarDocumentoAnexo(CTParametro $parametro){
		$obj=new MODDocumentoAnexo($parametro);
		$res=$obj->listarDocumentoAnexo();
		return $res;
	}
			
	function insertarDocumentoAnexo(CTParametro $parametro){
		$obj=new MODDocumentoAnexo($parametro);
		$res=$obj->insertarDocumentoAnexo();
		return $res;
	}
			
	function modificarDocumentoAnexo(CTParametro $parametro){
		$obj=new MODDocumentoAnexo($parametro);
		$res=$obj->modificarDocumentoAnexo();
		return $res;
	}
			
	function eliminarDocumentoAnexo(CTParametro $parametro){
		$obj=new MODDocumentoAnexo($parametro);
		$res=$obj->eliminarDocumentoAnexo();
		return $res;
	}
		
	/*FinClase: MODDocumentoAnexo*/
	/*Clase: MODConfigAlerta
	* Fecha: 23-11-2011 10:16:20
	* Autor: rac*/
	/*function listarConfigAlerta(CTParametro $parametro){
		$obj=new MODConfigAlerta($parametro);
		$res=$obj->listarConfigAlerta();
		return $res;
	}
			
	function insertarConfigAlerta(CTParametro $parametro){
		$obj=new MODConfigAlerta($parametro);
		$res=$obj->insertarConfigAlerta();
		return $res;
	}
			
	function modificarConfigAlerta(CTParametro $parametro){
		$obj=new MODConfigAlerta($parametro);
		$res=$obj->modificarConfigAlerta();
		return $res;
	}
			
	function eliminarConfigAlerta(CTParametro $parametro){
		$obj=new MODConfigAlerta($parametro);
		$res=$obj->eliminarConfigAlerta();
		return $res;
	}*/
	/*FinClase: MODConfigAlerta*/
	
	
	/*Clase: MODEstadoProceso
	* Fecha: 14-12-2011 10:35
	* Autor: mflores*/
	
	function dibujaGrafico(CTParametro $parametro){
		$obj=new MODEstadoProceso($parametro);
		$res=$obj->dibujaGrafico();
		return $res;
	}
	
	/*FinClase: MODDocumentoAnexo*/
}

?>