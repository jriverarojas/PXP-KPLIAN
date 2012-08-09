<?php
class Mensaje
{
	private $tipo;//EXITO || ERROR
	private $transaccion;
	private $procedimiento;
	private $archivo;
	private $mensaje;
	private $mensaje_tec;
	private $capa;
	private $total;
	private $tipo_transaccion;//SEL || IME || OTRO
	public $datos=array();//RAC 18/11/11 se hace publica esta propiedad
	private $consulta;
	private $tipo_respuesta;
	private $nivel_arbol=array();
	private $archivo_generado;

	/**
	 * Nombre funcion:	setDatos
	 * Proposito:		Registra el valor de los datos devueltos ede ua consulta de seleccion
	 * Fecha creacion:	12/04/2009
	 *
	 * @param array $arreglo
	 *
	 */
	function setDatos($arreglo){
		$this->datos=$arreglo;
	}
	
	/**
	 * Nombre funcion:	addRecDatos
	 * Proposito:		Adiciona un registro al principio de la respuesta
	 * Fecha creacion:	18/11/2011
	 *
	 * @param array $arreglo
	 *
	 */
	
	function addRecDatos($arr){
		array_unshift($this->datos,$arr);
	}

	/**
	 * Nombre funcion:	setValores
	 * Proposito:		Cambia los valores de uno o mas campos dentro del arreglo de datos
	 * Fecha creacion:	12/04/2009
	 *
	 * @param array $arreglo Arreglo de Arreglos con la siguiente estructura:
	 * 							('variable' -> nombre del campo,
	 * 						   'val_ant'-> antiguo valor q se reemplaza,
	 * 							'val_nue'->valor nuevo q reemplazara al antiguo)
	 *
	 */
	function setValores($arreglo){
		for($i=0;$i<count($this->datos);$i++){
			$aux='no';
			foreach($arreglo as $data){

				if($this->datos[$i][$data['variable']]==$data['val_ant'] && $aux=='no'){

					$this->datos[$i][$data['variable']]=$data['val_nue'];
					$aux='si';
				}
			}
		}
	}

	/**
	 * Nombre funcion:	setTotal
	 * Proposito:		Registra el valor de la cantidad de registros en una consulta de seleccion
	 * Fecha creacion:	12/04/2009
	 *
	 * @param array $total
	 *
	 */
	function setTotal($total){
		$this->total=$total;

	}
	
	/**
	 * Nombre funcion:	setArchivoGenerado
	 * Proposito:		Registra el archivo generado por un reporte
	 * Fecha creacion:	19/08/2010
	 *
	 * @param array $total
	 *
	 */
	function setArchivoGenerado($nombre){
		$this->archivo_generado=$nombre;

	}
	
	/**
	 * Nombre funcion:	setMensaje
	 * Proposito:		Registra los valores del mensaje a enviar
	 * Fecha creación:	12/04/2009
	 *
	 * @param cadena $tipo_mensaje
	 * @param cadena $archivo
	 * @param cadena $mensaje
	 * @param cadena $mensaje_tecnico
	 * @param cadena $capa
	 * @param cadena $procedimiento_almacenado
	 * @param cadena $transaccion
	 */
	function setMensaje($tipo,$archivo,$mensaje,$mensaje_tec,$capa,$procedimiento='',$transaccion='',$tipo_trans='',$consulta=''){
		$this->mensaje=$mensaje;
		$this->mensaje_tec=$mensaje_tec;
		$this->archivo=$archivo;
		$this->tipo=$tipo;
		$this->capa=$capa;
		$this->procedimiento=$procedimiento;
		$this->transaccion=$transaccion;
		$this->tipo_transaccion=$tipo_trans;
		$this->consulta=$consulta;
	}


	/**
	 * Nombre funcion:	setTipoRespuestaArbol
	 * Proposito:		Indica que se debe generar una respuesta de tipo arbol para la consulta
	 * Fecha creacion:	12/04/2009
	  
	 */
	function setTipoRespuestaArbol(){
		$this->tipo_respuesta='arbol';
	}
	
	
	
