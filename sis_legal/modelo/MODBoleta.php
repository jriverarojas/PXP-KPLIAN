<?php
/**
*@package pXP
*@file gen-MODBoleta.php
*@author  (fprudencio)
*@date 17-11-2011 11:23:54
*@description Clase que envia los parametros requeridos a la Base de datos para la ejecucion de las funciones, y que recibe la respuesta del resultado de la ejecucion de las mismas
*/

class MODBoleta extends MODbase{
	
	function __construct(CTParametro $pParam){
		parent::__construct($pParam);
	}
			
	function listarBoleta(){
		//Definicion de variables para ejecucion del procedimientp
		$this->procedimiento='saj.f_tboleta_sel';
		$this->transaccion='SA_BOLETA_SEL';
		$this->tipo_procedimiento='SEL';//tipo de transaccion

		//Definicion de la lista del resultado del query
		$this->setParametro('id_proceso_contrato','id_proceso_contrato','integer');
		
			
		//Definicion de la lista del resultado del query
		$this->captura('id_boleta','int4');
		$this->captura('extension','varchar');
		$this->captura('doc_garantia','varchar');
		//$this->captura('id_alarma','int4');
		$this->captura('id_institucion_banco','int4');
		$this->captura('fecha_fin','date');
		$this->captura('numero','varchar');
		$this->captura('fecha_vencimiento','date');
		$this->captura('fecha_suscripcion','date');
		$this->captura('orden','int4');
		$this->captura('observaciones','varchar');
		$this->captura('monto','numeric');
		$this->captura('id_moneda','int4');
		$this->captura('tipo','varchar');
		$this->captura('version','int4');
		$this->captura('estado_reg','varchar');
		$this->captura('id_proceso_contrato','int4');
		$this->captura('fecha_ini','date');
		$this->captura('estado','varchar');
		$this->captura('id_usuario_reg','int4');
		$this->captura('fecha_reg','date');
		$this->captura('id_usuario_mod','int4');
		$this->captura('fecha_mod','date');
		$this->captura('usr_reg','varchar');
		$this->captura('usr_mod','varchar');
		$this->captura('desc_moneda','varchar');
        $this->captura('nombre','varchar');
		//Ejecuta la instruccion
		$this->armarConsulta();
		$this->ejecutarConsulta();
		
		//Devuelve la respuesta
		return $this->respuesta;
	}

function listarBoletaContrato(){
		//Definicion de variables para ejecucion del procedimientp
		$this->procedimiento='saj.f_tboleta_sel';
		$this->transaccion='SA_BOLETAPR_SEL';
		$this->tipo_procedimiento='SEL';//tipo de transaccion

		//Definicion de la lista del resultado del query
		//$this->setParametro('id_proceso_contrato','id_proceso_contrato','integer');
	    $this->setParametro('id_usuario','id_usuario','integer');
		$this->setParametro('tipoFiltro','tipoFiltro','varchar');
		//Definicion de la lista del resultado del query
		$this->captura('id_boleta','int4');
		$this->captura('extension','varchar');
		$this->captura('doc_garantia','varchar');
		//$this->captura('id_alarma','int4');
		$this->captura('id_institucion_banco','int4');
		$this->captura('fecha_fin','date');
		$this->captura('numero','varchar');
		$this->captura('fecha_vencimiento','date');
		$this->captura('fecha_suscripcion','date');
		$this->captura('orden','int4');
		$this->captura('observaciones','varchar');
		$this->captura('monto','numeric');
		$this->captura('id_moneda','int4');
		$this->captura('tipo','varchar'); 
		$this->captura('version','int4');
		$this->captura('estado_reg','varchar');
		$this->captura('id_proceso_contrato','int4');
		$this->captura('fecha_ini','date');
		$this->captura('estado','varchar');
		$this->captura('id_usuario_reg','int4');
		$this->captura('fecha_reg','date');
		$this->captura('id_usuario_mod','int4');
		$this->captura('fecha_mod','date');
		$this->captura('usr_reg','varchar');
		$this->captura('usr_mod','varchar');
		$this->captura('desc_moneda','varchar');
        $this->captura('nombre','varchar');
		$this->captura('numero_contrato','varchar');
		$this->captura('desc_proveedor','varchar');
		$this->captura('doc_contrato','varchar');
		$this->captura('numero_requerimiento','varchar');
		
		
		//Ejecuta la instruccion
		$this->armarConsulta();
		$this->ejecutarConsulta();
		
		//Devuelve la respuesta
		return $this->respuesta;
	}
		
			
	function insertarBoleta(){
		//Definicion de variables para ejecucion del procedimiento
		$this->procedimiento='saj.f_tboleta_ime';
		$this->transaccion='SA_BOLETA_INS';
		$this->tipo_procedimiento='IME';
				
		//Define los parametros para la funcion
		$this->setParametro('id_boleta_fk','id_boleta_fk','int4');
		$this->setParametro('extension','extension','varchar');
		$this->setParametro('doc_garantia','doc_garantia','varchar');
		$this->setParametro('id_alarma','id_alarma','int4');
		$this->setParametro('id_institucion_banco','id_institucion_banco','int4');
		$this->setParametro('fecha_fin','fecha_fin','date');
		$this->setParametro('numero','numero','varchar');
		$this->setParametro('fecha_vencimiento','fecha_vencimiento','date');
		$this->setParametro('fecha_suscripcion','fecha_suscripcion','date');
		$this->setParametro('orden','orden','int4');
		$this->setParametro('observaciones','observaciones','varchar');
		$this->setParametro('monto','monto','numeric');
		$this->setParametro('id_moneda','id_moneda','int4');
		$this->setParametro('tipo','tipo','varchar');
		$this->setParametro('version','version','int4');
		$this->setParametro('estado_reg','estado_reg','varchar');
		$this->setParametro('id_proceso_contrato','id_proceso_contrato','int4');
		$this->setParametro('fecha_ini','fecha_ini','date');
		$this->setParametro('estado','estado','varchar');

		//Ejecuta la instruccion
		$this->armarConsulta();
		$this->ejecutarConsulta();

		//Devuelve la respuesta
		return $this->respuesta;
	}
			
