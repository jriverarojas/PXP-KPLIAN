<?php
/**
*@package pXP
*@file gen-MODProcesoContrato.php
*@author  (mzm)
*@date 16-11-2011 17:25:24
*@description Clase que envia los parametros requeridos a la Base de datos para la ejecucion de las funciones, y que recibe la respuesta del resultado de la ejecucion de las mismas
*/

class MODProcesoContrato extends MODbase{
	
	function __construct(CTParametro $pParam){
		parent::__construct($pParam);
	}
			
	function listarProcesoContrato(){
		//Definicion de variables para ejecucion del procedimientp
		$this->procedimiento='saj.f_tproceso_contrato_sel';
		$this->transaccion='SA_CONTRA_SEL';
		$this->tipo_procedimiento='SEL';//tipo de transaccion
		
		//echo 'asdasdad'; exit;
			
		$this->setParametro('tipo_interfaz','tipo_interfaz','varchar');
		 $this->setParametro('id_usuario','id_usuario','integer');
		$this->setParametro('tipoFiltro','tipoFiltro','varchar');
		
		//aumentar parametro 
		//$this->setParametro('id_funcionario','id_funcionario','varchar');
		$this->setParametro('id_funcionario','id_funcionario','integer');
			
			
		//Definicion de la lista del resultado del query
		$this->captura('id_proceso_contrato','int4');
		$this->captura('notario','varchar');
		$this->captura('numero_oc','varchar');
		$this->captura('fecha_convocatoria','date');
		$this->captura('numero_requerimiento','varchar');
		$this->captura('multas','varchar');
		$this->captura('id_modalidad','int4');
		$this->captura('fecha_aprobacion','date');
		$this->captura('fecha_fin','date');
		$this->captura('plazo','varchar');
		$this->captura('objeto_contrato','varchar');
		$this->captura('id_depto','int4');
		$this->captura('extension','varchar');
		$this->captura('id_proyecto','int4');
		$this->captura('forma_pago','varchar');
		$this->captura('id_lugar_suscripcion','int4');
		$this->captura('numero_cuce','varchar');
		$this->captura('fecha_suscripcion','date');
		$this->captura('testimonio','varchar');
		$this->captura('monto_contrato','numeric');
		$this->captura('numero_contrato','varchar');
		$this->captura('id_rpc','int4');
		//$this->captura('id_alarma','int4');
		$this->captura('observaciones','varchar');
		$this->captura('id_proveedor','int4');
		$this->captura('origen_recursos','varchar');
		$this->captura('id_uo','int4');
		$this->captura('id_representante_legal','int4');
		$this->captura('id_tipo_contrato','int4');
		$this->captura('fecha_testimonio','date');
		$this->captura('doc_contrato','varchar');
		$this->captura('id_supervisor','int4');
		$this->captura('beneficiario','varchar');
		$this->captura('version','int4');
		$this->captura('id_gestion','int4');
		$this->captura('fecha_ini','date');
		$this->captura('fecha_ap_acta','date');
		$this->captura('id_oc','int4');
		$this->captura('id_funcionario','int4');
		$this->captura('id_moneda','int4');
		$this->captura('numero_licitacion','varchar');
		$this->captura('usr_reg','varchar');
		$this->captura('usr_mod','varchar');
		
		
		$this->captura('desc_modalidad','varchar');
		$this->captura('desc_depto','varchar');
		$this->captura('desc_rpc','text');
		$this->captura('desc_proveedor','varchar');
		$this->captura('desc_uo','varchar');
		$this->captura('desc_rep_legal','text');
		$this->captura('desc_tipo_contrato','varchar');
		$this->captura('desc_supervisor','text');
		$this->captura('desc_gestion','integer');
		$this->captura('desc_funcionario','varchar');
		$this->captura('desc_moneda','varchar');
		//$this->captura('desc_alarma','varchar');
		$this->captura('desc_proyecto','varchar');
		$this->captura('desc_lugar','varchar');
		$this->captura('nombre_estado','varchar');
		$this->captura('estado_proceso','varchar');
		$this->captura('id_abogado','integer');
		$this->captura('abogado','text');
		$this->captura('fecha_reg','date');
		$this->captura('fecha_mod','date');
		$this->captura('estado_reg','varchar');
		
		
		
		
		//Ejecuta la instruccion
		$this->armarConsulta();
		$this->ejecutarConsulta();
		//echo $this->getConsulta(); exit;
		//Devuelve la respuesta
		return $this->respuesta;
	}
			