	/**
	 * Nombre funcion:	setTipoTransaccion
	 * Proposito:		Indica el tipo de trasaccion sel o ime
	 * Fecha creacion:	12/04/2009
	  
	 */
	function setTipoTransaccion($tipo){
		$this->tipo_transaccion=$tipo;
	}

	/**
	 * Nombre funcion:	addNivelArbol
	 * Proposito:		Aumenta un nivel a la definicion de arboles
	 * Fecha creacion:	12/04/2009
	 * @param campo_condicion
	 * @param valor_condicion
	 * @param id
	 * @param arreglo_nivel arreglo asociativocon los siguientes parametros, se pueden aumentar mas:
	 * id_p: id del padre q fue enviado apra el listado
	 * leaf: El nodo es hoja
	 * allowDelete:Permite eliminar el nodo
	 * allowEdit: Permite modificar el nodo
	 * icon:el icono q tendra el nodo
	 * cls: la clase q tiene el nodo
	  
	 */
	function addNivelArbol($campo_condicion,$valor_condicion,$arreglo_nivel,$arreglo_equivalencias){
		//RAC 25/10/2011: validacion de varialbes
		//array_push($this->nivel_arbol,array('campo'=>$campo_condicion,'valor'=>$valor_condicion,'id'=>$id,'arreglo'=>$arreglo_nivel,'arreglo_equivalencias'=>$arreglo_equivalencias));
		array_push($this->nivel_arbol,array('campo'=>$campo_condicion,'valor'=>$valor_condicion,'id'=>'','arreglo'=>$arreglo_nivel,'arreglo_equivalencias'=>$arreglo_equivalencias));
	}

	/**
	 * Nombre funcion:	getDatos
	 * Proposito:		devuelve el array de datos
	 * Fecha creacion:	12/04/2009
	 * @return array datos
	 *
	 */
	function getDatos(){
		return $this->datos;
	}

	/**
	 * Nombre funcion:	getTipo
	 * Proposito:		devuelve el tipo de mensaje error o exito
	 * Fecha creacion:	12/04/2009
	 * @return tipo cadena
	 *
	 */
	function getTipo(){
		return $this->tipo;
	}

	/**
	 * Nombre funcion:	getTransaccion
	 * Proposito:		devuelve el nombre de la transaccion que fuo ejecutada
	 * Fecha creacion:	12/05/2009
	 * @return transaccion cadena
	 *
	 */
	function getTransaccion(){
		return $this->transaccion;
	}

	/**
	 * Nombre funcion:	getProcedimiento
	 * Proposito:		devuelve el nombre del procedimiento que fuo ejecutado
	 * Fecha creacion:	12/05/2009
	 * @return procedimiento cadena
	 *
	 */
	function getprocedimiento(){
		return $this->procedimiento;
	}

	/**
	 * Nombre funcion:	getMensajeTec
	 * Proposito:		devuelve el mensaje de error tecnico en caso de haber ocurrido
	 * Fecha creacion:	12/05/2009
	 * @return transaccion cadena
	 *
	 */
	function getMensajeTec(){
		return $this->mensaje_tec;
	}

	/**
	 * Nombre funcion:	getMensaje
	 * Proposito:		devuelve el mensaje que puede ser visto por el usuario
	 * Fecha creacion:	12/05/2009
	 * @return transaccion cadena
	 *
	 */
	function getMensaje(){
		return $this->mensaje;
	}

	/**
	 * Nombre funcion:	getCapa
	 * Proposito:		devuelve el nivel en que sucedio el error
	 * Fecha creacion:	12/05/2009
	 * @return capa cadena
	 *
	 */
	function getCapa(){
		return $this->capa;
	}


	/**
	 * Nombre funcion:	getTotal
	 * Proposito:		devuelve la cantidad de regsitros en una consulta sel
	 * Fecha creacion:	12/05/2009
	 * @return transaccion cadena
	 *
	 */
	function getTotal(){
		return $this->total;
	}

