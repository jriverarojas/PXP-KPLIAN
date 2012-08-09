<?php
/**
 Revision: RCM
 Fecha: 29-06-2010
 **/
class CTParametro{
	
	private $tipo_tran;//SEL || IME || OTRO
	private $arreglo_parametros=array();
	private $columnas_excel=array();
	private $parametros_consulta=array();
	private $aPostData;
    private $aPostFiles=array();//rac 22092011
	private $aFiltro;
	private $matriz;



	/**
	 * Nombre funcion:	__construct
	 * Proposito:		Crea una instancia de parametro, llena los valores de tipo de transaccion, y en caso de ser de tipo sel los valores necesarios
	 * para la seleccion
	 * Fecha creacion:	21/06/2009
	 *
	 * @param cadena $tipo_tran
	 * @param cadena $criterio_filtro
	 * @param cadena $ordenacion
	 * @param cadena $dir_ordenacion
	 * @param entero $puntero
	 * @param entero $cantidad
	 * @param array $filter
	 */
	//function __construct($tip,$ord='',$dir='',$pun=0,$can=0,$fil='',$fil_col='',$fil_value=''){
	//cambio rcm 20/07/2010
	function __construct($pPostData,$matriz,$aPostFiles){
		$this->aPostData=$pPostData;
		$this->matriz=$matriz;
		$this->aPostFiles=$aPostFiles;
		
		if($pPostData!=''){
			$this->iniciaParametro();
		}

		//quitar ofuscacion
		if($_SESSION["_OFUSCAR_ID"]=='si'){
			$this->quitarOfuscacion();
		}
	}
	

	function iniciaParametro(){
		//Obtiene los parametros del filtro
		$this->obtenerParametroFiltro();

		$this->setParametrosJson($this->aPostData);

		//var_dump($this->arreglo_parametros);
		//Envia los parametros
			
		$this->parametros_consulta['ordenacion']=isset($this->arreglo_parametros['sort'])?$this->arreglo_parametros['sort']:'';
		$this->parametros_consulta['dir_ordenacion']=isset($this->arreglo_parametros['dir'])?$this->arreglo_parametros['dir']:'';
		$this->parametros_consulta['puntero']=isset($this->arreglo_parametros['start'])?$this->arreglo_parametros['start']:'';
		$this->parametros_consulta['cantidad']=isset($this->arreglo_parametros['limit'])?$this->arreglo_parametros['limit']:'';



		if(isset($this->arreglo_parametros['query'])){
			//FILTRO PARA COMBO
			$this->parametros_consulta['filtro']=$this->armarFiltro($this->arreglo_parametros['query'],'CLASICO',$this->arreglo_parametros['par_filtro']);
				
		}
		else{
		//elseif(isset($this->arreglo_parametros['filter'])){
	
			//FILTRO PARA GRILLAS
			//RAC  26/10/11 validacion de varialbes en filtro
			
			if(isset($this->arreglo_parametros['filter'])){
				
			$this->parametros_consulta['filtro']=$this->armarFiltro($this->_json_decode($this->arreglo_parametros['filter']));
			}
			else{
				
				$this->parametros_consulta['filtro']=" 0 = 0 ";

			}
				
		  
		}



	}



	/**
	 * Nombre funcion:	getTipotran
	 * Proposito:		Devuleve el tipod e transaccion q ejecutarﻓ el control
	 *
	 * Fecha creacion:	21/06/2009
	 *
	 * @return String tipo transaccion
	 */
	function getTipoTran(){
		return $this->tipo_tran;
	}

	/**
	 * Nombre funcion:	esMatriz
	 * Proposito:		Devuleve true si el arreglo de para metros es una matriz y false en caso contrario
	 *
	 * Fecha creacion:	07/08/2010
	 *
	 * @return Boolean matriz
	 */
	function esMatriz(){
		if($this->matriz==1){
			return true;
		}
		else{
			return false;
		}
	}