	function insertarProcesoContrato(){
		//Definicion de variables para ejecucion del procedimiento
		$this->procedimiento='saj.f_tproceso_contrato_ime';
		$this->transaccion='SA_CONTRA_INS';
		$this->tipo_procedimiento='IME';
				
		//Define los parametros para la funcion
		$this->setParametro('notario','notario','varchar');
		$this->setParametro('numero_oc','numero_oc','varchar');
		$this->setParametro('fecha_convocatoria','fecha_convocatoria','date');
		$this->setParametro('numero_requerimiento','numero_requerimiento','varchar');
		$this->setParametro('multas','multas','varchar');
		$this->setParametro('id_modalidad','id_modalidad','int4');
		$this->setParametro('fecha_aprobacion','fecha_aprobacion','date');
		$this->setParametro('fecha_fin','fecha_fin','date');
		$this->setParametro('plazo','plazo','varchar');
		$this->setParametro('objeto_contrato','objeto_contrato','varchar');
		$this->setParametro('id_depto','id_depto','int4');
		$this->setParametro('extension','extension','varchar');
		$this->setParametro('id_proyecto','id_proyecto','int4');
		$this->setParametro('forma_pago','forma_pago','varchar');
		$this->setParametro('id_lugar_suscripcion','id_lugar_suscripcion','int4');
		$this->setParametro('numero_cuce','numero_cuce','varchar');
		$this->setParametro('fecha_suscripcion','fecha_suscripcion','date');
		$this->setParametro('testimonio','testimonio','varchar');
		$this->setParametro('monto_contrato','monto_contrato','numeric');
		$this->setParametro('numero_contrato','numero_contrato','int4');
		$this->setParametro('id_rpc','id_rpc','int4');
		$this->setParametro('id_alarma','id_alarma','int4');
		$this->setParametro('observaciones','observaciones','varchar');
		$this->setParametro('id_proveedor','id_proveedor','int4');
		$this->setParametro('origen_recursos','origen_recursos','varchar');
		$this->setParametro('id_uo','id_uo','int4');
		$this->setParametro('id_representante_legal','id_representante_legal','int4');
		$this->setParametro('id_tipo_contrato','id_tipo_contrato','int4');
		$this->setParametro('fecha_testimonio','fecha_testimonio','date');
		$this->setParametro('doc_contrato','doc_contrato','varchar');
		$this->setParametro('id_supervisor','id_supervisor','int4');
		$this->setParametro('beneficiario','beneficiario','varchar');
		$this->setParametro('version','version','int4');
		$this->setParametro('fecha_ini','fecha_ini','date');
		$this->setParametro('fecha_ap_acta','fecha_ap_acta','date');
		$this->setParametro('id_oc','id_oc','int4');
		$this->setParametro('id_funcionario','id_funcionario','int4');
		$this->setParametro('id_moneda','id_moneda','int4');
		$this->setParametro('numero_licitacion','numero_licitacion','varchar');

		//Ejecuta la instruccion
		$this->armarConsulta();
		$this->ejecutarConsulta();

		//Devuelve la respuesta
		return $this->respuesta;
	}
			
