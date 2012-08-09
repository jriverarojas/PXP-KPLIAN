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
Phx.vista.GestionCobranza=Ext.extend(Phx.vista.ClienteFacturaCobAbs,{

	constructor:function(config){
		this.maestro=config.maestro;
    	//llama al constructor de la clase padre
		Phx.vista.GestionCobranza.superclass.constructor.call(this,config);
		this.init();		 
		
	},
	south:{
		  url:'../../../sis_cobranza/vista/factura_cob/GestionFacturaCobCobro.php',
		  title:'Facturas Pagadas', 
		  height:'50%',	//altura de la ventana hijo
		 // width:'40%',		//ancho de la ventana hjo
		  cls:'GestionFacturaCobCobro'
		 }
	}
)
</script>
		
		