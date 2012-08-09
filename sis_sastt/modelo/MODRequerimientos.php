<?php
/**
*@package pXP
*@file gen-MODRequerimientos.php
*@author  (rortiz)
*@date 22-11-2011 15:09:03
*@description Clase que envia los parametros requeridos a la Base de datos para la ejecucion de las funciones, y que recibe la respuesta del resultado de la ejecucion de las mismas
*/

class MODRequerimientos extends MODbase{
	
	function __construct(CTParametro $pParam){
		parent::__construct($pParam);
	}
	
	function listarCaptura(){
		//Definicion de variables para ejecucion del procedimiento
		$this->procedimiento='sast.ft_requerimientos_sel';
		$this->transaccion='ST_CAPTU_SEL';//nombre de la transaccion
		$this->tipo_procedimiento='SEL';//tipo de transaccion
		$this->setParametro('tipo_interfaz','tipo_interfaz','varchar');	
		//aumentar parametro
		$this->setParametro('id_funcionario','id_funcionario','integer');
	
		//$_SESSION["CAPTURA"]=array();
	
		//Definicion de la lista del resultado del query
		$this->captura('id_requerimiento','int4');
		$this->captura('id_funcionario','int4');
		$this->captura('id_tipo_requerimiento','int4');
		$this->captura('id_depto','int4');
		$this->captura('id_gestion','int4');
		$this->captura('numero_requerimiento','varchar');	
		$this->captura('version','int4');
		$this->captura('descripcion','text');
		$this->captura('estado_reg','varchar');
		$this->captura('id_usuario_reg','int4');
		$this->captura('fecha_reg','timestamp');
		$this->captura('id_usuario_mod','int4');
		$this->captura('fecha_mod','timestamp');
		$this->captura('usr_reg','varchar');
		$this->captura('usr_mod','varchar');
		$this->captura('estado_requerimiento','varchar');
		$this->captura('desc_funcionario','varchar');
		$this->captura('requerimiento','varchar');
		$this->captura('departamento','varchar');
		$this->captura('desc_gestion','int4');
		$this->captura('nombre_estado','varchar');
		$this->captura('id_tecnico','integer');
		$this->captura('tecnico','text');
		$this->captura('fecha_requer','date');
		$this->captura('fecha_ini','date');
		$this->captura('hora_requer','time');
		$this->captura('solucion','varchar');
		$this->captura('fecha_fin','date');
		$this->captura('hora','time');		
		$this->captura('extension','varchar');
		$this->captura('captura','varchar');		
		
		//Ejecuta la funcion
		$this->armarConsulta();
		$this->ejecutarConsulta();
		
		//echo $this->getConsulta(); exit;
		//Devuelve la respuesta
		return $this->respuesta;

	}
			
	function insertarRequerimientos(){
		//Definicion de variables para ejecucion del procedimiento
		$this->procedimiento='sast.ft_requerimientos_ime';
		$this->transaccion='ST_REQ_INS';
		$this->tipo_procedimiento='IME';
				
		//Define los parametros para la funcion
		$this->setParametro('estado_reg','estado_reg','varchar');
		$this->setParametro('descripcion','descripcion','text');
		$this->setParametro('numero_requerimiento','numero_requerimiento','int4');
		$this->setParametro('id_funcionario','id_funcionario','int4');
		$this->setParametro('id_tipo_requerimiento','id_tipo_requerimiento','int4');
		$this->setParametro('id_depto','id_depto','int4');
		$this->setParametro('id_gestion','id_gestion','int4');
		$this->setParametro('version','version','int4');
		$this->setParametro('solucion','solucion','varchar');
		$this->setParametro('hora_requer','hora_requer','time');
		$this->setParametro('fecha_requer','fecha_requer','date');
		

		//Ejecuta la instruccion
		$this->armarConsulta();
		$this->ejecutarConsulta();

		//Devuelve la respuesta
		return $this->respuesta;
	}
			