	/**
	 * Nombre funcion:	setTipotran
	 * Proposito:		Aplica el tipo de transaccion al parametro
	 *
	 * Fecha creacion:	21/06/2009
	 *
	 */
	function setTipoTran($t_tran){
		$this->tipo_tran=$t_tran;
	}


	//Autor: gay rodriga
	function _($variable){
		return $this->arreglo_parametros[$variable];
	}

	/**
	 * Nombre funcion:	getParametrosConsulta
	 * Proposito:		Devuleve arregloc on los parametros de consulta en caso de ser funcion sel
	 *
	 * Fecha creacion:	21/06/2009
	 *
	 * @return array parametros contula
	 */
	function getParametrosconsulta(){

		return $this->parametros_consulta;
	}
	/**
	 * Nombre funcion:	setParametrosJson
	 * Proposito:		Devuleve arregloc on los parametros de consulta en caso de ser funcion sel
	 *
	 * Fecha creacion:	21/06/2009
	 * @param $json (cadena json de parametros)
	 *
	 */

	function setParametrosJson($json){ 
		//si es matriz
		/*echo '<pre>';
		print_r($json);
		echo '</pre>';*/
		if($this->matriz==1){
			$row=$this->_json_decode($json,true);
			$this->arreglo_parametros=$this->_json_decode($row['row'],true);

		}
		else{
			$this->arreglo_parametros=$this->_json_decode($json,true);
			if(isset($this->arreglo_parametros['columnas'])){
				$this->columnas_excel=$this->_json_decode($this->arreglo_parametros['columnas'],true);
			}
		}

	}
	/**
	 * Nombre funcion:	_json_decode
	 * Proposito:		Funcion extendida de json_decode que quita slashes de la cadena json antes
	 * de convertirla en arreglo
	 *
	 * Fecha creacion:	21/06/2009
	 * @param $string (cadena json de parametros)
	 *
	 */

	function _json_decode($string) {
		if (get_magic_quotes_gpc()) {
			$string = stripslashes($string);
		}

		return json_decode($string,true);
	}

	static function _json_decode_static($string) {
		if (get_magic_quotes_gpc()) {
			$string = stripslashes($string);
		}

		return json_decode($string,true);
	}

	//Funcion que obtiene los parametros para el filtro si existe
	private function obtenerParametroFiltro(){
		//decodifica el json del postdata
		//var_dump($this->aPostData);
		$aux=json_decode($this->aPostData['p'],true);//
		//echo 'decode: '. json_decode('{"tipo":"inter"}');exit;
		//$aux=json_decode($this->aPostData,true);
		//echo 'ddddddccccooooooo';exit;
		//Verifica si existe la clave filter
		if(isset($aux['filter'])){
			$this->aFiltro=json_decode($aux['filter']);
		} else{
			$this->aFiltro='';
		}
	}



	/**
	 * Nombre funcion:	getArregloParametros
	 * Proposito:		Funcion que devuelve el arrelgod e parametros obtenidos desde un json
	 *
	 *
	 * Fecha creacion:	21/06/2009
	 * @return array arreglo de parametros
	 *
	 */
	function getArregloParametros(){

		return $this->arreglo_parametros;
	}
	
	/**
	 * Nombre funcion:	getArregloParametros
	 * Proposito:		Funcion que devuelve el arrelgod e parametros obtenidos desde un json
	 *
	 *
	 * Fecha creacion:	21/06/2009
	 * @return array arreglo de parametros
	 *
	 */
	function getArregloFiles(){

		
		
		//echo('getArregloFiles');
		//var_dump($this->$aPostFiles);
		
		return $this->aPostFiles;
	}
	
	
	/**
	 * Nombre funcion:	getColumnasReporte
	 * Proposito:		Funcion que devuelve el arrelgo de columnas de excel o pdf a mostrar desde un json
	 *
	 *
	 * Fecha creacion:	02/10/2010
	 * @return array arreglo de parametros
	 *
	 */
	function getColumnasReporte(){

		return $this->columnas_excel;
	}