	/**
	 * Nombre funcion:	getTipoTransaccion
	 * Proposito:		devuelve el tipo de transaccion que se ejecuto en la bd
	 * Fecha creacion:	12/05/2009
	 * @return tipo-transaccion cadena
	 *
	 */
	function getTipoTransaccion(){
		return $this->tipo_transaccion;
	}

	/**
	 * Nombre funcion:	getConsulta
	 * Proposito:		devuelve la consulta ejecutada desde el modelo en la base de datos
	 * Fecha creacion:	12/05/2009
	 * @return consulta cadena
	 *
	 */
	function getConsulta(){
		return $this->consulta;
	}


	/**
	 * Nombre funcion:	generarXML
	 * Proposito:		devuelve una cadena xml de respuesta de la base de datos y un mensaje deerrores o modificaciones a datos
	 * Fecha creacion:	4/05/2009
	 *
	 *
	 */
	function generarXML(){

	}
	/**
	 * Nombre funcion:	generarJson
	 * Proposito:		Genera una cadena json de respuesta a la Base de datos en caso de selecciones y un mensajee en caso de errores o modificacioens a datos
	 * Fecha creacion:	4/05/2009
	 *
	 *
	 *
	 */
	function generarJson(){
		//si es exito y es sel devuelvo los valores de una consulta
		//ofuscacion de identificadores
		if($_SESSION["_OFUSCAR_ID"]=='si'){
			$this->ofuscarIdentificadores();
		}

		if($this->getTipo()=='EXITO' && $this->tipo_transaccion=='SEL'){

			if($this->tipo_respuesta!='arbol'){
				return '({"total":"' . $this->total . '","datos":' . json_encode($this->datos) . '})';
			}
			else{
				if(count($this->nivel_arbol)==0){
					$this->mensaje_tec="Debe definirse por lo menos un nivel para la generacion del arbol";
					$this->mensaje="Error al generar el arbol";
					$this->archivo="Mensaje.php";
					return $this->generarMensajeJson();
				}
				elseif(count($this->nivel_arbol)==1){
					$cont=0;
					foreach ($this->datos as $d){
						$this->datos[$cont]=array_merge($this->datos[$cont],$this->nivel_arbol[0]['arreglo']);
						$this->datos[$cont]=crearCampos($this->datos[$cont],$this->nivel_arbol[0]['arreglo_equivalencias']);
						$cont++;
					}
					return '(' . json_encode($this->datos) . ')';
				}
				else{
					$cont=0;
					foreach ($this->datos as $d){
						foreach ($this->nivel_arbol as $n){
							
							//RAC 25/10/2011: validacion de varialbes
								if(isset($n['valor']) && isset($n['campo'])){	
		                          if(isset($d[$n['campo']])){
									if($d[$n['campo']]==$n['valor']){
		
										$this->datos[$cont]=array_merge($this->datos[$cont],$n['arreglo']);
										$this->datos[$cont]=$this->crearCampos($this->datos[$cont],$n['arreglo_equivalencias']);
									}
		                          }
								}
						}
						$cont++;
					}
					return '(' . json_encode($this->datos) . ')';
				}

			}
		}
		//sino devuelvo un mensaje
		else{
			return $this->generarMensajeJson();
		}
	}
   	/**
	 * Nombre funcion:	crearCampos
	 * Proposito:	Esta funcion agrega campos adicionales a la array con el que se cre el JSON
	 * Fecha creacion:	12/04/2009
	 * Modificacion: Rensi Arteaga Copari
	 *
	 * @param cadena $procedimiento
	 * @param cadena $transaccion
	 * @param cadena $tipo
	 */
	function crearCampos($arreglo_poner,$equivalencias){
		$temp_var='';
		$res=$arreglo_poner;
		
		foreach ($equivalencias as $data){
	   	  //RAC 25/10/2011: validacion de varialbes		
          if(isset($data['valor']) ){
          	if(isset($arreglo_poner[$data['valor']])){
			   $res=array_merge($res,array($data['nombre']=>$arreglo_poner[$data['valor']]));
          	}
          }
          elseif(isset($data['valores'])){
          	$temp_var=$data['valores'];
          //si el campo valores esta seteado se lo utiliza como un a
          //plantilla para remplazar valores
            foreach( $arreglo_poner as $col=>$single  ){
          	  $temp_var= str_replace('#'.$col.'#',$single,$temp_var );
             }
            $res=array_merge($res,array($data['nombre']=>$temp_var));
          	
          }
		}


		return $res;
	}