	function modificarRequerimientos(){
		ob_start();
$fb=FirePHP::getInstance(true);

		
		//Definicion de variables para ejecucion del procedimiento
		
		//captura los parametros pasados por la vista
		$parametros  = $this->aParam->getArregloParametros('asignacion');
		//si esdel tipo matriz  verifica en la primera posicion el tipo de vista
		if($this->esMatriz){
		    $tipo_operacion =$parametros[0]['tipo_operacion'];	
			
		}else{
			$tipo_operacion =$parametros['tipo_operacion'];			
		}


$fb->log($tipo_operacion,"tipo_operacion");
		
		$this->procedimiento='sast.ft_requerimientos_ime';
		$this->tipo_procedimiento='IME';
		
		
		//segun el tipo de vista cambiamos la transaccion que se ejecuta
		if($tipo_operacion=='asignacion'){
			$this->transaccion='ST_REQASIG_MOD';
		}
		elseif($tipo_operacion=='cambiar_estado'){
		   $this->transaccion='ST_CAMEST_MOD';
		   $this->setParametro('operacion','operacion','varchar');// cuando finaliza los requerimientos, su valor es fin_requerimiento
		   $this->setParametro('solucion','solucion','varchar');		   
		}
		
		elseif($tipo_operacion=='re_asignacion'){
		   $this->transaccion='ST_CAMEST_MOD';
		   $this->setParametro('operacion','operacion','varchar');
		   $this->setParametro('solucion','solucion','varchar');		   
		  
		//$fb->log($tipo_operacion,"ENTRAAAAAAAAA");
		
		   
		}
		else{
			$this->transaccion='ST_REQ_MOD';
		}
				
		//Define los parametros para la funcion
		$this->setParametro('id_requerimiento','id_requerimiento','int4');		
		$this->setParametro('descripcion','descripcion','text');
		$this->setParametro('id_funcionario','id_funcionario','int4');
		$this->setParametro('id_tipo_requerimiento','id_tipo_requerimiento','int4');
		$this->setParametro('version','version','int4');
		$this->setParametro('id_depto','id_depto','int4');
		$this->setParametro('id_tecnico','id_tecnico','int4');
		//$this->setParametro('solucion','solucion','varchar');

		//Ejecuta la instruccion
		$this->armarConsulta();
		$this->ejecutarConsulta();

		//Devuelve la respuesta
		//echo $this->getConsulta(); exit;
		return $this->respuesta;
	}
			
	function eliminarRequerimientos(){
		//Definicion de variables para ejecucion del procedimiento
		$this->procedimiento='sast.ft_requerimientos_ime';
		$this->transaccion='ST_REQ_ELI';
		$this->tipo_procedimiento='IME';
				
		//Define los parametros para la funcion
		$this->setParametro('id_requerimiento','id_requerimiento','int4');

		//Ejecuta la instruccion
		$this->armarConsulta();
		$this->ejecutarConsulta();

		//Devuelve la respuesta
		return $this->respuesta;
		
	}
	
	function subirCaptura(){
	
		//Definicion de variables para ejecucion del procedimiento
		$this->procedimiento='sast.ft_requerimientos_ime';// nombre procedimiento almacenado
		$this->transaccion='ST_UPCAPTREQ_MOD';//nombre de la transaccion
		$this->tipo_procedimiento='IME';//tipo de transaccion
		
		//apartir del tipo  del archivo obtiene la extension
		$ext = pathinfo($this->arregloFiles['captura1']['name']);
 		$this->arreglo['extension']= $ext['extension'];
 		
		$verion = $this->arreglo['version'] +1;
		$this->arreglo['version']=$verion;		
		$ruta_dir = './../../sis_sastt/control/_captura/'.$this->arreglo['desc_gestion'];
		$this->arreglo['captura1']=$ruta_dir.'/Capt'.$this->arreglo['id_requerimiento'].'v'.$verion.'.'.$this->arreglo['extension'];		
		//Define los parametros para la funcion
		$this->setParametro('id_requerimiento','id_requerimiento','integer');	
		$this->setParametro('extension','extension','varchar');
		$this->setParametro('version','version','integer');
		$this->setParametro('captura1','captura1','varchar');
				//verificar si existe la carpeta destino
		
		//movemos el archivo
		if(!move_uploaded_file($this->arregloFiles['captura1']["tmp_name"],$this->arreglo['captura1'])){
			throw new Exception("Error al copiar archivo");	
		}
		
		//Ejecuta la instruccion
		$this->armarConsulta();				
		$this->ejecutarConsulta();
		
		//echo $this->getConsulta(); exit;
		
		return $this->respuesta;
	}	
}
?>