	function modificarBoleta(){
		//Definicion de variables para ejecucion del procedimiento
		$this->procedimiento='saj.f_tboleta_ime';
		$this->transaccion='SA_BOLETA_MOD';
		$this->tipo_procedimiento='IME';
				
		//Define los parametros para la funcion
		$this->setParametro('id_boleta','id_boleta','int4');
		
		$this->setParametro('extension','extension','varchar');
		$this->setParametro('doc_garantia','doc_garantia','varchar');
		$this->setParametro('id_alarma','id_alarma','int4');
		$this->setParametro('id_institucion_banco','id_institucion_banco','int4');
		$this->setParametro('fecha_fin','fecha_fin','date');
		$this->setParametro('numero','numero','varchar');
		$this->setParametro('fecha_vencimiento','fecha_vencimiento','date');
		$this->setParametro('fecha_suscripcion','fecha_suscripcion','date');
		$this->setParametro('orden','orden','int4');
		$this->setParametro('observaciones','observaciones','varchar');
		$this->setParametro('monto','monto','numeric');
		$this->setParametro('id_moneda','id_moneda','int4');
		$this->setParametro('tipo','tipo','varchar');
		$this->setParametro('version','version','int4');
		$this->setParametro('estado_reg','estado_reg','varchar');
		$this->setParametro('id_proceso_contrato','id_proceso_contrato','int4');
		$this->setParametro('fecha_ini','fecha_ini','date');
		$this->setParametro('estado','estado','varchar');

		//Ejecuta la instruccion
		$this->armarConsulta();
		$this->ejecutarConsulta();

		//Devuelve la respuesta
		return $this->respuesta;
	}
			
	function eliminarBoleta(){
		//Definicion de variables para ejecucion del procedimiento
		$this->procedimiento='saj.f_tboleta_ime';
		$this->transaccion='SA_BOLETA_ELI';
		$this->tipo_procedimiento='IME';
				
		//Define los parametros para la funcion
		$this->setParametro('id_boleta','id_boleta','int4');

		//Ejecuta la instruccion
		$this->armarConsulta();
		$this->ejecutarConsulta();

		//Devuelve la respuesta
		return $this->respuesta;
	}
	
	function subirBoleta(){
	
		//Definicion de variables para ejecucion del procedimiento
		$this->procedimiento='saj.f_tboleta_ime';
		$this->transaccion='SA_ARCHBOL_MOD';
		$this->tipo_procedimiento='IME';
		
		//apartir del tipo  del archivo obtiene la extencion
		$ext = pathinfo($this->arregloFiles['boleta']['name']);
 		$this->arreglo['extension']= strtolower($ext['extension']);
		
		if($this->arreglo['extension']!='pdf'){
			 throw new Exception("Solo se admiten archivos PDF");
		}
		
		$verion = 1+$this->arreglo['version'];
		$this->arreglo['version']=$verion;
		$ruta_dir = './../../sis_legal/control/_archivo_boleta/'.$this->arreglo['desc_gestion'];
		$this->arreglo['doc_garantia']=$ruta_dir.'/docBol'.$this->arreglo['id_boleta'].'v'.$verion.$this->arreglo['extension'];
		//Define los parametros para la funcion	
		$this->setParametro('id_boleta','id_boleta','integer');	
		$this->setParametro('extension','extension','varchar');
		$this->setParametro('version','version','integer');
		$this->setParametro('doc_garantia','doc_garantia','varchar');
		
		//verficar si no tiene errores el archivo
		
		 //echo $_SERVER [ 'DOCUMENT_ROOT' ];
		
		if ($this->arregloFiles['boleta']['error']) {
          switch ($this->arregloFiles['boleta']['error']){
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
		if(!move_uploaded_file($this->arregloFiles['boleta']["tmp_name"],$this->arreglo['doc_garantia'])){
			throw new Exception("Error al copiar archivo");	
		}
		
		
		//si la copia de archivo tuvo emodificamos el registro
		//Ejecuta la instruccion
		$this->armarConsulta();
		$this->ejecutarConsulta();
		
		
		return $this->respuesta;
	}
	
	function cambiarEstado(){
		//Definicion de variables para ejecucion del procedimiento
		$this->procedimiento='saj.f_tboleta_ime';
		$this->transaccion='SA_CMBEST_MOD';
		$this->tipo_procedimiento='IME';
				
		//Define los parametros para la funcion
		$this->setParametro('id_boleta','id_boleta','int4');
		$this->setParametro('estado','estado','varchar');

		//Ejecuta la instruccion
		$this->armarConsulta();
		$this->ejecutarConsulta();

		//Devuelve la respuesta
		return $this->respuesta;
	}
	
			
}
?>