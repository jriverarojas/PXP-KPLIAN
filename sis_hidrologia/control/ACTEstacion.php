<?php
/**
*@package pXP
*@file gen-ACTEstacion.php
*@author  (rac)
*@date 05-09-2011 10:30:01
*@description Clase que recibe los parametros enviados por la vista para mandar a la capa de Modelo
*/

class ACTEstacion extends ACTbase{    
			
	function listarEstacion()
	{
		$this->objParam->defecto('ordenacion','id_estacion');
		$this->objParam->defecto('dir_ordenacion','asc');
					
		if ($this->objParam->getParametro('tipoReporte')=='excel_grid' || $this->objParam->getParametro('tipoReporte')=='pdf_grid'){
            $this->objReporte=new Reporte($this->objParam);
            $this->res=$this->objReporte->generarReporteListado('FuncionesHidrologia','listarEstacion');
        }
        else 
        {
        	$this->objFunc=new FuncionesHidrologia();	        
			$this->res=$this->objFunc->listarEstacion($this->objParam);
        }
		
        $this->res->imprimirRespuesta($this->res->generarJson());        
	}
	
	function listarEstacionProyectos()
	{
		$this->objParam->defecto('ordenacion','id_estacion');
		$this->objParam->defecto('dir_ordenacion','asc');
					
		if ($this->objParam->getParametro('tipoReporte')=='excel_grid' || $this->objParam->getParametro('tipoReporte')=='pdf_grid'){
            $this->objReporte=new Reporte($this->objParam);
            $this->res=$this->objReporte->generarReporteListado('FuncionesHidrologia','listarEstacionProyectos');
        }
        else 
        {
        	$this->objFunc=new FuncionesHidrologia();	        
			$this->res=$this->objFunc->listarEstacionProyectos($this->objParam);
        }
		
        $this->res->imprimirRespuesta($this->res->generarJson());        
	}
	
	function listarProyEstacion()
	{
		$this->objParam->defecto('ordenacion','id_estacion');
		$this->objParam->defecto('dir_ordenacion','asc');
					
		$this->objFunc=new FuncionesHidrologia();	        
		$this->res=$this->objFunc->listarProyEstacion($this->objParam);
        	
        $this->res->imprimirRespuesta($this->res->generarJson());        
	}
				
	function insertarEstacion(){
		$this->objFunc=new FuncionesHidrologia();	
		if($this->objParam->insertar('id_estacion')){
			$this->res=$this->objFunc->insertarEstacion($this->objParam);			
		} else{			
			$this->res=$this->objFunc->modificarEstacion($this->objParam);
		}
		$this->res->imprimirRespuesta($this->res->generarJson());
	}
						
	function eliminarEstacion(){
		$this->objFunc=new FuncionesHidrologia();	
		$this->res=$this->objFunc->eliminarEstacion($this->objParam);
		$this->res->imprimirRespuesta($this->res->generarJson());
	}

	function subirFotoEstacion(){
	
		//crea el objetoFunSeguridad que contiene todos los metodos del sistema de seguridad
		$this->objFunc=new FuncionesHidrologia();
		$this->res=$this->objFunc->subirFotoEstacion($this->objParam);
		//imprime respuesta en formato JSON
		$this->res->imprimirRespuesta($this->res->generarJson());

	}
	
	function obtenerFotoEstacion(){
	
		//crea el objetoFunSeguridad que contiene todos los metodos del sistema de seguridad
		$this->objFunc=new FuncionesHidrologia();
		$this->res=$this->objFunc->obtenerFotoEstacion($this->objParam);
		
		
		

	}
	
	function armarPopup(){
		
		$resp = array();
			
			/*$resp['tpl']='<div class="contentImg">\\<span>{cuenca}</span>\\
                            <img src="http://www.maestrosdelweb.com/images/2011/04/SanJuan.jpg" title="San Juan Morro" />\\
                            Autor desconocido\\
                            <img src="http://www.maestrosdelweb.com/images/2011/04/SanJuan2.jpg" title="San Juan Morro" />\\
                            <a href="http://www.flickr.com/photos/19114667@N00/2134221308/">Tomada por blucolt</a>\\
                        </div>\\
                        <div class="contentTxt">\\
                        <h2>San Juan Morro</h2>\\
                            <p>\\
                                En la cima del Antiguo San Juan, encontrarás al Fuerte San Felipe del Morro,\\
                                más conocido como El Morro. Esta construcción perteneciente al siglo XVI, fue\\
                                hecha para proteger a la ciudad de los ataques por mar, siendo uno de los elementos\\
                                más representativos de la antigua ciudad. Probablemente haya sido el monumento más\\
                                famoso en los tiempos de las colonias españolas y ahora la fortaleza sobresale en una\\
                                isleta rocosa.\\
                            </p>\\
                        </div>\\';
						*/

		$men = new Mensaje();
		
		
		$men->setTipoTransaccion('SEL');
		
		
		$resp['tpl']='<span>{cuenca}</span>';				
		
	
		//$men->setMensaje('EXITO','estación','Consulta ejecutada con exito','Consulta ejecutada con exito','control');
//		                 ($tipo,$archivo,$mensaje,$mensaje_tec,$capa,$procedimiento='',$transaccion='',$tipo_trans='',$consulta='')
		$men->setDatos($resp);
		$men->setTotal(1);
		
		$men->imprimirRespuesta($men->generarJson());		
		
		

	}
	
	
}

?>