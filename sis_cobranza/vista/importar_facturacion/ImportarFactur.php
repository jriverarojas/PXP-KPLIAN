<?php
/**
*@package pXP
*@file gen-SistemaDist.php
*@author  (jmita)
*@date 18-10-2011 10:22:05
*@description Archivo con la interfaz de usuario que permite la ejecucion de todas las funcionalidades del sistema
*/
include_once("ImportarFacturAbs.php");
//header("content-type: text/javascript; charset=UTF-8");
?>
<script>
Phx.vista.ImportarFactur=Ext.extend(Phx.vista.ImportarFacturAbs,{
	constructor:function(config)
	{
		this.maestro=config;
    	//llama al constructor de la clase padre
		Phx.vista.ImportarFactur.superclass.constructor.call(this,config);
		this.init();
		
		
		//this.addButton('EntHabilitadas',{text:'Agencias Habilitadas',iconCls: 'blist',disabled:true,handler:EntHabilitadas,tooltip: '<b>Entidades - Agencias Habilitadas'});
		//this.addButton('ImportarClientes',{text:'Importar Clientes',iconCls: 'blist',disabled:true,handler:ImClientes,tooltip: '<b>Importar Clientes'});
		this.addButton('ImportarFacturacion',{text:'Importar Facturacion',iconCls: 'blist',disabled:true,handler:ImFacturacion,tooltip: '<b>Importar Facturación'});
		
		function ImFacturacion()
		{					
			
			//console.log('xxxxxx')
			var data_id_sistema_dist=this.sm.getSelected().data.id_sistema_dist;
			var data_conexion=this.sm.getSelected().data.conexion;
			
			if(confirm("Esta seguro de importar todos los clientes del sistema de distribución seleccionado?")){
				//console.log('YESS')
					Phx.CP.loadingShow();
					Ext.Ajax.request({
						 //form:this.form.getForm().getEl(),
						url:'../../sis_cobranza/control/SistemaDist/importarFacturacion',
						params:{'id_sistema_dist':data_id_sistema_dist,'conexion':data_conexion},
						success:this.successSinc,
						failure: this.conexionFailure,
						//timeout:this.timeout,
						timeout:810000,
						scope:this
					});	
				
			}
			else{
				
				console.log('NOOOOOOOO')
				
			}
		}
		this.load({params:{start:0, limit:50}})
	},
	successSinc:function(resp){
			
			Phx.CP.loadingHide();
			var reg = Ext.util.JSON.decode(Ext.util.Format.trim(resp.responseText));
			if(!reg.ROOT.error){
				alert(reg.ROOT.detalle.mensaje)
				
			}else{
				
				alert('ocurrio un error durante el proceso')
			}
			this.reload();
			
		},			 
	east:{
		  url:'../../../sis_cobranza/vista/importar_factur_resum/ImportarFacturResum.php',
		  title:'Facturacion por Periodo', 
		  width:'40%',
		  cls:'ImportarFacturResum'
		 },
	/*south:{
		  url:'../../../sis_cobranza/vista/factura_cob/FacturaCobAbs.php',
		  title:'Clientes', 
		  height:'40%',
		  cls:'Cliente'
		 },*/
		 
	//sobre carga de funcion
	preparaMenu:function(tb)
	{
			//llamada funcion clace padre
			this.getBoton('ImportarFacturacion').enable(); 
			Phx.vista.ImportarFactur.superclass.preparaMenu.call(this,tb);
	}
}	
)
</script>
		
		