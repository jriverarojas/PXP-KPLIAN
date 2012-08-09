<?php
/**
*@package pXP
*@file gen-SistemaDist.php
*@author  (jmita)
*@date 18-10-2011 10:22:05
*@description Archivo con la interfaz de usuario que permite la ejecucion de todas las funcionalidades del sistema
*/
include_once("ImportarFacturAbs.php");
header("content-type: text/javascript; charset=UTF-8");
?>
<script>
Phx.vista.ImportarFacturHijo=Ext.extend(Phx.vista.ImportarFacturAbs,{

	constructor:function(config){
		this.maestro=config.maestro;
    	//llama al constructor de la clase padre
		Phx.vista.ImportarFacturHijo.superclass.constructor.call(this,config);
		this.init();		
		this.load({params:{start:0, limit:50}})
	},
			
	onReloadPage:function(m)
	{
		this.maestro=m;						
		this.store.baseParams={id_enti_fin:this.maestro.id_enti_fin};
		this.load({params:{start:0, limit:50}});			
	}	
	
	}
)
</script>
		
		