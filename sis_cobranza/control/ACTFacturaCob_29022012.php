<?php
/**
*@package pXP
*@file gen-ACTFacturaCob.php
*@author  (gvelasquez)
*@date 23-09-2011 17:21:15
*@description Clase que recibe los parametros enviados por la vista para mandar a la capa de Modelo
*/

class ACTFacturaCob extends ACTbase{

	private $objRep;
			
	function listarFacturaCob(){
		$this->objParam->defecto('ordenacion','periodo');

		$this->objParam->defecto('dir_ordenacion','asc');
		
		if($this->objParam->getParametro('id_cliente')!=''){
			if($this->objParam->getParametro('estado_fac')=='pagado'){
				$this->objParam->addFiltro("faccob.id_cliente = ".$this->objParam->getParametro('id_cliente'));	
			    $this->objParam->addFiltro("faccob.estado_fac = ''pagado''");	
			} else{
			  $this->objParam->addFiltro("faccob.id_cliente = ".$this->objParam->getParametro('id_cliente'));	
			  $this->objParam->addFiltro("faccob.estado_fac = ''no_pagado'' OR faccob.estado_fac = ''refacturado''");		
			}
			
			//$this->objParam->addFiltro("faccob.estado_fac = ''refacturado'' ");
		}	
		
		if($this->objParam->getParametro('id_cobro')!='')
		{
			$this->objParam->addFiltro("faccob.id_cobro = ".$this->objParam->getParametro('id_cobro'));	
			$this->objParam->addFiltro("faccob.estado_fac = ''pagado'' ");	
		}
		
		if($this->objParam->getParametro('tipoReporte')=='excel_grid' || $this->objParam->getParametro('tipoReporte')=='pdf_grid'){
			$this->objReporte = new Reporte($this->objParam);
			$this->res = $this->objReporte->generarReporteListado('FuncionesCobranza','listarFacturaCob');
		} else{
			$this->objFunc=new FuncionesCobranza();	
			$this->res=$this->objFunc->listarFacturaCob($this->objParam);
		}
		
		$this->res->imprimirRespuesta($this->res->generarJson());
	}
				
	function insertarFacturaCob(){
		$this->objFunc=new FuncionesCobranza();	
		if($this->objParam->insertar('id_factura_cob')){
			$this->res=$this->objFunc->insertarFacturaCob($this->objParam);			
		} else{			
			$this->res=$this->objFunc->modificarFacturaCob($this->objParam);
		}
		$this->res->imprimirRespuesta($this->res->generarJson());
	}
						
	function eliminarFacturaCob(){
		$this->objFunc=new FuncionesCobranza();	
		$this->res=$this->objFunc->eliminarFacturaCob($this->objParam);
		$this->res->imprimirRespuesta($this->res->generarJson());
	}
	
	function pagarFacturaCob(){
		//crea el objetoFun que contiene todos los metodos del sistema de cobranza
		$this->objFun=new FuncionesCobranza();	
		$this->res=$this->objFun->pagarFacturaCob($this->objParam);
		$this->res->imprimirRespuesta($this->res->generarJson());

	} 
	function anularFactura(){
		
		//crea el objetoFun que contiene todos los metodos del sistema de cobranza
		
		$this->objFun=new FuncionesCobranza();	
		$this->res=$this->objFun->anularFactura($this->objParam);
		$this->res->imprimirRespuesta($this->res->generarJson());

	} 
	