	function modificarProcesoContrato(){
		//Definicion de variables para ejecucion del procedimiento
		
		//captura los parametros pasados por la vista
		$parametros  = $this->aParam->getArregloParametros('asignacion');
		//si esdel tipo matriz  verifica en la primera posicion el tipo de vista
		if($this->esMatriz){
		    $tipo_operacion =$parametros[0]['tipo_operacion'];	
			
		}else{
			$tipo_operacion =$parametros['tipo_operacion'];
			
		}
		
		$this->procedimiento='saj.f_tproceso_contrato_ime';
		$this->tipo_procedimiento='IME';
		
		//segun el tipo de vista cambiamos la transaccion que se ejecuta
		if($tipo_operacion=='asignacion'){
		   $this->transaccion='SA_CONASIG_MOD';
          }  
        elseif($tipo_operacion=='cambiar_estado'){
		   $this->transaccion='SA_CAMEST_MOD';
		   $this->setParametro('operacion','operacion','varchar');// cuando finaliza los requerimientos, su valor es fin_requerimiento
		   $this->setParametro('id_abogado','id_abogado','int4');
		}
		elseif($tipo_operacion=='elaboracion'){
		   $this->transaccion='SA_CONELA_MOD';
		}
		else{
		  $this->transaccion='SA_CONTRA_MOD';
		}
		
		
	
				
		//Define los parametros para la funcion
		$this->setParametro('id_proceso_contrato','id_proceso_contrato','int4');
		$this->setParametro('notario','notario','varchar');
		$this->setParametro('numero_oc','numero_oc','varchar');
		$this->setParametro('fecha_convocatoria','fecha_convocatoria','date');
		$this->setParametro('numero_requerimiento','numero_requerimiento','varchar');
		$this->setParametro('multas','multas','varchar');
		$this->setParametro('id_modalidad','id_modalidad','int4');
		$this->setParametro('fecha_aprobacion','fecha_aprobacion','date');
		$this->setParametro('fecha_fin','fecha_fin','date');
		$this->setParametro('plazo','plazo','varchar');
		$this->setParametro('objeto_contrato','objeto_contrato','varchar');
		$this->setParametro('id_depto','id_depto','int4');
		$this->setParametro('extension','extension','varchar');
		$this->setParametro('id_proyecto','id_proyecto','int4');
		$this->setParametro('forma_pago','forma_pago','varchar');
		$this->setParametro('id_lugar_suscripcion','id_lugar_suscripcion','int4');
		$this->setParametro('numero_cuce','numero_cuce','varchar');
		$this->setParametro('fecha_suscripcion','fecha_suscripcion','date');
		$this->setParametro('testimonio','testimonio','varchar');
		$this->setParametro('monto_contrato','monto_contrato','numeric');
		$this->setParametro('numero_contrato','numero_contrato','varchar');
		$this->setParametro('id_rpc','id_rpc','int4');
		$this->setParametro('id_alarma','id_alarma','int4');
		$this->setParametro('observaciones','observaciones','varchar');
		$this->setParametro('id_proveedor','id_proveedor','int4');
		$this->setParametro('origen_recursos','origen_recursos','varchar');
		$this->setParametro('id_uo','id_uo','int4');
		$this->setParametro('id_representante_legal','id_representante_legal','int4');
		$this->setParametro('id_tipo_contrato','id_tipo_contrato','int4');
		$this->setParametro('fecha_testimonio','fecha_testimonio','date');
		$this->setParametro('doc_contrato','doc_contrato','varchar');
		$this->setParametro('id_supervisor','id_supervisor','int4');
		$this->setParametro('beneficiario','beneficiario','varchar');
		$this->setParametro('version','version','int4');
		$this->setParametro('fecha_ini','fecha_ini','date');
		$this->setParametro('fecha_ap_acta','fecha_ap_acta','date');
		$this->setParametro('id_oc','id_oc','int4');
		$this->setParametro('id_funcionario','id_funcionario','int4');
		$this->setParametro('id_moneda','id_moneda','int4');
		$this->setParametro('numero_licitacion','numero_licitacion','varchar');

		//Ejecuta la instruccion
		$this->armarConsulta();
		$this->ejecutarConsulta();

		//Devuelve la respuesta
		return $this->respuesta;
	}
			
