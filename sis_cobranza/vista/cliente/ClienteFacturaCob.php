<?php
/**
*@package pXP
*@file gen-Cliente.php
*@author  (fprudencio)
*@date 22-09-2011 11:53:34
*@description Archivo con la interfaz de usuario que permite la ejecucion de todas las funcionalidades del sistema
*/
include_once("ClienteFacturaCobAbs.php");
header("content-type: text/javascript; charset=UTF-8");
?>
<script>
Phx.vista.ClienteFacturaCob=Ext.extend(Phx.vista.ClienteFacturaCobAbs,{

	constructor:function(config){
		this.maestro=config.maestro;
    	//llama al constructor de la clase padre
		Phx.vista.ClienteFacturaCob.superclass.constructor.call(this,config);
		this.init();		 
		//this.bloquearMenus();	

	},		
	/*east:{
		  url:'../../../sis_cobranza/vista/factura_cob/FacturaCobCliente.php',
		  title:'Facturas Pendientes de Pago', 
		  //height:'50%',	//altura de la ventana hijo
		  width:'40%',		//ancho de la ventana hjo
		  cls:'FacturaCobCliente'
		 },	
	south:{
		  url:'../../../sis_cobranza/vista/cobro/Cobro.php',
		  title:'Cobros Realizados', 
		  height:'50%',	//altura de la ventana hijo
		  //width:'50%',	//ancho de la ventana hjo
		  cls:'Cobro'
		 },	*/
		 
	 tabsouth:[
	     {
		   url:'../../../sis_cobranza/vista/factura_cob/FacturaCobCliente.php',
		  title:'Facturas Pendientes de Pago', 
		  height:'50%',	//altura de la ventana hijo
		  //width:'50%',		//ancho de la ventana hjo
		  cls:'FacturaCobCliente'
		 },		
		{
		  url:'../../../sis_cobranza/vista/factura_cob/FacturaPagCliente.php',
		  title:'Facturas Pagadas', 
		  height:'50%',	//altura de la ventana hijo
		  //width:'50%',		//ancho de la ventana hjo
		  cls:'FacturaPagCliente'
		 },		 
	    {
		  url:'../../../sis_cobranza/vista/cobro/Cobro.php',
		  title:'Cobros Realizados', 
		  height:'50%',	//altura de la ventana hijo
		  //width:'50%',	//ancho de la ventana hjo
		  cls:'Cobro'
		 }]	, 
		 
	sortInfo:{
		field: 'id_cliente',
		direction: 'ASC'
	},
	bdel:false,
	bsave:false,
	bexcel:false,
	bedit:false,
	bnew:false,
	preparaMenu:function(tb)
	{
			//llamada funcion clace padre
			Phx.vista.ClienteFacturaCob.superclass.preparaMenu.call(this,tb);
	}
	}
)
</script>
		
		