	function repFacturacionPend(){
		$this->objParam->defecto('ordenacion','periodo');
		$this->objParam->defecto('dir_ordenacion','asc');
		
		//Validación de parámetros
		if($this->objParam->getParametro('id_sistema_dist')!=''&&$this->objParam->getParametro('fecha_ini')!=''&&
			$this->objParam->getParametro('fecha_fin')!=''){
			
			
		} else{
			//desplegar error
			$arr=array();
			$arr[]='ACTFacturaCob->repFacturacionPend(): no se recibieron los parámetros necesarios para generar el reporte (sistama distribución, fecha inicio y fecha fin)';
			$men = new CTMensaje();
			$men->setTipoTransaccion('SEL');
			$men->setTotal(1);
			$men->setDatos($arr);
			$men->imprimirRespuesta($men->generarJson());
		}
		
		//Verifica que tipo de salida tendrá, si pdf o excel
		if($this->objParam->getParametro('tipoReporte')=='excel'){
			
		} else{
			//Instancia la clase de reportes (internamente direcciona a PDF o Excel según los parámetros)
			$this->objReporte = new Reporte($this->objParam,$this->objParam->getParametro('tamano'),$this->objParam->getParametro('orientacion'),'reporte');
			$this->objRep=$this->objReporte->getReporte();
			
			//Define los títulos del reporte
			$this->objRep->setTitulo1('Facturación Pendiente');
			$this->objRep->setTitulo2('por Sistema de Distribución');
			$this->objRep->setTitulo3('por Fecha');
			
			//Define que el Maestro no vaya en el header
			$this->objRep->setMaestroHeader(0);
			
			//Genera la cabecera
			$this->objRep->setMaestroEtiquetas(array('Sistema Distribución','Fecha inicio','Fecha fin'));
			$this->objRep->setAnchoMaestroEtiquetas(15);
			$this->objRep->setMaestroLC(array(array($this->objParam->getParametro('sistema_dist'),$this->objParam->getParametro('fecha_ini'),$this->objParam->getParametro('fecha_fin'))));
			$this->objRep->setmaestroBloqueCant(3);
			$this->objRep->setMaestroBloqueAncho(array(43,30,30));
			
			//Genera el detalle
			$this->objRep->setDetalleEtiquetas(array('Cliente','Num. Cuenta','Alfanumérico','Código Control','Fecha Factura','Fecha vence','Importe total'));
			$this->objRep->setDetalleColAncho(array(30,10,10,18,12,12,10));
			$this->objRep->setDetalleColAlign(array('left','left','left','left','center','center','right'));
			$this->objRep->setDetalleColVisibles(array(1,1,1,1,1,1,1));
			$this->objRep->setDetalleBD('FuncionesCobranza','repFacturacionPend');

			//Dibuja el reporte
			$this->res = $this->objReporte->generarReporte();
			
			//Devuelve la respuesta
			$this->res->imprimirRespuesta($this->res->generarJson());
		}
	}
	