	/**
	 * Nombre funcion:	getArregloParametros
	 * Proposito:		Funcion que devuelve el arrelgod e parametros obtenidos desde un json
	 *
	 *
	 * Fecha creacion:	21/06/2009
	 * @return array arreglo de parametros
	 *
	 */
	function getParametro($nombre){
		//RAC 25/10/2011: validacion de varialbes
		if(isset($this->arreglo_parametros[$nombre])){
			return $this->arreglo_parametros[$nombre];
		}else{
			return null;
		}
		
	}


	/**
	 * Nombre funcion:	getArregloParametros
	 * Proposito:		Funcion que devuelve el arrelgod e parametros obtenidos desde un json
	 *
	 *
	 * Fecha creacion:	21/06/2009
	 * @return array arreglo de parametros
	 *
	 */
	function addFiltro($cadena){
		$this->parametros_consulta['filtro']=$this->parametros_consulta['filtro']." AND $cadena ";
	}

	/**
	 * Nombre funcion:	insertar
	 * Proposito:	Verdadero si se va a insertar un registro y falso si es apra modificar
	 *
	 *
	 * Fecha creacion:	21/06/2009
	 * @return boolean insertar
	 *
	 */

	function insertar($variable_id){
		if((!isset($this->arreglo_parametros[$variable_id]) || $this->arreglo_parametros[$variable_id]=="") && $this->matriz==false)
		return true;

		else
		return false;
	}

	/**
	 * Nombre funcion:	insertar
	 * Proposito:		Insertar un nuevo parametro al arreglo de parametros
	 *
	 *
	 * Fecha creacion:	21/06/2009
	 * @return boolean insertar
	 *
	 */
	function addParametro($nombre,$valor){
		$this->arreglo_parametros[$nombre]=$valor;
	}
	
	/**
	 * Nombre funcion:	insertar
	 * Proposito:		Insertar un nuevo parametro al arreglo de parametros
	 *
	 *
	 * Fecha creacion:	21/06/2009
	 * @return boolean insertar
	 *
	 */
	function addParametroConsulta($nombre,$valor){
		$this->parametros_consulta[$nombre]=$valor;
	}

	/**
	 * Nombre funcion:	defecto
	 * Proposito:		Insertar un nuevo parametro por defecto en al arreglo de seleccion
	 *
	 *
	 * Fecha creacion:	21/06/2009
	 * @return boolean insertar
	 *
	 */
	function defecto($nombre,$valor){

		if(!isset($this->parametros_consulta[$nombre])||$this->parametros_consulta[$nombre]=='')
		$this->parametros_consulta[$nombre]=$valor;
	}