	function eliminarProcesoContrato(){
		//Definicion de variables para ejecucion del procedimiento
		$this->procedimiento='saj.f_tproceso_contrato_ime';
		$this->transaccion='SA_CONTRA_ELI';
		$this->tipo_procedimiento='IME';
				
		//Define los parametros para la funcion
		$this->setParametro('id_proceso_contrato','id_proceso_contrato','int4');

		//Ejecuta la instruccion
		$this->armarConsulta();
		$this->ejecutarConsulta();

		//Devuelve la respuesta
		return $this->respuesta;
	}
   
    function subirContrato(){
	
		//Definicion de variables para ejecucion del procedimiento
		$this->procedimiento='saj.f_tproceso_contrato_ime';
		$this->transaccion='SA_ARCHCON_MOD';
		$this->tipo_procedimiento='IME';
		
		//apartir del tipo  del archivo obtiene la extencion
		$ext = pathinfo($this->arregloFiles['contrato']['name']);
 		$this->arreglo['extension']= strtolower($ext['extension']);
		
		if($this->arreglo['extension']!='pdf'){
			 throw new Exception("Solo se admiten archivos PDF");
		}
		
		$verion = $this->arreglo['version'] +1;
		$this->arreglo['version']=$verion;
		$ruta_dir = './../../sis_legal/control/_archivo/'.$this->arreglo['desc_gestion'];
		$this->arreglo['doc_contrato']=$ruta_dir.'/docCon'.$this->arreglo['id_proceso_contrato'].'v'.$verion.'.'.$this->arreglo['extension'];
		//Define los parametros para la funcion	
		$this->setParametro('id_proceso_contrato','id_proceso_contrato','integer');	
		$this->setParametro('extension','extension','varchar');
		$this->setParametro('version','version','integer');
		$this->setParametro('doc_contrato','doc_contrato','varchar');
		
		//verficar si no tiene errores el archivo
		
		 //echo $_SERVER [ 'DOCUMENT_ROOT' ];
		
		if ($this->arregloFiles['contrato']['error']) {
          switch ($this->arregloFiles['contrato']['error']){
                   case 1: // UPLOAD_ERR_INI_SIZE
                   throw new Exception("El archivo sobrepasa el limite autorizado por el servidor(archivo php.ini) !");
                   break;
                   case 2: // UPLOAD_ERR_FORM_SIZE
                   throw new Exception("El archivo sobrepasa el limite autorizado en el formulario HTML !");
                   break;
                   case 3: // UPLOAD_ERR_PARTIAL
                   throw new Exception("El envio del archivo ha sido suspendido durante la transferencia!");
                   break;
                   case 4: // UPLOAD_ERR_NO_FILE
                   throw new Exception("El archivo que ha enviado tiene un tamaño nulo !");
                   break;
          }
		}
		else {
		 // $_FILES['nom_del_archivo']['error'] vale 0 es decir UPLOAD_ERR_OK
		 // lo que significa que no ha habido ningún error
		}
				
		
		
		
		//verificar si existe la carpeta destino
		
		if(!file_exists($ruta_dir))
		{
			///si no existe creamos la carpeta destino	
			if(!mkdir($ruta_dir,0777)){
	           throw new Exception("Error al crear el directorio");		
			}
	
		}
		
		//movemos el archivo
		if(!move_uploaded_file($this->arregloFiles['contrato']["tmp_name"],$this->arreglo['doc_contrato'])){
			throw new Exception("Error al copiar archivo");	
		}
		
		
		//si la copia de archivo tuvo emodificamos el registro
		//Ejecuta la instruccion
		$this->armarConsulta();
		$this->ejecutarConsulta();
		
		
		return $this->respuesta;
	}

			
}

?>