	/**
	 * Nombre funcion:	generarMensajeJson
	 * Proposito:		Genera una cadena json con los errores de acuerdo al estado del sistema
	 * Fecha creacion:	4/05/2009
	 *
	 *
	 *
	 */
	function generarMensajeJson(){
		
		//si es exito y es sel devuelvo los valores de una consulta
		//ofuscacion de identificadores
					
		if($this->tipo=='EXITO'){
			$error=false;
		}
		else {
			$error=true;
		}
		
		if(get_magic_quotes_gpc()) {
			$this->mensaje_tec = addslashes($this->mensaje_tec);
		}

		if(get_magic_quotes_gpc()) {
			$this->mensaje = addslashes($this->mensaje);
		}

		$root_array=array();
		$cuerpo_array=array();
		$detalle_array=array();
		$detalle_array['mensaje']=$this->mensaje;
		if(isset($this->archivo_generado)){
			$detalle_array['archivo_generado']=$this->archivo_generado;
		}
		if($_SESSION['_ESTADO_SISTEMA']=='desarrollo'){
			$detalle_array['mensaje_tec']=$this->mensaje_tec;
			$detalle_array['origen']=$this->archivo;
			$detalle_array['procedimiento']=$this->procedimiento;
			$detalle_array['transaccion']=$this->transaccion;
			$detalle_array['capa']=$this->capa;
			$detalle_array['consulta']=$this->consulta;
		}

		$cuerpo_array['error']=$error;
		$cuerpo_array['detalle']=$detalle_array;
		
	     //RAC 02/03/2012 EN mensajes tipo ime adicionar el vector de datos	
	    //$cuerpo_array
	    //array_unshift($cuerpo_array,$this->datos);
		$cuerpo_array['datos']=$this->datos;
	
	    $root_array['ROOT']=$cuerpo_array;
		

		$res=json_encode($root_array);

		if (get_magic_quotes_gpc()) {
			$res = stripslashes($res);
		}

		return $res;

	}

	/**
	 * Nombre funcion:	generarMensajeJson
	 * Proposito:		Imprime la cadena json
	 * Fecha creacion:	4/05/2009
	 * Autor Modificacion: rac
	 * fecha modificacion: 20/09/2011
	 * Descripcion: se agrega codigo de cabecera correcta  "202 OK"
	 *@param $respuesta es la cadena json
	 *@param $header es el codigo del header en caso de ser necesario
	 */

	
	function imprimirRespuesta($respuesta,$header=''){

		if($header!=''){
			switch ($header)
			{
				case '409':
					header("HTTP/1.1 $header  Conflict");
					break;


				case '412':
					header("HTTP/1.1 $header Precondition Failed");

					break;

				case '500':
					header("HTTP/1.1 $header  Internal Server Error");
					break;

				case '503':
					header("HTTP/1.1 $header   Service Unavailable");
					break;

				case '401':
					header("HTTP/1.1 $header No autorizado");
					break;
			}

		}
		elseif($this->tipo=='ERROR'){
			header("HTTP/1.1 406 Not Acceptable");
		}
		else{
			header("HTTP/1.1 200 ok"); 
			//rac comentado por que generaba que el archivo se descargue al utilizar uploadfile
			//header('Content-Type:'.$_SESSION['type_header'].';'.' charset="'.$_SESSION['codificacion_header'].'"');
		}	
		echo $respuesta;
	}