	/**
	 * Nombre funcion:	armarFiltro
	 * Proposito:		Arma el filtro que se enviara en consulta select
	 * Autor: Jaime Rivera
	 *
	 * Fecha creacion:	09/08/2009
	 * @param array filter
	 * @return varchar filtro
	 *
	 */
	private function armarFiltro($filter,$tipo='JSON',$pfiltro=''){
		$where = " 0 = 0 ";
		$qs='';

		if($tipo=='JSON'){
			//decodifica filtro JSON usado en grillas
			
			for ($i=0;$i<count($filter);$i++){
				switch($filter[$i]['type']){

					//RAC  26/10/11 Combina el filtro con like y tc_vector  -> si es muy lento deveremos escoger cual usamos
					//case 'string' : $qs .= " AND ".$filter[$i]['field']." ILIKE ''%".$filter[$i]['value']."%''"; Break;
					//case 'string' : $qs .= " AND to_tsvector(".$filter[$i]['field'].") @@ plainto_tsquery(''spanish'',''".$filter[$i]['value']."'')"; Break;
					case 'string' : 
					         $qs .= " AND ((".$filter[$i]['field']." ILIKE ''%".$filter[$i]['value']."%'')"; 
					         $qs .= " OR( to_tsvector(".$filter[$i]['field'].") @@ plainto_tsquery(''spanish'',''".$filter[$i]['value']."'')))";
         		          Break;
					case 'list' :
						
						if (count($filter[$i]['value'])>1){
							for ($q=0;$q<count($filter[$i]['value']);$q++){
								$fi[$q] = "''".$filter[$i]['value'][$q]."''";
							}
							$fi_cadena = implode(',',$fi);
							$qs .= " AND ".$filter[$i]['field']." IN (".$fi_cadena.")";
						}else{
							$qs .= " AND ".$filter[$i]['field']." = ''".$filter[$i]['value'][0]."''";
						}
						Break;
					case 'boolean' : $qs .= " AND ".$filter[$i]['field']." = ".($filter[$i]['value']); Break;
					case 'numeric' :
						switch ($filter[$i]['comparison']) {
							case 'ne' : $qs .= " AND ".$filter[$i]['field']." != ".$filter[$i]['value']; Break;
							case 'eq' : $qs .= " AND ".$filter[$i]['field']." = ".$filter[$i]['value']; Break;
							case 'lt' : $qs .= " AND ".$filter[$i]['field']." < ".$filter[$i]['value']; Break;
							case 'gt' : $qs .= " AND ".$filter[$i]['field']." > ".$filter[$i]['value']; Break;
						}
						Break;
					case 'date' :
						switch ($filter[$i]['comparison']) {
							case 'ne' : $qs .= " AND ".$filter[$i]['field']." != ''".date('d-m-Y',strtotime($filter[$i]['value']))."''"; Break;
							case 'eq' : $qs .= " AND ".$filter[$i]['field']." = ''".date('d-m-Y',strtotime($filter[$i]['value']))."''"; Break;
							case 'lt' : $qs .= " AND ".$filter[$i]['field']." < ''".date('d-m-Y',strtotime($filter[$i]['value']))."''"; Break;
							case 'gt' : $qs .= " AND ".$filter[$i]['field']." > ''".date('d-m-Y',strtotime($filter[$i]['value']))."''"; Break;
						}
						Break;
				}
			}
			$where .= $qs;
		}
		else{

			//decodifica filtro clasico utilizado en combos
			$paramfiltro = explode('#',$pfiltro);
			$qs='';
			$filter=trim($filter);
			$contador = count($paramfiltro);
			
			if($filter!=''){
				for($i=0;$i<$contador;$i++){
					if($i==0){
						$qs.=" AND ( (lower($paramfiltro[$i]) LIKE lower(''%$filter%'')) ";	
					}
					else{
						$qs.=" OR  (lower($paramfiltro[$i]) LIKE lower(''%$filter%'')) ";	
					}
					if($i==$contador-1){
						$qs.=')';
					}
				}
			}
			$where .= $qs;
		}
		//echo $where;exit;
		return $where;
	}

	/**
	 * Nombre funcion:	quitarOfuscacion
	 * Proposito:		Busca identificadores y les quita la ofuscacion
	 * Autor: Rensi Arteag Copari
	 *
	 * Fecha creacion:	09/08/2010
	 * @param array filter
	 * @return varchar filtro
	 *
	 */