	/*
	 * Descripción: Reporte de las facturas anuladas por cajero en un periodo de tiempo
	 * Autor: RCM
	 * Fecha: 12/12/2011
	 */
	function repFacturasAnul(){
		$this->objParam->defecto('ordenacion','cl.nombre');
		$this->objParam->defecto('dir_ordenacion','asc');
		
		//Validación de parámetros
		/*if($this->objParam->getParametro('id_sistema_dist')!=''&&$this->objParam->getParametro('fecha_ini')!=''&&
			$this->objParam->getParametro('fecha_fin')!=''){
			
			
		} else{
			//desplegar error
			$arr=array();
			$arr[]='ACTFacturaCob->repFacturasAnul(): no se recibieron los parámetros necesarios para generar el reporte (sistama distribución, fecha inicio y fecha fin)';
			$men = new CTMensaje();
			$men->setTipoTransaccion('SEL');
			$men->setTotal(1);
			$men->setDatos($arr);
			$men->imprimirRespuesta($men->generarJson());
		}*/
		
		//Verifica que tipo de salida tendrá, si pdf o excel
		if($this->objParam->getParametro('tipoReporte')=='excel'){
			
		} else{
			//Instancia la clase de reportes (internamente direcciona a PDF o Excel según los parámetros)
			//$this->objReporte = new Reporte($this->objParam,$tam_pagina,$orientacion,'reporte');
			$this->objReporte = new Reporte($this->objParam,$this->objParam->getParametro('tamano'),$this->objParam->getParametro('orientacion'),'reporte');
			$this->objRep=$this->objReporte->getReporte();

			//Definición de los títulos
			$this->objRep->setTitulo1('Facturas Anuladas por Cajero');
			$this->objRep->setTitulo2('Por Cajero');
			$this->objRep->setTitulo3('por Fecha');
			
			//Genera la cabecera
			$this->objRep->setMaestroEtiquetas(array('Sistema Distribución','Cajero','Fecha inicio','Fecha fin'));
			$this->objRep->setAnchoMaestroEtiquetas(15);
			$this->objRep->setMaestroLC(array(array($this->objParam->getParametro('sistema_dist'),$this->objParam->getParametro('cajero'),$this->objParam->getParametro('fecha_ini'),$this->objParam->getParametro('fecha_fin'))));
			$this->objRep->setmaestroBloqueCant(2);
			$this->objRep->setMaestroBloqueAncho(array(50,50));
			
			//Genera el detalle
			$this->objRep->setDetalleEtiquetas(array('','Num. Cuenta','Cliente','Num. Formulario','Motivo','Cajero','Importe'));
			$this->objRep->setDetalleColAncho(array(0,10,30,10,22,15,12));
			$this->objRep->setDetalleColAlign(array('left','left','left','left','left','left','right'));
			$this->objRep->setDetalleColVisibles(array(0,1,1,1,1,1,1));
			$this->objRep->setDetalleBD('FuncionesCobranza','repFacturasAnul');
			$this->objRep->setDetalleColsTotalizar(array(0,0,0,0,0,0,1));//Esto es el campo donde se detalla cual columna se sumara para totalizar.
			

			//Dibuja el reporte
			$this->res = $this->objReporte->generarReporte();
			
			//Devuelve la respuesta
			$this->res->imprimirRespuesta($this->res->generarJson());
		}		
		
	}
	
	
	/*
	 * Descripción: Reporte de ingresos por cajero de una entidad financiera y agencia
	 * Autor: GVC
	 * Fecha: 27/12/2011
	 */
	function repIngresosPorCajero(){
		$this->objParam->defecto('ordenacion','cl.nombre');
		$this->objParam->defecto('dir_ordenacion','asc');	
		
		//Verifica que tipo de salida tendrá, si pdf o excel
		if($this->objParam->getParametro('tipoReporte')=='excel')
		{
			
		} else{
			//Instancia la clase de reportes (internamente direcciona a PDF o Excel según los parámetros)
			$this->objReporte = new Reporte($this->objParam,$this->objParam->getParametro('tamano'),$this->objParam->getParametro('orientacion'),'reporte');
			$this->objRep=$this->objReporte->getReporte();
			
			//Definición de los títulos
			$this->objRep->setTitulo1('Resumen de Ingresos por Cajero');
			$this->objRep->setTitulo2('Por Entidad Financiera');
			$this->objRep->setTitulo3('Por Agencia');
			
			//Define los márgenes en función de la orientación
			/*if($orientacion=='L'){
				$this->objRep->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP+18.4, PDF_MARGIN_RIGHT);
			} else{
				$this->objRep->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP+13.4, PDF_MARGIN_RIGHT);
			}*/
			
			//Define que el Maestro no vaya en el header
			$this->objRep->setMaestroHeader(0);
			
			//Genera la cabecera
			$this->objRep->setMaestroEtiquetas(array('Entidad Financiera','Agencia','Fecha inicio','Fecha fin'));
			$this->objRep->setAnchoMaestroEtiquetas(15);
			$this->objRep->setMaestroLC(array(array($this->objParam->getParametro('id_enti_fin'),$this->objParam->getParametro('id_agencia'),$this->objParam->getParametro('fecha_ini'),$this->objParam->getParametro('fecha_fin'))));
			$this->objRep->setmaestroBloqueCant(2);
			$this->objRep->setMaestroBloqueAncho(array(50,50));
			
			//Genera el detalle
			$this->objRep->setDetalleEtiquetas(array('sdf','Cajero','Nro Facturas Cobradas','Importe Total'));
			$this->objRep->setDetalleColAncho(array(0,30,10,22));
			$this->objRep->setDetalleColAlign(array('left','left','left','right'));
			$this->objRep->setDetalleColVisibles(array(0,1,1,1));
			$this->objRep->setDetalleBD('FuncionesCobranza','repIngresosPorCajero');
			//echo ('llega despues de setDetalleBD');
			
			//Dibuja el reporte
			$this->res = $this->objReporte->generarReporte();

			//Devuelve la respuesta
			$this->res->imprimirRespuesta($this->res->generarJson());
		}	
		
	}

