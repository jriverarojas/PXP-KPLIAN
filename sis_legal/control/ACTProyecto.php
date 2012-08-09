<?php
class ACTProyecto extends ACTbase{    

	function listarProyecto(){		
		$this->objParam->defecto('ordenacion','denominacion');
		$this->objParam->defecto('dir_ordenacion','asc');
		
		
		$this->objFunLegal=new FuncionesLegal();	
		$this->res=$this->objFunLegal->listarProyecto($this->objParam);
		$this->res->imprimirRespuesta($this->res->generarJson());
	}
	
	function guardarProyecto(){
		$this->objFunLegal=new FuncionesLegal();
		if($this->objParam->insertar('id_proyecto')){
			$this->res=$this->objFunLegal->insertarProyecto($this->objParam);			
		}
		else{			
			$this->res=$this->objFunLegal->modificarProyecto($this->objParam);
		}
		$this->res->imprimirRespuesta($this->res->generarJson());

	}
			
	function eliminarProyecto(){
		
		$this->objFunLegal=new FuncionesLegal();	
		$this->res=$this->objFunLegal->eliminarProyecto($this->objParam);
		$this->res->imprimirRespuesta($this->res->generarJson());

	}

}

?>