	private function quitarOfuscacion(){

		if($this->matriz!=1){
			//No es matriz procesamos directamente

			if(isset($this->arreglo_parametros)){

				$tmp=array_keys($this->arreglo_parametros);

				$tam = sizeof($tmp);

				for( $i=0; $i<= $tam; $i++){
					/*
					 * ofucasmos todas las variables que comiensen con id_
					 * o las que tenga el nombre node (se usa en lista de arboles)
					 * y todas la que se llamen solamente id
					 * */
					//RCM 23/09/2011: cambio para la comparaci�n con la cadena 'id_'
					//RAC 25/10/2011: validacion de varialbes
					
					if(isset($tmp[$i])){
					  $aux=substr($tmp[$i],0,3);
					
					//echo '----'.$tmp[$i]; exit;
							if(strpos($aux,'id_')!==false ||$tmp[$i]=='node'|| $tmp[$i]=='id'){
								//ofucasmos todas las variables que comiensen con id_
		
								//cuando la variable nodo se maneja desde arboles la primera vez el valor es
								//igual a 'id' y no es necesaria la desofuscacion
							//if( $tmp[$i]!='id_proveedor'){ echo $tmp[$i]; exit;}
							   if($tmp[$i]!='node' || $this->arreglo_parametros[$tmp[$i]]!='id'){
			                        //quitamos la ofuscacion de los identificadores
			                    
			                        $this->arreglo_parametros[$tmp[$i]]=$this->desofuscar($this->arreglo_parametros[$tmp[$i]]);
								    //if( $tmp[$i]!='id_proveedor'){ echo '---'.$this->arreglo_parametros[$tmp[$i]]; exit;}
								}
						
					  }
						
					}
				}
				//exit;
			}

		}
		else{
				
			//echo "ES MATRIZ";
			//exit;
			//se obtienen los nombre de las variables
			$tmp=array();

			$tmp=array_keys($this->arreglo_parametros[0]);

			$j=0;

			$tam = sizeof($tmp);

			//$this->matriz
			foreach($this->arreglo_parametros  as $f){

				//recorremos las variables en busca de identificadores
				sizeof($tmp);

				for( $i=0; $i<= $tam; $i++){
				  if(isset($tmp[$i])){
					$aux=substr($tmp[$i],0,3);
					if(strpos($aux,'id_')!==false){
						//ofucasmos todas las variables que comiensen con id_

						/*	var_dump($this->arreglo_parametros[$j]);
						 var_dump($tmp[$i]);*/


						//var_dump($this->arreglo_parametros[$j][$tmp[$i]]);
							

						$this->arreglo_parametros[$j][$tmp[$i]]=$this->desofuscar($f[$tmp[$i]]);

						//var_dump($this->arreglo_parametros[$j][$tmp[$i]]);

							


						//  var_dump($this->desofuscar($f[$tmp[$i]]));

						//    var_dump(this->arreglo_parametros[$j][$tmp[$i]]);
						//var_dump($f);
					}
				  }
				}

				$j++;
			}

		}
	}

/**
	 * Nombre funcion:	desofuscar
	 * Proposito:	quita la ofuscacion de los identificadores
	 * Fecha creacion:	12/04/2009
	 * autor:rac
	 * Modificacion: Rensi Arteaga Copari
	 * fecha: 19/09/2011
	 * descripcion mod:  para permitir desofuscar identificadores que vienes separados por coma dentro de una misma variables
	 * eje  id_roels=  1,23,4,5,6  , generalmente usado en arrays  cada identificador se desofusca por separado
	 * @param cadena $id
	 */
	
	private function desofuscar($id){
	  //rac 16/11/2011
	  //no desofusca valores null

		if($id!="" && $id!="null"){
			$iFeis=new feistel();
			$respu='';
			$idso=explode(',',$id);
		
		    $sw=0;
			foreach($idso as $idr){	
                       $ido=explode(".",$iFeis->encriptar($idr,$_SESSION['key_p_inv'],$_SESSION['key_k'],2));
                        if($ido[1]!=$_SESSION["_SEMILLA_OFUS"]){
							throw new Exception('Un identificador a sido distorcionado',2);
						}
						else{
							if($sw==0){
								$respu=$ido[0];
								$sw=1;
							}
							else{
							   $respu=$respu.','.$ido[0];
							}
						}
						
				}
				return $respu;
		}

		else
		{
			return $id;	
		}
	}


}
?>