	/**
	 * Nombre funcion:	ofuscarIdentificadores
	 * Proposito:	Busca identificadores y  los ofusca
	 * Autor: Rensi Arteag Copari
	 *
	 * Fecha creacion:	09/08/2010
	 * @param array filter
	 * @return varchar filtro
	 *
	 */

	function ofuscarIdentificadores(){
		//existen datos para mandar a la vista
		if(isset($this->datos[0])){


			//se obtienen los nombre de las variables
			$tmp=array();

			$tmp=array_keys($this->datos[0]);

			$j=0;
			$tam = sizeof($tmp);

			foreach($this->datos as $f){
				//recorremos las variables en busca de identificadores
				//sizeof($tmp);

				for( $i=0; $i<= $tam; $i++){
					//RCM 23/09/2011: se aumenta variable temporal con los 3 primeros caracteres para la comparación con la cadena 'id_'
					//y se aumenta el caso de comparación con la cadena 'id'
					
					//RAC 25/10/2011: validacion de varialbes
					if(isset($tmp[$i]) && isset($f[$tmp[$i]])){
						$aux=substr($tmp[$i],0,3);
						if(strpos($aux,'id_')!==false){
							//ofucasmos todas las variables que comiensen con id_
						     $this->datos[$j][$tmp[$i]]=$this->ofuscar($f[$tmp[$i]]);
						} else if(strpos($aux,'id')!==false){
							//ofucasmos todas las variables que comiensen con id_
							$this->datos[$j][$tmp[$i]]=$this->ofuscar($f[$tmp[$i]]);
						}
					}
				}
				$j++;
			}
		}
		//RAC 02/03/2012 para ofuscar el vector de datos en mesaje IME
		
		elseif (isset($this->datos)) {
			
			$tmp=array_keys($this->datos);
			$tam = sizeof($this->datos);
			//Se obtiene lo enviado en estado nativo que puede estar encriptado o no
			for($i=0;$i<$tam;$i++){
					
					//RAC 25/10/2011: validacion de varialbes
					if(isset($tmp[$i]) && isset($this->datos[$tmp[$i]])){
						$aux=substr($tmp[$i],0,3);
						if(strpos($aux,'id_')!==false){
							//ofucasmos todas las variables que comiensen con id_
							
							
						     $this->datos[$tmp[$i]]=$this->ofuscar($this->datos[$tmp[$i]]);
						} elseif(strpos($aux,'id')!==false){
							//ofucasmos todas las variables que comiensen con id_
							$this->datos[$tmp[$i]]=$this->ofuscar($this->datos[$tmp[$i]]);
						}
					}
			}
			
			
		}
	}
/**
 
	 * Nombre funcion:	ofuscar
	 * Proposito:	modifica el parametro de entrata con el algoritmo feiste
	 * Fecha creacion:	12/04/2009
	 * autor:rac
	 * Modificacion: Rensi Arteaga Copari
	 * fecha: 19/09/2011
	 * descripcion mod:  para permitir ofuscar identificadores que vienes separados por coma dentro de una misma variables
	 * eje  id_roels=  1,23,4,5,6  , generalmente usado en arrays  cada identificador se ofusca por separado
	 * @param cadena $id
	 */
 
	function ofuscar($id){

		$iFeis=new feistel();
		$respue='';
		$sw=0;
		$ids=explode(',',$id);
			
		foreach($ids as $idk){		
			if($idk!=''){
				if($sw==0){
					$respue=$iFeis->encriptar($idk.'.'.$_SESSION["_SEMILLA_OFUS"],$_SESSION['key_p'],$_SESSION['key_k'],1);
				    $sw=1;
				}
				else{
			    	$respue=$respue.','.$iFeis->encriptar($idk.'.'.$_SESSION["_SEMILLA_OFUS"],$_SESSION['key_p'],$_SESSION['key_k'],1);
				}
			  }
			}


       return $respue;
	}


}
?>