	/*
	 * Descripción: Reporte resumen de facturacion por periodo /gestion
	 * Autor: JMITA
	 * Fecha: 20/01/2012
	 */
	function repResumenFac(){
		$this->objParam->defecto('ordenacion','fc.periodo, fc.gestion');
		$this->objParam->defecto('dir_ordenacion','asc');
		
		//Validación de parámetros
		/*if($this->objParam->getParametro('id_sistema_dist')!=''&&$this->objParam->getParametro('periodo')!=''&&
			$this->objParam->getParametro('gestion')!=''){
			
			
		} else{
			//desplegar error
			echo 'asdasd';exit;
			$arr=array();
			$arr[]='ACTFacturaCob->repResumenFac(): no se recibieron los parámetros necesarios para generar el reporte (sistema distribucion, periodo y gestion)';
			$men = new CTMensaje();
			$men->setTipoTransaccion('SEL');
			$men->setTotal(1);
			$men->setDatos($arr);
			$men->imprimirRespuesta($men->generarJson());
		}*/
		
		//Verifica que tipo de salida tendrá, si pdf o excel
		if($this->objParam->getParametro('tipoReporte')=='excel'){
			
		} else{
			//Instancia la clase de reportes (internamente direcciona a PDF o Excel según los parámetros)
			$this->objReporte = new Reporte($this->objParam,$this->objParam->getParametro('tamano'),$this->objParam->getParametro('orientacion'),'reporte');
			$this->objRep=$this->objReporte->getReporte();
			
			//$this->objRep->setTitulo1('Facturas Anuladas por Cajero');
			//$this->objRep->setTitulo2('Por Cajero');
			//$this->objRep->setTitulo3('por Fecha');
			
			//Genera la cabecera
			$this->objRep->setMaestroEtiquetas(array('Sistema Distribución','Periodo','Gestion'));
			$this->objRep->setAnchoMaestroEtiquetas(15);
			$this->objRep->setMaestroLC(array(array($this->objParam->getParametro('id_sistema_dist'),$this->objParam->getParametro('periodo'),$this->objParam->getParametro('gestion'))));
			$this->objRep->setmaestroBloqueCant(2);
			$this->objRep->setMaestroBloqueAncho(array(50,50));
			
			//Genera el detalle
			$this->objRep->setDetalleEtiquetas(array('','Cant. Clientes','Energia Kwh','Corte/Reconex','Cred./Dev.','Importe ENDE','Descuento 1','Descuento 2','Tasa 1','Tasa 2','Otro Decuento','Importe Total'));
			$this->objRep->setDetalleColAncho(array(0,15,15,15,15,15,12,12,12,12,12,15));
			$this->objRep->setDetalleColAlign(array('right','right','right','right','right','right','right','right','right','right','right','right'));
			$this->objRep->setDetalleColVisibles(array(0,1,1,1,1,1,1,1,1,1,1,1,1));
			$this->objRep->setDetalleBD('FuncionesCobranza','repResumenFac');
			

			//Dibuja el reporte
			$this->res = $this->objReporte->generarReporte();
			
			//Devuelve la respuesta
			$this->res->imprimirRespuesta($this->res->generarJson());
		}		
		
	}
}

?>